<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * YogaCloud Course Gift.
 *
 * This class represent a course gift.
 *
 * @since 1.0.0
 */


class YC_Gift_Course {

	public $id;
	public $course_id;

	/**
	 * Constructor
	 */
	public function __construct( $course_id ) {
		$this->course_id = $course_id;
		if( ! $this->gift_exists() ){
			error_log( $this->gift_exists() );
			error_log('gift does not exist');
			$this->create_gift_product();
			return;
		}
		error_log('gift already exists');
		//$this->id = $this->get_gift_id( $course_id );
	}

	/**
	* Check if a gift product already exists for current course. 
	* @return boolean
	*/
	private function gift_exists(){
		$args = array(
	        'post_type' => 'product',
	        'posts_per_page' => -1,
	        'meta_query' => array(
		        array(
		           	'key' => '_course_id',
		           	'value' => $this->course_id
		        ),
		    ),
	   	);
		$query = new WP_Query( $args );
		return $query->have_posts();
	}

	/**
	* Create a new gift product and associate it with current course
	*/
	private function create_gift_product(){
		error_log('creating new gift product for course: ' . $this->course_id );
		
		$course = new WC_product( $this->course_id );
		$gift_title = __('Regalo', 'yc-curso-regalo' ) . ' - ' . $course->get_title();
		$new_gift_id = wp_insert_post( 
			array(
			    'post_title' 	=>  $gift_title,
			    'post_status' 	=> 'publish',
			    'post_type' 	=> 'product',
			)
		);
		$course_price = get_post_meta( $this->course_id, '_price', true );
		error_log('new price: ' . $course_price );
		wp_set_object_terms( $new_gift_id, 'simple_gift', 'product_type' );
		update_post_meta( $new_gift_id, '_visibility', 'visible' );
		update_post_meta( $new_gift_id, '_stock_status', 'instock');
		update_post_meta( $new_gift_id, '_virtual', 'yes' );
		update_post_meta( $new_gift_id, '_price', $course_price );
		update_post_meta( $new_gift_id, '_course_id', $this->course_id );

		$this->id = $new_gift_id;
	}

}// YC_Gift_Course

