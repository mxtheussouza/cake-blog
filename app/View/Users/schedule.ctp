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
						<th>Nome Completo</th>
						<th>Nome de Usuário</th>
						<th>Grupo</th>
					</tr>

					<?php foreach ($users as $user) { ?>
						<tr>
							<td>
								<a href="/users/profile/<?php echo $user['User']['id']; ?>"><?php echo $user['User']['name']; ?></a>
							</td>
							<td>
								<?php echo $user['User']['nickname']; ?>
							</td>
							<td>
								<?php echo $user['Group']['name']; ?>
							</td>
						</tr>
					<?php } ?>

				</table>
			</div>
		</div>

	</div>
</div>

