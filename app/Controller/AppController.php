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

    function beforeFilter()
	{
        $this->Auth->allow('index', 'login', 'register', 'logout', 'write', 'add', 'edit', 'delete', 'deleteUser', 'update', 'post', 'profile', 'schedule', 'changePhoto', 'imgBlog', 'unlinkImage');
    }
}
