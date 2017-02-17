<?php
/*
 Template Name: Slider Page
*/
?>

<?php get_header(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $sliderMeta = get_post_meta(get_the_ID(), '_barcid_page_slider',true);
			if (count($sliderMeta[0]) > 0) { ?>
			<div class="slider-container">
				<div class="slider SLIDER">
					<?php // print_r($sliderMeta); ?>
					<?php foreach($sliderMeta as $key => $slide) { ?>
						<?php $bgImage = wp_get_attachment_image_src( $slide[background_image_id], 'slide' ); 
						$slideWidth = floatval($slide[width]); 
						$slideWidth = $slideWidth > 100 ? 100 : $slideWidth < 0 ? 0 : $slideWidth; 
						$slideVPos = $slide[ver_pos]; 
						$slideHPos = $slide[hor_pos]; 
						$slideBGColor = $slide[bgcolor]; ?>
						<?php $mobileImage = wp_get_attachment_image_src( $slide[background_image_id], 'slideMobile' ); ?>
						<div class="slide-theme-<?php echo $slide[theme]; ?>" style="background-image:url(<?php echo $bgImage[0]; ?>);">
							<div class="mobile-slide-content">
								<img class="mobile-img" src="<?php echo $mobileImage[0]; ?>" />
								<div class="wrap">
									<?php if ($slide[link_url]) { ?>
									<a href="<?php echo $slide[link_url]; ?>"<?php echo $slide[link_external] ? ' target="_blank"' : ''; ?>>
									<?php } ?>
										<?php if ($slide[heading]) { ?>
										<span class="h2"><?php echo $slide[heading]; ?></span>
										<?php } ?>
										<?php if ($slide[subheading]) { ?>
										<span class="h3"><?php echo $slide[subheading]; ?></span>
										<?php } ?>
										<?php if ($slide[body_text]) { ?>
										<span class="slide-body-text"><?php echo wpautop($slide[body_text]) ; ?></span>
										<?php } ?>
										<?php if ($slide[link_text]) { ?>
										<span class="slide-link"><?php echo $slide[link_text]; ?></span>
										<?php } ?>
									<?php if ($slide[link_url]) { ?>
									</a>
									<?php } ?>
								</div>
							</div>
							<?php /* <img class="bg-img" src="<?php echo $bgImage[0]; ?>" /> */ ?>
							<div class="slide-content">
								<div class="slide-content-block" style="width:<?php echo $slideWidth; ?>%;left:<?php echo $slideHPos; ?>%;top:<?php echo $slideVPos; ?>%;transform:translate(-<?php echo $slideHPos; ?>%,-<?php echo $slideVPos; ?>%);<?php echo $slide[bgcolor] ? 'background-color:'.$slide[bgcolor] : ''; ?>">
									<?php if ($slide[link_url]) { ?>
									<a href="<?php echo $slide[link_url]; ?>"<?php echo $slide[link_external] ? ' target="_blank"' : ''; ?>>
									<?php } ?>
										<?php if ($slide[heading]) { ?>
										<span class="h2"><?php echo $slide[heading]; ?></span>
										<?php } ?>
										<?php if ($slide[subheading]) { ?>
										<span class="h3"><?php echo $slide[subheading]; ?></span>
										<?php } ?>
										<?php if ($slide[body_text]) { ?>
										<span class="slide-body-text"><?php echo wpautop($slide[body_text]) ; ?></span>
										<?php } ?>
										<?php if ($slide[link_text]) { ?>
										<span class="slide-link"><?php echo $slide[link_text]; ?></span>
										<?php } ?>
									<?php if ($slide[link_url]) { ?>
									</a>
									<?php } ?>
									<?php // print_r($slide); ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="DOTS_CONTAINER dots-container wrap"></div>
			</div><?php // end slider-container ?>
			<?php } ?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
							</article>
						</main>
				</div>
			</div><?php // end content ?>
		<?php endwhile; endif; ?>
<?php get_footer(); ?>
