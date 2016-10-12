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
	public function __construct( $id, $course_id ) {
		$this->id = $id;
		$this->course_id = $course_id;
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
		$gift_query = new WP_Query( $args );
		while( $gift_query->have_posts() ) : $gift_query->the_post();
			$this->id = get_the_id();
		endwhile;

		return $gift_query->have_posts();
	}

	/**
	* Get name and price of the course to give.
	* @return array $course_info
	*/
	private function get_course_info(){
		$pf = new WC_Product_Factory();  
		$gift_product = $pf->get_product( $this->id );

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

	/**
	* Add new/existing gift to cart.
	*/
	public function add_gift_to_cart(){
		if( ! $this->gift_exists() ){
			error_log('gift does not exist');
			$this->create_gift_product();
			WC()->cart->add_to_cart( $this->id );
			return;
		}
		WC()->cart->add_to_cart( $this->id );
	}

	/**
	* Send a coupon gift to a friend
	* @param string $name
	* @param string $email
	* @param string $message
	* @return boolean
	*/
	public function send_to_friend( $name, $email, $message ){
		$course_price = get_post_meta( $this->id, '_price', true );
		$course_id = get_post_meta( $this->id, '_course_id', true );
		$coupon = $this->create_gift_coupon( $course_price );
		error_log('sending coupon ' . $coupon .  ' to ' . $name);
		global $wpdb;

		$module_data = array(
			'sender_id'			=> get_current_user_id(),
			'course_id'			=> $course_id,
			'receiver_email'	=> $email,
			'coupon_code'		=> $coupon
		);
		$wpdb->insert(
			$wpdb->prefix . 'pending_gifts',
			$module_data,
			array( '%d', '%d', '%s', '%s' )
		);
		if ( $wpdb->insert_id ){
			$this->send_email_to_friend( $name, $email, $message, $coupon );
		}
	}// send_to_friend

	/**
	* Create a coupon for the current gift
	* @param integer $amount
	* @return string $coupon_code
	*/
	public function create_gift_coupon( $amount ){
		$coupon_code = time(); 
		$discount_type = 'fixed_cart';

		$coupon = array(
		    'post_title' 	=> $coupon_code,
		    'post_content' 	=> '',
		    'post_status' 	=> 'publish',
		    'post_author' 	=> 1,
		    'post_type'     => 'shop_coupon'
		);    
		$new_coupon_id = wp_insert_post( $coupon );

		update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
		update_post_meta( $new_coupon_id, 'coupon_amount', $amount );
		update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
		update_post_meta( $new_coupon_id, 'product_ids', '' );
		update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
		update_post_meta( $new_coupon_id, 'usage_limit', '1' );
		//update_post_meta( $new_coupon_id, 'usage_limit_per_user', '1' );
		update_post_meta( $new_coupon_id, 'expiry_date', '' );
		update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
		update_post_meta( $new_coupon_id, 'free_shipping', 'no' );

		return $coupon_code;
	}

	/**
	* Create a coupon for the current gift
	* @param integer $amount
	* @return string $coupon_code
	*/
	private function send_email_to_friend( $name, $email, $message, $coupon ){
		$to = $email;
		$subject = __('¡Te han regalado un curso en YogaCloud!');
		$body = '<h1>¡Hola ' . $name . '!</h1>';
		$body .= '<p>Tu amigo te ha regalado un curso en YogaCloud. Ingresa <a href="' . site_url() . '">Aquí</a> y usa el cupón ' . $coupon . ' en tu carrito de compras.</p>' ;
		$headers = array('Content-Type: text/html; charset=UTF-8');
		 
		wp_mail( $to, $subject, $body, $headers );
	}

	/**
	* Check if a product is of type "simple_gift"
	* @param integer $product_id
	* @return boolean
	*/
	public static function is_gift( $product_id ){
		$args = array(
			'p'					=> $product_id,
	        'post_type' 		=> 'product',
	        'posts_per_page' 	=> 1,
	        'tax_query'			=> array(
		        array(
		            'taxonomy' => 'product_type',
		            'field'    => 'slug',
		            'terms'    => 'simple_gift', 
		        ),
		    ),
	   	);
		$gift_query = new WP_Query( $args );
		return $gift_query->have_posts();
	}

}// YC_Gift_Course

