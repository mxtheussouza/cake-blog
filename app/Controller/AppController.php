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
        $this->Auth->allow('index', 'view');
    }
    
    public function isAuthorized($user) {
        if (isset($user['group_id']) && $user['group_id'] === 1) {
            return true;
        }

        return false;
    }
}
