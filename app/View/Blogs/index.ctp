<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<!-- <main class="wrap">
			<h1 style="text-align: center; font-weight: 700; font-size: 4rem; margin: 1rem;">Bem vindo ao CakeBLOG</h1>
		</main> -->

		<div class="container">
			<section class="content-blog">
				<div class="row">
				<?php if (!empty($dados)) {  ?>
					<?php foreach ($dados as $k => $v) { ?>
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
				<?php echo $this->element('pagination') ?>
				<?php } else { ?>
					<h1>Não existem posts.</h1>
				<?php } ?>
			</section>
		</div>
	</div>
</div>
