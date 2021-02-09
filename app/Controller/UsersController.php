<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{
    public function profile($id = null)
    {
        $this->loadModel('Post');
		$this->layout = 'default';

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário Inválido'));
        }

		$dados = $this->User->findById($id);

        $postAuthor = $this->Post->find('all', [
            'conditions' => ['Post.user_id' => $id],
            'order' => ['Post.id' => 'DESC']
        ]);

        $this->set(compact('dados', 'postAuthor'));
    }

	public function schedule()
    {
		$this->layout = 'default';

        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('User was not deleted'));
        $this->redirect(['action' => 'index']);
    }

	public function register()
	{
		$this->layout = 'default';

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

	public function login()
	{
		$this->layout = 'default';

		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
		} else {
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
}
