<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// TIENDA
		if( ! get_page_by_path('tienda') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Tienda',
				'post_name'   => 'tienda',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// PRODUCTOS
		if( ! get_page_by_path('productos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Productos',
				'post_name'   => 'productos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// RESULTADOS
		if( ! get_page_by_path('resultados') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Resultados',
				'post_name'   => 'resultados',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// THE YOGA PROJECT
		if( ! get_page_by_path('yoga-project') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Yoga Project',
				'post_name'   => 'yoga-project',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Aviso legal
		if( ! get_page_by_path('aviso-legal') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Aviso legal',
				'post_name'   => 'aviso-legal',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Política de protección de datos
		if( ! get_page_by_path('politica-de-proteccion-de-datos') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Política de protección de datos',
				'post_name'   => 'politica-de-proteccion-de-datos',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Política de cookies
		if( ! get_page_by_path('politica-de-cookies') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Política de cookies',
				'post_name'   => 'politica-de-cookies',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});
