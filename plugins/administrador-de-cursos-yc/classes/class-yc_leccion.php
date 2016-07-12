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
	public $permalink;
	public $video_info = array();
	private $soundcloud_url;
	private $is_free;

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
		$this->permalink 		= get_permalink( $lecciones_query->ID );
		$this->soundcloud_url 	= get_post_meta( $lecciones_query->ID, '_soundcloud_url_meta', true );
		$this->is_free 			= get_post_meta( $lecciones_query->ID, '_is_free_meta', true) ;
		$this->video_info		= $this->get_video_info();

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
		if ( empty( $this->video_info ) || 'lecciones' != get_post_type() ) return;

		$has_been_watched = $this->has_been_watched_by_user( get_current_user_id() );
		?>
		<script type='text/javascript'>
			jQuery( document ).ready( function() {
				var iframe = $('.video-container iframe')[0];
				var player = new Vimeo.Player(iframe);
				var yc_lesson = new YogaCloudVideo( <?php echo $this->id ?>, player, <?php echo $has_been_watched; ?> );
				yc_lesson._init();
				//yc_lesson.markAsWatched();
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
	private function get_video_info(){
		$video_url = get_post_meta( $this->id, '_vimeo_url_meta', true );
		if( empty( $video_url ) ) return array();

		$video_vimeo_id = explode( 'vimeo.com/', $video_url )[1]; 
		$lib = $this->get_vimeo_lib();  
		$vimeo_response = $lib->request( '/me/videos/' . $video_vimeo_id, array(), 'GET' );

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
		$client_id = '9a45f811df05a8d29551a2e9c62e4addb9bcb463';
		$client_secret = 'ys69OVgvM7oPNJNePlM74NRmUCv6Be1x5tHpKIm0RFY8M9wJVvI1Fzss5kJeNkGmxcligGGkIWwwycPT/gwz1XyaNIoz+YjjvGx3rxXD86cZK0nK2makXYHA2s3nQKUv';
		$lib = new \Vimeo\Vimeo($client_id, $client_secret);
		$access_token = 'c98f74a25649baa4d5ecd430f9a64512';
		$lib->setToken( $access_token );
		return $lib;
	}

}// YC_Leccion

 