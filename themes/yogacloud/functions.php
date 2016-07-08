<?php

/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_template_directory_uri() . '/js/' );
define( 'CSSPATH', get_template_directory_uri() . '/css/' );
define( 'THEMEPATH', get_template_directory_uri() . '/' );
define( 'SITEURL', site_url('/') );




/*------------------------------------*\
	#SNIPPETS
\*------------------------------------*/

require_once( 'inc/pages.php' );
require_once( 'inc/post-types.php' );
require_once( 'inc/metaboxes.php' );

// MOVER A PLUGIN...
require("inc/vimeo-php/autoload.php");
$client_id = '63047a064a58c6025c48a65d4a2dc5f9925c8f0b';
$client_secret = 'fwzqOVXD31YrcgoQxHa+BCkLSg/WBycBfrSKny13Ibb6oObVmuBEf8azGFMulDEwGJOnCNtC9rNL0st8hdCK8yuV1QCRt1R0OMEDmTRBiXAZPdG+AvbTKpAG/kGMPYep';
$lib = new \Vimeo\Vimeo($client_id, $client_secret);
$access_token = '44c1e916b341de354e5a3e25a3181dbb';
$lib->setToken( $access_token );
$tk = $lib->getToken();
$response = $lib->request('/me/videos/171812144', array(), 'GET');


/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){

	// scripts
	wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );
	wp_enqueue_script( 'materialize_js', JSPATH.'bin/materialize.min.js', array('plugins'), '1.0', true );

	// localize scripts
	wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
	wp_localize_script( 'functions', 'site_url', site_url() );
	wp_localize_script( 'functions', 'theme_url', THEMEPATH );

	// styles
	wp_enqueue_style( 'styles', get_stylesheet_uri() );

});


if ( function_exists('add_image_size') ){
	// add_image_size( 'size_name', 200, 200, true );

	// cambiar el tamaño del thumbnail
	update_option( 'thumbnail_size_h', 300 );
	update_option( 'thumbnail_size_w', 300 );
	update_option( 'thumbnail_crop', true );

	// cambiar el tamaño del medium
	update_option( 'medium_size_h', 600 );
	update_option( 'medium_size_w', 600 );
	update_option( 'medium_crop', true );

	// cambiar el tamaño del large
	update_option( 'large_size_h', 1280 );
	update_option( 'large_size_w', 680 );
	update_option( 'large_crop', true );
}



/**
 * Print the <title> tag based on what is being viewed.
 * @return string
 */
function print_title(){
	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );

	// Add a page number if necessary
	if ( $paged >= 2 || $page >= 2 ){
		echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
	}
}