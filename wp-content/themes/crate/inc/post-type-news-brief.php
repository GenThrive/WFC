<?php
/**
 * Add custom post type for News briefs
 *
 * @package Crate
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Register Custom Post Type "News brief"
 */
function custom_post_type_news_brief() {

	$labels = array(
		'name'                  => _x( 'News briefs', 'Post Type General Name', 'crate' ),
		'singular_name'         => _x( 'News brief', 'Post Type Singular Name', 'crate' ),
		'menu_name'             => __( 'News briefs', 'crate' ),
		'name_admin_bar'        => __( 'News brief', 'crate' ),
		'archives'              => __( 'News brief Archives', 'crate' ),
		'attributes'            => __( 'News brief Attributes', 'crate' ),
		'parent_item_colon'     => __( 'Parent News brief:', 'crate' ),
		'all_items'             => __( 'All News briefs', 'crate' ),
		'add_new_item'          => __( 'Add New News brief', 'crate' ),
		'add_new'               => __( 'Add New', 'crate' ),
		'new_item'              => __( 'New News brief', 'crate' ),
		'edit_item'             => __( 'Edit News brief', 'crate' ),
		'update_item'           => __( 'Update News brief', 'crate' ),
		'view_item'             => __( 'View News brief', 'crate' ),
		'view_items'            => __( 'View News briefs', 'crate' ),
		'search_items'          => __( 'Search News brief', 'crate' ),
		'not_found'             => __( 'Not found', 'crate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'crate' ),
		'featured_image'        => __( 'Featured Image', 'crate' ),
		'set_featured_image'    => __( 'Set featured image', 'crate' ),
		'remove_featured_image' => __( 'Remove featured image', 'crate' ),
		'use_featured_image'    => __( 'Use as featured image', 'crate' ),
		'insert_into_item'      => __( 'Insert into news brief', 'crate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this news brief', 'crate' ),
		'items_list'            => __( 'News briefs list', 'crate' ),
		'items_list_navigation' => __( 'News briefs list navigation', 'crate' ),
		'filter_items_list'     => __( 'Filter news briefs list', 'crate' ),
	);
	$args = array(
		'label'                 => __( 'News briefs', 'crate' ),
		'description'           => __( 'Custom post type for News brief posts', 'crate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'rewrite'               => array(
			'slug' => 'news/%category%',
			'with_front' => false,
		),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'template'              => array(
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/pullquote',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/image',
				array(
					'align' => 'left',
				),
			),
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/button',
				array(
					'placeholder' => 'Read More',
					'text'        => 'Read More',
					// 'url'         => 'https://water-calculator.demo.cshp.co/#insert-article-link', // Leave for future reference
					'align'       => 'center',
				),
			),
		),
	);
	register_post_type( 'news_brief', $args );

}
add_action( 'init', __NAMESPACE__ . '\custom_post_type_news_brief', 0 );

function news_brief_post_link( $post_link, $id = 0 ){
	$post = get_post( $id );
	if ( is_object( $post ) ){
		$terms = wp_get_object_terms( $post->ID, 'category' );
		if ( $terms ){
			return str_replace( '%category%' , $terms[0]->slug , $post_link );
		}
	}
	return $post_link;
}
add_filter( 'post_type_link', __NAMESPACE__ . '\news_brief_post_link', 1, 3 );
