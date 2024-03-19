<?php
/**
 * Handles theme filters
 *
 * @package Crate
 * @since 4.3.0
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Remove taxonomy name from archive title
 */
add_filter(
	'get_the_archive_title', function ( $title ) {

		if ( is_category() ) {

			$title = single_cat_title( '', false );

		} elseif ( is_tag() ) {

			$title = single_tag_title( '', false );

		} elseif ( is_author() ) {

			$title = '<span class="vcard">' . get_the_author() . '</span>' ;

		}

		return $title;

	}
);

/**
 * Retrieve a page given its slug.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string       $page_slug  Page slug
 * @param string       $output     Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
 *                                 Default OBJECT.
 * @param string|array $post_type  Optional. Post type or array of post types. Default 'page'.
 * @return WP_Post|null WP_Post on success or null on failure
 * @link https://gist.github.com/matheuseduardo/11f258d0895dec5885c8
 */
function get_page_by_slug( $page_slug, $output = OBJECT, $post_type = 'page' ) {
	global $wpdb;
	if ( is_array( $post_type ) ) {
		$post_type = esc_sql( $post_type );
		$post_type_in_string = "'" . implode( "','", $post_type ) . "'";
		$sql = $wpdb->prepare(
			"
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type IN ($post_type_in_string)
		", $page_slug
		);
	} else {
		$sql = $wpdb->prepare(
			"
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type = %s
		", $page_slug, $post_type
		);
	}//end if
	$page = $wpdb->get_var( $sql );
	if ( $page ) {
		return get_post( $page, $output );
	}
	return null;
}

/**
 * Redirects for legacy posts
 */
function redirect_legacy_posts() {
	global $wp;

	// Turns request url path into parts
	$url_parts = explode( '/', $wp->request );

	$legacy_terms = array( 'ahorre-energia-para-ahorrar-agua', 'articles', 'cambiar-los-habitos-de-compra', 'cambie-su-dieta', 'change-buying-habits', 'change-your-diet', 'climate-environment', 'como-ahorrar-agua', 'concepts-definitions', 'cut-indoor-water-use', 'disminuya-el-empleo-de-agua-en-el-exterior', 'disminuya-el-empleo-de-agua-en-el-hogar', 'education', 'footprints', 'interviews', 'news', 'press', 'save-energy', 'save-water', 'uncategorized', 'use-less-water-outdoors', 'water-energy-food-nexus', 'water-in-the-things-you-buy', 'water-in-your-food', 'water-news-events', 'water-to-make-energy', 'water-use', 'water-use-around-the-house', 'water-use-outdoors' );

	/*
	 * Only run this redirect if the url path has two parts (which would be category slug and post slug)
	 * Check if part one is in array of $legacy_terms to avoid unnecessary DB queries
	 */
	if ( isset( $url_parts[0] ) && isset( $url_parts[1] ) && in_array( $url_parts[0], $legacy_terms, true ) ) {

		// Will return null if post does not exist or ID if it does
		$is_post = get_page_by_slug( $url_parts[1], 'ID', 'post' );

		/*
		 Check if the first part of the path is a category term
		 * and if the second is a post slug
		 */
		if ( $is_post ) {
			// redirect to new post url
			wp_redirect( get_permalink( $is_post ), 301 );
			exit;
		}
	}
}
add_action( 'template_redirect', __NAMESPACE__ . '\redirect_legacy_posts' );


/**
 * Add pagination rewrite
 */
function pagination_rewrite() {
	add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
}
add_action( 'init', __NAMESPACE__ . '\pagination_rewrite' );