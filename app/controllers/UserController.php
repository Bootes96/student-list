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
                redirect();
            } else {
                
            }
        }
    }

    public function profileAction() {
        
    }
}