<?php

/**
 * Admin panel settings for Cursos YogaCloud.
 *
 * This class will create menu items in admin panel, as well as initial setup
 * of post types and all required elements...
 *
 * @since 1.0.0
 */


class YC_Cursos_Product_Setup {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return null or YC_Cursos_Product_Setup instance
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
		$this->includes();
		$this->hooks();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		add_action( 'init', array( $this, 'register_simple_course_product_type' ) );
	}

	/**
	 * Load required files for Wordpress Admin Panel and for Frontend.
	 */
	private function includes() {
		require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-wc_product_simple_course.php' );
	}

	/**
	 * Register the custom product type after init
	 */
	public function register_simple_course_product_type() {

		

	}
	


}// YC_Cursos_Product_Setup