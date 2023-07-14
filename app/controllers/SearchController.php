<?php

namespace app\controllers;

use app\helpers\Pagination;

class SearchController extends AppController
{
    public function indexAction()
    {
        $query = !empty(trim($_GET['query'])) ? $_GET['query'] : null;
        if ($query) {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $sort = isset($_GET['sortByPoints']) ? $_GET['sortByPoints'] : "DESC"; 
            $_SESSION["sort"] = $sort;
            $perPage = 5; 
            $findedUsers = \R::getAll("SELECT * FROM user WHERE CONCAT(`name`,' ',`lastname`,' ', `groupnumber`,' ',`points`) OR CONCAT(`lastname`,' ',`name`, ' ', `groupnumber`,' ',`points`) LIKE ?", ['%' . $query . '%']);
            $total = count($findedUsers);
            $pagination = new Pagination($page, $perPage, $total); 
            $start = $pagination->getStart();
            $users = \R::getAll("SELECT * FROM user WHERE CONCAT(`name`,' ',`lastname`,' ', `groupnumber`,' ',`points`) OR CONCAT(`lastname`,' ',`name`, ' ', `groupnumber`,' ',`points`) LIKE ? ORDER BY points $sort LIMIT $start, $perPage", ['%' . $query . '%']);
            if(!$users) {
                $_SESSION['error'] = "По вашему запросу ничего не найдено";
            }
            $this->set(compact('users', 'query', 'pagination'));
        }
    }
}
