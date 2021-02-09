<?php

App::uses('AppController', 'Controller');

class BlogsController extends AppController
{
	public function index()
	{
		$this->loadModel('Post');
		$this->layout = 'default';

		$this->paginate = [
            'order' => ['Post.id' => 'DESC'],
            'limit' => 15
        ];

		$dados = $this->paginate('Post');

		$this->set(compact('dados'));
	}
}
