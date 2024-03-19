<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Crate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
		<?php
			get_template_part( 'template-parts/content', 'none' );
		?>
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
