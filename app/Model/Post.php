<?php

App::uses('AppModel', 'Model');

class Post extends AppModel
{
    public $name = 'Post';

	public $useTable = 'posts';
	public $belongsTo = 'User';

    public $validate = [
        'title' => [
            'rule' => 'notBlank'
        ],
        'content' => [
            'rule' => 'notBlank'
        ]
    ];
}
