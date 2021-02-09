<?php pr($this->Session->read('Auth.User')) ?>
<nav class="wrap">
    <header>
        <div class="header-logo">
            <h1 class="is-logo">
                <a href="/">
                    <img src="/img/blogicon.png" alt="Logo"/>
                </a>
            </h1>
        </div>

        <div class="header-nav">
            <nav class="nav-wrap">
				<ul class="nav-list">
					<?php if (!$this->Session->read('Auth.User')) { ?>
							<li class="nav-list-item">
								<?php echo $this->Html->link("LOGIN", ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link primary']); ?>
							</li>
					<?php } else { ?>
						<li class="nav-list-item">
							<div class="dropdown">
								<?php echo $this->Html->link($this->Session->read('Auth.User.nickname'), ['controller' => '', 'action' => ''], ['class' => 'nav-link dropbtn']); ?>
								<div id="myDropdown" class="dropdown-content">
									<?php echo $this->Html->link('Perfil', ['controller' => 'users', 'action' => 'profile'], ['class' => 'nav-link']); ?>

									<?php echo $this->Html->link('Escreva um Blog', ['controller' => 'posts', 'action' => 'add'], ['class' => 'nav-link']); ?>

									<?php echo $this->Html->link("SAIR", ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link']); ?>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
            </nav>
        </div>
    </header>
</nav>
