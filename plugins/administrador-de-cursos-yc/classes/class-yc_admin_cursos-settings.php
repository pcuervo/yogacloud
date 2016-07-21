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

		// Custom data for Cursos
		if( is_admin() ){
			// AJAX functions
			add_action( 'wp_ajax_nopriv_update_position_modulo_curso', array( $this, 'update_position_modulo_curso' ) );
			add_action( 'wp_ajax_update_position_modulo_curso', array( $this, 'update_position_modulo_curso' ) );
			add_action( 'wp_ajax_nopriv_update_position_leccion_modulo', array( $this, 'update_position_leccion_modulo' ) );
			add_action( 'wp_ajax_update_position_leccion_modulo', array( $this, 'update_position_leccion_modulo' ) );
			add_action( 'wp_ajax_nopriv_remove_leccion_modulo', array( $this, 'remove_leccion_modulo' ) );
			add_action( 'wp_ajax_remove_leccion_modulo', array( $this, 'remove_leccion_modulo' ) );
			add_action( 'wp_ajax_nopriv_remove_modulo_curso', array( $this, 'remove_modulo_curso' ) );
			add_action( 'wp_ajax_remove_modulo_curso', array( $this, 'remove_modulo_curso' ) );
			add_action( 'wp_ajax_nopriv_add_maestro_curso', array( $this, 'add_maestro_curso' ) );
			add_action( 'wp_ajax_add_maestro_curso', array( $this, 'add_maestro_curso' ) );
			add_action( 'wp_ajax_nopriv_remove_maestro_curso', array( $this, 'remove_maestro_curso' ) );
			add_action( 'wp_ajax_remove_maestro_curso', array( $this, 'remove_maestro_curso' ) );
			add_action( 'wp_ajax_nopriv_add_badge_curso', array( $this, 'add_badge_curso' ) );
			add_action( 'wp_ajax_add_badge_curso', array( $this, 'add_badge_curso' ) );
			add_action( 'wp_ajax_nopriv_remove_badge_curso', array( $this, 'remove_badge_curso' ) );
			add_action( 'wp_ajax_remove_badge_curso', array( $this, 'remove_badge_curso' ) );

			add_filter( 'product_type_selector', array( $this, 'add_simple_course_product' ), 10, 1 );
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'custom_product_tabs' ) );
			add_action( 'woocommerce_product_data_panels', array( $this, 'course_options_product_tab_content' ) );
			add_action( 'woocommerce_process_product_meta_simple_course', array( $this, 'save_course_option_field' )  );
			add_action( 'admin_footer', array( $this, 'simple_course_custom_js' ) );
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'manage_attributes_data_panel' ) );
			add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_and_localize_admin_scripts' ) );
		} else {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
			add_shortcode( 'show_rating', array( $this, 'add_shortcode_rating' ) );
		}
		add_action( 'wp_ajax_nopriv_save_user_rating', array( $this, 'save_user_rating' ) );
		add_action( 'wp_ajax_save_user_rating', array( $this, 'save_user_rating' ) );
		add_action( 'wp_ajax_nopriv_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		add_action( 'wp_ajax_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		add_action( 'wp_ajax_nopriv_is_course_completed', array( $this, 'is_course_completed' ) );
		add_action( 'wp_ajax_is_course_completed', array( $this, 'is_course_completed' ) );

		// Custom data for Módulos and lecciones
		add_action( 'init', array( $this, 'register_custom_post_types' ), 5 );
		//add_action( 'init', array( $this, 'register_custom_taxonomies' ), 10 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_admin_cursos' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 5, 1  );
		add_action( 'save_post', array( $this, 'update_custom_taxonomies' ), 10 );
		//add_action( 'save_post', array( $this, 'update_courses_modules' ), 10 );
		//add_action( 'save_post', array( $this, 'update_modules_lessons' ), 10 );

	}

	public function add_simple_course_product( $types ){
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
					'id'			=> '_subtitle',
					'label'			=> __( 'Subtítulo', 'woocommerce' ),
					'type' 			=> 'text',
				) );
				woocommerce_wp_text_input( array(
					'id'			=> '_vimeo_url',
					'label'			=> __( 'URL Vimeo Trailer', 'woocommerce' ),
					'type' 			=> 'text',
					'desc_tip'		=> 'true',
					'description'	=> __( 'Máximo 50 caracteres', 'woocommerce' )
				) );
				woocommerce_wp_text_input( array(
					'id'			=> '_num_lessons',
					'label'			=> __( 'Número de lecciones', 'woocommerce' ),
					'type' 			=> 'number',
				) );
				woocommerce_wp_text_input( array(
					'id'			=> '_lessons_per_week',
					'label'			=> __( 'Lecciones por semana', 'woocommerce' ),
					'desc_tip'		=> 'true',
					'description'	=> __( 'Si el campo se deja vacío, no se mostrará nada en la página del curso.', 'woocommerce' ),
					'type' 			=> 'number',
				) );
				woocommerce_wp_text_input( array(
					'id'			=> '_hours',
					'label'			=> __( 'Horas', 'woocommerce' ),
					'type' 			=> 'number',
				) );
				woocommerce_wp_checkbox( array(
					'id' 			=> '_coming_soon',
					'label' 		=> __( '¿Está disponbile el curso?', 'woocommerce' ),
					'description' 	=> __( 'Seleccionar si el curso sale próximamente.', 'woocommerce' ) ) );
			?></div>

		</div><?php
	}

	/**
	 * Save the custom fields.
	 */
	public function save_course_option_field( $post_id ) {
		if ( isset( $_POST['_vimeo_url'] ) ) :
			update_post_meta( $post_id, '_subtitle', sanitize_text_field( $_POST['_subtitle'] ) );
			update_post_meta( $post_id, '_vimeo_url', sanitize_text_field( $_POST['_vimeo_url'] ) );
			update_post_meta( $post_id, '_num_lessons', sanitize_text_field( $_POST['_num_lessons'] ) );
			update_post_meta( $post_id, '_lessons_per_week', sanitize_text_field( $_POST['_lessons_per_week'] ) );
			update_post_meta( $post_id, '_hours', sanitize_text_field( $_POST['_hours'] ) );
			update_post_meta( $post_id, '_coming_soon', sanitize_text_field( $_POST['_coming_soon'] ) );
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

	/**
	 * Register all custom post types needed for "Administrador de Cursos"
	 */
	public function register_custom_post_types() {
		$this->register_post_type_modulos();
		$this->register_post_type_lecciones();
		$this->register_post_type_maestros();
		$this->register_post_type_badges();
	}

	/**
	 * Register all custom post types needed for "Administrador de Cursos"
	 */
	public function register_custom_taxonomies() {
		$this->register_taxonomy_maestros();
		$this->register_taxonomy_modulos();
		$this->register_taxonomy_lecciones();
	}

	/**
	 * Register all meta boxes needed for custom post types.
	 */
	public function add_meta_boxes_admin_cursos() {
		$this->add_meta_boxes_maestros();
		$this->add_meta_boxes_lecciones();
		$this->add_meta_boxes_badges();
	}

	/**
	 * Save metaboxes
	 */
	public function save_meta_boxes( $post_id ) {
		$this->save_meta_boxes_maestros( $post_id );
		$this->save_meta_boxes_lecciones( $post_id );
		$this->save_meta_boxes_badges( $post_id );
	}

	/**
	 * Update custom taxonomies
	 */
	public function update_custom_taxonomies() {
		if( 'maestros' == get_post_type() OR 'modulos' == get_post_type() OR 'lecciones' == get_post_type() ){
			$this->insert_custom_taxonomy_term( get_post_type() );
		}
	}

	/**
	 * Update the relationship between Cursos and Modulos
	 */
	public function update_courses_modules() {
		if( ! is_curso( get_the_id() ) ) return;

		$curso = new YC_Curso( get_the_id() );
		foreach ( $curso->get_modulos_from_terms() as $modulo ) {
			if( ! $curso->has_modulo( $modulo->id ) ){
				$id = $curso->add_modulo( $modulo->id );
			}
		}
	}

	/**
	 * Update the relationship between Modulos and Lecciones
	 */
	public function update_modules_lessons() {
		if( 'modulos' != get_post_type() ) return;

		$modulo = new YC_Modulo( get_the_id() );
		foreach ( $modulo->get_lecciones_from_terms() as $leccion ) {
			if( ! $modulo->has_leccion( $leccion->id ) ){
				$id = $modulo->add_leccion( $leccion->id );
			}
		}
	}

	/**
	 * Add menu pages
	 */
	public function add_menu_pages() {
		add_menu_page( 'Administrador de Cursos', 'Administrador de Cursos', 'manage_options', 'gestionar_curso', array( $this, 'add_gestionar_curso_page' ) );
		add_submenu_page( 'gestionar_curso', 'Módulos', 'Módulos', 'manage_options', 'edit.php?post_type=modulos', NULL );
		add_submenu_page( 'gestionar_curso', 'Lecciones', 'Lecciones', 'manage_options', 'edit.php?post_type=lecciones', NULL );
		add_submenu_page( 'gestionar_curso', 'Maestros', 'Maestros', 'manage_options', 'edit.php?post_type=maestros', NULL );
		add_submenu_page( 'gestionar_curso', 'Badges', 'Badges', 'manage_options', 'edit.php?post_type=badges', NULL );
		add_submenu_page( NULL, 'Agregar módulos a curso', 'Agregar módulos a curso', 'manage_options', 'agregar_modulos_curso', array( $this, 'add_agregar_modulos_curso_page' ) );
		add_submenu_page( NULL, 'Agregar maestros a curso', 'Agregar maestros a curso', 'manage_options', 'agregar_maestros_curso', array( $this, 'add_agregar_maestros_curso_page' ) );
		add_submenu_page( NULL, 'Agregar badges a curso', 'Agregar badges a curso', 'manage_options', 'agregar_badges_curso', array( $this, 'add_agregar_badges_curso_page' ) );
		add_submenu_page( NULL, 'Agregar lecciones a módulo', 'Agregar lecciones a módulo', 'manage_options', 'agregar_lecciones_modulo', array( $this, 'add_agregar_lecciones_modulo_page' ) );
	}

	/**
	 * Add javascript and style files
	 */
	public function enqueue_and_localize_scripts(){
		wp_enqueue_script( 'yoga_cloud_course', YC_CURSOS_PLUGIN_URL . 'inc/js/yoga-cloud-video.js', array(), false, true );
		wp_localize_script( 'yoga_cloud_course', 'ajax_url', admin_url('admin-ajax.php') );
		if ( 'lecciones' == get_post_type() ) {
			wp_enqueue_script( 'course_rating', YC_CURSOS_PLUGIN_URL . 'inc/js/course-rating.js', array(), false, true );
			wp_localize_script( 'course_rating', 'ajax_url', admin_url('admin-ajax.php') );
		}
	}

	/**
	 * Add javascript and style files
	 */
	public function enqueue_and_localize_admin_scripts(){
		wp_enqueue_script( 'jquery_ui', 'https://code.jquery.com/ui/1.12.0/jquery-ui.js', 'jquery', '1.12.0', true );
		wp_enqueue_script( 'list', YC_CURSOS_PLUGIN_URL . 'inc/js/list.min.js', 'jquery', false, true );
		wp_enqueue_script( 'admin_functions', YC_CURSOS_PLUGIN_URL . 'inc/js/admin-functions.js', 'jquery', false, true );
		wp_enqueue_style( 'admin_styles', YC_CURSOS_PLUGIN_URL . 'inc/css/style.css' );
		wp_localize_script( 'jquery_ui', 'ajax_url', admin_url('admin-ajax.php') );
	}

	/**
	 * Shortcode to display rating in courses
	 */
	public function add_shortcode_rating() {
		$curso = new YC_Curso( get_the_id() );
		$user_rating = $curso->get_user_rating( get_current_user_id() );
		if ( ! $user_rating ) : ?>
			<h6 class="[ white-text ]">Califica este curso</h6>
			<div class="[ rating ][ color-light ]" data-curso="<?php echo get_the_id(); ?>" ></div>
		<?php endif ;
	}

	/**
	 * Course management page
	 */
	public function add_gestionar_curso_page() {
		$cursos = YC_Curso::get_cursos();?>

		<div class="[ wrap ][ admin-cuervos ]">
			<h1>Cursos Yogacloud</h1>
			<p>Aquí podrás editar los módulos, maestros y badges que tiene cada curso. A continuación encontrarás el listado de los cursos disponibles.</p>
			<hr>
			<a class="[ button-primary ]" href="<?php echo site_url('wp-admin/post-new.php?post_type=product') ?>">crear curso</a>
			<a class="[ button-primary ]" href="<?php echo site_url('wp-admin/post-new.php?post_type=modulos') ?>">crear módulo</a>
			<a class="[ button-primary ]" href="<?php echo site_url('wp-admin/post-new.php?post_type=lecciones') ?>">crear lección</a>
			<a class="[ button-primary ]" href="<?php echo site_url('wp-admin/post-new.php?post_type=maestros') ?>">crear maestro</a>
			<a class="[ button-primary ]" href="<?php echo site_url('wp-admin/post-new.php?post_type=badges') ?>">crear badge</a>
			<hr>
			<table class="[ form-table ]">
				<thead>
					<tr>
						<th>Nombre</th>
						<th># de módulos</th>
						<th># de lecciones</th>
						<th>Administrar Módulos</th>
						<th>Administrar Maestros</th>
						<th>Administrar Badges</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $cursos as $key => $curso ) : ?>
						<tr>
							<td><?php echo $curso->get_name() ?></td>
							<td class="[ text-center ]"><?php echo $curso->get_num_modulos() ?></td>
							<td class="[ text-center ]"><?php echo $curso->get_num_lecciones() ?></td>
							<td class="[ text-center ]"><a class="[ button-primary ]" href="<?php echo admin_url( '/admin.php?page=agregar_modulos_curso', 'http' ) . '&cid=' . $curso->id ?>">+</a></td>
							<td class="[ text-center ]"><a class="[ button-primary ]" href="<?php echo admin_url( '/admin.php?page=agregar_maestros_curso', 'http' ) . '&cid=' . $curso->id  ?>">+</a></td>
							<td class="[ text-center ]"><a class="[ button-primary ]" href="<?php echo admin_url( '/admin.php?page=agregar_badges_curso', 'http' ) . '&cid=' . $curso->id ?>">+</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
	}// add_gestionar_curso_page

	/**
	 * Add modulos to course page
	 */
	public function add_agregar_modulos_curso_page() {

		if( ! isset( $_GET['cid'] ) ){
			wp_redirect( admin_url( '/admin.php?page=gestionar_curso', 'http' ) );
			exit();
		}

		$curso =  new YC_Curso( $_GET['cid'] );
		$modulos = $curso->get_modulos();
		$modulos_en_curso = $curso->get_modulos();
		$modulos_todos = YC_Modulo::get_modulos();

		?>
		<div class="[ wrap ][ admin-cuervos admin-modulos ]">
			<div class="[ notices ]"></div>
			<h1><?php echo $curso->get_name(); ?></h1>
			<p><?php echo $curso->get_short_description(); ?></p>
			<hr>
			<div id="dashboard-widget-wrap">
				<div id="dashboard-widgets" class="[ metabox-holder ][ columns-2 ]">
					<div id="postbox-container-1" class="[ postbox-container ]" style="width: 50%">
						<div class="[  ]">
							<div id="modulos-curso" data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]">Orden de módulos en curso</h2>
								<div class="inside">
									<ul id="sortable-modulos-curso" class="[ sortable-list ][ margin-bottom ]" style="min-height: 50px">
										<?php foreach ($modulos_en_curso as $key => $modulo) : ?>
											<li id="<?php echo $modulo->id ?>" data-id="<?php echo $modulo->id ?>" data-type="lesson">
												<span class="[ modulo__name ]">
													<span class="[ modulo__number ]"><?php echo $key+1; ?>. </span>
													<?php echo $modulo->name ?>
												</span><span
												class="[ modulo__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $modulo->id ) ?>">editar</a>
												</span><span
												class="[ modulo__add-lesson ]">
													<a class="[ button-primary ]" href="<?php echo admin_url( '/admin.php?page=agregar_lecciones_modulo', 'http' ) . "&mid=" . $modulo->id ?>">agregar lección</a>
												</span><span
												class="[ modulo__drag ] dashicons dashicons-editor-justify"></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="postbox-container-2" class="[ postbox-container ]" style="width: 50%">
						<div class="[ meta-box-sortables ui-sortable ]">
							<div data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]"><span>Módulos que no están en curso</span></h2>
								<div class="inside">
									<ul id="sortable-modulos-todos" class="[ sortable-list ]" style="min-height: 50px">
										<?php foreach ($modulos_todos as $key => $modulo) : ?>
											<?php if( $curso->has_modulo( $modulo->id) ) continue; ?>
											<li id="<?php echo $modulo->id ?>" data-id="<?php echo $modulo->id ?>" data-type="module">
												<span class="[ modulo__name ]">
													<span class="[ modulo__number ]"></span>
													<?php echo $modulo->name ?>
												</span><span
												class="[ modulo__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $modulo->id ) ?>">editar</a>
												</span><span
												class="[ modulo__add-lesson ]">
													<a class="[ button-primary ]" href="<?php echo admin_url( '/admin.php?page=agregar_lecciones_modulo', 'http' ) . "&mid=" . $modulo->id ?>">agregar lección</a>
												</span><span
												class="[ modulo__drag ] dashicons dashicons-editor-justify"></span>
												<span></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}// add_agregar_modulo_curso_page

	/**
	 * Add maestros to course page
	 */
	public function add_agregar_maestros_curso_page() {
		if( ! isset( $_GET['cid'] ) ){
			wp_redirect( admin_url( '/admin.php?page=gestionar_curso', 'http' ) );
			exit();
		}

		$curso =  new YC_Curso( $_GET['cid'] );
		$maestros_en_curso = $curso->get_maestros();
		$maestros_todos = YC_Maestro::get_maestros();
		?>
		<div class="[ wrap ][ admin-cuervos admin-modulos ]">
			<div class="[ notices ]"></div>
			<h1><?php echo $curso->get_name(); ?></h1>
			<p><?php echo $curso->get_short_description(); ?></p>
			<hr>
			<div id="dashboard-widget-wrap">
				<div id="dashboard-widgets" class="[ metabox-holder ][ columns-2 ]">
					<div id="postbox-container-1" class="[ postbox-container ]" style="width: 50%">
						<div class="[  ]">
							<div id="maestros-curso" data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]">Maestros en curso</h2>
								<div class="inside">
									<ul id="sortable-maestros-curso" class="[ sortable-list ][ margin-bottom ]" style="min-height: 50px">
										<?php foreach ($maestros_en_curso as $maestro) : ?>
											<li id="<?php echo $maestro->id ?>" data-id="<?php echo $maestro->id ?>" data-type="lesson">
												<span class="[ maestro__name ]">
													<?php echo $maestro->name ?>
												</span><span
												class="[ maestro__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $maestro->id ) ?>">editar</a>
												</span><span
												class="[ maestro__drag ] dashicons dashicons-editor-justify"></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="postbox-container-2" class="[ postbox-container ]" style="width: 50%">
						<div class="[ meta-box-sortables ui-sortable ]">
							<div data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]"><span>Maestros que no están en curso</span></h2>
								<div class="inside">
									<ul id="sortable-maestros-todos" class="[ sortable-list ]" style="min-height: 50px">
										<?php foreach ($maestros_todos as $maestro) : ?>
											<?php if( $curso->has_maestro( $maestro->id) ) continue; ?>
											<li id="<?php echo $maestro->id ?>" data-id="<?php echo $maestro->id ?>" data-type="module">
												<span class="[ maestro__name ]">
													<?php echo $maestro->name ?>
												</span><span
												class="[ maestro__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $maestro->id ) ?>">editar</a>
												</span><span
												class="[ modulo__drag ] dashicons dashicons-editor-justify"></span>
												<span></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}// add_agregar_maestros_curso_page

	/**
	 * Add maestros to course page
	 */
	public function add_agregar_badges_curso_page() {
		if( ! isset( $_GET['cid'] ) ){
			wp_redirect( admin_url( '/admin.php?page=gestionar_curso', 'http' ) );
			exit();
		}

		$curso =  new YC_Curso( $_GET['cid'] );
		$badges_en_curso = $curso->get_badges();
		$badges_todos = YC_Badge::get_badges();
		?>
		<div class="[ wrap ][ admin-cuervos admin-modulos ]">
			<div class="[ notices ]"></div>
			<h1><?php echo $curso->get_name(); ?></h1>
			<p><?php echo $curso->get_short_description(); ?></p>
			<hr>
			<div id="dashboard-widget-wrap">
				<div id="dashboard-widgets" class="[ metabox-holder ][ columns-2 ]">
					<div id="postbox-container-1" class="[ postbox-container ]" style="width: 50%">
						<div class="[  ]">
							<div id="badges-curso" data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]">Badges del curso</h2>
								<div class="inside">
									<ul id="sortable-badges-curso" class="[ sortable-list ][ margin-bottom ]" style="min-height: 50px">
										<?php foreach ($badges_en_curso as $badge) : ?>
											<li id="<?php echo $badge->id ?>" data-id="<?php echo $badge->id ?>" data-type="lesson">
												<span class="[ badge__img ]">
													<img src="<?php echo $badge->thumb_url ?>" alt="">
												</span>
												<span class="[ badge__name ]">
													<?php echo $badge->name ?>
												</span><span
												class="[ badge__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $badge->id ) ?>">editar</a>
												</span><span
												class="[ badge__drag ] dashicons dashicons-editor-justify"></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="postbox-container-2" class="[ postbox-container ]" style="width: 50%">
						<div class="[ meta-box-sortables ui-sortable ]">
							<div data-curso="<?php echo $curso->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]"><span>Badges que no están en curso</span></h2>
								<div class="inside">
									<ul id="sortable-badges-todos" class="[ sortable-list ]" style="min-height: 50px">
										<?php foreach ($badges_todos as $badge) : ?>
											<?php if( $curso->has_badge( $badge->id) ) continue; ?>
											<li id="<?php echo $badge->id ?>" data-id="<?php echo $badge->id ?>" data-type="module">
												<span class="[ badge__img ]">
													<img src="<?php echo $badge->thumb_url ?>" alt="">
												</span>
												<span class="[ badge__name ]">
													<?php echo $badge->name ?>
												</span><span
												class="[ badge__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $badge->id ) ?>">editar</a>
												</span><span
												class="[ modulo__drag ] dashicons dashicons-editor-justify"></span>
												<span></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}// add_agregar_badges_curso_page

	/**
	 * Add modulos to course page
	 */
	public function add_agregar_lecciones_modulo_page() {
		if( ! isset( $_GET['mid'] ) ){
			wp_redirect( admin_url( '/admin.php?page=gestionar_curso', 'http' ) );
			exit();
		}

		$modulo 				= new YC_Modulo( array( 'id' => $_GET['mid'] ) );
		$lecciones_en_modulo 	= $modulo->get_lecciones();
		$lecciones_todas 		= YC_Leccion::get_lecciones();
		?>
		<div class="[ wrap ][ admin-cuervos admin-lecciones ]">
			<div class="[ notices ]"></div>
			<h1><?php echo $modulo->name; ?></h1>
			<p><?php echo $modulo->description; ?></p>
			<hr>
			<div id="dashboard-widget-wrap">
				<div id="dashboard-widgets" class="[ metabox-holder ][ columns-2 ]">
					<div id="postbox-container-1" class="[ postbox-container ]" style="width: 50%">
						<div class="[  ]">
							<div id="lecciones-modulo" data-modulo="<?php echo $modulo->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]"><span>Orden de lecciones en módulo</span></h2>
								<div class="inside">
									<ul id="sortable-lecciones-modulo" class="[ sortable-list ]" style="min-height: 50px">
										<?php foreach ($lecciones_en_modulo as $key => $leccion) : ?>
											<li id="<?php echo $leccion->id ?>" data-id="<?php echo $leccion->id ?>" data-type="lesson">
												<span class="[ lesson__name ]">
													<span class="[ lesson__number ]"><?php echo $key+1; ?>. </span>
													<?php echo $leccion->name ?>
												</span><span
												class="[ lesson__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $leccion->id ) ?>">editar</a>
												</span><span
												class="[ lesson__drag ] dashicons dashicons-editor-justify"></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="postbox-container-2" class="[ postbox-container ]" style="width: 50%">
						<div class="[ meta-box-sortables ui-sortable ]">
							<div data-modulo="<?php echo $modulo->id ?>" class="[ postbox ]">
								<h2 class="[ hndle ][ ui-sortable-handle ]"><span>Lecciones que no están en módulo</span></h2>
								<div class="inside" id="lecciones-list">
									<input class="[ search ]" placeholder="Ingresa el nombre de una lección" />
									<hr>
									<ul id="sortable-lecciones-todas" class="[ sortable-list ][ list ]" style="min-height: 50px">
										<?php foreach ($lecciones_todas as $key => $leccion) : ?>
											<?php if( $modulo->has_leccion( $leccion->id) ) continue; ?>
											<li id="<?php echo $leccion->id ?>" data-id="<?php echo $leccion->id ?>" data-type="lesson">
												<span class="[ lesson__name ]">
													<span class="[ lesson__number ]"></span>
													<?php echo $leccion->name ?>
												</span><span
												class="[ lesson__edit ]">
													<a class="[ button-primary ]" href="<?php echo get_edit_post_link( $leccion->id ) ?>">editar</a>
												</span><span
												class="[ lesson__drag ] dashicons dashicons-editor-justify"></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}// add_agregar_lecciones_modulo_page

	/**
	* Update positions of modules inside course
	*/
	public function update_position_modulo_curso(){
		$positions_modulo = $_POST['positions_modulo'];
		$curso = new YC_Curso( $_POST['id_curso'] );
		foreach ( $positions_modulo as $modulo ) {
			if( ! $curso->has_modulo( $modulo['id'] ) ) {
				$curso->add_modulo( $modulo['id'], $modulo['position'] );
				continue;
			}
			$curso->update_modulo_position( $modulo['id'], $modulo['position'] );
		}
		echo 'Se ha actualizado la posición de los módulos...';
		wp_die();
	}

	/**
	* Update positions of lessons inside module
	*/
	public function update_position_leccion_modulo(){
		$positions_leccion = $_POST['positions_leccion'];
		$modulo = new YC_Modulo( array( 'id' => $_POST['id_modulo'] ) );
		foreach ( $positions_leccion as $leccion ) {
			if( ! $modulo->has_leccion( $leccion['id'] ) ) {
				$modulo->add_leccion( $leccion['id'], $leccion['position'] );
				continue;
			}
			$modulo->update_leccion_position( $leccion['id'], $leccion['position'] );
		}
		echo 'Se ha actualizado la posición de las lecciones...';
		wp_die();
	}

	/**
	* Remove lesson from module
	*/
	public function remove_leccion_modulo(){
		global $wpdb;
		$modulo = new YC_Modulo( array( 'id' => $_POST['id_modulo'] ) );
		$lesson_id = $_POST['id_leccion'];
		echo $modulo->remove_leccion( $lesson_id );
		wp_die();
	}

	/**
	* Remove module from lessons
	*/
	public function remove_modulo_curso(){
		$curso = new YC_Curso( $_POST['id_curso'] );
		$module_id = $_POST['id_modulo'];
		echo $curso->remove_modulo( $module_id );
		wp_die();
	}

	/**
	* Add teacher to course
	*/
	public function add_maestro_curso(){
		$curso = new YC_Curso( $_POST['id_curso'] );
		$teacher_id = $_POST['id_maestro'];
		echo $curso->add_maestro( $teacher_id );
		wp_die();
	}

	/**
	* Remove teacher from course
	*/
	public function remove_maestro_curso(){
		$curso = new YC_Curso( $_POST['id_curso'] );
		$teacher_id = $_POST['id_maestro'];
		echo $curso->remove_maestro( $teacher_id );
		wp_die();
	}

	/**
	* Add badge to course
	*/
	public function add_badge_curso(){
		$curso = new YC_Curso( $_POST['id_curso'] );
		$badge_id = $_POST['id_badge'];
		echo $curso->add_badge( $badge_id );
		wp_die();
	}

	/**
	* Remove badge from course
	*/
	public function remove_badge_curso(){
		$curso = new YC_Curso( $_POST['id_curso'] );
		$badge_id = $_POST['id_badge'];
		echo $curso->remove_badge( $badge_id );
		wp_die();
	}

	/**
	* Mark a lesson as watched
	*/
	public function mark_lesson_as_watched(){
		error_log('mark_lesson_as_watched');
		$user_id = get_current_user_id();
		$lesson_id = $_POST['lesson_id'];

		if( 0 == $user_id ) wp_die();

		global $wpdb;
		$user_lesson_data = array(
			'user_id'			=> $user_id,
			'lesson_id' 		=> $lesson_id,
			'is_completed'		=> true,
		);
		$wpdb->insert(
			$wpdb->prefix . 'user_lessons',
			$user_lesson_data,
			array( '%d', '%d', '%d' )
		);

		echo $lesson_id;
		wp_die();
	}

	/**
	* Mark a lesson as watched
	*/
	public function save_user_rating(){
		$user_id 	= get_current_user_id();
		$course_id 	= $_POST['course_id'];
		$rating 	= $_POST['rating'];

		if( 0 == $user_id ) wp_die();

		global $wpdb;
		$user_lesson_data = array(
			'course_id'		=> $course_id,
			'user_id'		=> $user_id,
			'rating' 		=> $rating,
		);
		$wpdb->insert(
			$wpdb->prefix . 'user_courses_rating',
			$user_lesson_data,
			array( '%d', '%d', '%d' )
		);
		echo 'Rating guardado...';
		wp_die();
	}

	/**
	* Check if current user has completed the course
	* @return boolean
	*/
	public function is_course_completed(){
		$curso = new YC_Curso( $_POST['course_id'] );
		$msg = array();

		if( $curso->was_completed_by_user( get_current_user_id() ) ) {
			$msg['is_completed'] = 1;
			$msg['message'] = 'Curso completado.';
			echo json_encode( $msg );
			wp_die();
		}
		$msg['is_completed'] = 0;
		$msg['message'] = 'Curso no completado.';
		echo json_encode( $msg );
		wp_die();
	}


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
			'not_found'     => 'No se encontró',
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
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
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
			'not_found'     => 'No se encontró',
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

	private function register_post_type_badges() {
		// Badges
		$labels = array(
			'name'          => 'Badges',
			'singular_name' => 'Badge',
			'add_new'       => 'Nuevo Badge',
			'add_new_item'  => 'Nuevo Badge',
			'edit_item'     => 'Editar Badge',
			'new_item'      => 'Nuevo Badge',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Badge',
			'search_items'  => 'Buscar Badge',
			'not_found'     => 'No se encontro',
			'menu_name'     => 'Badges'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'badges' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'badges', $args );
	}// register_post_type_badges


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

	/**
	* Add metaboxes for "Badges"
	**/
	private function add_meta_boxes_badges(){
		add_meta_box( 'info_badges', 'Información Adicional', array( $this, 'meta_box_info_badges' ), 'badges', 'advanced', 'high' );
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
		$full_module = get_post_meta($post->ID, '_full_module_meta', true);
		$lesson_duration = get_post_meta($post->ID, '_lesson_duration_meta', true);

		wp_nonce_field(__FILE__, '_vimeo_url_meta_nonce');
		wp_nonce_field(__FILE__, '_soundcloud_url_meta_nonce');
		wp_nonce_field(__FILE__, '_is_free_meta_nonce');
		wp_nonce_field(__FILE__, '_lesson_duration_meta_nonce');

		echo "<label><strong>Duración (minutos)</strong><br><small>Ejemplo: 120</small></label>";
		echo "<input type='text' class='[ widefat ]' name='_lesson_duration_meta' value='$lesson_duration'><br /><br />";
		echo "<label><strong>URL Vimeo</strong><br><small>Ejemplo: https://vimeo.com/171807697</small></label>";
		echo "<input type='text' class='[ widefat ]' name='_vimeo_url_meta' value='$vimeo_url'><br /><br />";
		echo "<label><strong>URL SoundCloud</strong><br><small>Ejemplo: https://soundcloud.com/miguel-cabral-alcocer/children-of-the-forest-stolen-edit-mc-alcocer </small></label>";
		echo "<input type='text' class='[ widefat ]' name='_soundcloud_url_meta' value='$soundcloud_url'><br /><br />";
		$checked_free = $is_free == 1 ? 'checked' : '';
		echo "<input type='checkbox' class='[ widefat ]' name='_is_free_meta' value=1 $checked_free />";
		echo "<label> Activar si esta lección puede estar disponible de manera gratuita.</label><br /><br />";
		$checked_full = $full_module == 1 ? 'checked' : '';
		echo "<input type='checkbox' class='[ widefat ]' name='_full_module_meta' value=1 $checked_full />";
		echo "<label> Activar si esta lección puede estar disponible de manera gratuita.</label>";
	}// meta_box_info_leccion

	/**
	* Display meta_boxes for post type "Badge"
	* @param obj $post
	**/
	public function meta_box_info_badges( $post ){
		$points = get_post_meta($post->ID, '_points_meta', true);

		wp_nonce_field(__FILE__, '_points_meta_nonce');

		echo "<label><strong>Puntos</strong></label>";
		echo "<input type='number' class='[ widefat ]' name='_points_meta' value='$points'><br><br>";
	}// meta_box_info_badges


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
		// Duración
		if ( isset($_POST['_lesson_duration_meta']) and check_admin_referer( __FILE__, '_lesson_duration_meta_nonce') ){
			update_post_meta($post_id, '_lesson_duration_meta', $_POST['_lesson_duration_meta']);
		}
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

	/**
	* Save the metaboxes for post type "lecciones"
	**/
	private function save_meta_boxes_badges( $post_id ){
		if ( isset($_POST['_points_meta']) and check_admin_referer( __FILE__, '_points_meta_nonce') ){
			update_post_meta($post_id, '_points_meta', $_POST['_points_meta']);
		}
	}// save_meta_boxes_badges


	/******************************************
	* CUSTOM TAXONOMIES
	******************************************/

	private function register_taxonomy_modulos() {
		// MÓDULOS
		if( ! taxonomy_exists('modulos')){

			$labels = array(
				'name'              => 'Módulos',
				'singular_name'     => 'Módulo',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Módulo',
				'update_item'       => 'Actualizar Módulo',
				'add_new_item'      => 'Nueva Módulo',
				'new_item_name'     => 'Nombre Nueva Módulo',
				'menu_name'         => 'Módulos'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_menu'		=> false,
				'show_in_nav_menus' => false,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'modulos' ),
			);
			register_taxonomy( 'modulos', 'product', $args );
		}
	}

	private function register_taxonomy_lecciones() {
		if( ! taxonomy_exists('lecciones')){

			$labels = array(
				'name'              => 'Lecciones',
				'singular_name'     => 'Lección',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Lección',
				'update_item'       => 'Actualizar Lección',
				'add_new_item'      => 'Nueva Lección',
				'new_item_name'     => 'Nombre Nueva Lección',
				'menu_name'         => 'Lecciones'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_menu'		=> false,
				'show_in_nav_menus' => false,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'lecciones' ),
			);
			register_taxonomy( 'lecciones', 'modulos', $args );
		}
	}// register_taxonomy_lecciones

	private function register_taxonomy_maestros() {
		if( ! taxonomy_exists('maestros')){
			$labels = array(
				'name'              => 'Maestros',
				'singular_name'     => 'Maestro',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Maestro',
				'update_item'       => 'Actualizar Maestro',
				'add_new_item'      => 'Nueva Maestro',
				'new_item_name'     => 'Nombre Nueva Maestro',
				'menu_name'         => 'Maestros'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_menu'		=> false,
				'show_in_nav_menus' => false,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'maestros' ),
			);
			register_taxonomy( 'maestros', 'product', $args );
		}
	}// register_taxonomy_maestros

	/**
	 * Insert all Módulos as taxonomy term for Product.
	 * @param obj $post
	 **/
	private function insert_custom_taxonomy_term( $post_type ){
		global $wpdb;

		$results = $wpdb->get_results( 'SELECT trim(post_title) as post_title from ' . $wpdb->prefix . 'posts where post_type = "' . $post_type . '" AND post_title not in ( SELECT name FROM ' . $wpdb->prefix . 'terms T INNER JOIN ' . $wpdb->prefix . 'term_taxonomy TT ON T.term_id = TT.term_id WHERE TT.taxonomy = "' . $post_type . '" ) AND post_status = "publish"', OBJECT );

		foreach ($results as $modulo) {
			$term = term_exists($modulo->post_title, $post_type );
			if ($term !== 0 && $term !== null) continue;

			wp_insert_term($modulo->post_title, $post_type );
		}// foreach

	}// insert_custom_taxonomy_term

}// YC_Admin_Cursos_Settings




