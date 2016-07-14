<?php
/**
 * Curso YogaCloud.
 *
 * This class represent a course in the platform. 
 *
 * @since 1.0.0
 */
require_once("vimeo-php/autoload.php");
require_once("class-yc_modulo.php");
require_once("class-yc_maestro.php");

define( 'VIMEO_CLIENT_ID_STAGE', '9a45f811df05a8d29551a2e9c62e4addb9bcb463' );
define( 'VIMEO_CLIENT_SECRET_STAGE', 'ys69OVgvM7oPNJNePlM74NRmUCv6Be1x5tHpKIm0RFY8M9wJVvI1Fzss5kJeNkGmxcligGGkIWwwycPT/gwz1XyaNIoz+YjjvGx3rxXD86cZK0nK2makXYHA2s3nQKUv' );
define( 'VIMEO_CLIENT_TOKEN_STAGE', '120cde323887dd586bf5a97173f62a7e' );
define( 'VIMEO_CLIENT_ID_DEV', '63047a064a58c6025c48a65d4a2dc5f9925c8f0b' );
define( 'VIMEO_CLIENT_SECRET_DEV', 'fwzqOVXD31YrcgoQxHa+BCkLSg/WBycBfrSKny13Ibb6oObVmuBEf8azGFMulDEwGJOnCNtC9rNL0st8hdCK8yuV1QCRt1R0OMEDmTRBiXAZPdG+AvbTKpAG/kGMPYep' );
define( 'VIMEO_CLIENT_TOKEN_DEV', '4241e8adccd0229fae229401b587da6f' );

class YC_Curso {

	public $id;
	public $description;
	public $num_lessons; 
	public $lessons_per_week; 
	public $hours; 
	public $is_coming_soon; 
	public $is_new;
	private $trailer_info = array(); 
	
	/**
	 * Constructor
	 */
	public function __construct( $course_id ) {
		$this->id 				= $course_id;
 		$this->num_lessons 		= get_post_meta( $course_id, '_num_lessons', true );
		$this->lessons_per_week = get_post_meta( $course_id, '_lessons_per_week', true );
		$this->hours 			= get_post_meta( $course_id, '_hours', true );
		$this->is_coming_soon 	= get_post_meta( $course_id, '_coming_soon', true );
		$this->is_new			= $this->is_new();
		$this->hooks();
	}

	/**
	* Return all Módulos from the course
	* @return array $modulos
	*/
	public function get_modulos(){
		global $wpdb;
		$modulos = array();

		$modulos_results = $wpdb->get_results(
			"SELECT module_id FROM " . $wpdb->prefix . "courses_modules WHERE course_id = " . $this->id . " ORDER BY position"  
			);
		if( empty( $modulos_results ) ) return $modulos;

		foreach ( $modulos_results as $key => $result ) $modulos[$key] = new YC_Modulo( array( 'id' => $result->module_id ) );

		return $modulos;
	}

	/**
	* Return all Módulos from the course (taken from taxonomy "módulos")
	* @return array $modulos
	*/
	public function get_modulos_from_terms(){
		$modulos = array();
		$modulos_terms = wp_get_post_terms( $this->id, 'modulos' );
		if( empty( $modulos_terms ) ) return $modulos;
		foreach ( $modulos_terms as $key => $modulo_term ) $modulos[$key] = new YC_Modulo( array( 'name' => $modulo_term->name ) );
		return $modulos;
	}

	/**
	* Get course name
	* @return array $name
	*/
	public function get_name(){
		$curso_query = get_post( $this->id );
		return $curso_query->post_title;
	}

	/**
	* Get course name
	* @return array $name
	*/
	public function get_short_description(){
		$curso_query = get_post( $this->id );
		return get_the_excerpt();
	}

	/**
	* Get course permalink
	* @return array $permalink
	*/
	public function get_permalink(){
		return get_permalink( $this->id );
	}

	/**
	* Get course thumbnail
	* @param string $class
	* @return array $permalink
	*/
	public function get_thumbnail( $class ){
		return get_the_post_thumbnail( $this->id , 'thumbnail', array('class'=> $class ) );
	}

	/**
	* Return the progress in the course by a given user
	* @param int $user_id
	* @return int $progress
	*/
	public function get_progress_by_user( $user_id ){
		if( 0 == $user_id ) return 0;

		$modulos = $this->get_modulos();
		if( 0 == count( $modulos ) ) return 0;

		$progress_by_modulo = 0;
		foreach ( $modulos as $key => $modulo ) $progress_by_modulo += $modulo->get_progress_by_user( $user_id );

		return ceil( $progress_by_modulo / count( $modulos ) );
	}

	/**
	* Check if a given user has bought a course
	* @param int $user_id
	* @return boolean
	*/
	public function was_bought_by_user( $user_id ){
		if( 0 == $user_id ) return 0;

        $current_user= wp_get_current_user();
        $customer_email = $current_user->email;
        if ( wc_customer_bought_product( $customer_email, $user_id, $this->id ) ) return true;
        
		return false;		
	}

	/**
	* Check if course is new
	* @return boolean
	*/
	public function is_new(){
		return 1;
	}

	/**
	 * Return all Módulos from the course
	 * @param string $name
	 * @return array $modulo
	*/
	private function get_modulo_by_name( $name ){
		$modulo_query = get_page_by_title( $name, OBJECT, 'modulos' );
		if( empty( $modulo_query ) ) return array();

		return array(
			'id'			=> $modulo_query->ID,
			'name'			=> $modulo_query->post_title,
			'description'	=> $modulo_query->post_content,
			'permalink'		=> get_permalink( $modulo_query->ID ),
			'lessons'		=> get_lesso
		);
	}

