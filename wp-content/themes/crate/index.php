<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">

			<?php
			if ( is_category( array( 28, 27, 29 ) ) ) {
				get_template_part( 'template-parts/archive-nav' );
			}
			?>

			<?php
			if ( have_posts() ) :
				?>

				<div class="archive-posts posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/summary', get_post_type() );
						endwhile;
					// End of the loop.
					?>
				</div>

				<div class="pagination-links">
					<?php
					echo paginate_links(
						array(
							'type' => 'list',
							'prev_next' => false,
						)
					);
					?>
				</div>

				<?php

				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
				?>
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
