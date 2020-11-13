<div style="padding: 2rem;">

    <div style="display: flex; justify-content: center; margin-bottom: 3rem;">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;">
            Clique aqui para fazer seu post.
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; text-align: center;">Crie seu blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                        echo $this->Form->create('Post');
                        echo $this->Form->input('titulo', array('class' => 'form-control'));
                        echo $this->Form->input('texto', array('class' => 'form-control'));
                        echo $this->Form->end('Postar');
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 50%; margin: auto; height: 100%;">
        <?php foreach ($posts as $post): ?>
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; background: #dc3545">
                <h5 style="font-weight: 700; color: #fff;">
                    <?php echo $post['Post']['titulo']; ?>
                </h5>

                <div class="options">
                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), array('action' => 'view', $post['Post']['id']), array('escape' => false)) ?>

                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pen')), array('action' => 'edit', $post['Post']['id']), array('escape' => false)) ?>

                    <?php echo $this->Form->postLink(
                        'X',
                        array('action' => 'delete', $post['Post']['id']),
                        array('confirm' => 'Quer mesmo deletar esse post?')
                    )?>
                </div>
            </div>

            <div class="card-body">
                <p class="card-text">
                    <?php echo $post['Post']['texto']; ?></td>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>