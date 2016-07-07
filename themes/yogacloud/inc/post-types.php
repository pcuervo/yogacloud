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

		// MAESTROS
		$labels = array(
			'name'          => 'Maestros',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nuevo Maestro',
			'add_new_item'  => 'Nuevo Maestro',
			'edit_item'     => 'Editar Maestro',
			'new_item'      => 'Nuevo Maestro',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Maestro',
			'search_items'  => 'Buscar Maestro',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Maestros'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'maestros' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'maestros', $args );

	});

	
