<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package Crate
 * @since 4.3.0
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function related_posts_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_template_directory() . '/blocks';

	$index_js = 'wc-related-posts/index.js';
	wp_register_script(
		'wc-related-posts-block-editor',
		get_template_directory_uri() . "/blocks/$index_js",
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		filemtime( "$dir/$index_js" )
	);

	$editor_css = 'wc-related-posts/editor.css';
	wp_register_style(
		'wc-related-posts-block-editor',
		get_template_directory_uri() . "/blocks/$editor_css",
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'wc-related-posts/style.css';
	wp_register_style(
		'wc-related-posts-block',
		get_template_directory_uri() . "/blocks/$style_css",
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'crate/wc-related-posts', array(
		'editor_script'   => 'wc-related-posts-block-editor',
		'editor_style'    => 'wc-related-posts-block-editor',
		'style'           => 'wc-related-posts-block',
		'render_callback' => __NAMESPACE__ . '\related_posts_shortcode_handler',
	) );
}
add_action( 'init', __NAMESPACE__ . '\related_posts_block_init' );
