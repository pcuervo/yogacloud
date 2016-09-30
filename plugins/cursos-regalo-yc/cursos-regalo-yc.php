<?php
/**
 * @package YCCursosRegalo
/*
Plugin Name: Cursos de Regalo YogaCloud
Description: Regala un curso de la plataforma YogaCloud Cursos a un amigo.
Version: 1.0.0
Author: Miguel Cabral
Author URI: http://pcuervo.com
*/

if( ! defined( 'YC_REGALOS_PLUGIN_URL' ) ){
	define( 'YC_REGALOS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if( ! defined( 'YC_REGALOS_PLUGIN_DIR' ) ){
	define( 'YC_REGALOS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'YC_REGALOS_PLUGIN_FILE' ) ) {
	define( 'YC_REGALOS_PLUGIN_FILE', __FILE__ );
}

register_activation_hook( YC_REGALOS_PLUGIN_FILE, array( 'YC_Cursos_Regalo', 'install' ) );
register_deactivation_hook( YC_REGALOS_PLUGIN_FILE, array( 'YC_Cursos_Regalo', 'uninstall' ) );
add_action( 'plugins_loaded', create_function( '', 'YC_Cursos_Regalo::get();' ) );

if ( ! class_exists( 'YC_Cursos_Regalo' ) ) {

	class YC_Cursos_Regalo {

		const YC_REGALOS_VERSION = '1.0.2';

		private static $instance = null;

		/**
		 * Get singleton instance of class
		 * @return YC_Cursos_Regalo instance
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
			// Load files
			$this->includes();
			// Initialize plugin
			$this->hooks();
			$this->init();
		}

		/**
		 * Add options and create tables for plugin
		 */
		public static function install() {
			$admin_cursos = YC_Cursos_Regalo::get();
			$admin_cursos->create_pending_gifts_table();
			add_option( 'yc_cursos_regalo_version', YC_Cursos_Regalo::YC_REGALOS_VERSION );
		}

		/**
		 * Delete installed database tables.
		 */
		public static function uninstall() {
			global $wpdb;
			$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}pending_gifts" );
			delete_option( 'yc_cursos_regalo_version' );
		}

		/**
		 * Load required files for Wordpress Admin Panel and for Frontend.
		 */
		private function includes() {
			require_once( YC_REGALOS_PLUGIN_DIR . 'includes/class-yc-cursos-regalo-settings.php' );
			require_once( YC_REGALOS_PLUGIN_DIR . 'includes/class-yc-gift.php' );
		}

		/**
		 * Initialize class
		 */
		private function init() {
			YC_Cursos_Regalo_Settings::get();
		}

		/**
		 * Hooks
		 */
		private function hooks() {
			add_action( 'init', array( $this, 'register_simple_gift_product_type' ) );
		}

		/**
		 * Create table "pending_gifts"
		 */
		private function create_pending_gifts_table(){
			global $wpdb;
			$table_name = $wpdb->prefix . 'pending_gifts';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
				$charset_collate = $wpdb->get_charset_collate();
				$sql = "CREATE TABLE $table_name (
					id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
					sender_id INT NOT NULL,
					course_id INT NOT NULL,
					receiver_email VARCHAR(80) NOT NULL,
					UNIQUE KEY id (id)
				) $charset_collate;";

				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql );
			}
		}// create_pending_gifts_table

		/**
		* Register the custom product type after init
		*/
		public function register_simple_gift_product_type() {
			require_once( YC_REGALOS_PLUGIN_DIR . 'includes/class-wc-product-simple-gift.php' );
		}


	}// YC_Cursos_Regalo
}
