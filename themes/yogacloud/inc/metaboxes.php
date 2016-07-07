<?php

/*------------------------------------*\
	CUSTOM METABOXES
\*------------------------------------*/

add_action('add_meta_boxes', function(){
	global $post;
	switch ( $post->post_name ) {
		case 'PAGENAME':
			//add_metaboxes_PAGENAME();
			break;
		default:
			// POST TYPES
			add_metaboxes_maestros();
			add_metaboxes_cursos();
	}
});



/*------------------------------------*\
	CUSTOM METABOXES FUNCTIONS
\*------------------------------------*/

/**
* Add metaboxes for page type "Maestros"
**/
function add_metaboxes_maestros(){

	add_meta_box( 'url', 'URL web personal', 'metabox_url', 'maestros', 'advanced', 'high' );
	add_meta_box( 'facebook', 'Facebook', 'metabox_facebook', 'maestros', 'advanced', 'high' );
	add_meta_box( 'twitter', 'Twitter', 'metabox_twitter', 'maestros', 'advanced', 'high' );
	add_meta_box( 'instagram', 'Instagram', 'metabox_instagram', 'maestros', 'advanced', 'high' );

}// add_metaboxes_maestros

/**
* Add metaboxes for page type "Products"
**/
function add_metaboxes_cursos(){

	add_meta_box( 'trailer', 'URL trailer', 'metabox_trailer', 'product', 'advanced', 'high' );
	add_meta_box( 'duracion', 'Duración (horas)', 'metabox_duracion', 'product', 'advanced', 'high' );
	add_meta_box( 'frecuencia_numero', 'Frecuencia (número ej. 1)', 'metabox_frecuencia_numero', 'product', 'advanced', 'high' );
	add_meta_box( 'frecuencia_unidad', 'Frecuencia (unidad ej. semana)', 'metabox_frecuencia_unidad', 'product', 'advanced', 'high' );

}// add_metaboxes_products



/*-----------------------------------------*\
	CUSTOM METABOXES CALLBACK FUNCTIONS
\*-----------------------------------------*/

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_url( $post ){

	$url = get_post_meta($post->ID, '_url_meta', true);

	wp_nonce_field(__FILE__, '_url_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_url_meta' value='$url'>";

}// metabox_url


/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_facebook( $post ){

	$facebook = get_post_meta($post->ID, '_facebook_meta', true);

	wp_nonce_field(__FILE__, '_facebook_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_facebook_meta' value='$facebook'>";

}// metabox_facebook

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_twitter( $post ){

	$twitter = get_post_meta($post->ID, '_twitter_meta', true);

	wp_nonce_field(__FILE__, '_twitter_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_twitter_meta' value='$twitter'>";

}// metabox_twitter

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_instagram( $post ){

	$instagram = get_post_meta($post->ID, '_instagram_meta', true);

	wp_nonce_field(__FILE__, '_instagram_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_instagram_meta' value='$instagram'>";

}// metabox_instagram





/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_trailer( $post ){

	$instagram = get_post_meta($post->ID, '_instagram_meta', true);

	wp_nonce_field(__FILE__, '_instagram_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_instagram_meta' value='$instagram'>";

}// metabox_instagram

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_duracion( $post ){

	$duracion = get_post_meta($post->ID, '_duracion_meta', true);

	wp_nonce_field(__FILE__, '_duracion_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_duracion_meta' value='$duracion'>";

}// metabox_duracion

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_frecuencia_numero( $post ){

	$frecuencia_numero = get_post_meta($post->ID, '_frecuencia_numero_meta', true);

	wp_nonce_field(__FILE__, '_frecuencia_numero_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_frecuencia_numero_meta' value='$frecuencia_numero'>";

}// metabox_frecuencia_numero

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_frecuencia_unidad( $post ){

	$frecuencia_unidad = get_post_meta($post->ID, '_frecuencia_unidad_meta', true);

	wp_nonce_field(__FILE__, '_frecuencia_unidad_meta_nonce');

	echo "<input type='text' class='[ widefat ]' name='_frecuencia_unidad_meta' value='$frecuencia_unidad'>";

}// metabox_frecuencia_unidad



/*------------------------------------*\
	SAVE METABOXES DATA
\*------------------------------------*/

	add_action('save_post', function( $post_id ){

		save_metaboxes_maestros( $post_id );

	});

	/**
	* Save the metaboxes for post type "maestros"
	**/
	function save_metaboxes_maestros( $post_id ){

		// URL
		if ( isset($_POST['_url_meta']) and check_admin_referer( __FILE__, '_url_meta_nonce') ){
			update_post_meta($post_id, '_url_meta', $_POST['_url_meta']);
		}

		// Facebook
		if ( isset($_POST['_facebook_meta']) and check_admin_referer( __FILE__, '_facebook_meta_nonce') ){
			update_post_meta($post_id, '_facebook_meta', $_POST['_facebook_meta']);
		}

		// Twitter
		if ( isset($_POST['_twitter_meta']) and check_admin_referer( __FILE__, '_twitter_meta_nonce') ){
			update_post_meta($post_id, '_twitter_meta', $_POST['_twitter_meta']);
		}

		// Instagram
		if ( isset($_POST['_instagram_meta']) and check_admin_referer( __FILE__, '_instagram_meta_nonce') ){
			update_post_meta($post_id, '_instagram_meta', $_POST['_instagram_meta']);
		}

	}// save_metaboxes_maestros