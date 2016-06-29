<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// PRODUCTOS
		if( ! get_page_by_path('home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Home',
				'post_name'   => 'home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		if( ! get_page_by_path('curso') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Curso',
				'post_name'   => 'curso',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('modulo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Módulo',
				'post_name'   => 'modulo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		if( ! get_page_by_path('leccion') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Lección',
				'post_name'   => 'leccion',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

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

	});
