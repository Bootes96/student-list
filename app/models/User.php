<?php

namespace app\models;

class User extends AppModel {
    public $attributes = [
        'name' => '',
        'lastname' => '',
        'email' => '',
        'birthYear' => '',
        'sex' => '',
        'groupNumber' => '',
        'points' => '',
        'location' => ''
    ];
}