	/**
	* Return all Maestros from the course
	* @return array $maestros
	*/
	public function get_maestros(){
		$maestros = array();
		$maestros_terms = wp_get_post_terms( $this->id, 'maestros' );
		if( empty( $maestros_terms ) ) return $maestros;

		foreach ( $maestros_terms as $key => $maestro_term ) $maestros[$key] = new YC_Maestro( array( 'name' => $maestro_term->name ) );

		return $maestros;
	}

	/**
	* Initialize video player for course
	*/
	public function init_course_trailer_js() {
		if ( ! is_curso( get_the_id() ) ) return;

		?><script type='text/javascript'>
			jQuery( document ).ready( function() {
				var iframe = $('.video-container iframe')[0];
				if( 'undefined' != typeof iframe ){
					var player = new Vimeo.Player(iframe);
					var yc_course = new YogaCloudVideo( <?php echo $this->id ?>, player, true );
					yc_course._init();
				}
			});
		</script><?php
	}

	/**
	* Check if a module exists in the course
	* @param int $module_id 
	* @return boolean
	*/
	public function has_modulo( $module_id ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT module_id FROM " . $wpdb->prefix . "courses_modules WHERE module_id =" . $module_id . " AND course_id = " . $this->id, "ARRAY_A" );
	}

	/**
	* Add module to course 
	* @param int $module_id 
	* @param int $position
	* @return boolean
	*/
	public function add_modulo( $module_id, $position=-1 ) {
		global $wpdb;

		$module_data = array(
			'course_id'	=> $this->id,
			'module_id'	=> $module_id,
			'position'	=> $position,
		);
		$wpdb->insert(
			$wpdb->prefix . 'courses_modules',
			$module_data,
			array( '%s' )
		);
		return $wpdb->insert_id;
	}

	/**
	* Update position of module
	* @param int $module_id 
	* @param int $position
	* @return boolean
	*/
	public function update_modulo_position( $module_id, $position ) {
		global $wpdb;

		$module_data = array( 'position'=> $position );
		$where = array(
			'module_id'	=> $module_id,
			'course_id' => $this->id,
		);
		$wpdb->update(
			$wpdb->prefix . 'courses_modules',
			$module_data,
			$where,
			array( '%d', '%d' )
		);
		error_log( $wpdb->last_query );
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		//add_action( 'wp_ajax_nopriv_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		//add_action( 'wp_ajax_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		add_action( 'wp_footer', array( $this, 'init_course_trailer_js' ) );
	}	

	/**
	 * Return information about the course's trailer, if any
	 * @return array $info
	 */
	public function get_trailer_info(){
		$trailer_url = get_post_meta( $this->id, '_vimeo_url', true );
		if( empty( $trailer_url ) ) return array();

		$trailer_vimeo_id = explode( 'vimeo.com/', $trailer_url )[1]; 
		$lib = $this->get_vimeo_lib();  
		$vimeo_response = $lib->request('/me/videos/' . $trailer_vimeo_id . '?fields=embed.html,pictures.sizes' , array(), 'GET');

		if( ! isset( $vimeo_response['body']['embed'] ) ){
			error_log( 'no jala dev' );
			$lib = $this->get_vimeo_lib( 'stage' );  
			$vimeo_response = $lib->request('/me/videos/' . $trailer_vimeo_id . '?fields=embed.html,pictures.sizes' , array(), 'GET');
		}

		if( ! isset( $vimeo_response['body']['embed'] ) ){
			error_log( 'no jala stage' );
			return array();
		}

		$info = array(
			'iframe' 	=> $vimeo_response['body']['embed']['html'],
			'thumbnail' => $vimeo_response['body']['pictures']['sizes'][5]['link'],
		);
		return $info;
	}

	/**
	 * Return an instance of Vimeo lib
	 * @return Vimeo $lib
	 */
	private function get_vimeo_lib( $env = 'dev' ){
		if( 'dev' == $env ){
			$lib = new \Vimeo\Vimeo( VIMEO_CLIENT_ID_DEV, VIMEO_CLIENT_SECRET_DEV );
			$lib->setToken( VIMEO_CLIENT_TOKEN_DEV );
		} else {
			$lib = new \Vimeo\Vimeo( VIMEO_CLIENT_ID_STAGE, VIMEO_CLIENT_SECRET_STAGE );
			$lib->setToken( VIMEO_CLIENT_TOKEN_STAGE );
		}
		return $lib;
	}


	/**
	 * Return an instance of Vimeo lib
	 * @return Vimeo $lib
	 */
	public static function get_cursos(){
		$cursos = array();
		$args = array(
	        'post_type' => 'product',
	        'posts_per_page' => -1,
	        'tax_query' => array(
		        array(
		            'taxonomy' => 'product_type',
		            'field'    => 'slug',
		            'terms'    => 'simple_course', 
		        ),
		    ),
	   	);
		$cursos_query = new WP_Query( $args );
	    if ( ! $cursos_query->have_posts() ) return $cursos;
	    
	    while ( $cursos_query->have_posts() ) : $cursos_query->the_post(); 
	    	$curso = new YC_Curso( $cursos_query->post->ID );
			array_push( $cursos, $curso );
		endwhile; wp_reset_postdata();
		return $cursos;
	}

	/**
	* Remove lección fromm módulo
	* @param int $module_id 
	* @return int|false
	*/
	public function remove_modulo( $module_id ) {
		global $wpdb;

		$where = array(
			'module_id'	=> $module_id,
			'course_id' => $this->id,
		);
		return $wpdb->delete(
			$wpdb->prefix . 'courses_modules',
			$where,
			array( '%d', '%d' )
		);
	}

}// YC_Curso

