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
	private $video_info = array();
	private $soundcloud_url;
	private $is_free;
	private $client_id;
	private $client_secret;
	private $access_token;

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

		$this->id 				= $lecciones_query->ID;
		$this->name 			= $lecciones_query->post_title;
		$this->description 		= $lecciones_query->post_content;
		$this->short_description 		= $lecciones_query->post_excerpt;
		$this->permalink 		= get_permalink( $lecciones_query->ID );
		$this->soundcloud_url 	= get_post_meta( $lecciones_query->ID, '_soundcloud_url_meta', true );
		$this->is_free 			= get_post_meta( $lecciones_query->ID, '_is_free_meta', true) ;

		// Cursos Staging WP
		$this->client_id = '9a45f811df05a8d29551a2e9c62e4addb9bcb463';
		$this->client_secret = 'ys69OVgvM7oPNJNePlM74NRmUCv6Be1x5tHpKIm0RFY8M9wJVvI1Fzss5kJeNkGmxcligGGkIWwwycPT/gwz1XyaNIoz+YjjvGx3rxXD86cZK0nK2makXYHA2s3nQKUv';
		$this->access_token = 'c98f74a25649baa4d5ecd430f9a64512';
		// Cursos Dev
		$this->client_id = '63047a064a58c6025c48a65d4a2dc5f9925c8f0b';
		$this->client_secret = 'fwzqOVXD31YrcgoQxHa+BCkLSg/WBycBfrSKny13Ibb6oObVmuBEf8azGFMulDEwGJOnCNtC9rNL0st8hdCK8yuV1QCRt1R0OMEDmTRBiXAZPdG+AvbTKpAG/kGMPYep';
		$this->access_token = 'e20734e9d20cdfa5a53a371ad3f54070';

		$this->hooks();
	}

	/**
	* Get $soundcloud_url
	*/
	public function get_soundcloud_url(){
		return $this->soundcloud_url;
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
					var yc_lesson = new YogaCloudVideo( <?php echo $this->id ?>, player, <?php echo $has_been_watched; ?> );
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
		add_action( 'wp_ajax_nopriv_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		add_action( 'wp_ajax_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		add_action( 'wp_footer', array( $this, 'init_lesson_video_js' ) );
	}

	/**
	 * Return information about the lessons's video, if any
	 * @return array $info
	 */
	public function get_video_info(){
		$video_url = get_post_meta( $this->id, '_vimeo_url_meta', true );
		if( empty( $video_url ) ) return array();

		$video_vimeo_id = explode( 'vimeo.com/', $video_url )[1];
		$lib = $this->get_vimeo_lib();
		$vimeo_response = $lib->request( '/me/videos/' . $video_vimeo_id, array(), 'GET' );

		if( ! isset( $vimeo_response['body']['embed'] ) ){
			error_log( 'no jala dev' );
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

}// YC_Leccion

