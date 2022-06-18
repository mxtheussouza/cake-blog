<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<div style="padding: 1rem;">
			<div>
				<h1 style="color: #333333; font-weight: 700;">Usuários</h1>
			</div>

			<div class="table-responsive">
				<table class="table table-hover text-nowrap">
					<tr style="background-color: #b8403f; color: #fff;">
						<th style="text-align: center;">Foto</th>
						<th>Nome Completo</th>
						<th>Nome de Usuário</th>
						<th style="text-align: center;">Grupo</th>
						<th style="text-align: center;">Ações</th>
					</tr>

					<?php foreach ($users as $user) { ?>
						<tr>
							<td style="text-align: center;">
								<?php
									if (empty($user['User']['photo'])) {
										echo $this->Html->image('upload/avatar/default.svg',['class' => 'img-avatar']);
									} else {
										echo $this->Html->image('upload/avatar/'.$user['User']['photo'],['class' => 'img-avatar']);
									}
								?>
							</td>
							<td>
								<?php echo $user['User']['name']; ?>
							</td>
							<td>
								<?php echo $user['User']['nickname']; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $user['Group']['name']; ?>
							</td>
							<td style="text-align: center;">
								<div class="dropdown">
									<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #b8403f; ">
										<i class="fas fa-cog"></i>
									</button>

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="/users/profile/<?php echo $user['User']['nickname']; ?>" class="dropdown-item">Ver Usuário</a>
										<a idEditUser="<?php echo $user['User']['id']; ?>" class="dropdown-item btnEditUser" href="#">Editar Usuário</a>
										<div class="dropdown-divider"></div>
										<a idDeleteUser="<?php echo $user['User']['id']; ?>" class="dropdown-item btnDeleteUser" href="#">Deletar Usuário</a>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

