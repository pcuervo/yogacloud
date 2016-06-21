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

	});
