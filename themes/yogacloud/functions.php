<?php


define( 'JSPATH', get_template_directory_uri() . '/js/' );

define( 'CSSPATH', get_template_directory_uri() . '/css/' );

define( 'THEMEPATH', get_template_directory_uri() . '/' );

define( 'SITEURL', site_url('/') );

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


/******************
 * SCRIPTS CUERVO
 *****************/

require_once( 'inc/pages.php' );

?>