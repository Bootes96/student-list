<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function indexAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $user = new User();
        $userInfo = $user->getUserInfo($id);
        if($userInfo) {
            $this->set(compact('userInfo'));
        } else {
            $_SESSION['error'] = "Такого студента не существует";
        }
    }


    public function signupAction() {
        if(!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            $user->validateAllFields($data);
            $errors = $user->checkErrors();
            if($errors == true) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['hash'] = bin2hex(random_bytes(16));
                if($user->save('user')) {
                    $_SESSION['success'] = "Вы успешно зарегистрированы";
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
            $userData = $user->getUserInfo($_COOKIE['id']);
            $this->set(compact('userData'));
            if(!empty($_POST)) {
                $data = $_POST;
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
}