<?php

App::uses('Controller', 'Controller');

class AppController extends Controller
{
    public $components = [
        'Flash',
        'Auth' => [
            'loginRedirect' => ['controller' => 'blogs', 'action' => 'index'],
            'logoutRedirect' => ['controller' => 'blogs', 'action' => 'index'],
            'authorize' => ['Controller'],
        ]
    ];

    function beforeFilter() {
        $this->Auth->allow('index', 'post', 'login', 'add', 'register', 'logout', 'profile', 'schedule', 'delete');
    }
}
