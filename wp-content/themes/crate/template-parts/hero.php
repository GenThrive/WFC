<?php
/**
 * Template part for displaying a hero title area.
 *
 * @package Crate
 */

$title = ( is_archive() ? get_the_archive_title() : get_the_title() );
if ( is_home() ) {
	$title = __( 'Blog', 'crate' );
} elseif ( is_404() ) {
	$title = __( 'OOPS', 'crate' ) . '!';
} elseif ( is_search() ) {
	$title = __( 'Search results for: ', 'crate' ) . get_search_query();
} elseif ( is_author() ) {
	$title = __( 'Posts by: ', 'crate' ) . get_author_name();
}

$translation_available = get_post_meta( get_the_id(), 'translation_available', true );

?>

<?php
if ( '1' === $translation_available ) {
	$button_text = ( 'spanish' === get_post_meta( get_the_id(), 'translation_button_text', true ) ? __( 'En Español', 'crate' ) : __( 'In English', 'crate' ) );
	$translation_post = get_the_permalink( get_post_meta( get_the_id(), 'translation_post', true ) );
	?>
		<div class="translation-wrap">
			<a class="translation-button button" href="<?php echo esc_url( $translation_post ); ?>"><?php echo esc_html( $button_text ); ?></a>
		</div>
	<?php
}
?>

<div class="hero">
	<div class="hero-wave" aria-hidden="true"></div>

	<h1 class="title"><span><?php echo esc_html( $title ); ?></span></h1>

	<?php
		/**
		 * Display post tags and date
		 */
	if ( is_single() ) {
		?>
			<div class="post-meta">
			<?php if ( ! empty( get_the_category() ) ) { ?>
					<span class="post-categories">
						<?php esc_html_e( 'In', 'crate' ); ?>
						<?php
							echo get_the_category_list( ', ' );
						?>

						<?php
						if ( 'news_brief' === get_post_type() ) {
							next_post_link( '<div class="post-nav prev-post">%link</div>', __( 'Previous', 'crate' ), true, '', 'category' );
							previous_post_link( '<div class="post-nav next-post">%link</div>', __( 'Next', 'crate' ), true, '', 'category' );
						}
						?>
					</span>
				<?php } ?><br>
				<span class="post-date">
					Published: <?php echo esc_html( get_the_date( 'n/j/Y' ) ); ?>,
					Last updated: <?php echo esc_html( get_the_modified_date( 'n/j/Y' ) ); ?>
				</span>
			</div>
		<?php
	}//end if
	?>
</div>
