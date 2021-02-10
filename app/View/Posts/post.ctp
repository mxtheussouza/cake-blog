
<?php echo $this->element('nav') ?>
<div class="post-body" style="overflow: hidden; padding: 0 0 30px 0;">
	<div class="section-body contain-lg">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-8">
				<div>
					<div class="row style-primary">
						<div class="col-md-12">
							<div class="blog-title">
								<h1><?php echo $dados['Post']['title']; ?></h1>
							</div>
						</div>

						<div class="header-post">
							<div class="user-info">
								<a>
									<div class="user-image">
										<?php
											if (empty($dados['User']['photo'])) {
												echo $this->Html->image('upload/avatar/default.svg',['class' => 'img-avatar']);
											} else {
												echo $this->Html->image('upload/avatar/'.$dados['User']['photo'],['class' => 'img-avatar']);
											}
										?>
									</div>
									<span>
										<?php echo $dados['User']['name']; ?>
										<div class="linha-link-menu"></div>
									</span>
								</a>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<article class="style-default-bright">
								<div>
									<?php
										if (empty($dados['Post']['img'])) {
											echo $this->Html->image('blogicon.png',['class' => 'img-blog']);
										} else {
											echo $this->Html->image($dados['Post']['img'],['class' => 'img-blog']);
										}
									?>
								</div>

								<hr>

								<div style="margin: 0 0 8rem 0;">
									<p><?php echo  $dados['Post']['content'] ?></p>
								</div>
							</article>

							<hr>

							<div class="footer-post">
								<div class="share">
									<a data-toggle="tooltip" data-placement="top" title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Router::url('/', true);?>posts/post/<?php echo $dados['Post']['id'] ?>" target="_blank">
										<i class="fab fa-facebook"></i>
									</a>

									<a data-toggle="tooltip" data-placement="top" title="Twitter" href='https://twitter.com/intent/tweet?url=<?php echo Router::url('/', true);?>posts/post/<?php echo $dados['Post']['id'] ?>&text="<?php echo $dados['Post']['title']; ?>" VEJA ESTE POST AQUI:' target="_blank">
										<i class="fab fa-twitter"></i>
									</a>

									<a data-toggle="tooltip" data-placement="top" title="WhatsApp" href='whatsapp://send?text=ACESSE: <?php echo Router::url('/', true);?>posts/post/<?php echo $dados['Post']['id'] ?> E LEIA SOBRE "<?php echo $dados['Post']['title']; ?>"'
									target="_blank">
										<i class="fab fa-whatsapp"></i>
									</a>

									<!-- <a data-toggle="tooltip" data-placement="top" title="Telegram" href='https://telegram.me/share/url?url=<?php echo Router::url('/', true);?>pages/post/<?php echo $dados['Post']['id'] ?>&text=ACESSE ESTE LINK E LEIA SOBRE "<?php echo $dados['Post']['title']; ?>"'
								target="_blank">
										<i class="fa fa-paper-plane"></i>
									</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 post-sidebar">
				<div class="category-post post">
				<?php if(!empty($categoryPost)){ ?>
					<h2>Categorias</h2>
					<?php if(!empty($categoryPost)){ 	?>
						<ul class="category-list">
							<?php foreach ($categoryPost as $k => $v) {?>
								<a href="/pages/categoria/<?php echo $v['BlogCategoria']['id'] ?>">
									<span data-toggle="tooltip" data-placement="top" title="<?php echo $v['BlogCategoria']['nome']; ?>"><?php echo $v['BlogCategoria']['nome']; ?></a></span>
								</a>
							<?php  } ?>
						</ul>
					<?php }?>
				<?php } ?>
				</div>

				<div class="popular-tags post">
				<?php if(!empty($tagsPost)){ ?>
					<h2>Tags do Post</h2>
					<div class="tags flex-row-blog">
						<?php foreach($tagsPost as $k => $v){  ?>
							<span class="tag" data-toggle="tooltip" data-placement="top" title="#<?php echo $v['BlogTag']['nome']; ?>"> <?php echo $v['BlogTag']['nome'] ?> </span>
						<?php } ?>
					</div>
				<?php } ?>
				</div>

				<div class="popular-post post">
				<?php if(!empty($postsRel)){ ?>
					<h2>Veja Também</h2>
						<?php foreach($postsRel as $k => $v){  ?>
							<a href="/pages/post/<?php echo $v['Post']['id'] ?>" class="post-rel others">
								<?php echo $this->Html->image($v['Post']['img'],['class' => 'img-responsive']); ?>
								<div class="post-rel-title">
									<h3><?php echo $v['Post']['title']; ?></h3>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
