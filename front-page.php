<?php
/**
 * Silvia Catalán.
 *
 * This file adds the front template to the Silvia Catalán Theme.
 *
 * @package Silvia Catalán
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Add custom body classes
add_filter( 'body_class', 'bs_add_custom_body_classes');
function bs_add_custom_body_classes( $classes ) {
	$classes[] = 'super-full-width-page';
	if (bs_has_user_purchased_specific_product()):
		$classes[] = 'edd-active';
	endif;

	return $classes; 
	
}

// Display Front Page Sections
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bs_display_front_page_sections');
function bs_display_front_page_sections() { ?>

	<section class="hero">
		<div class="wrap">
			<div class="box">
				<h1><?php echo get_theme_mod('hero_title'); ?></h1>
				<p><?php echo get_theme_mod('hero_description'); ?></p>
				<div class="cta">
					<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('hero_primary_cta_link'); ?>'"><?php echo get_theme_mod('hero_primary_cta_text'); ?></button>
				</div>
			</div>
		</div>
	</section>
	<section class="featureds">
		<div class="wrap">
			<div class="row">
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_1'); ?>">
					<h2><?php echo get_theme_mod('featured_title_1'); ?></h2>
					<p><?php echo get_theme_mod('featured_description_1'); ?></p>
					<div class="cta">
						<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('featured_cta_link_1'); ?>'"><?php echo get_theme_mod('featured_cta_text_1'); ?></button>
					</div>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_2'); ?>">
					<h2><?php echo get_theme_mod('featured_title_2'); ?></h2>
					<p><?php echo get_theme_mod('featured_description_2'); ?></p>
					<div class="cta">
						<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('featured_cta_link_2'); ?>'"><?php echo get_theme_mod('featured_cta_text_2'); ?></button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="logos">
		<div class="wrap">
			<h3><?php echo get_theme_mod('logos_content_title'); ?></h3>
			<div class="logos-wrapper"> 
					
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> -1,
				'post_type' 		=> 'logo',
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php echo get_post_meta($post->ID, 'bs_logo_url', true); ?>">
					<article class="logo">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
					</article>
				</a><?php

				endforeach;
				wp_reset_postdata();?>
					
			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('logos_content_cta_link'); ?>'"><?php echo get_theme_mod('logos_content_cta_text'); ?></button>
			</div>
		</div>
	</section> <?php 

}

genesis();
