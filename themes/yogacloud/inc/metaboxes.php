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
	}
});



/*------------------------------------*\
	CUSTOM METABOXES FUNCTIONS
\*------------------------------------*/



/*-----------------------------------------*\
	CUSTOM METABOXES CALLBACK FUNCTIONS
\*-----------------------------------------*/









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

		//save_metaboxes_maestros( $post_id );

	});
