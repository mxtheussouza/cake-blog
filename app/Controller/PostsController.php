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

			if (!empty($this->request->data['Post']['img'])) {
				$img = explode("/", $this->request->data['Post']['img']);
                $dirImg = "upload/post_img/".$img[4];

				$this->Post->moveFile($this->request->data['Post']['img'], "img/upload/post_img");

				$this->request->data['Post']['img'] = $dirImg;
            }

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

	public function imgBlog()
	{
        $this->autoRender = false;

        if (!empty($_FILES)) {
            $infoImg = pathinfo($_FILES['file']['name']);
            $dir = 'img/upload/post_img/tmp/';
            $tmpImg = $_FILES['file']['tmp_name'];
            $myImg = $dir . uniqid(md5($_FILES['file']['name'])).'.'.strtolower($infoImg['extension']);

			if (move_uploaded_file($tmpImg, $myImg)) {
				$response = $myImg;
			}

            $this->response->body($response);
        }
    }

	public function unlinkImage($queryStrUrl)
	{
        $this->autoRender = false;
        $this->layout = "ajax";

		$url = str_replace("-","/",$queryStrUrl);

        if (unlink($url)) {
            $response['error'] = false;
        } else {
            $response['error'] = true;
        }

        $this->response->body(json_encode($response));
    }
}
