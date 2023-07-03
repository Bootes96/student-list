<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {
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
                    setcookie('hash', $hash, time()+3600*24*365*10, "/", null, false,true);
                    redirect(PATH);
                } else {
                    $_SESSION['error'] = "Ошибка";
                }
            }
            redirect();
        }
    }

    public function profileAction() {
        $user = new User();
        $userInfo = $user->getUserInfo($_COOKIE['hash']);
        $this->set(compact('userInfo'));
    }

    public function editAction() {
        if(isset($_COOKIE['hash'])) {
            $user = new User();
            $userInfo = $user->getUserInfo($_COOKIE['hash']);
            $this->set(compact('userInfo'));
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