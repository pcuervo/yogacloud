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
	 * Load required files for Wordpress Admin Panel and for Frontend.
	 */
	private function includes() {
		require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-wc_product_simple_course.php' );
		if ( is_admin() ) {
			require_once( YC_CURSOS_PLUGIN_DIR . 'classes/class-yc_admin_cursos-settings.php' );
		}
	}

	/**
	 * Initialize class
	 */
	private function init() {
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
		add_filter( 'product_type_selector', array( $this, 'add_simple_course_product' ), 10, 1 );
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'custom_product_tabs' ) );
		add_action( 'woocommerce_product_data_panels', array( $this, 'course_options_product_tab_content' ) );
		add_action( 'woocommerce_process_product_meta_simple_course', array( $this, 'save_course_option_field' )  );
		add_action( 'admin_footer', array( $this, 'simple_course_custom_js' ) );
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'manage_attributes_data_panel' ) );
	}

	public function add_simple_course_product( $types ){
		// Key should be exactly the same as in the class product_type parameter
		$types[ 'simple_course' ] = __( 'Curso' );

		return $types;
	}

	public function simple_course_custom_js() {

		if ( 'product' != get_post_type() ) :
			return;
		endif;

		?><script type='text/javascript'>
			jQuery( document ).ready( function() {
				jQuery( '.options_group.pricing' ).addClass( 'show_if_simple_course' ).show();
				jQuery( '.general_options' ).addClass( 'show_if_simple_course' ).show();
				// jQuery( '.inventory_options' ).addClass( 'show_if_simple_course' ).show();
			});
		</script><?php
	}

	/**
	 * Add a custom product tab.
	 */
	public function custom_product_tabs( $tabs) {
		$tabs['course'] = array(
			'label'		=> __( 'Información Curso', 'woocommerce' ),
			'target'	=> 'course_options',
			'class'		=> array( 'show_if_simple_course', 'show_if_variable_course'  ),
		);
		$tabs['inventory'] = array(
			'label'  	=> __( 'Inventory', 'woocommerce' ),
			'target' 	=> 'inventory_product_data',
			'class'		=> array( 'show_if_simple_course', 'show_if_variable_course','show_if_simple', 'show_if_variable', 'show_if_grouped' ),
		);

		return $tabs;
	}

	/**
	 * Contents of the course options product tab.
	 */
	public function course_options_product_tab_content() {
		global $post;
		?><div id='course_options' class='panel woocommerce_options_panel'><?php
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
	public function save_course_option_field( $post_id ) {
		
		if ( isset( $_POST['_text_input_y'] ) ) :
			update_post_meta( $post_id, '_text_input_y', sanitize_text_field( $_POST['_text_input_y'] ) );
		endif;
		
	}

	/**
	 * Hide Attributes data panel.
	 */
	public function manage_attributes_data_panel( $tabs) {
		
		// Other default values for 'attribute' are; general, inventory, shipping, linked_product, variations, advanced
		$tabs['attribute']['class'][] = 'hide_if_simple_course hide_if_variable_course';
		$tabs['linked_product']['class'][] = 'hide_if_simple_course hide_if_variable_course';
		$tabs['advanced']['class'][] = 'hide_if_simple_course hide_if_variable_course';
		$tabs['shipping']['class'][] = 'hide_if_simple_course hide_if_variable_course';
		$tabs['general']['class'][] = 'show_if_simple_course show_if_variable_course';

		return $tabs;

	}


}// Admin_Cursos_YC

