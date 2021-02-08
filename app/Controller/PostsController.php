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
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi salvo.');
                $this->redirect(['action' => 'index']);
            }
        }
    }

    function edit($id = null) 
    {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->findById($id);
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi atualizado.');
                $this->redirect(['action' => 'index']);
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Flash->success('Seu post foi deletado.');
            $this->redirect(['action' => 'index']);
        }
    }
}
