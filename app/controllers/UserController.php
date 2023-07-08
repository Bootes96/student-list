<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function indexAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $user = new User();
        $userInfo = $user->getUserInfo((int)$id);
        if($userInfo) {
            $this->set(compact('userInfo'));
        } else {
            $_SESSION['error'] = "Такого студента не существует";
        }
    }

    public function signupAction() {
        if(!empty($_POST)) {
            $user = new User();
            $data = $this->clearPostValues();
            var_dump($data);
            $user->load($data);
            $user->validateAllFields($data);
            $errors = $user->checkErrors();
            if($errors == true) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['hash'] = bin2hex(random_bytes(16));
                if($user->save('user')) {
                    $_SESSION['registered'] = "Вы успешно зарегистрированы";
                    $hash = $user->attributes['hash'];
                    $userId = $user->getUserId($hash);
                    setcookie('hash', $hash, time()+3600*24*365*10, "/", null, false,true);
                    setcookie('id', $userId, time()+3600*24*365*10, "/", null, false,true);
                    redirect(PATH);
                } else {
                    $_SESSION['error'] = "Ошибка";
                }
            }
            redirect();
        }
    }


    public function editAction() {
        if(isset($_COOKIE['hash'])) {
            $user = new User();
            $userData = $user->getUserInfo((int)$_COOKIE['id']);
            $this->set(compact('userData'));
            if(!empty($_POST)) {
                $data = $this->clearPostValues();
                $user->load($data);
                $user->validateAllFields();
                $errors = $user->checkErrors(); 
                if($errors == true) {
                    $user->getErrors();
                } else {
                    if($user->update('user', $_COOKIE['hash'])) {
                        $_SESSION['success'] = "Информация успешно обновлена"; 
                        redirect();
                    }
                }
            }
        }
    }

    public function clearPostValues() {
        $studentData = [];

        $studentData['name'] = array_key_exists('name', $_POST) ? strval(trim($_POST['name'])) : '';
        $studentData['lastname'] = array_key_exists('lastname', $_POST) ? strval(trim($_POST['lastname'])) : '';
        $studentData['birthyear'] = array_key_exists('birthyear', $_POST) ? intval(trim($_POST['birthyear'])) : 0;
        $studentData['gender'] = array_key_exists('gender', $_POST) ? strval(trim($_POST['gender'])) : '';
        $studentData['groupnumber'] = array_key_exists('groupnumber', $_POST) ? strval(trim($_POST['groupnumber'])) : '';
        $studentData['points'] = array_key_exists('points', $_POST) ? intval(trim($_POST['points'])) : 0;
        $studentData['email'] = array_key_exists('email', $_POST) ? strval(trim($_POST['email'])) : '';
        $studentData['location'] = array_key_exists('location', $_POST) ? strval(trim($_POST['location'])) : '';

        return $studentData;
    }
}