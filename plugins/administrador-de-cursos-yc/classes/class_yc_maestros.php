<?php

/**
 * Admin panel settings for Cursos YogaCloud.
 *
 * This class will create menu items in admin panel, as well as initial setup
 * of post types and all required elements...
 *
 * @since 1.0.0
 */


class YC_Maestros {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return null or YC_Maestros instance
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
		add_action( 'init', array( $this, 'register_custom_post_types' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_admin_cursos' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}

	/**
	 * Register all custom post types needed for "Administrador de Cursos"
	 */
	public function register_custom_post_types() {
		$this->register_post_type_maestros();
	}

	/**
	 * Register all meta boxes needed for custom post types. 
	 */
	public function add_meta_boxes_admin_cursos() {
		$this->add_meta_boxes_maestros();
	}

	/**
	 * Add menu pages
	 */
	public function add_menu_pages() {
		add_menu_page( 'Administrador de Cursos', 'Administrador de Cursos', 'manage_options', 'menu_sondeo_cdmx', array( $this, 'add_admin_cursos_page' ) );
		add_submenu_page( 'menu_sondeo_cdmx', 'Maestros', 'Maestros', 'manage_options', 'edit.php?post_type=maestros', NULL );
		// add_submenu_page ( null, 'Ver respuestas', '', 'manage_options', 'respuestas_sondeo_cdmx', array( $this, 'add_respuestas_sondeo_cdmx_page' ) );
	}

	/**
	 * Add javascript and style files 
	 */
	function enqueue_and_localize_scripts(){
		// wp_enqueue_script( 'plugins', SONDEO_CDMX_PLUGIN_URL . 'inc/js/plugins.js', array('jquery') );
		// wp_enqueue_script( 'sondeo_cdmx_admin_functions', SONDEO_CDMX_PLUGIN_URL . 'inc/js/admin-functions.js', array('jquery') );
		// wp_localize_script( 'sondeo_cdmx_admin_functions', 'ajax_url', admin_url('admin-ajax.php') );
	}

	/**
	 * The main screen
	 */
	public function add_admin_cursos_page() {
		echo '<div class="notice-success notice is-dismissible"><p>¡Esta parte está en construcción!</p></div>';
		$answered_surveys = array();
		?>
		<div class="[ wrap ]">
			<h1>Administrador de Cursos YogaCloud</h1>
			<p>Aquí podrás gestionar los cursos, módulos y lecciones de la plataforma... [COPY PENDING]</p>
			<hr>
			<div class="[ ]">
				<ul>
					<li><a href="#">Gestionar cursos</a></li>
					<li><a href="#">Gestionar módulos</a></li>
					<li><a href="#">Gestionar clases</a></li>
					<li><a href="#">Gestionar badges</a></li>
					<li><a href="#">Gestionar instructores</a></li>
				</ul>
			</div>
		</div>
		<?php
	}// add_admin_cursos_page

	/**
	 * The main screen
	 */
	public function add_respuestas_sondeo_cdmx_page() {
		if( ! isset( $_GET['reference_code'] ) ){
			echo '<p>Ha ocurrido un error</p>';
			echo '<a href="' . admin_url( '/admin.php?page=menu_sondeo_cdmx', 'http' ) . '">Ver todas las encuestas</a>';
       	 	exit;
		}
		$survey = Sondeo_CDMX_Survey::get();
		$answered_surveys = $survey->get_survey( $_GET['reference_code'] );
		?>

		<div class="[ wrap ]">
			<a href="<?php echo admin_url( '/admin.php?page=menu_sondeo_cdmx', 'http' ) ?>">Ver todas las encuestas</a>
			<h1>Sondeo CDMX</h1>
			<p>Encuesta con número de folio <?php echo $answered_surveys[0]['reference_code'] ?> creada el <?php echo $answered_surveys[0]['created_at'] ?></p>
			<hr>
			<table class="[ form-table ]">
				<thead>
					<tr>
						<th>#</th>
						<th>Preguntas</th>
						<th>Respuestas</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $answered_surveys as $key => $survey ) : ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $survey['question'] ?></td>
							<td><?php echo $survey['answer'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
	}// add_respuestas_sondeo_cdmx_page

	/**
	 * Register the post type "Maestros"
	 */
	private function register_post_type_maestros() {
		$labels = array(
			'name'          => 'Maestros',
			'singular_name' => 'Testimonial',
			'add_new'       => 'Nuevo Maestro',
			'add_new_item'  => 'Nuevo Maestro',
			'edit_item'     => 'Editar Maestro',
			'new_item'      => 'Nuevo Maestro',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Maestro',
			'search_items'  => 'Buscar Maestro',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Maestros'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'maestros' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'maestros', $args );
	}// register_post_type_maestros

	/**
	* Add metaboxes for "Maestros"
	**/
	private function add_meta_boxes_maestros(){
		add_meta_box( 'url', 'URL web personal', 'metabox_url', 'maestros', 'advanced', 'high' );
		add_meta_box( 'facebook', 'Facebook', 'metabox_facebook', 'maestros', 'advanced', 'high' );
		add_meta_box( 'twitter', 'Twitter', 'metabox_twitter', 'maestros', 'advanced', 'high' );
		add_meta_box( 'instagram', 'Instagram', 'metabox_instagram', 'maestros', 'advanced', 'high' );
	}

}// YC_Maestros