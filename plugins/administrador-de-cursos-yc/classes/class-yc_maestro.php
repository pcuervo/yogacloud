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
	public $thumbnail;

	/**
	 * Constructor
	 */
	public function __construct( $id ) {

		$maestros_query	 	= get_post( $id, OBJECT, 'maestros' );
		$this->id 			= $maestros_query->ID;
		$this->name 		= $maestros_query->post_title;
		$this->description 	= $maestros_query->post_content;
		$this->permalink 	= get_permalink( $maestros_query->ID );
		$this->url 			= get_post_meta( $maestros_query->ID, '_url_meta', true );
		$this->facebook 	= get_post_meta( $maestros_query->ID, '_facebook_meta', true) ;
		$this->twitter 		= get_post_meta( $maestros_query->ID, '_twitter_meta', true) ;
		$this->instagram 	= get_post_meta( $maestros_query->ID, '_instagram_meta', true) ;
		$this->thumbnail 	= get_the_post_thumbnail( $maestros_query->ID, 'thumbnail', array('class'=>'[ border-radius---50 ][ width--80 height-auto ]') );
	}

	/**
	 * Return all Maestros in YogaCloud
	 * @return Vimeo $lib
	 */
	public static function get_maestros(){
		$maestros = array();
		$args = array(
	        'post_type' => 'maestros',
	        'posts_per_page' => -1
	   	);
		$maestros_query = new WP_Query( $args );
	    if ( ! $maestros_query->have_posts() ) return $maestros;
	    
	    while ( $maestros_query->have_posts() ) : $maestros_query->the_post(); 
	    	$curso = new YC_Maestro( $maestros_query->post->ID );
			array_push( $maestros, $curso );
		endwhile; wp_reset_postdata();
		return $maestros;
	}

}// YC_Maestro

