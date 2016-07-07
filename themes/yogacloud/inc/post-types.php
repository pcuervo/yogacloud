<?php

// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// TESTIMONIALES
		$labels = array(
			'name'          => 'Testimoniales',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nuevo Testimonial',
			'add_new_item'  => 'Nuevo Testimonial',
			'edit_item'     => 'Editar Testimonial',
			'new_item'      => 'Nuevo Testimonial',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Testimonial',
			'search_items'  => 'Buscar Testimonial',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Testimoniales'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'testimoniales' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'testimoniales', $args );


		// Marcas
		$labels = array(
			'name'          => 'Marcas',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nueva Marca',
			'add_new_item'  => 'Nueva Marca',
			'edit_item'     => 'Editar Marca',
			'new_item'      => 'Nueva Marca',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Maestro',
			'search_items'  => 'Buscar Maestro',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Marcas'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'marcas' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'marcas', $args );

		// Badges
		$labels = array(
			'name'          => 'Badges',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nuevo Badge',
			'add_new_item'  => 'Nuevo Badge',
			'edit_item'     => 'Editar Badge',
			'new_item'      => 'Nuevo Badge',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Maestro',
			'search_items'  => 'Buscar Maestro',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Badges'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'badges' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'badges', $args );

	});