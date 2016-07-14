<?php
/**
 * @package AdministradorDeCursosYC
 */
/*
Plugin Name: Administrador de Cursos YogaCloud
Description: Creación y gestión de lecciones, módulos y cursos para la plataforma YogaCloud.
Version: 1.1.0
Author: Miguel Cabral
Author URI: http://pcuervo.com
*/

if( ! defined( 'YC_CURSOS_PLUGIN_URL' ) ){
	define( 'YC_CURSOS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if( ! defined( 'YC_CURSOS_PLUGIN_DIR' ) ){
	define( 'YC_CURSOS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'YC_CURSOS_PLUGIN_FILE' ) ) {
	define( 'YC_CURSOS_PLUGIN_FILE', __FILE__ );
}

register_activation_hook( YC_CURSOS_PLUGIN_FILE, array( 'Admin_Cursos_YC', 'install' ) );
register_deactivation_hook( YC_CURSOS_PLUGIN_FILE, array( 'Admin_Cursos_YC', 'uninstall' ) );
add_action( 'plugins_loaded', create_function( '', 'Admin_Cursos_YC::get();' ) );

class Admin_Cursos_YC {

	const YC_CURSOS_VERSION = '1.1.0';

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return Admin_Cursos_YC instance
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
		// Check version for update
		//if( get_option() )
		if( get_option( 'admin_curso_yc_version' ) != Admin_Cursos_YC::YC_CURSOS_VERSION  ){
			$this->create_user_courses_rating_table();
			update_option( 'admin_curso_yc_version', Admin_Cursos_YC::YC_CURSOS_VERSION );
			error_log('new version: ' . Admin_Cursos_YC::YC_CURSOS_VERSION );
		}
		
	}

	/**
	 * Create required database tables.
	 */
	public static function install() {
		$admin_cursos = Admin_Cursos_YC::get();
		$admin_cursos->create_user_lesson_table();
		$admin_cursos->create_courses_modules_table();
		$admin_cursos->create_modules_lessons_table();
		add_option( 'admin_curso_yc_version', Admin_Cursos_YC::YC_CURSOS_VERSION );
	}

	/**
	 * Delete installed database tables.
	 */
	public static function uninstall() {
		global $wpdb;
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}user_lessons" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}courses_modules" );
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}modules_lessons" );
		delete_option( 'admin_curso_yc_version' );
	}

	/**
	 * Load required files for Wordpress Admin Panel and for Frontend.
	 */
	private function includes() {
		require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-yc_curso.php' );
		require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-yc_admin_cursos-settings.php' );
	}

	/**
	 * Initialize class
	 */
	private function init() {
		YC_Admin_Cursos_Settings::get();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
	}

	/**
	 * Create table "user_lessons"
	 */
	private function create_user_lesson_table(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'user_lessons';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				user_id INT NOT NULL,
				lesson_id INT NOT NULL,
				is_completed BOOLEAN DEFAULT false,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_user_lesson_table

	/**
	 * Create table "courses_modules"
	 */
	private function create_courses_modules_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'courses_modules';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				course_id INT NOT NULL,
				module_id INT NOT NULL,
				position INT NOT NULL,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_courses_modules_table

	/**
	 * Create table "modules_lessons"
	 */
	private function create_modules_lessons_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'modules_lessons';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				module_id INT NOT NULL,
				lesson_id INT NOT NULL,
				position INT NOT NULL,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_modules_lessons_table

	/**
	 * Create table "modules_lessons"
	 */
	private function create_user_courses_rating_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'user_courses_rating';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				course_id INT NOT NULL,
				user_id INT NOT NULL,
				rating INT NOT NULL,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_user_courses_rating_table


}// Admin_Cursos_YC

