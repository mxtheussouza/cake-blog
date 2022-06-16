<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="content">
			<div class="modal-header">
				<h1 class="modal-title" id="exampleModalLongTitle" style="color: #333333; font-weight: 700;">Editar Usuário</h1>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php echo $this->Form->create('User', ['url' => 'changePhoto', 'id' => 'UserPhotoForm', 'class' => 'dropzone', 'enctype' => 'multipart/form-data', 'style' => 'display: flex; flex-direction: column;']); ?>
				<small> Insira sua imagem aqui </small>
			<?php echo $this->Form->end(); ?>'


			<?php echo $this->Form->create('User');?>
				<div class="modal-body">
					<div class="form-group">
						<?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('username', ['label' => 'E-mail:', 'class' => 'form-control']); ?>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('name', ['label' => 'Nome Completo:', 'class' => 'form-control']); ?>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('nickname', ['label' => 'Nome de Usuário:', 'class' => 'form-control']); ?>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary closeUserEdit" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-danger" style="background-color: #b8403f;">Salvar</button>
				</div>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>
