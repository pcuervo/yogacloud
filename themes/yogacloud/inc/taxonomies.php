<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


add_action( 'init', 'custom_taxonomies_callback', 0 );

function custom_taxonomies_callback(){

	// MÓDULOS
	if( ! taxonomy_exists('modulos')){

		$labels = array(
			'name'              => 'Módulos',
			'singular_name'     => 'Módulo',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Módulo',
			'update_item'       => 'Actualizar Módulo',
			'add_new_item'      => 'Nueva Módulo',
			'new_item_name'     => 'Nombre Nueva Módulo',
			'menu_name'         => 'Módulos'
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'modulos' ),
		);
		register_taxonomy( 'modulos', 'product', $args );
	}


	// MAESTROS
	if( ! taxonomy_exists('maestros')){

		$labels = array(
			'name'              => 'Maestros',
			'singular_name'     => 'Maestro',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Maestro',
			'update_item'       => 'Actualizar Maestro',
			'add_new_item'      => 'Nueva Maestro',
			'new_item_name'     => 'Nombre Nueva Maestro',
			'menu_name'         => 'Maestros'
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'maestros' ),
		);
		register_taxonomy( 'maestros', 'product', $args );
	}

	// LECCIONES
	if( ! taxonomy_exists('lecciones')){

		$labels = array(
			'name'              => 'Lecciones',
			'singular_name'     => 'Lección',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Lección',
			'update_item'       => 'Actualizar Lección',
			'add_new_item'      => 'Nueva Lección',
			'new_item_name'     => 'Nombre Nueva Lección',
			'menu_name'         => 'Lecciones'
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'lecciones' ),
		);
		register_taxonomy( 'lecciones', 'modulos', $args );
	}


	// TERMS
	// if ( ! term_exists( 'grupo-de-trabajo', 'taxonomy-voces-ciudadanas' ) ){
	// 	wp_insert_term( 'Grupo de trabajo', 'taxonomy-voces-ciudadanas', array('slug' => 'grupo-de-trabajo') );
	// }


	// SUB TERMS CREATION
	// if(term_exists('parent-term', 'category')){
	// 	$term = get_term_by( 'slug', 'parent-term', 'category');
	// 	$term_id = intval($term->term_id);
	// 	if ( ! term_exists( 'child-term', 'category' ) ){
	// 		wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
	// 	}

	// }
}