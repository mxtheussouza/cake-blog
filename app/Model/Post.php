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

	public function moveFile($file, $destination)
	{
        $filename = pathinfo($file)['basename'];
        $path = $destination."/".$filename;

        return rename($file,$path) ? str_replace("img/","",$path) : null;
    }
}
