<?php

$cakeDescription = __d('cake_dev', 'CakeBLOG');
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <!-- TITLE -->
    <title> <?php echo $cakeDescription ?> </title>

	<!-- ICON -->
    <link rel="shortcut icon" href="/img/favicon.png"/>

    <!-- META TAGS -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- CSS -->
	<?php echo $this->Html->css('System/auth');?>
	<?php echo $this->Html->css('System/reset');?>
</head>

<body>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>

	<!-- LIBS -->
	<?php echo $this->Html->script('Bootstrap/jquery-3.5.1.min');?>
	<?php echo $this->Html->script('Bootstrap/bootstrap.min');?>
	<?php echo $this->Html->script('Bootstrap/fontawesome');?>

	<!-- SCRIPTS -->
	<?php echo $this->Html->script('AppAuth');?>
</body>
</html>
