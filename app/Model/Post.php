<?php 

App::uses('Model', 'Model');

class Post extends AppModel {
    public $name = 'Post';

    public $validate = array(
        'titulo' => array(
            'rule' => 'notBlank'
        ),
        'texto' => array(
            'rule' => 'notBlank'
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
    }
}