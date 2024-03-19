<?php
/**
 * Handles defining ACF Block types and other Gberg-related stuff
 *
 * @package Crate
 * @since 4.3.0
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }


/**
 * Registers ACF Block types. See https://www.advancedcustomfields.com/resources/acf_register_block_type/ for documentation.
 *
 * Note that ACF "Accordion" types are good in combination with 'preview' mode, except that ACF's color picker doens't use Gutenberg's, though you can
 * sync the palettes with this technique: https://elod.in/adding-wordpress-color-palettes-into-the-acf-color-picker/
 */
function register_acf_block_types() {

	// register a testimonial block.
	acf_register_block_type(
		array(
			'name'              => 'acf-demo',
			'title'             => __( 'ACF Demo' ),
			'description'       => __( 'A custom testimonial block.' ),
			// Could instead pass a `render_callback` value below
			'render_template'   => 'template-parts/blocks/acf-demo.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'demo', 'sample' ),
			'post_types'        => array( 'post', 'page' ),
			// Mode options are 'auto', 'preview' [default], 'edit'
			'mode'              => 'preview',
			// Align options are “left”, “center”, “right”, “wide” and “full”
			'align'             => 'right',
			'enqueue_style'     => '',
			'enqueue_script'    => '',
			'enqueue_assets'    => '',
			// See https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#supports-optional as well as ACF doc referenced above
			// 'supports'          => array(),
		)
	);
}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	// add_action( 'acf/init', __NAMESPACE__ . '\register_acf_block_types' );
}

/**
 * Register Water Calculator Category for blocks
 */
function block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'wc-blocks',
				'title' => __( 'Water Calculator Blocks', 'crate' ),
			),
		)
	);
}
add_filter( 'block_categories', __NAMESPACE__ . '\block_category', 10, 2);

/**
 * Handler for [wc_related_posts] shortcode
 *
 * @param $atts
 *
 * @return string
 */
function related_posts_shortcode_handler( $atts ){
	return related_posts();
}
/**
 * Output the post title wrapped in a heading
 *
 * @param int $post_id The post ID
 * @param string $heading Allows : h2,h3,h4 only
 *
 * @return string
 */
function related_posts() {
	ob_start();
		get_template_part( 'template-parts/blocks/related-posts' );
	$related_posts = ob_get_contents();
	ob_end_clean();
	return $related_posts;
}
/**
 * Register Shortcode
 */
add_shortcode('wc-related-posts', __NAMESPACE__ . '\related_posts_shortcode_handler');

/**
 * Display custom image size in image size select
 */
add_action( 'admin_init', function() {
	$custom_sizes['post-grid'] = 'Post Grid';
	add_filter(
		'image_size_names_choose',
		function( $sizes ) use ( $custom_sizes ) {
			return array_merge( $sizes, $custom_sizes );
		}
	);
});
