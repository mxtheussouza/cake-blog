<div style="background:#f1f2f3; padding: 2rem;height: 100%;">
    <div style="height: 100%; display:flex; justify-content: center; align-items: center; flex-direction: column;">
        <div style="background: #fff; width: 500px; max-width: 100%; border-radius: 1rem; padding: 1rem; box-shadow: 0px 3px 20px 0px rgba(13, 21, 75, 0.3);">
            <h1>Edite seu post</h1>

            <hr>

            <?php
                echo $this->Form->create('Post', array('url' => 'edit'));
                echo $this->Form->input('titulo', array('class' => 'form-control'));
                echo $this->Form->input('texto', array('class' => 'form-control'));
                echo $this->Form->input('id', array('type' => 'hidden'));
                echo $this->Form->end('Salvar');
            ?>
        </div>
    </div>
</div>