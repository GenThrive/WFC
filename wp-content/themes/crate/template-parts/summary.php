<?php
/**
 * Generic template part for displaying posts in a loop, typically in an archive of some kind.
 *
 * This entire template can be overridden on a per-post-type basis by creating a template part
 * called `template-parts/summary-{post_type}.php`, where {post_type} is the slug of the post type
 * (see the call to `get_template_part()` in index.php).
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package Crate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'in-loop post' ); ?>>

	<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h2>
	<div class="meta">
		<span class="date">
			<?php echo esc_html( get_the_date() ); ?>
		</span>
	</div>
	<div class="excerpt"><?php the_excerpt(); ?></div>

</article><!-- #post-## -->