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
	private $video_info;
	private $soundcloud_url;
	private $is_free;

	/*****************
	* PUBLIC METHODS
	*****************/
	/**
	 * Constructor
	 */
	public function __construct( $args ) {
		if( $args['name'] ){
			$lecciones_query = get_page_by_title( $args['name'], OBJECT, 'lecciones' );
		} else {
			$lecciones_query = get_post( $args['id'], OBJECT, 'lecciones' );
		}

		$this->id = $lecciones_query->ID;
		$this->name = $lecciones_query->post_title;
		$this->description = $lecciones_query->post_content;
		$this->permalink = get_permalink( $lecciones_query->ID );
		$this->soundcloud_url = get_post_meta( $lecciones_query->ID, '_soundcloud_url_meta', true );
		$this->is_free = get_post_meta( $lecciones_query->ID, '_is_free_meta', true) ;
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
		//if ( empty( $this->trailer_info ) || ! is_curso( get_the_id() ) ) return;

		?>
		<script type='text/javascript'>
			// jQuery( document ).ready( function() {
			// 	var iframe = $('.video-container iframe')[0];
			// 	var player = new Vimeo.Player(iframe);
			// 	var yc_course = new YogaCloudCourse( player, true );
			// 	yc_course._init();
			// });
		</script><?php
	}


	/*****************
	* PRIVATE METHODS
	*****************/

	/**
	 * Hooks
	 */
	private function hooks() {
		//add_action( 'wp_ajax_nopriv_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		//add_action( 'wp_ajax_mark_lesson_as_watched', array( $this, 'mark_lesson_as_watched' ) );
		//add_action( 'template_redirect', array( $this, 'load_script_course_page' ) );
		add_action( 'wp_footer', array( $this, 'init_lesson_video_js' ) );
	}	

}// YC_Leccion

 