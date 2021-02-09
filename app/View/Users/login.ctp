<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php
			echo $this->Form->input('username', ['label'=>'E-mail','class'=>'form-control', 'tabindex'=>'1']);
			echo $this->Form->input('password', ['label'=>'Senha','class'=>'form-control', 'tabindex'=>'1']);
    	?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>
