<?php
/**
 * Handle site queries
 *
 * @package Crate
 * @since 4.3.0
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Modify site queries
 */
function modify_site_queries( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {

		$all_post_types = array( 'post', 'news_brief', 'footprint', 'education_resource' );

		// For these category archives, only show news_brief posts
		if ( is_category( array( 28, 27, 29 ) ) ) {
			$query->set( 'post_type', 'news_brief' );
		} else if ( is_category( ) ) {
			// All other categories should show everything
			$query->set( 'post_type', $all_post_types );
		}

		if ( is_author() ) {
			$query->set( 'post_type', $all_post_types );
		}
	}
}
add_action( 'pre_get_posts', __NAMESPACE__ . '\modify_site_queries' );
