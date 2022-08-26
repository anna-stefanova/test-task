<?php
/**
 * Custom post types
 *
 */

if (!defined('ABSPATH')) {
	die();
}

// Register Custom Post Type
function understrap_register_custom_post_type(): void {

	register_post_type( 'property', array(
		'label' => __( 'Недвижимость', 'properties' ),
		'labels' => array(
			'name' => _x( 'Недвижимость', 'Post Type General Name', 'understrap' ),
			'singular_name' => _x( 'Недвижимость', 'Post Type Singular Name', 'understrap' ),
			'menu_name' => _x( 'Недвижимость', 'Admin Menu text', 'properties' ),
			'all_items' => __( 'Вся недвижимость', 'understrap' ),
			'name_admin_bar' => _x( 'Недвижимость', 'Add New on Toolbar', 'understrap' ),
			'search_items' => __( 'Поиск недвижимости', 'understrap' ),
		),
		'menu_icon' => 'dashicons-admin-home',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields'),
		'taxonomies' => array('city', 'type'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'rewrite' => array( 'slug' => 'properties'),
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	));


	register_post_type( 'city', array(
		'label' => __( 'Город', 'understrap' ),
		'labels' => array(
			'name' => _x( 'Города', 'Post Type General Name', 'understrap' ),
			'singular_name' => _x( 'Город', 'Post Type Singular Name', 'understrap' ),
			'menu_name' => _x( 'Города', 'Admin Menu text', 'understrap' ),
			'name_admin_bar' => _x( 'Город', 'Add New on Toolbar', 'understrap' ),
			'add_new_item' => __( 'Добавить новый город', 'understrap' ),
			'all_items' => __( 'Все города', 'understrap' ),
			'add_new' => __( 'Добавить новый', 'understrap' ),
			'new_item' => __( 'Новый город', 'understrap' ),
		),
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'rewrite' => array( 'slug' => 'cities'),
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	));

}
add_action( 'init', 'understrap_register_custom_post_type', 0 );