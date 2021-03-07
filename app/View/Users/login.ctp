<img class="wave" src="img/auth/wave.png">

<div class="container">
	<div class="img">
		<img src="img/auth/bg.svg">
	</div>
	<div class="login-content">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User');?>
		<h2 class="title">FAÇA O LOGIN!</h2>

		<?php echo $this->Form->input('username', ['label' => '', 'class' => 'input-auth',  'tabindex' => '1', 'placeholder' => 'E-mail']); ?>

		<?php echo $this->Form->input('password', ['label' => '', 'class' => 'input-auth',  'tabindex' => '1', 'placeholder' => 'Senha']); ?>

		<input type="submit" class="btn" value="Login">

		<a href="/register">Ainda não possue uma conta?</a>

	<?php echo $this->Form->end();?>
	</div>
</div>
