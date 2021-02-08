<?php

App::uses('AppController', 'Controller');

class BlogsController extends AppController
{
	public function index()
	{
		$this->layout = 'default';
	}
}
