<?php
/**
 * Custom taxonomy
 *
 */

if (!defined('ABSPATH')) {
	die();
}


function understrap_register_taxonomy() {

	register_taxonomy( 'property_type', [ 'property' ], [
		'label'  => esc_html__( 'Типы недвижимости', 'understrap' ),
		'labels' => [
			'menu_name'                  => esc_html__( 'Типы недвижимости', 'understrap' ),
			'all_items'                  => esc_html__( 'Все типы недвижимости', 'understrap' ),
			'add_new_item'               => esc_html__( 'Добавить новый тип недвижимости', 'understrap' ),
			'new_item'                   => esc_html__( 'Новый тип недвижимости', 'understrap' ),
			'popular_items'              => esc_html__( 'Популярные типы недвижимости', 'understrap' ),
			'add_or_remove_items'        => esc_html__( 'Добавить или удалить типы недвижимости', 'understrap' ),
			'choose_from_most_used'      => esc_html__( 'Выбрать наиболее используемые типы недвижимости', 'understrap' ),
			'not_found'                  => esc_html__( 'Типов недвижимости не найдено', 'understrap' ),
			'name'                       => esc_html__( 'Типы недвижимости', 'understrap' ),
			'singular_name'              => esc_html__( 'Тип недвижимости', 'understrap' ),
		],
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
		'show_tagcloud'        => true,
		'show_in_quick_edit'   => true,
		'show_admin_column'    => true,
		'show_in_rest'         => true,
		'hierarchical'         => true,
		'query_var'            => true,
		'sort'                 => false,
		'rewrite_no_front'     => false,
		'rewrite_hierarchical' => false,
		'rewrite' => true
	]);

	register_taxonomy( 'property_city', [ 'property' ], [
		'label'  => esc_html__( 'Города', 'understrap' ),
		'labels' => [
			'menu_name'                  => esc_html__( 'Города', 'understrap' ),
			'all_items'                  => esc_html__( 'Все города', 'understrap' ),
			'add_new_item'               => esc_html__( 'Добавьте или выберите из списка только один город', 'understrap' ),
			'new_item'                   => esc_html__( 'Новый город', 'understrap' ),
			'not_found'                  => esc_html__( 'Городов не найдено', 'understrap' ),
			'name'                       => esc_html__( 'Города', 'understrap' ),
			'singular_name'              => esc_html__( 'Город', 'understrap' ),
		],
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
		'show_tagcloud'        => true,
		'show_in_quick_edit'   => true,
		'show_admin_column'    => true,
		'show_in_rest'         => true,
		'hierarchical'         => true,
		'query_var'            => true,
		'sort'                 => false,
		'rewrite_no_front'     => false,
		'rewrite_hierarchical' => false,
		'rewrite' => true
	]);
}

add_action( 'init', 'understrap_register_taxonomy' );