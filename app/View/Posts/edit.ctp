<div style="background:#f1f2f3; padding: 2rem;height: 100%;">
    <h1>Edite seu post</h1>
    <?php
        echo $this->Form->create('Post', array('url' => 'edit'));
        echo $this->Form->input('title', array('class' => 'form-control'));
        echo $this->Form->input('body', array('class' => 'form-control'));
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Salvar');
    ?>
</div>