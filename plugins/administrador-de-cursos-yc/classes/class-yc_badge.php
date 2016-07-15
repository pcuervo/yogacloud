<?php
/**
 * Maestro YogaCloud.
 *
 * This class represent a teacher of a course.
 *
 * @since 1.0.0
 */

class YC_Badge {

	public $id;
	public $name;
	public $permalink;
	public $thumb_url;

	/**
	 * Constructor
	 */
	public function __construct( $id ) {

		$badges_query	 	= get_post( $id, OBJECT, 'badges' );
		$this->id 			= $badges_query->ID;
		$this->name 		= $badges_query->post_title;
		$this->permalink 	= get_permalink( $badges_query->ID );
		$thumb 				= wp_get_attachment_image_src( get_post_thumbnail_id( $badges_query->ID ) );
		$this->thumb_url 	= empty( $thumb ) ? 0 : $thumb[0];
	}

	/**
	 * Return all Maestros in YogaCloud
	 * @return Vimeo $lib
	 */
	public static function get_badges(){
		$badges = array();
		$args = array(
	        'post_type' => 'badges',
	        'posts_per_page' => -1
	   	);
		$badges_query = new WP_Query( $args );
	    if ( ! $badges_query->have_posts() ) return $badges;
	    
	    while ( $badges_query->have_posts() ) : $badges_query->the_post(); 
	    	$curso = new YC_Badge( $badges_query->post->ID );
			array_push( $badges, $curso );
		endwhile; wp_reset_postdata();
		return $badges;
	}

}// YC_Badge

