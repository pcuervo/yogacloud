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
require_once("class-yc_badge.php");

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
	public $name;
	public $subtitle;
	public $permalink;
	private $trailer_info = array();

	/**
	 * Constructor
	 */
	public function __construct( $course_id ) {
		$this->id 				= $course_id;
		$this->permalink 		= get_permalink( $course_id );
 		$this->num_lessons 		= get_post_meta( $course_id, '_num_lessons', true );
		$this->lessons_per_week = get_post_meta( $course_id, '_lessons_per_week', true );
		$this->hours 			= get_post_meta( $course_id, '_hours', true );
		$this->is_coming_soon 	= get_post_meta( $course_id, '_coming_soon', true );
		$this->is_new			= $this->is_new();
		$this->subtitle			= get_post_meta( $course_id, '_subtitle', true );
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
	* Return all lessons from the course
	* @param bool $exclude_full_modules
	* @return array $lecciones
	*/
	public function get_lecciones( $exclude_full_modules=false ){
		$lecciones = array();
		foreach ($this->get_modulos() as $modulo ) {
			foreach ( $modulo->get_lecciones( $exclude_full_modules ) as $leccion ) {
				array_push( $lecciones, $leccion );
			}
		}
		return $lecciones;
	}

	/**
	* Return number of Módulos in the course
	* @return int $num_modulos
	*/
	public function get_num_modulos(){
		global $wpdb;
		$modulos_results = $wpdb->get_results(
			"SELECT module_id FROM " . $wpdb->prefix . "courses_modules WHERE course_id = " . $this->id . " ORDER BY position"
			);
		if( empty( $modulos_results ) ) return 0;

		return count( $modulos_results );
	}

	/**
	* Return number of Lecciones in the course
	* @return int $num_lecciones
	*/
	public function get_num_lecciones(){
		$lecciones = 0;
		foreach ($this->get_modulos() as $modulo ) {
			$lecciones += $modulo->get_num_lecciones();
		}
		return $lecciones;
	}

	/**
	* Return Maestros in the course
	* @return int $maestros
	*/
	public function get_maestros(){
		global $wpdb;
		$maestros = array();
		$maestros_results = $wpdb->get_results(
			"SELECT teacher_id FROM " . $wpdb->prefix . "courses_teachers WHERE course_id = " . $this->id
			);
		if( empty( $maestros_results ) ) return $maestros;

		foreach ( $maestros_results as $key => $result ) $maestros[$key] = new YC_Maestro( $result->teacher_id );

		return $maestros;
	}

	/**
	* Return Badges in the course
	* @return int $badges
	*/
	public function get_badges(){
		global $wpdb;
		$badges = array();
		$badges_results = $wpdb->get_results(
			"SELECT badge_id FROM " . $wpdb->prefix . "courses_badges WHERE course_id = " . $this->id
			);
		if( empty( $badges_results ) ) return $badges;

		foreach ( $badges_results as $key => $result ) $badges[$key] = new YC_Badge( $result->badge_id );

		return $badges;
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

		$completed_lessons = 0;
		foreach ( $modulos as $modulo ) $completed_lessons += $modulo->get_completed_lessons( $user_id );

		$exclude_full_modules = true;
		return ceil( $completed_lessons / count( $this->get_lecciones( $exclude_full_modules ) ) * 100 );
	}

	/**
	* Return the rating given by a user
	* @param array $user_id
	* @return boolean
	*/
	public function get_user_rating( $user_id ){
		global $wpdb;

		$rating_results = $wpdb->get_results(
			"SELECT rating FROM " . $wpdb->prefix . "user_courses_rating WHERE course_id = " . $this->id
			);
		if( empty( $rating_results ) ) return 0;

		//foreach ( $rating_results as $key => $result ) $rating[$key] = new YC_Modulo( array( 'id' => $result->module_id ) );

		return $rating_results[0]->rating;
	}

	/**
	* Return the average rating of a course
	* @param array $user_id
	* @return boolean
	*/
	public function get_ratings(){
		global $wpdb;
		$average_rating = 0;
		$rating_total = 0;
		$count_rating = 0;
		$rating_results = $wpdb->get_results(
			"SELECT rating FROM " . $wpdb->prefix . "user_courses_rating WHERE course_id = " . $this->id
			);
		if( empty( $rating_results ) ) return 0;

		$count_rating = count($rating_results );

		foreach( $rating_results as $rating_result ){
			$rating_total += intval($rating_result->{'rating'});
		}

		$average_rating = ceil($rating_total / $count_rating);

		return $average_rating;
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
	* Check if a given user has seen a course
	* @param int $user_id
	* @return boolean
	*/
	public function was_completed_by_user( $user_id ){
		if( 0 == $user_id ) return 0;

        foreach ( $this->get_lecciones() as $lesson ) {
        	if( $lesson->is_full_module ) continue;

        	if( ! $lesson->has_been_watched_by_user( $user_id ) ) return false;
        }
		return true;
	}

	/**
	* Assign a badge to a user
	* @param int $user_id
	*/
	public function give_badge_to_user( $user_id ){
		global $wpdb;
		$badges = $this->get_badges();
		if( empty( $badges) ) return;

		$module_data = array(
			'badge_id'		=> $badges[0]->id,
			'user_id'		=> $user_id,
			'coupon_code'	=> 'xyz',
		);
		$wpdb->insert(
			$wpdb->prefix . 'user_badges',
			$module_data,
			array( '%d', '%d', '%s' )
		);
		error_log('assigning badge..');
		return $wpdb->insert_id;
	}

	/**
	* Check if course is new
	* @return boolean
	*/
	public function is_new(){
		$curso_query = get_post( $this->id );
		$time_now = date("Y-m-d");
		$time_difference = round( ( strtotime( $time_now ) - strtotime( $curso_query->post_date ) )  / ( 60 * 60 * 24 ), 2 );
		if( 60 > $time_difference ) return 1;

		return 0;
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
		);
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
					var yc_course = new YogaCloudVideo( <?php echo $this->id ?>, <?php echo $this->id ?>, <?php echo $this->id ?>, player, true );
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
	* Check if a teacher exists in the course
	* @param int $teacher_id
	* @return boolean
	*/
	public function has_maestro( $teacher_id ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT teacher_id FROM " . $wpdb->prefix . "courses_teachers WHERE teacher_id =" . $teacher_id . " AND course_id = " . $this->id, "ARRAY_A" );
	}

	/**
	* Check if a badge exists in the course
	* @param int $badge_id
	* @return boolean
	*/
	public function has_badge( $badge_id ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT badge_id FROM " . $wpdb->prefix . "courses_badges WHERE badge_id =" . $badge_id . " AND course_id = " . $this->id, "ARRAY_A" );
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

	/**
	* Add teacher to course
	* @param int $teacher_id
	* @return boolean
	*/
	public function add_maestro( $teacher_id ) {
		global $wpdb;

		$teacher_data = array(
			'course_id'		=> $this->id,
			'teacher_id'	=> $teacher_id,
		);
		$wpdb->insert(
			$wpdb->prefix . 'courses_teachers',
			$teacher_data,
			array( '%d', '%d' )
		);
		return $wpdb->insert_id;
	}

	/**
	* Remove maestro from curso
	* @param int $teacher_id
	* @return int|false
	*/
	public function remove_maestro( $teacher_id ) {
		global $wpdb;

		$where = array(
			'teacher_id'	=> $teacher_id,
			'course_id' => $this->id,
		);
		return $wpdb->delete(
			$wpdb->prefix . 'courses_teachers',
			$where,
			array( '%d', '%d' )
		);
	}

	/**
	* Add badge to course
	* @param int $badge_id
	* @return boolean
	*/
	public function add_badge( $badge_id ) {
		global $wpdb;

		$badge_data = array(
			'course_id'		=> $this->id,
			'badge_id'	=> $badge_id,
		);
		$wpdb->insert(
			$wpdb->prefix . 'courses_badges',
			$badge_data,
			array( '%d', '%d' )
		);
		return $wpdb->insert_id;
	}

	/**
	* Remove badge from course
	* @param int $badge_id
	* @return int|false
	*/
	public function remove_badge( $badge_id ) {
		global $wpdb;

		$where = array(
			'badge_id'	=> $badge_id,
			'course_id' => $this->id,
		);
		return $wpdb->delete(
			$wpdb->prefix . 'courses_badges',
			$where,
			array( '%d', '%d' )
		);
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

}// YC_Curso

