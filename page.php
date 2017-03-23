<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $headBlockMeta = get_post_meta(get_the_ID(), '_barcid_page_header_block',true); ?>
							<pre style="display:none"><?php print_r($headBlockMeta); ?>test</pre>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<?php 
								$headBlockActive = is_array($headBlockMeta) && count($headBlockMeta[0]) > 0;
								if ($headBlockActive) {
									$headBlockPrimaryContent = $headBlockMeta[0][primary_head];
									$headBlockSecondaryContent = $headBlockMeta[0][secondary_head]; 
									// echo count($headBlockMeta);
								} else {
									// echo 'nope';
								} ?>
								<header class="page-header article-header<?php echo $headBlockActive ? ' header-block' : ''; ?>">
									<div class="wrap">
										<div class="head-primary">
											<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
											<?php echo wpautop($headBlockPrimaryContent); ?>
										</div>
										<?php if ($headBlockSecondaryContent) { ?>
										<div class="head-secondary">
											<?php echo wpautop($headBlockSecondaryContent); ?>
										</div>
										<?php } ?>
									</div>
								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<div class="wrap">
										<?php the_content(); ?>
									</div>
								</section> <?php // end article section ?>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
