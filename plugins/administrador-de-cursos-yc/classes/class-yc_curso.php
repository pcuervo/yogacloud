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

class YC_Curso {

	public $id;
	public $short_description;
	public $description;
	public $num_lessons; 
	public $lessons_per_week; 
	public $hours; 
	public $trailer_info = array();

	/**
	 * Constructor
	 */
	public function __construct( $course_id ) {
		$this->id 				= $course_id;
		//$this->name 			= $curso_query->post_title;
 		$this->num_lessons 		= get_post_meta( $course_id, '_num_lessons', true );
		$this->lessons_per_week = get_post_meta( $course_id, '_lessons_per_week', true );
		$this->hours 			= get_post_meta( $course_id, '_hours', true );
		$this->trailer_info		= $this->get_trailer_info();

		$this->hooks();
	}

	 
	/**
	* Return all Módulos from the course
	* @return array $modulos
	*/
	public function get_modulos(){
		$modulos = array();
		$modulos_terms = wp_get_post_terms( $this->id, 'modulos' );
		if( empty( $modulos_terms ) ) return $modulos;

		//foreach ( $modulos_terms as $key => $modulo_term ) $modulos[$key] = $this->get_modulo_by_name( $modulo_term->name );
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
		if ( empty( $this->trailer_info ) ) return;

		?><script type='text/javascript'>
			jQuery( document ).ready( function() {
				console.log( '<?php echo $this->trailer_info['iframe'] ?>' );
				// jQuery( '.inventory_options' ).addClass( 'show_if_simple_course' ).show();
				var iframe = $('.video-container iframe')[0];
				var player = new Vimeo.Player(iframe);
				var yc_course = new YogaCloudCourse( player, true );
				yc_course._init();
			});
		</script><?php
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
	private function get_trailer_info(){
		$trailer_url = get_post_meta( $this->id, '_vimeo_url', true );
		if( empty( $trailer_url ) ) return array();

		$trailer_vimeo_id = explode( 'vimeo.com/', $trailer_url )[1]; 
		$lib = $this->get_vimeo_lib();  
		$vimeo_response = $lib->request('/me/videos/' . $trailer_vimeo_id, array(), 'GET');

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
	private function get_vimeo_lib(){
		$client_id = '63047a064a58c6025c48a65d4a2dc5f9925c8f0b';
		$client_secret = 'fwzqOVXD31YrcgoQxHa+BCkLSg/WBycBfrSKny13Ibb6oObVmuBEf8azGFMulDEwGJOnCNtC9rNL0st8hdCK8yuV1QCRt1R0OMEDmTRBiXAZPdG+AvbTKpAG/kGMPYep';
		$lib = new \Vimeo\Vimeo($client_id, $client_secret);
		$access_token = '44c1e916b341de354e5a3e25a3181dbb';
		$lib->setToken( $access_token );
		return $lib;
	}

}// YC_Curso

