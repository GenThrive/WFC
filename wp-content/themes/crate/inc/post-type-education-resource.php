<?php
/**
 * Add custom post type for Education Resources
 *
 * @package Crate
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Register Custom Post Type "Education Resource"
 */
function custom_post_type_education_resource() {

	$labels = array(
		'name'                  => _x( 'Education Resources', 'Post Type General Name', 'crate' ),
		'singular_name'         => _x( 'Education Resource', 'Post Type Singular Name', 'crate' ),
		'menu_name'             => __( 'Education Resources', 'crate' ),
		'name_admin_bar'        => __( 'Education Resource', 'crate' ),
		'archives'              => __( 'Education Resource Archives', 'crate' ),
		'attributes'            => __( 'Education Resource Attributes', 'crate' ),
		'parent_item_colon'     => __( 'Parent Education Resource:', 'crate' ),
		'all_items'             => __( 'All Education Resources', 'crate' ),
		'add_new_item'          => __( 'Add New Education Resource', 'crate' ),
		'add_new'               => __( 'Add New', 'crate' ),
		'new_item'              => __( 'New Education Resource', 'crate' ),
		'edit_item'             => __( 'Edit Education Resource', 'crate' ),
		'update_item'           => __( 'Update Education Resource', 'crate' ),
		'view_item'             => __( 'View Education Resource', 'crate' ),
		'view_items'            => __( 'View Education Resources', 'crate' ),
		'search_items'          => __( 'Search Education Resource', 'crate' ),
		'not_found'             => __( 'Not found', 'crate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'crate' ),
		'featured_image'        => __( 'Featured Image', 'crate' ),
		'set_featured_image'    => __( 'Set featured image', 'crate' ),
		'remove_featured_image' => __( 'Remove featured image', 'crate' ),
		'use_featured_image'    => __( 'Use as featured image', 'crate' ),
		'insert_into_item'      => __( 'Insert into Education Resource', 'crate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Education Resource', 'crate' ),
		'items_list'            => __( 'Education Resources list', 'crate' ),
		'items_list_navigation' => __( 'Education Resources list navigation', 'crate' ),
		'filter_items_list'     => __( 'Filter Education Resources list', 'crate' ),
	);
	$args = array(
		'label'                 => __( 'Education Resources', 'crate' ),
		'description'           => __( 'Custom post type for Education Resource posts', 'crate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array(
			'slug' => 'resource',
			'with_front' => false,
		),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		// 'rest_base'             => 'Education Resources',
		// 'rest_controller_class' => 'WP_REST_Terms_Controller',
		'template'              => array(
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Intro paragraph...',
					'className'       => 'intro',
				),
			),
			array(
				'core/heading',
				array(
					'placeholder' => 'Section Heading',
					'level'       => 2,
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
					'align' => 'right',
				),
			),
			array(
				'core/paragraph',
				array(
					'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...',
				),
			),
			array(
				'core/heading',
				array(
					'placeholder' => 'Section Heading',
					'level'       => 3,
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
				'core/heading',
				array(
					'placeholder' => 'Section Heading',
					'level'       => 3,
				),
			),
			array(
				'core/table',
				array(),
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
		),
	);
	register_post_type( 'education_resource', $args );

}
add_action( 'init', __NAMESPACE__ . '\custom_post_type_education_resource', 0 );
