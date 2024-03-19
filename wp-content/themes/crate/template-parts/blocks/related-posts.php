<?php
/**
 * Markup for related posts block
 */

$related_categories = get_post_meta( get_the_id(), 'related_posts_categories' , true );
$related_tags = get_post_meta( get_the_id(), 'related_posts_tags' , true );
$related_posts = get_post_meta( get_the_id(), 'related_posts_selection' , true );
$related_posts_method = get_post_meta( get_the_id(), 'related_post_method' , true );

$args = array(
	'post_type'      => array( 'post', 'news_brief', 'footprint', 'education_resource' ),
	'posts_per_page' => 3,
);

$read_more_url = get_permalink( get_option( 'page_for_posts' ) );

switch ( $related_posts_method ) {
	case 'category':
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $related_categories,
			),
		);

		$read_more_url = get_category_link( $related_categories[0] );

		break;
	case 'tag':
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'id',
				'terms'    => $related_tags,
			),
		);

		$read_more_url = get_tag_link( $related_tags[0] );

		break;
	case 'manual':
		$args['post__in'] = $related_posts;
		$args['orderby'] = 'post__in';
		break;
}//end switch
?>

<?php if ( ! empty( $related_categories ) || ! empty( $related_tags ) || ! empty( $related_posts ) ) { ?>
	<?php


	$related_query = new WP_Query( $args );
	?>

	<?php if ( $related_query->have_posts() ) : ?>
	<div class="wp-block-related-posts">

		<h3 class="heading">
		<?php
		esc_html_e(
			'Related Content
', 'crate'
		);
		?>
							</h3>

		<div class="posts-wrap posts-grid">

				<?php
				while ( $related_query->have_posts() ) :
					$related_query->the_post();
					?>
				<div class="post">
					<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h2>
					<div class="meta">
						<span class="date">
							<?php echo esc_html( get_the_date() ); ?>
						</span>
					</div>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				</div>
			<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

		</div>

			<?php if ( 1 !== (int) get_post_meta( get_the_id(), 'disable_read_more', true ) ) { ?>
			<div class="read-more-wrap">
				<a class="button" aria-label="<?php esc_html_e( 'Read More Related News & Articles', 'crate' ); ?>" title="<?php esc_attr_e( 'Read More', 'crate' ); ?>" href="<?php echo esc_url( $read_more_url ); ?>">
					<?php esc_html_e( 'Read More', 'crate' ); ?>
				</a>
			</div>
		<?php } ?>

	</div>
	<?php endif; ?>



<?php }//end if
?>
