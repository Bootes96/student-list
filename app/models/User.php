<?php

namespace app\models;

class User extends AppModel {
    public $attributes = [
        'name' => '',
        'lastname' => '',
        'email' => '',
        'birthyear' => '',
        'gender' => '',
        'groupnumber' => '',
        'points' => '',
        'location' => '',
        'hash' => ''
    ];

    public $errors = [];

    public function load($data) {
        foreach($this->attributes as $name => $value) {
            if(isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validateAllFields() {
        $validatedArr = [];

        $validatedArr['name'] = $this->validateName($this->attributes['name']);
        $validatedArr['lastname'] = $this->validateLastName($this->attributes['lastname']);
        $validatedArr['email'] = $this->validateEmail($this->attributes['email']);
        $validatedArr['points'] = $this->validatePoints($this->attributes['points']);
        $validatedArr['groupnumber'] = $this->validateGroupNumber($this->attributes['groupnumber']);
        $validatedArr['birthyear'] = $this->validateBirthYear($this->attributes['birthyear']);
        
        foreach($validatedArr as $k => $v) {
            if($v !== true) {
                $this->errors[$k] = $v; 
            }
        }

        var_dump($this->attributes);
    }

    public function checkErrors() {
        if(!empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function validateName($name) {
        $pattern = "/^[А-ЯЁ]([\s\-\']?[а-яёА-ЯЁ][\s\-\']?)*$/u";
        $nameLength = mb_strlen($name);
        if(!$nameLength) {
            return "Заполните поле Имя";
        } elseif($nameLength > 50) {
            return "Имя не должно содержать более 50 символов, Вы ввели {$nameLength}";
        } elseif(!preg_match($pattern, $name)) {
            return "Имя должно состоять только из русских символов и начинаться с большой буквы";
        }

        return true;
    }

    public function validateLastName($lastName) {
        $pattern = "/^[А-ЯЁ]([\s\-\']?[а-яёА-ЯЁ][\s\-\']?)*$/u";
        $lastNameLength = mb_strlen($lastName);
        if(!$lastNameLength) {
            return "Заполните поле Фамилия";
        } elseif($lastNameLength > 100) {
            return "Фамилия не должна содержать более 100 символов, Вы ввели {$lastNameLength}";
        } elseif(!preg_match($pattern, $lastName)) {
            return "Фамилия должна состоять только из русских символов и начинаться с большой буквы";
        }

        return true;
    }

    public function validateEmail($email) {
        if(!mb_strlen($email)) {
            return "Заполните поле Email";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Введите Email в правильном формате. Пример: example@mail.ru";
        }

        $existingEmail = \R::findOne('user', 'email = ?', [$email]);

        if($existingEmail) {
            return "Пользователь с таким Email уже зарегистрирован";
        }

        return true;
    }

    public function validatePoints($points) {
        if($points < 50 || $points > 300) {
            return "Количество баллов не может быть меньше 50 и больше 300";
        }

        return true;
    }

    public function validateGroupNumber($groupNumber) {
        $pattern = "/^[а-яёА-ЯЁ0-9]+$/u";
        $groupLength = mb_strlen($groupNumber);

        if(!$groupLength) {
            return "Заполните поле Номер группы";
        } elseif($groupLength < 2 && $groupLength > 6) {
            return "Количество символов не может быть меньше 2 и больше 6";
        } elseif(!preg_match($pattern, $groupNumber)) {
            return "Номер группы должен состоять только из цифр и русских букв";
        }
        return true;
    }

    public function validateBirthYear($birthYear) {
        if($birthYear < 1930 || $birthYear > 2009) {
            return "Год рождения не может быть старше 1930 и младше 2009";
        }
        return true;
    }



    public function getErrors() {
        $errors = '<ul>';
        foreach($this->errors as $error) {
                $errors .= "<li>$error</li>";
            }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }


    public function save($table) {
        $bean = \R::dispense($table);
        foreach($this->attributes as $name => $value) {
            $bean->$name = $value;
        }
        
        return \R::store($bean);
    }
}