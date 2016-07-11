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
require_once( 'inc/taxonomies.php' );


/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){

	// scripts
	wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'materialize_js', JSPATH.'bin/materialize.min.js', array('plugins'), '1.0', true );
	wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );
	wp_enqueue_script( 'vimeo_player', 'https://player.vimeo.com/api/player.js', array('jquery'), '1.0', true );

	// localize scripts
	wp_localize_script( 'functions', 'siteUrl', SITEURL );
	wp_localize_script( 'functions', 'theme_path', THEMEPATH );
	wp_localize_script( 'functions', 'isHome', (string)is_front_page() );
	wp_localize_script( 'functions', 'isCurso', (string) is_curso( get_the_id() ) );
	wp_localize_script( 'functions', 'isProdcut', (string) ('product' == get_post_type() AND ! is_curso( get_the_id() )  ) );
	wp_localize_script( 'functions', 'isModulo', (string) ('modulos' == get_post_type()) );
	wp_localize_script( 'functions', 'isLeccion', (string) ('lecciones' == get_post_type()) );
	wp_localize_script( 'functions', 'isMyAccount', (string) is_page('my-account') );
	wp_localize_script( 'functions', 'isCart', (string) is_page('cart') );
	wp_localize_script( 'functions', 'isCheckout', (string) is_page('checkout') );

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


/*------------------------------------*\
	#GET/SET FUNCTIONS
\*------------------------------------*/

/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

/*------------------------------------*\
	#WOOCOMMERCE RELATED FUNCTIONS
\*------------------------------------*/

/**
 * Check if current product is of type "Curso"
 * @param int $product_id
 * @return boolean
 */
function is_curso( $product_id ){
	$product = wc_get_product( $product_id );
	if ( empty($product) ) return false;

	$product_type = get_the_terms($product_id, 'product_type')[0]->name;
	return $product_type == 'simple_course';
}

/**
 * Set a custom add to cart URL to redirect to
 * @return string
 */
function custom_add_to_cart_redirect() { 
    return site_url('cart'); 
}
add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );


/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}


function mysite_pending($order_id) {
error_log("$order_id set to PENDING", 0);
}
function mysite_failed($order_id) {
error_log("$order_id set to FAILED", 0);
}
function mysite_hold($order_id) {
error_log("$order_id set to ON HOLD", 0);
}
function mysite_processing($order_id) {
error_log("$order_id set to PROCESSING", 0);
}
function mysite_completed($order_id) {
error_log("$order_id set to COMPLETED", 0);
}
function mysite_refunded($order_id) {
error_log("$order_id set to REFUNDED", 0);
}
function mysite_cancelled($order_id) {
error_log("$order_id set to CANCELLED", 0);
}

add_action( 'woocommerce_order_status_pending', 'mysite_pending');
add_action( 'woocommerce_order_status_failed', 'mysite_failed');
add_action( 'woocommerce_order_status_on-hold', 'mysite_hold');
add_action( 'woocommerce_order_status_processing', 'mysite_processing');
add_action( 'woocommerce_order_status_completed', 'mysite_completed');
add_action( 'woocommerce_order_status_refunded', 'mysite_refunded');
add_action( 'woocommerce_order_status_cancelled', 'mysite_cancelled');
