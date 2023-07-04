<?php

namespace app\controllers;

use app\helpers\Pagination;

class MainController extends AppController{
    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;
        $total = \R::count('user');
        $pagination = new Pagination($page, $perPage, $total); 
        $start = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perPage");
        $this->set(compact('users', 'pagination'));
    }
}