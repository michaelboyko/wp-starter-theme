<?php
/**
 * The template for displaying all single posts.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php astra_primary_class(); ?>>

	<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default"  data-aos="fade-up">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="article-header">
				<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<div class="blog-bottom-nav">
			<div class="container">
				<nav id="nav-below" class="navigation" role="navigation">
					<?php
						$prev = get_adjacent_post(true, '', true);
						$next = get_adjacent_post(true, '', false);
					?>
					<div class="nav-next"><?php if ($next) { ?><a href="<?php echo get_permalink($next->ID); ?>" class="btn-blog"><?php _e('Next Post', 'custom_theme'); ?></a><?php } // if ?></div>
					<div class="nav-previous"><?php if ($prev) { ?><a href="<?php echo get_permalink($prev->ID); ?>" class="btn-blog"><?php _e('Previous Post', 'custom_theme'); ?></a><?php } // if ?></div>
				</nav>
			</div>
		</div>
	</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
