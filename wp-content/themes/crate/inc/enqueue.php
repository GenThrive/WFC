<?php
/**
 * Handing (de)enqueueing scripts and styles to be loaded into Crate
 *
 * @package Crate
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Remove jquery-migrate dependency
 */
function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			[ 'jquery-migrate' ]
		);
	}
}
add_action( 'wp_default_scripts', __NAMESPACE__ . '\dequeue_jquery_migrate' );


/**
 * Main enqueue handler for front-end of the site
 */
function enqueue() {

	if ( ! is_admin() ) {

		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && ! is_admin() ) {
			wp_deregister_script( 'jquery' );
			
			add_filter( 'cornerstone_enqueue_styles', false );
			wp_enqueue_script( 'amp-script', 'https://cdn.ampproject.org/v0/amp-script-0.1.js', array(), false, false );
			wp_enqueue_script( 'amp-analytics', 'https://cdn.ampproject.org/v0/amp-analytics-0.1.js', array(), false, false );
		} else if ( function_exists( 'is_amp_endpoint' ) && ! is_amp_endpoint() && ! is_admin() ) {
			// Load script for non AMP pages
			if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
				wp_enqueue_script( 'crate', get_template_directory_uri() . '/js/crate.js', array( 'jquery' ), CRATE_VERSION, true );
			} else {
				wp_enqueue_script( 'crate', get_template_directory_uri() . '/js/crate.min.js', array( 'jquery' ), CRATE_VERSION, true );
			}
		}

		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			wp_enqueue_style( 'crate_style', get_template_directory_uri() . '/css/crate.css', array(), CRATE_VERSION );
		} else {
			wp_enqueue_style( 'crate_style', get_template_directory_uri() . '/css/crate.min.css', array(), CRATE_VERSION );
		}

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Source+Sans+Pro:300,400,600,700&display=swap', array(), CRATE_VERSION );

	}

}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue' );


/**
 * Load some styles in Gutenberg editor
 */
function gutenqueue() {
	wp_enqueue_style( 'crate_gutenberg_styles', get_template_directory_uri() . '/css/editor-style.css', array(), CRATE_VERSION );
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\gutenqueue' );


/**
 * Modify AMP Analytics Script
 */
function add_id_to_script( $tag, $handle, $source ) {
	if ( 'amp-script' === $handle ) {
			$tag = '<script src="' . $source . '" async custom-element="amp-script"></script>';
	}

	if ( 'amp-analytics' === $handle ) {
		$tag = '<script src="' . $source . '" async custom-element="amp-analytics"></script>';
	}

	return $tag;
}
add_filter( 'script_loader_tag', __NAMESPACE__ . '\add_id_to_script', 10, 3 );


/**
 * Get rid of emoji stuff
 */
function disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'init', __NAMESPACE__ . '\disable_emoji', 99 );
