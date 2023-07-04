<?php

namespace app\controllers;


class MainController extends AppController{
    public function indexAction() {
        $users = \R::findAll('user');
        $this->set(compact('users'));
    }
}