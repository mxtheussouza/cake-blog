<?php

App::uses('Controller', 'Controller');

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';

    function index() {
        $this->set('posts', $this->Post->find('all'));

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi publicado.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    function edit($id = null) {
	    $this->Post->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Post->findById($id);
	    } else {
	        if ($this->Post->save($this->request->data)) {
	            $this->Flash->success('Seu post foi atualizado.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
    }
    
    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Flash->success('O post foi deletado.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            if ($this->action === 'add') {
                return true;
            }
            if (in_array($this->action, array('edit', 'delete'))) {
                $postId = (int)$this->request->params['pass'][0];
                return $this->Post->isOwnedBy($postId, $user['id']);
            }
        }
        return false;
    }
}