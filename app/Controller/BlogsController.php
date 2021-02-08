<?php

App::uses('AppController', 'Controller');

class BlogsController extends AppController
{
	public function index()
	{
		$this->loadModel('Post');
		$this->layout = 'default';

		$dados = $this->Post->find('all');

		$this->set(compact('dados'));
	}
}
