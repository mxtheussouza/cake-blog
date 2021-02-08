<?php

App::uses('AppModel', 'Model');

class Auth extends AppModel 
{
    public $name = 'Auth';

    public $validate = [
        'username' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'Um email é obrigatório.'
            ]
        ],
        'password' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'Uma senha é obrigatória.'
            ]
        ],
    ];
}