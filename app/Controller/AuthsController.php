<?php

App::uses('AppController', 'Controller');

class AuthsController extends AppController
{
	public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() 
    {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Flash->error(__('Email ou senha inválida, tente novamente.'));
        }
    }

    public function logout() 
    {
        $this->redirect($this->Auth->logout());
    }

    public function register() 
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Você foi cadastrado.'));
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Cadastrado não conseguiu ser efetuado, tente novamente.'));
            }
        }
    }

    public function beforeSave($options = []) 
    {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        
        return true;
    }
}
