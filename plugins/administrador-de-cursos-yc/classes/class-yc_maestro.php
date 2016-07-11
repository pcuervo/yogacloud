<?php
/**
 * Maestro YogaCloud.
 *
 * This class represent a teacher of a course. 
 *
 * @since 1.0.0
 */

class YC_Maestro {

	public $id;
	public $name;
	public $description;
	public $permalink;
	public $url;
	public $facebook;
	public $twitter;
	public $instagram;

	/**
	 * Constructor
	 */
	public function __construct( $args ) {
		if( $args['name'] ){
			$maestros_query = get_page_by_title( $args['name'], OBJECT, 'maestros' );
		} else {
			$maestros_query = get_post( $args['id'], OBJECT, 'maestros' );
		}

		$this->id 			= $maestros_query->ID;
		$this->name 		= $maestros_query->post_title;
		$this->description 	= $maestros_query->post_content;
		$this->permalink 	= get_permalink( $maestros_query->ID );
		$this->url 			= get_post_meta( $maestros_query->ID, '_url_meta', true );
		$this->facebook 	= get_post_meta( $maestros_query->ID, '_facebook_meta', true) ;
		$this->twitter 	= get_post_meta( $maestros_query->ID, '_twitter_meta', true) ;
		$this->instagram 	= get_post_meta( $maestros_query->ID, '_instagram_meta', true) ;
	}

}// YC_Maestro

 