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

	public function changePhoto($id)
    {
        if (!empty($_FILES)) {
            $parts = pathinfo($_FILES['file']['name']);
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = 'img/upload/avatar/';
            $newFileName = $id . '.' . strtolower($parts['extension']);
            $targetFile = $targetPath . $newFileName;
            $error = 0;

            if (move_uploaded_file($tempFile, $targetFile)) {
                $data['User']['id'] = $id;
                $data['User']['photo'] = strtolower($newFileName);
                $data['User']['modified'] = date('Y-m-d H:i:s');

                $this->User->id = $id;
                $this->User->save($data, false);
                $this->Session->write('Auth.User.photo', $data['User']['photo']);
                $error = 0;
            } else {
                $error = 1;
            }
            echo json_encode(compact('error'));
            exit;
        }
    }

	public function schedule()
    {
		$this->layout = 'default';

        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

	public function register()
	{
		$this->layout = 'auth';

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
		$this->layout = 'auth';

		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
		}
	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
}
