<?php
/*
 Template Name: Sidebar Page
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="page-header article-header<?php echo $headBlockMeta[0][primary_head] || $headBlockMeta[0][secondary_head] ? ' header-block' : ''; ?>">
									<div class="wrap">
										<div class="head-primary">
											<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
											<?php echo wpautop($headBlockMeta[0][primary_head]) ; ?>
										</div>
										<?php if ($headBlockMeta[0][secondary_head]) { ?>
										<div class="head-secondary">
											<?php echo wpautop($headBlockMeta[0][secondary_head]) ; ?>
										</div>
										<?php } ?>
									</div>
								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
