<?php
/**
 * Add custom post type for Footprints
 *
 * @package Crate
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' ); }

/**
 * Register Custom Post Type "Footprint"
 */
function custom_post_type_footprint() {

	$labels = array(
		'name'                  => _x( 'Footprints', 'Post Type General Name', 'crate' ),
		'singular_name'         => _x( 'Footprint', 'Post Type Singular Name', 'crate' ),
		'menu_name'             => __( 'Footprints', 'crate' ),
		'name_admin_bar'        => __( 'Footprint', 'crate' ),
		'archives'              => __( 'Footprint Archives', 'crate' ),
		'attributes'            => __( 'Footprint Attributes', 'crate' ),
		'parent_item_colon'     => __( 'Parent Footprint:', 'crate' ),
		'all_items'             => __( 'All Footprints', 'crate' ),
		'add_new_item'          => __( 'Add New Footprint', 'crate' ),
		'add_new'               => __( 'Add New', 'crate' ),
		'new_item'              => __( 'New Footprint', 'crate' ),
		'edit_item'             => __( 'Edit Footprint', 'crate' ),
		'update_item'           => __( 'Update Footprint', 'crate' ),
		'view_item'             => __( 'View Footprint', 'crate' ),
		'view_items'            => __( 'View Footprints', 'crate' ),
		'search_items'          => __( 'Search Footprint', 'crate' ),
		'not_found'             => __( 'Not found', 'crate' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'crate' ),
		'featured_image'        => __( 'Featured Image', 'crate' ),
		'set_featured_image'    => __( 'Set featured image', 'crate' ),
		'remove_featured_image' => __( 'Remove featured image', 'crate' ),
		'use_featured_image'    => __( 'Use as featured image', 'crate' ),
		'insert_into_item'      => __( 'Insert into footprint', 'crate' ),
		'uploaded_to_this_item' => __( 'Uploaded to this footprint', 'crate' ),
		'items_list'            => __( 'Footprints list', 'crate' ),
		'items_list_navigation' => __( 'Footprints list navigation', 'crate' ),
		'filter_items_list'     => __( 'Filter footprints list', 'crate' ),
	);
	$args = array(
		'label'                 => __( 'Footprints', 'crate' ),
		'description'           => __( 'Custom post type for Footprint posts', 'crate' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-chart-line',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'rewrite'               => array(
			'slug' => 'footprint',
			'with_front' => false,
		),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		// 'rest_base'             => 'footprints',
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
	register_post_type( 'footprint', $args );

}
add_action( 'init', __NAMESPACE__ . '\custom_post_type_footprint', 0 );
