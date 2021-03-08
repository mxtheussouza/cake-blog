<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<div style="display: flex; padding: 1rem;">
			<div style="margin: 0 auto;">
				<div>
					<h1 style="color: #333333; font-weight: 700;">Escreva um blog...</h1>
				</div>

				<div>
					<?php echo $this->Form->create('Post');?>
						<?php echo $this->Form->hidden('img',['id' => 'postImg']); ?>

						<div class="form-group" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
							<div id='blogPostImg' class='dropzone' enctype='multipart/form-data' style="cursor: pointer;">
								<p class="title-dropzone" style="font-size: 1.4rem;">Arraste a imagem aqui ou clique para fazer o upload.</p>
								<div style='font-size: 500%; padding-left: 41px; padding-right: 41px;cursor:pointer;'>
									<img id="imgPrev" style="width:100%"/>
								</div>
							</div>

							<button type="button" class='btn btn-red removeImg' style='display:none; width: 100%; padding: 3px; margin-top: 5px;'>Remover</button>
						</div>

						<div class="form-group">
							<?php echo $this->Form->input('title', ['label' => '', 'class' => 'form-control',  'tabindex' => '1', 'placeholder' => 'Título do Post']); ?>
						</div>

						<div class="form-group">
							<?php echo $this->Form->input('content', ['label' => '', 'class' => 'form-control',  'tabindex' => '1', 'placeholder' => 'Conteúdo do Post', 'rows' => '3']); ?>
						</div>

						<!-- <div class="form-group">
							<div id="editor" style="border: 1px solid #ced4da;"></div>
						</div> -->

						<button type="submit" class="btn btn-danger btnSavePost" style="background-color: #b8403f;">Postar</button>
					<?php echo $this->Form->end();?>
				</div>
			</div>
		</div>
	</div>
</div>
