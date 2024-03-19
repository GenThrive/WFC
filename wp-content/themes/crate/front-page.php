<?php
/**
 * The template for displaying the front page of the site.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Crate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'front' );

		endwhile; // End of the loop.
		?>
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();