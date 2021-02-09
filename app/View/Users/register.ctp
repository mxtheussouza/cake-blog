<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
			echo $this->Form->input('username', ['label'=>'E-mail','class'=>'form-control', 'tabindex'=>'1']);
			echo $this->Form->input('name', ['label'=>'Nome Completo','class'=>'form-control', 'tabindex'=>'1']);
			echo $this->Form->input('nickname', ['label'=>'Nome de Usuário','class'=>'form-control', 'tabindex'=>'1']);
			echo $this->Form->input('password', ['label'=>'Senha','class'=>'form-control', 'tabindex'=>'1']);
   	 	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
