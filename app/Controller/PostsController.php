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

	public function write()
    {
		$this->layout = 'default';
    }

    public function add()
    {
		$this->layout = 'ajax';
		$this->autoRender = false;

		$response['error'] = true;
		$response['msg'] = "Não foi possível postar o conteúdo.";

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

            if ($this->Post->save($this->request->data)) {
                $response['error'] = false;
				$response['msg'] = "Postado com sucesso!";
            }
        }

		$this->response->body(json_encode($response));
    }

	public function edit($id = null)
	{
		$this->Post->id = $id;

		if ($this->request->is('get')) {
			$this->request->data = $this->Post->findById($id);
		}
	}

	public function update($id = null)
	{
		$this->layout = "ajax";
		$this->autoRender = false;

		$response['error'] = true;
		$response['msg'] = "Não foi possível atualizar o post.";

		if ($this->Post->save($this->request->data)) {
			$response['error'] = false;
			$response['msg'] = "Post atualizado!";
		}

		$this->response->body(json_encode($response));
	}

	public function delete($id)
	{
		$this->layout = "ajax";
		$this->autoRender = false;

		$response['error'] = true;
		$response['msg'] = "Não foi possível excluir o registro.";

		if ($this->Post->delete($id)) {
			$response['error'] = false;
			$response['msg'] = "Registro excluído com sucesso!";
		}

		$this->response->body(json_encode($response));
	}
}
