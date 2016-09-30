<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Settings for YogaCloud Cursos de Regalo.
 *
 * This class will setup the frontend and backend for Cursos de Regalo
 *
 * @since 1.0.0
 */

class YC_Cursos_Regalo_Settings {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return null or YC_Admin_Cursos_Settings instance
	 */
	public static function get() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		
		// Hooks for everyone!
		add_action( 'wp_ajax_nopriv_add_gift_to_cart', array( $this, 'add_gift_to_cart' ) );
		add_action( 'wp_ajax_add_gift_to_cart', array( $this, 'add_gift_to_cart' ) );

		// Admin hooks
		if( is_admin() ){
			return;
		} 
		// Frontend hooks
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		add_action( 'init', array( $this, 'yc_cursos_init_shortcodes' ) );	
	}

	/**
	 * Add all shortcodes required in class
	 */
	public function yc_cursos_init_shortcodes(){
		add_shortcode('gift_course_btn', array( $this, 'gift_button_shortcode') );
	}

	/**
	 * Create shortcode to add course gift product
	 */
	public function gift_button_shortcode( $atts = [] ) {
		return '<button class="[ btn btn-rounded waves-effect waves-light ][ js-add-gift-course ]" data-course-id="' . $atts['course_id'] . '">' . __( 'Regalar curso', 'yc-curso-regalo' ) . '</button>';
    }

    /**
	 * Add javascript and style files
	 */
	public function enqueue_and_localize_scripts(){
		if ( is_curso( get_the_id() ) ) {
			wp_enqueue_script( 'add_gift_course', YC_REGALOS_PLUGIN_URL . 'assets/js/add-gift-course.js', array(), false, false );
			wp_localize_script( 'add_gift_course', 'ajax_url', admin_url('admin-ajax.php') );
		}
	}


	/*=============================================
	=            #AJAX FUNCTIONS 		          =
	=============================================*/	

	/**
	* Add a course as gift to cart. 
	*/
	public function add_gift_to_cart(){
		$gift = new YC_Gift_Course( $_POST['course_id'] );

		echo WC()->cart->get_checkout_url();
		wp_die();
	}// add_gift_to_cart
 

}// YC_Admin_Cursos_Settings




