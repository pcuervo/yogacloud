<?php

/**
 * Admin panel settings for Cursos YogaCloud.
 *
 * This class will create menu items in admin panel, as well as initial setup
 * of post types and all required elements...
 *
 * @since 1.0.0
 */


class YC_Admin_Cursos_Settings {

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

		add_action( 'init', array( $this, 'register_custom_post_types' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_admin_cursos' ) );
		add_action('save_post', array( $this, 'save_meta_boxes' ), 10, 1 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}

	/**
	 * Register all custom post types needed for "Administrador de Cursos"
	 */
	public function register_custom_post_types() {
		$this->register_post_type_modulos();
		$this->register_post_type_lecciones();
		$this->register_post_type_maestros();
	}

	/**
	 * Register all meta boxes needed for custom post types. 
	 */
	public function add_meta_boxes_admin_cursos() {
		$this->add_meta_boxes_maestros();
		$this->add_meta_boxes_lecciones();
	}

	/**
	 * Save metaboxes 
	 */
	public function save_meta_boxes( $post_id ) {
		$this->save_meta_boxes_maestros( $post_id );
		$this->save_meta_boxes_lecciones( $post_id );
	}

	/**
	 * Add menu pages
	 */
	public function add_menu_pages() {
		add_menu_page( 'Administrador de Cursos', 'Administrador de Cursos', 'manage_options', 'menu_sondeo_cdmx', array( $this, 'add_admin_cursos_page' ) );
		add_submenu_page( 'menu_sondeo_cdmx', 'Módulos', 'Módulos', 'manage_options', 'edit.php?post_type=modulos', NULL );
		add_submenu_page( 'menu_sondeo_cdmx', 'Lecciones', 'Lecciones', 'manage_options', 'edit.php?post_type=lecciones', NULL );
		add_submenu_page( 'menu_sondeo_cdmx', 'Maestros', 'Maestros', 'manage_options', 'edit.php?post_type=maestros', NULL );
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


	/******************************************
	* CUSTOM POST TYPES
	******************************************/

	/**
	 * Register the post type "Módulos"
	 */
	private function register_post_type_modulos() {
		$labels = array(
			'name'          => 'Módulos',
			'singular_name' => 'Módulo',
			'add_new'       => 'Nuevo Módulo',
			'add_new_item'  => 'Nuevo Módulo',
			'edit_item'     => 'Editar Módulo',
			'new_item'      => 'Nuevo Módulo',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Módulo',
			'search_items'  => 'Buscar Módulo',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Módulos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'modulos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'modulos', $args );
	}// register_post_type_modulos

	private function register_post_type_lecciones() {
		$labels = array(
			'name'          => 'Lecciones',
			'singular_name' => 'Lección',
			'add_new'       => 'Nueva Lección',
			'add_new_item'  => 'Nueva Lección',
			'edit_item'     => 'Editar Lección',
			'new_item'      => 'Nueva Lección',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Lección',
			'search_items'  => 'Buscar Lección',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Lecciones'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'lecciones' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'lecciones', $args );
	}// register_post_type_lecciones

	private function register_post_type_maestros() {
		$labels = array(
			'name'          => 'Maestros',
			'singular_name' => 'Maestro',
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


	/******************************************
	* META BOX REGISTRATION
	******************************************/

	/**
	* Add metaboxes for "Maestros"
	**/
	private function add_meta_boxes_maestros(){
		add_meta_box( 'info_maestro', 'Información Adicional', array( $this, 'meta_box_info_maestro' ), 'maestros', 'advanced', 'high' );
	}

	/**
	* Add metaboxes for "Lecciones"
	**/
	private function add_meta_boxes_lecciones(){
		add_meta_box( 'info_lecciones', 'Información Adicional', array( $this, 'meta_box_info_leccion' ), 'lecciones', 'advanced', 'high' );
	}


	/******************************************
	* META BOX CALLBACKS
	******************************************/

	/**
	* Display meta_boxes for post type "Maestro"
	* @param obj $post
	**/
	public function meta_box_info_maestro( $post ){
		$url = get_post_meta($post->ID, '_url_meta', true);
		$facebook = get_post_meta($post->ID, '_facebook_meta', true);
		$twitter = get_post_meta($post->ID, '_twitter_meta', true);
		$instagram = get_post_meta($post->ID, '_instagram_meta', true);

		wp_nonce_field(__FILE__, '_url_meta_nonce');
		wp_nonce_field(__FILE__, '_facebook_meta_nonce');
		wp_nonce_field(__FILE__, '_twitter_meta_nonce');
		wp_nonce_field(__FILE__, '_instagram_meta_nonce');

		echo "<label><strong>URL Personal</strong><br><small>Ejemplo: http://zamacona.me/ </small></label>";
		echo "<input type='text' class='[ widefat ]' name='_url_meta' value='$url'><br><br>";
		echo "<label><strong>Facebook </strong><br><small>Ejemplo: http://www.facebook.com/cuervoestudio/?fref=ts </small></label>";
		echo "<input type='text' class='[ widefat ]' name='_facebook_meta' value='$facebook'><br><br>";
		echo "<label><strong>Twitter </strong><br><small> Ejemplo: https://twitter.com/theyogacloud</small></label>";
		echo "<input type='text' class='[ widefat ]' name='_twitter_meta' value='$twitter'><br><br>";
		echo "<label><strong>Instagram </strong><br><small> Ejemplo: https://www.instagram.com/theyogacloud/</small></label>";
		echo "<input type='text' class='[ widefat ]' name='_instagram_meta' value='$instagram'>";
	}// meta_box_info_maestro

	/**
	* Display meta_boxes for post type "Lecciones"
	* @param obj $post
	**/
	public function meta_box_info_leccion( $post ){
		$vimeo_url = get_post_meta($post->ID, '_vimeo_url_meta', true);
		$soundcloud_url = get_post_meta($post->ID, '_soundcloud_url_meta', true);
		$is_free = get_post_meta($post->ID, '_is_free_meta', true);

		wp_nonce_field(__FILE__, '_vimeo_url_meta_nonce');
		wp_nonce_field(__FILE__, '_soundcloud_url_meta_nonce');
		wp_nonce_field(__FILE__, '_is_free_meta_nonce');

		echo "<label><strong>URL Vimeo</strong><br><small>Ejemplo: https://vimeo.com/171807697</small></label>";
		echo "<input type='text' class='[ widefat ]' name='_vimeo_url_meta' value='$vimeo_url'><br><br>";
		echo "<label><strong>URL SoundCloud</strong><br><small>Ejemplo: https://soundcloud.com/miguel-cabral-alcocer/children-of-the-forest-stolen-edit-mc-alcocer </small></label>";
		echo "<input type='text' class='[ widefat ]' name='_soundcloud_url_meta' value='$soundcloud_url'><br><br>";
		$checked = $is_free == 1 ? 'checked' : '';
		echo "<input type='checkbox' class='[ widefat ]' name='_is_free_meta' value=1 $checked />";
		echo "<label> Activar si esta lección puede estar disponible de manera gratuita.</label>";
	}// meta_box_info_leccion


	/******************************************
	* SAVE META BOXES
	******************************************/

	/**
	* Save the metaboxes for post type "maestros"
	**/
	private function save_meta_boxes_maestros( $post_id ){
		// URL
		if ( isset($_POST['_url_meta']) and check_admin_referer( __FILE__, '_url_meta_nonce') ){
			update_post_meta($post_id, '_url_meta', $_POST['_url_meta']);
		}
		// Facebook
		if ( isset($_POST['_facebook_meta']) and check_admin_referer( __FILE__, '_facebook_meta_nonce') ){
			update_post_meta($post_id, '_facebook_meta', $_POST['_facebook_meta']);
		}
		// Twitter
		if ( isset($_POST['_twitter_meta']) and check_admin_referer( __FILE__, '_twitter_meta_nonce') ){
			update_post_meta($post_id, '_twitter_meta', $_POST['_twitter_meta']);
		}
		// Instagram
		if ( isset($_POST['_instagram_meta']) and check_admin_referer( __FILE__, '_instagram_meta_nonce') ){
			update_post_meta($post_id, '_instagram_meta', $_POST['_instagram_meta']);
		}
	}// save_meta_boxes_maestros

	/**
	* Save the metaboxes for post type "lecciones"
	**/
	private function save_meta_boxes_lecciones( $post_id ){
		// Vimeo
		if ( isset($_POST['_vimeo_url_meta']) and check_admin_referer( __FILE__, '_vimeo_url_meta_nonce') ){
			update_post_meta($post_id, '_vimeo_url_meta', $_POST['_vimeo_url_meta']);
		}
		// SoundCloud
		if ( isset($_POST['_soundcloud_url_meta']) and check_admin_referer( __FILE__, '_soundcloud_url_meta_nonce') ){
			update_post_meta($post_id, '_soundcloud_url_meta', $_POST['_soundcloud_url_meta']);
		}
		// Is free
		if ( isset($_POST['_is_free_meta']) and check_admin_referer( __FILE__, '_is_free_meta_nonce') ){

			update_post_meta($post_id, '_is_free_meta', $_POST['_is_free_meta']);
		} else {
			update_post_meta($post_id, '_is_free_meta', 0);
		}
	}// save_meta_boxes_lecciones

}// YC_Admin_Cursos_Settings