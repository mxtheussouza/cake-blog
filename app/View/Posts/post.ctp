<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

        <h1><?php echo $dados['Post']['title']?></h1>

        <p><small>Created: <?php echo $dados['Post']['created']?></small></p>

        <p><?php echo $dados['Post']['content']?></p>
    </div>
</div>