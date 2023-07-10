<?php

namespace app\models;

use app\validators\Validator;

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

    public function load(array $data) {
        foreach($this->attributes as $name => $value) {
            if(isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validate() {
        $validator = new Validator($this->attributes);
        $this->errors = $validator->validateAllFields();
    }
    
    public function save(string $table) {
        $bean = \R::dispense($table);
        foreach($this->attributes as $name => $value) {
            $bean->$name = $value;
        }
        
        return \R::store($bean);
    }

    public function getUserInfo($id) {
        $user = \R::findOne('user', "id = ?", [$id]);
        return $user;
    }

    public function getUserId($hash) {
        $user = \R::findOne('user', "hash = ?", [$hash]);
        return $user['id'];
    }

    public function update($table, $hash) {
        $bean = \R::findOne($table, "hash = ?", [$hash]);
        foreach($this->attributes as $name => $value) {
            if($name != 'hash') { 
                $bean->$name = $value;
            }
        }
        return \R::store($bean);
    }

    public function checkErrors() {
        if(!empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function getErrors() {
        $errors = '<ul>';
        foreach($this->errors as $error) {
                $errors .= "<li>$error</li>";
            }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
}