<?php

App::uses('AppController', 'Controller');

class BlogsController extends AppController
{
	public function index()
	{
		// INSTANCE
		$this->loadModel('Post');

		// BLOG LAYOUT
		$this->layout = 'default';

		$dados = $this->Post->find('all');

		$this->set(compact('dados'));
	}
}
