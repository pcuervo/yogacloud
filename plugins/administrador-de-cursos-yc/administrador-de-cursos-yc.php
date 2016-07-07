<?php
/**
 * @package AdministradorDeCursosYC
 */
/*
Plugin Name: Administrador de Cursos YogaCloud
Description: Creación y gestión de lecciones, módulos y cursos para la plataforma YogaCloud. 
Version: 1.0.0
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

	const YC_CURSOS_VERSION = '1.0.0';

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
		$this->init();
		$this->hooks();

	}

	/**
	 * Create required database tables.
	 */
	public static function install() {
		// $sondeo_cdmx = Admin_Cursos_YC::get();
		// $sondeo_cdmx->create_questions_table();
		// $sondeo_cdmx->create_user_answers_table();
		// $sondeo_cdmx->create_delegaciones_table();
		// $sondeo_cdmx->create_colonias_table();
		// $sondeo_cdmx->create_municipios_table();
		// $sondeo_cdmx->create_estados_table();
		// $sondeo_cdmx->create_paises_table();
		// $sondeo_cdmx->fill_delegaciones_colonias();
		// $sondeo_cdmx->fill_municipios();
		// $sondeo_cdmx->fill_estados();
		// $sondeo_cdmx->fill_paises();
		// $sondeo_cdmx->fill_preguntas();
		add_option( 'sondeo_cdmx_db_version', Admin_Cursos_YC::YC_CURSOS_VERSION );
	}

	/**
	 * Delete installed database tables.
	 */
	public static function uninstall() {
		// global $wpdb;
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_user_answers" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_questions" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_colonias" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_delegaciones" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_municipios" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_estados" );
		// $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}sondeo_cdmx_paises" );
		delete_option( 'sondeo_cdmx_db_version' );
	}

	/**
	 * Create table "Questions"
	 */
	private function create_questions_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_questions';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				text TEXT NOT NULL,
				question_number INT NOT NULL,
				type VARCHAR(10)  NOT NULL,
				is_dynamic INT NOT NULL,
				is_required INT NOT NULL,
				max_limit INT,
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_questions_table

	private function create_user_answers_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_user_answers';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				question_id MEDIUMINT(9) NOT NULL,
				answer TEXT,
				reference_code varchar(20),
				created_at DATETIME,
				UNIQUE KEY id (id),
				FOREIGN KEY (question_id)
					REFERENCES " . $wpdb->prefix . "sondeo_cdmx_questions(id)
					ON DELETE CASCADE
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_user_answers_table

	private function create_delegaciones_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_delegaciones';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				delegacion VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_delegaciones_table

	private function create_colonias_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_colonias';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				delegacion_id MEDIUMINT(9) NOT NULL,
				colonia VARCHAR(120),
				UNIQUE KEY id (id),
				FOREIGN KEY (delegacion_id)
					REFERENCES " . $wpdb->prefix . "sondeo_cdmx_delegaciones(id)
					ON DELETE CASCADE
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_colonias_table

	private function create_municipios_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_municipios';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				municipio VARCHAR(120),
				estado VARCHAR(50),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_municipios_table

	private function create_estados_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_estados';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				estado VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_estados_table

	private function create_paises_table(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'sondeo_cdmx_paises';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
				id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
				pais VARCHAR(120),
				UNIQUE KEY id (id)
			) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}// create_paises_table

	private function fill_delegaciones_colonias(){
		$filename = 'delegaciones-y-colonias.csv';
		if ( ( $gestor = fopen( YC_CURSOS_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_delegacion = '';
		    while ( ( $datos = fgetcsv( $gestor, 1700, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	if( $current_delegacion !=  $datos[0] ){
	        		$current_delegacion = $datos[0];
	        		$delegacion_id = Admin_Cursos_YC::get()->insert_delegacion( $current_delegacion );
	        	}
		        Admin_Cursos_YC::get()->insert_colonia( $delegacion_id, $datos[1] );
		    }
		    fclose( $gestor );
		}
	}

	private function insert_delegacion( $delegacion ){
		global $wpdb;

		$delegacion_data = array(
			'delegacion'	=> $delegacion
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_delegaciones',
			$delegacion_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function insert_colonia( $delegacion_id, $colonia ){
		global $wpdb;

		$colonia_data = array(
			'delegacion_id'	=> $delegacion_id,
			'colonia'		=> $colonia
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_colonias',
			$colonia_data,
			array( '%d', '%s' )
		);
		return $wpdb->insert_id;
	}

	function fill_municipios(){
		$filename = 'municipios-edomex-hidalgo.csv';
		if ( ( $gestor = fopen( YC_CURSOS_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_estado = '';
		    while ( ( $datos = fgetcsv( $gestor, 70, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	if( $current_estado !=  $datos[0] ){
	        		$current_estado = $datos[0];
	        	}
		        Admin_Cursos_YC::get()->insert_municipio( $current_estado, $datos[1] );
		    }
		    fclose( $gestor );
		}
	}

	private function insert_municipio( $estado, $municipio ){
		global $wpdb;

		$municipio_data = array(
			'estado'	=> $estado,
			'municipio'	=> $municipio
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_municipios',
			$municipio_data,
			array( '%s', '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_estados(){
		$filename = 'estados.csv';
		if ( ( $gestor = fopen( YC_CURSOS_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_estado = '';
		    while ( ( $datos = fgetcsv( $gestor, 32, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	Admin_Cursos_YC::get()->insert_estado( $datos[0] );
		        
		    }
		    fclose( $gestor );
		}
	}

	private function insert_estado( $estado ){
		global $wpdb;

		$municipio_data = array(
			'estado'	=> $estado
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_estados',
			$municipio_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_paises(){
		$filename = 'paises.csv';
		if ( ( $gestor = fopen( YC_CURSOS_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {
			$current_pais = '';
		    while ( ( $datos = fgetcsv( $gestor, 32, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;
	        	Admin_Cursos_YC::get()->insert_pais( $datos[0] );
		        
		    }
		    fclose( $gestor );
		}
	}

	private function insert_pais( $pais ){
		global $wpdb;

		$municipio_data = array(
			'pais'	=> $pais
		);
		$wpdb->insert(
			$wpdb->prefix . 'sondeo_cdmx_paises',
			$municipio_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	private function fill_preguntas(){
		$filename = 'preguntas.csv';
		$text = 0;
		$question_number = 1;
		$type = 2;
		$is_dynamic = 3;
		$is_required = 4;
		$limit = 5;
		ini_set('auto_detect_line_endings',FALSE);
		if ( ( $gestor = fopen( YC_CURSOS_PLUGIN_DIR . 'inc/csv/' . $filename, 'r' ) ) !== FALSE ) {

		    while ( ( $datos = fgetcsv( $gestor, 200, ',' ) ) !== FALSE ) {
		    	if( $datos[0] == '' ) continue;

	        	Admin_Cursos_YC::get()->insert_pregunta( $datos[$text], $datos[$question_number], $datos[$type], $datos[$is_dynamic], $datos[$is_required], $datos[$limit] );
		    }
		    fclose( $gestor );
		}
	}

function insert_pregunta( $text, $number, $type, $is_dynamic, $is_required, $limit ){
	global $wpdb;

	$pregunta_data = array(
		'text'				=> $text,
		'question_number'	=> $number,
		'type'				=> $type,
		'is_dynamic'		=> $is_dynamic,
		'is_required'		=> $is_required,
		'max_limit'			=> $limit,
	);
	$wpdb->insert(
		$wpdb->prefix . 'sondeo_cdmx_questions',
		$pregunta_data,
		array( '%s', '%d', '%s', '%d', '%d', '%d' )
	);
	return $wpdb->insert_id;
}


	/**
	 * Load required files for Wordpress Admin Panel and for Frontend.
	 */
	private function includes() {
		//require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-yc_cursos_product-setup.php' );
		if ( is_admin() ) {
			require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-yc_admin_cursos-settings.php' );
		}
	}

	/**
	 * Initialize class
	 */
	private function init() {
		
		// YC_Cursos_Product_Setup::get();
		if ( is_admin() ) {
			// Setup settings
			YC_Admin_Cursos_Settings::get();
			return;
		}
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		add_filter( 'product_type_selector', array( $this, 'add_simple_courses_product' ), 10, 1 );
		add_action( 'admin_footer', array( $this, 'simple_courses_custom_js' ) );
		//add_filter( 'woocommerce_product_data_tabs', array( $this, 'custom_product_tabs' ) );
		// add_action( 'woocommerce_product_data_panels', array( $this, 'courses_options_product_tab_content' ) );
		add_action( 'woocommerce_process_product_meta_simple_courses', array( $this, 'save_courses_option_field' )  );
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'hide_attributes_data_panel' ) );
	}

	public function add_simple_courses_product( $types ){
		// Key should be exactly the same as in the class product_type parameter
		$types[ 'simple_courses' ] = __( 'Curso' );

		return $types;
	}

	public function simple_courses_custom_js() {

		if ( 'product' != get_post_type() ) :
			return;
		endif;

		?><script type='text/javascript'>
			jQuery( document ).ready( function() {
				jQuery( '.options_group.pricing' ).addClass( 'show_if_simple_courses' ).show();
			});
		</script><?php
	}

	/**
	 * Add a custom product tab.
	 */
	public function custom_product_tabs( $tabs) {
		$tabs['courses'] = array(
			'label'		=> __( 'Información Curso', 'woocommerce' ),
			'target'	=> 'courses_options',
			'class'		=> array( 'show_if_simple_courses', 'show_if_variable_courses'  ),
		);
		return $tabs;
	}

	/**
	 * Contents of the courses options product tab.
	 */
	public function courses_options_product_tab_content() {
		global $post;
		?><div id='courses_options' class='panel woocommerce_options_panel'><?php
			?><div class='options_group'><?php
				woocommerce_wp_text_input( array(
					'id'			=> '_text_input_y',
					'label'			=> __( 'What is the value of Y', 'woocommerce' ),
					'desc_tip'		=> 'true',
					'description'	=> __( 'A handy description field', 'woocommerce' ),
					'type' 			=> 'text',
				) );
			?></div>

		</div><?php
	}

	/**
	 * Save the custom fields.
	 */
	public function save_courses_option_field( $post_id ) {
		
		$courses_option = isset( $_POST['_enable_courses_option'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_enable_courses_option', $courses_option );
		
		if ( isset( $_POST['_text_input_y'] ) ) :
			update_post_meta( $post_id, '_text_input_y', sanitize_text_field( $_POST['_text_input_y'] ) );
		endif;
		
	}

	/**
	 * Hide Attributes data panel.
	 */
	public function hide_attributes_data_panel( $tabs) {
		
		// Other default values for 'attribute' are; general, inventory, shipping, linked_product, variations, advanced
		$tabs['attribute']['class'][] = 'hide_if_simple_courses hide_if_variable_courses';
		$tabs['linked_product']['class'][] = 'hide_if_simple_courses hide_if_variable_courses';
		$tabs['advanced']['class'][] = 'hide_if_simple_courses hide_if_variable_courses';

		return $tabs;

	}



}// Admin_Cursos_YC
