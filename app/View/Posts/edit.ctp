<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="content">
			<div class="modal-header">
				<h1 class="modal-title" id="exampleModalLongTitle" style="color: #333333; font-weight: 700;">Editar Post</h1>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php echo $this->Form->create('Post');?>
				<div class="modal-body">
					<?php echo $this->Form->hidden('img', ['id' => 'postImg']); ?>

					<div class="form-group" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
						<div id='blogPostImge' class='dropzone' enctype='multipart/form-data' style="cursor: pointer;">
							<p class="title-dropzone" style="font-size: 1.4rem;">Arraste a imagem aqui ou clique para fazer o upload.</p>
							<?php echo $this->Html->image($this->request->data['Post']['img'], ['style' => 'width: 100%;']); ?>
								<img id="imgPrev" style="width:100%"/>
						</div>

						<button type="button" class='btn btn-red removeImg' style='display:none; width: 100%; padding: 3px; margin-top: 5px;'>Remover</button>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('title', ['label' => '', 'class' => 'form-control',  'tabindex' => '1', 'placeholder' => 'Título do Post']); ?>
					</div>

					<div class="form-group">
						<?php echo $this->Form->input('content', ['label' => '', 'class' => 'form-control',  'tabindex' => '1', 'placeholder' => 'Conteúdo do Post', 'rows' => '3']); ?>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary closePostEdit" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-danger" style="background-color: #b8403f;">Salvar</button>
				</div>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>
