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

	public function get_soundcloud_url(){
		return $this->soundcloud_url;
	}

}// YC_Leccion

 