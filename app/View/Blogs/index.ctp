<div class="global-content">
	<div class="global-section">
		<?php echo $this->element('nav') ?>

		<main class="wrap">
	
		</main>

		<div class="container">
			<section class="content-blog">
				<div class="row">
				<?php if(!empty($dados)){  ?>
					<?php foreach ($dados as $k => $v) { ?>
						<div class="col-md-6 col-lg-6 col-sm-6 padding-card">
							<div class="card" id="">
								<div class="row">
									<div class="col-md-5 wrapthumbnail">
										<a href="/posts/post/<?php echo $v['Post']['id']; ?>">
											<div class="thumbnail" style="background-image:url(./img/post-img/linux.png);">
											</div>
										</a>
									</div>
									<div class=" col-md-7">
										<div class="card-block">
											<h2 class="card-title">
												<a href="/posts/post/<?php echo $v['Post']['id']; ?>"><?php echo $v['Post']['title']; ?></a>
											</h2>
											<span class="card-text d-block"><?php echo strip_tags(substr($v['Post']['content'],0,120)); ?>...</span>
											<div>
												<div class="wrapfooter">
													<span class="meta-footer-thumb">
														<a href="#">
															<img alt="Author Photo" src="#" class="avatar avatar-40 photo jetpack-lazy-image jetpack-lazy-image--handled" height="40" width="40" data-lazy-loaded="1" loading="eager"/>
														</a>
													</span>
													<span class="author-meta">
														<span class="post-name">
															<a href="#">Matheus Araújo</a>
														</span>
														<br>
														<span class="post-date"><?php echo substr($v['Post']['created'],0,10); ?></span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				<?php } else { ?>

				<?php } ?>
				</div>
			</section>
		</div>

		<?php echo $this->element('pagination') ?>
	</div>
</div>
