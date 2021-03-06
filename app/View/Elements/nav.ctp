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
								<div style="display: flex;">
									<?php echo $this->Html->link($this->Session->read('Auth.User.nickname'), ['controller' => '', 'action' => ''], ['class' => 'nav-link dropbtn']); ?>

									<?php if (empty($v['User']['photo'])) { ?>
										<img alt="Author Photo" src="/img/upload/avatar/default.svg" class="avatar avatar-40 photo jetpack-lazy-image jetpack-lazy-image--handled" height="40" width="40" data-lazy-loaded="1" loading="eager"/>
									<?php } else { ?>
										<img alt="Author Photo" src="#" class="avatar avatar-40 photo jetpack-lazy-image jetpack-lazy-image--handled" height="40" width="40" data-lazy-loaded="1" loading="eager"/>
									<?php } ?>
								</div>

								<div id="myDropdown" class="dropdown-content">
									<?php echo $this->Html->link('Perfil', ['controller' => 'users', 'action' => 'profile', $this->Session->read('Auth.User.id')], ['class' => 'nav-link']); ?>

									<?php echo $this->Html->link('Escreva um Blog', ['controller' => 'posts', 'action' => 'add'], ['class' => 'nav-link']); ?>

									<?php if  ($this->Session->read('Auth.User.group_id') == 1) {
										echo $this->Html->link('Usuários', ['controller' => 'users', 'action' => 'schedule'], ['class' => 'nav-link']);
									} ?>

									<div class="dropdown-divider"></div>

									<?php echo $this->Html->link("Sair", ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'id' => 'btnLogout']); ?>
								</div>
							</div>
						</li>
					<?php } ?>

					<!-- <li class="nav-list-item change-theme" data-toggle="tooltip" data-placement="bottom" title="Modo Escuro">
                      <i class="fa fa-toggle-off theme-button"></i>
                    </li> -->
				</ul>
            </nav>
        </div>
    </header>
</nav>
