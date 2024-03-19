<?php
/**
 * Template part for displaying the content of the front page.
 *
 * @package Crate
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title visuallyhidden">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'crate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->