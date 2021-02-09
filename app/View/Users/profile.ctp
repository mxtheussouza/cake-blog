<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<div class="author-content" style="margin-top: 4rem;">
			<div class="container">
				<div class="author-info">
					<div class="user-image">
						<?php 
						if(empty($dados['User']['photo'])){ 
							echo $this->Html->image('upload/avatar/default.svg',['class' => 'img-avatar']);
						}else{
							echo $this->Html->image('upload/avatar/'.$dados['User']['photo'],['class' => 'img-avatar']);
						}
						?>
					</div>
					<div class="author-name">
						<span> <?php echo $dados['User']['name'];?> </span>
						<span class="nick"> @<?php echo $dados['User']['nickname'];?> </span>
						<p> <?php echo $dados['Group']['name'];?> </p>
					</div>
				</div>

				<hr>

				<div class="posts-relacionados">
					<h2 style="font-weight: 700;">Posts do Autor</h2>
					<span class="title-border-left"></span>
					<?php if(!empty($postAuthor)){ ?>
						<div class="row">
							<?php foreach($postAuthor as $k => $v){  ?>
								<div class="col-md-4">
									<a href="/posts/post/<?php echo $v['Post']['id'] ?>" class="post-rel">
										<?php echo $this->Html->image($v['Post']['img'],['class' => 'img-responsive']); ?>
										<div class="post-rel-title">
											<h3><?php echo $v['Post']['title']; ?></h3>
										</div>
									</a>
								</div>
							<?php } ?>
						</div>
					<?php } else { ?>
						<div class="anyposts">
							<?php echo $this->Html->image('anything.png',['class' => 'img-blog']); ?>
							<p>NENHUM POST FOI ENCONTRADO.</p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
