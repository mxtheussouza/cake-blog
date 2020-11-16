<?php

$cakeDescription = __d('cake_dev', 'CakeBLOG');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('animation');
		echo $this->Html->css('Bootstrap/bootstrap.min');
		echo $this->Html->css('Bootstrap/fontawesome');
		echo $this->Html->script('Bootstrap/jquery-3.5.1.min');
		echo $this->Html->script('Bootstrap/bootstrap.min');
		echo $this->Html->script('Bootstrap/fontawesome');
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
