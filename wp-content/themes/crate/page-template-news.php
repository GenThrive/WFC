<?php
/**
 * Template Name: News Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">

			<?php
				get_template_part( 'template-parts/archive-nav' );
			?>

			<?php
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$args = array(
				'post_type' => array( 'news_brief' ),
				'category__in' => array( 28, 27, 29 ),
				'paged' => $paged,
			);

			$news_query = new WP_Query( $args );

			if ( $news_query->have_posts() ) :
				?>

				<div class="archive-posts posts-grid">
					<?php
					while ( $news_query->have_posts() ) :
						$news_query->the_post();
						get_template_part( 'template-parts/summary', get_post_type() );
						endwhile;
					// End of the loop.
					?>
				</div>

				<div class="pagination-links">
					<?php
						$big = 999999999;
					// need an unlikely integer
						echo paginate_links(
							array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var( 'paged' ) ),
								'total' => $news_query->max_num_pages,
								'type' => 'list',
								'prev_next' => false,
							)
						);
					?>
				</div>

				<?php

					wp_reset_postdata();

				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
				?>
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
