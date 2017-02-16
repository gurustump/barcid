<?php get_header(); ?>

			<div id="content">
				<?php if( is_home() && get_option( 'page_for_posts' ) ) { ?>
				<?php $headBlockMeta = get_post_meta(get_option('page_for_posts'), '_barcid_page_header_block',true); ?>
				<header class="page-header article-header<?php echo $headBlockMeta[0][primary_head] || $headBlockMeta[0][secondary_head] ? ' header-block' : ''; ?>">
					<div class="wrap">
						<div class="head-primary">
							<h1 class="page-title" itemprop="headline"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
							<?php echo wpautop($headBlockMeta[0][primary_head]) ; ?>
						</div>
						<?php if ($headBlockMeta[0][secondary_head]) { ?>
						<div class="head-secondary">
							<?php echo wpautop($headBlockMeta[0][secondary_head]) ; ?>
						</div>
						<?php } ?>
					</div>
				</header> <?php // end article header ?>
				<?php } ?>

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $linkMeta = get_post_meta(get_the_ID(), '_barcid_post_link_url',true); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h2 class="h2 entry-title"><a <?php echo get_post_format() == 'link' ? 'target="_blank" ' : ''; ?>href="<?php echo get_post_format() == 'link' ? $linkMeta : get_the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<p class="byline entry-meta vcard">
										<time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time(get_option('date_format')); ?></time>
										
												<?php /* printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
                       								// the time the post was published
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								// the author of the post 
                       								'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); */ ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php has_excerpt() ? the_excerpt() : ''; ?>
								</section>
<?php /*
								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer> */ ?>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
