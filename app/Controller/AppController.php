<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
        )
    );

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return false;
    }

    function beforeFilter() {
        $this->Auth->allow('index', 'view', 'display');
    }
}