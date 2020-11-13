<?php

App::uses('Controller', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário deletado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Usuário não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Flash->error(__('Nome de usuário ou senha inválida, tente novamente'));
        }
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}