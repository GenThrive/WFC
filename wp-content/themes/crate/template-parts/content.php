<?php
/**
 * Generic template part for displaying the content of a single post.
 *
 * This entire template can be overridden on a per-post-type basis by creating a template part
 * called `template-parts/content-{post_type}.php`, where {post_type} is the slug of the post type
 * (see the call to `get_template_part()` in single.php).
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package Crate
 */

 $thumbnail_class = '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title visuallyhidden">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_single() && has_post_thumbnail() ) { ?>
		<div class="banner" style="background-image: url( <?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'hero' ) ); ?> )">
			<?php the_post_thumbnail( 'hero', array( 'class' => 'banner-image' ) ); ?>
		</div>

		<?php $thumbnail_class = 'has-thumbnail'; ?>
	<?php } ?>

	<div class="entry-content <?php echo esc_attr( $thumbnail_class ); ?>">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'crate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->