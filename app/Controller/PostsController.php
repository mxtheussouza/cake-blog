<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController
{
    public $helpers = ['Html','Form'];
    public $name = 'Posts';

    public function post($id = null)
    {
		$this->layout = 'default';

		$dados = $this->Post->findById($id);

        $this->set(compact('dados'));
    }

    public function add()
    {
		$this->layout = 'default';

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi salvo.');
                $this->redirect(['action' => 'index']);
            }
        }
    }
}
