<?php
/**
 * Lección YogaCloud.
 *
 * This class represent a course in the platform.
 *
 * @since 1.0.0
 */

class YC_Leccion {

	public $id;
	public $name;
	public $description;
	public $short_description;
	public $permalink;
	public $length;
	private $video_info = array();
	private $soundcloud_url;
	private $is_free;
	private $curso_id;

	/*****************
	* PUBLIC METHODS
	*****************/
	/**
	 * Constructor
	 */
	public function __construct( $args ) {
		if( isset( $args['name'] ) ){
			$lecciones_query = get_page_by_title( $args['name'], OBJECT, 'lecciones' );
		} else {
			$lecciones_query = get_post( $args['id'], OBJECT, 'lecciones' );
		}

		$this->id 					= $lecciones_query->ID;
		$this->name 				= $lecciones_query->post_title;
		$this->description 			= $lecciones_query->post_content;
		$this->short_description 	= $lecciones_query->post_excerpt;
		$this->permalink 			= get_permalink( $lecciones_query->ID );
		$this->soundcloud_url 		= get_post_meta( $lecciones_query->ID, '_soundcloud_url_meta', true );
		$this->is_free 				= get_post_meta( $lecciones_query->ID, '_is_free_meta', true);
		$this->length 				= get_post_meta( $lecciones_query->ID, '_length_meta', true);

		$this->hooks();
	}

	/**
	* Get $soundcloud_url
	*/
	public function get_soundcloud_url(){
		return $this->soundcloud_url;
	}

	/**
	* Get $is_free
	*/
	public function is_free(){
		return $this->is_free;
	}

	/**
	* Get $length
	*/
	public function length(){
		return $this->length;
	}

	/**
	* Initialize video player for lesson
	*/
	public function init_lesson_video_js() {
		if ( 'lecciones' != get_post_type() ) return;

		$has_been_watched = $this->has_been_watched_by_user( get_current_user_id() );
		?>
		<script type='text/javascript'>
			jQuery( document ).ready( function() {
				var iframe = $('.video-container iframe')[0];
				if( 'undefined' != typeof iframe ){
					var player = new Vimeo.Player(iframe);
					var yc_lesson = new YogaCloudVideo( <?php echo $this->curso_id ?>, <?php echo $this->id ?>, player, <?php echo $has_been_watched; ?> );
					yc_lesson._init();
				}
			});
		</script><?php
	}

	/**
	 * Mark lesson as watched
	 */
	public function mark_lesson_as_watched(){
		error_log('saving as watched...');
		echo 1;
		wp_die();
	}

	/**
	* Check if current lesson has been watched by the current user.
	*/
	public function has_been_watched_by_user( $user_id ) {
		global $wpdb;
		$result = $wpdb->get_row( "SELECT is_completed FROM " . $wpdb->prefix . "user_lessons WHERE lesson_id =" . $this->id . " AND user_id = " . $user_id, ARRAY_A );
		if( empty( $result ) ) return 0;

		return 1;
	}


	/*****************
	* PRIVATE METHODS
	*****************/

	/**
	* Check if a lesson exists in the module
	* @param int $lesson_id
	* @return boolean
	*/
	public function get_position( $module_id ) {
		global $wpdb;
		$results = $wpdb->get_row( "SELECT position FROM " . $wpdb->prefix . "modules_lessons WHERE lesson_id =" . $this->id . " AND module_id = " . $module_id, "ARRAY_A" );
		if( empty( $results) ) return -1;

		return $results['position'];
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		// wp_localize_script( 'yoga_cloud_course', 'ajax_url', admin_url('admin-ajax.php') );
		// wp_localize_script( 'jquery', 'ajax_url', admin_url('admin-ajax.php') );
		// add_action( 'wp_ajax_nopriv_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		// add_action( 'wp_ajax_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
	}

	/**
	 * Return information about the lessons's video, if any
	 * @return array $info
	 */
	public function get_video_info(){
		$video_url = get_post_meta( $this->id, '_vimeo_url_meta', true );
		if( empty( $video_url ) ) return array();

		add_action( 'wp_footer', array( $this, 'init_lesson_video_js' ) );

		$video_vimeo_id = explode( 'vimeo.com/', $video_url )[1];
		$lib = $this->get_vimeo_lib();
		$vimeo_response = $lib->request( '/me/videos/' . $video_vimeo_id, array(), 'GET' );

		if( ! isset( $vimeo_response['body']['embed'] ) ){
			error_log( 'no jala dev' );
			var_dump( $vimeo_response );
			$lib = $this->get_vimeo_lib( 'stage' );
			$vimeo_response = $lib->request('/me/videos/' . $video_vimeo_id . '?fields=embed.html,pictures.sizes' , array(), 'GET');
		}

		if( ! isset( $vimeo_response['body']['embed'] ) ){
			var_dump( $vimeo_response );
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
	 * Return all lessons
	 * @return array YC_Lesson
	 */
	public static function get_lecciones(){
		$lessons = array();
		$args = array(
	        'post_type' => 'lecciones',
	        'posts_per_page' => -1,
	   	);
		$lessons_query = new WP_Query( $args );
	    if ( ! $lessons_query->have_posts() ) return $lessons;

	    while ( $lessons_query->have_posts() ) : $lessons_query->the_post();
	    	$curso = new YC_Leccion( array( 'id' => $lessons_query->post->ID ) );
			array_push( $lessons, $curso );
		endwhile; wp_reset_postdata();
		return $lessons;
	}

	/**
	* Set the id for the course the lesson belongs to
	* @param int $course_id
	*/
	public function set_curso_id( $curso_id ) {
		$this->curso_id = $curso_id;
	}

}// YC_Leccion

