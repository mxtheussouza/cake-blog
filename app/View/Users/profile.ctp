<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<div class="author-content" style="margin-top: 4rem;">
			<div class="container">
				<div class="author-info">
					<div class="user-image">
						<?php
						if (empty($dados['User']['photo'])) {
							echo $this->Html->image('upload/avatar/default.svg',['class' => 'img-avatar']);
						} else {
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

				<?php if ($this->Session->read('Auth.User.id') == $dados['User']['id']) { ?>
					<h2 style="font-weight: 700; color: #333333;">Seus Posts</h2>
				<?php } else { ?>
					<h2 style="font-weight: 700; color: #333333;">Posts do Autor</h2>
				<?php } ?>
				<span class="title-border-left"></span>

				<div class="container">
					<section class="content-blog" style="margin-top: 2rem;">
						<?php if (!empty($postAuthor)) { ?>
							<div class="row">
								<?php foreach($postAuthor as $k => $v){  ?>
									<div class="col-md-6 col-lg-6 col-sm-6 padding-card">
										<div class="card" id="">
											<div class="row">
												<div class="col-md-5 wrapthumbnail">
													<a href="/posts/post/<?php echo $v['Post']['id']; ?>">
														<?php if (empty($v['Post']['img'])) { ?>
															<div class="thumbnail" style="background-image:url(/img/favicon.png);"></div>
														<?php } else { ?>
															<div class="thumbnail" style="background-image:url();"></div>
														<?php } ?>
													</a>
												</div>
												<div class=" col-md-7 wrapcontent">
													<div class="card-block">
														<h2 class="card-title">
															<a href="/posts/post/<?php echo $v['Post']['id']; ?>"><?php echo $v['Post']['title']; ?></a>
														</h2>
														<span class="card-text d-block"><?php echo strip_tags(substr($v['Post']['content'],0,120)); ?>...</span>
														<div>
															<div class="wrapfooter">
																<span class="meta-footer-thumb">
																	<a href="/users/profile/<?php echo $v['User']['id']; ?>">
																		<?php if (empty($v['User']['photo'])) { ?>
																			<img alt="Author Photo" src="/img/upload/avatar/default.svg" class="avatar avatar-40 photo jetpack-lazy-image jetpack-lazy-image--handled" height="40" width="40" data-lazy-loaded="1" loading="eager"/>
																		<?php } else { ?>
																			<img alt="Author Photo" src="#" class="avatar avatar-40 photo jetpack-lazy-image jetpack-lazy-image--handled" height="40" width="40" data-lazy-loaded="1" loading="eager"/>
																		<?php } ?>
																	</a>
																</span>
																<span class="author-meta">
																	<span class="post-name">
																		<a href="/users/profile/<?php echo $v['User']['id']; ?>"><?php echo $v['User']['name']; ?></a>
																	</span>
																	<br>
																	<span class="post-date"><?php echo date("d/m/Y", strtotime($v['Post']['created'])); ?></span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
						<?php } else { ?>
							<div class="anyposts">
								<p>NENHUM POST FOI ENCONTRADO.</p>
							</div>
						<?php } ?>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
