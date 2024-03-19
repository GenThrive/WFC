<?php
	$category_ids = array( 28, 27, 29 ); // Correlate to Articles, News and Interviews, respectively.

	if ( is_category( $category_ids ) || is_page_template( 'page-template-news.php' ) ) { ?>
		<div class="archive-intro">
			<?php echo get_field( 'archive_news_intro', 'option' ); ?>
		</div>
<?php } ?>
<div class="category-nav">
	<?php
		$cat_class = ( is_page_template( 'page-template-news.php' ) ? 'current' : '' );
	?>
	<ul>
			<li class="<?php echo esc_attr( $cat_class ); ?>">
				<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'news-articles' ) ) ); ?>"><?php esc_html_e( 'All', 'crate' ); ?></a>
			</li>
			<?php
			foreach ( $category_ids as $category ) {
				$category_object = get_category( $category );
				$cat_class = ( is_category( $category_object->term_id ) ? 'current' : '' );
				?>
				<li class="<?php echo esc_attr( $cat_class ); ?>">
					<a href="<?php echo esc_url( get_category_link( $category_object->term_id ) ); ?>"><?php echo esc_html( $category_object->name ); ?></a>
				</li>
			<?php } ?>
		</ul>
</div>
