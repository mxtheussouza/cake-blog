<?php

$cakeDescription = __d('cake_dev', 'CakeBLOG');
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <!-- TITLE -->
    <title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
		echo $this->Html->css('style');
		echo $this->Html->css('animation');
		echo $this->Html->css('responsive');
		echo $this->Html->css('Bootstrap/bootstrap.min');
		echo $this->Html->css('Bootstrap/fontawesome');
		echo $this->Html->script('Bootstrap/jquery-3.5.1.min');
		echo $this->Html->script('Bootstrap/bootstrap.min');
		echo $this->Html->script('Bootstrap/fontawesome');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

    <!-- ICON -->
    <link rel="shortcut icon" href="./img/favicon.png"/>

    <!-- META TAGS -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- LINKS -->
    <link rel="stylesheet" href="./css/reset.css"/>
    <link rel="stylesheet" href="./css/responsive.css"/>
    <link rel="stylesheet" href="./css/style.css"/>
</head>

<body>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>
</body>
</html>
