<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	public function register()
	{
		$this->layout = 'auth';

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->redirect(['action' => 'login']);
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
		$this->Session->delete('Auth');

		$this->redirect($this->Auth->logout());
	}

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

	// public function edit($id = null)
	// {
    //     $this->User->id = $id;
    //     if (!$this->User->exists()) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }
    //     if ($this->request->is('post') || $this->request->is('put')) {
    //         if ($this->User->save($this->request->data)) {
    //             $this->Flash->success(__('The user has been saved'));
    //             $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //         }
    //     } else {
    //         $this->request->data = $this->User->findById($id);
    //         unset($this->request->data['User']['password']);
    //     }
    // }

	public function deleteUser($id = null)
	{
		$this->layout = "ajax";
		$this->autoRender = false;

        $this->User->id = $id;

		$response['error'] = true;
		$response['msg'] = "Não foi possível excluir o registro.";

        if (!$this->User->exists()) {
            $response['error'] = true;
			$response['msg'] = "Usuário inválido";
        }

        if ($this->User->delete()) {
            $response['error'] = false;
			$response['msg'] = "Usuário excluído com sucesso!";
        }

		$this->response->body(json_encode($response));
    }

	// public function changePhoto($id)
    // {
    //     if (!empty($_FILES)) {
    //         $parts = pathinfo($_FILES['file']['name']);
    //         $tempFile = $_FILES['file']['tmp_name'];
    //         $targetPath = 'img/upload/avatar/';
    //         $newFileName = $id . '.' . strtolower($parts['extension']);
    //         $targetFile = $targetPath . $newFileName;
    //         $error = 0;

    //         if (move_uploaded_file($tempFile, $targetFile)) {
    //             $data['User']['id'] = $id;
    //             $data['User']['photo'] = strtolower($newFileName);
    //             $data['User']['modified'] = date('Y-m-d H:i:s');

    //             $this->User->id = $id;
    //             $this->User->save($data, false);
    //             $this->Session->write('Auth.User.photo', $data['User']['photo']);
    //             $error = 0;
    //         } else {
    //             $error = 1;
    //         }
    //         echo json_encode(compact('error'));
    //         exit;
    //     }
    // }
}
