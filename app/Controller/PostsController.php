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
                $this->redirect(['controller' => 'blogs', 'action' => 'index']);
            }
        }
    }

	function delete($id)
	{
		$this->layout = "ajax";

		$response['error'] = true;
		$response['msg'] = "Não foi possível excluir o registro";

		if ($this->Post->delete($id)) {
			$response['error'] = false;
			$response['msg'] = "Registro excluído com sucesso";
		}

		$this->response->body(json_encode($response));
	}
}
