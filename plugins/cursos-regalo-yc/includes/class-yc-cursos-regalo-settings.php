<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Settings for YogaCloud Cursos de Regalo.
 *
 * This class will setup the frontend and backend for Cursos de Regalo
 *
 * @since 1.0.0
 */

class YC_Cursos_Regalo_Settings {

	private static $instance = null;

	/**
	 * Get singleton instance of class
	 * @return null or YC_Admin_Cursos_Settings instance
	 */
	public static function get() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks
	 */
	private function hooks() {
		
		// Hooks for everyone!
		add_action( 'wp_ajax_nopriv_add_gift_to_cart', array( $this, 'add_gift_to_cart' ) );
		add_action( 'wp_ajax_add_gift_to_cart', array( $this, 'add_gift_to_cart' ) );
		add_filter( 'woocommerce_email_classes', array( $this, 'add_gift_woocommerce_email' ) );

		// Admin hooks
		if( is_admin() ){
			return;
		} 
		// Frontend hooks
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_and_localize_scripts' ) );
		add_action( 'init', array( $this, 'yc_cursos_init_shortcodes' ) );	
		add_action( 'woocommerce_before_checkout_billing_form', array( $this, 'add_gift_form_checkout_fields_form' ) );
		add_action('woocommerce_checkout_process', array( $this, 'send_gift_after_checkout') );
	}

	/**
	 * Add all shortcodes required in class
	 */
	public function yc_cursos_init_shortcodes(){
		add_shortcode('gift_course_btn', array( $this, 'gift_button_shortcode') );
	}

	/**
	 * Create shortcode to add course gift product
	 */
	public function gift_button_shortcode( $atts = [] ) {
		return '<button class="[ btn btn-rounded waves-effect waves-light ][ js-add-gift-course ]" data-course-id="' . $atts['course_id'] . '">' . __( 'Regalar curso', 'yc-curso-regalo' ) . '</button>';
    }

    /**
	 * Add javascript and style files
	 */
	public function enqueue_and_localize_scripts(){
		if ( is_curso( get_the_id() ) ) {
			wp_enqueue_script( 'add_gift_course', YC_REGALOS_PLUGIN_URL . 'assets/js/add-gift-course.js', array(), false, false );
			wp_localize_script( 'add_gift_course', 'ajax_url', admin_url('admin-ajax.php') );
		}
	}

	/**
	 * If checkout has gifts, display friend details' form.
	 */
	public function add_gift_form_checkout_fields_form( $checkout ){
		if( ! $this->cart_has_gifts() ) return;

		echo '<p>' . __('Has elegido regalar este curso, por favor completa la información de tu amigo que recibirá el curso') . '</p>';

		woocommerce_form_field( 'gift_id', array(
	        'type' 	=> 'text',
	        'class'	=> array('hidden'), 
	        ), $this->get_gift_id_from_cart()
	   	);
	    woocommerce_form_field( 'friend_name', array(
	        'type'          => 'text',
	        'class'         => array('form-row-first'),
	        'label'         => __('¿A quién le regalas el curso?'),
	        'placeholder'   => __('Nombre de tu amigo'),
	        ), $checkout->get_value( 'friend_name' )
	   	);

	   	woocommerce_form_field( 'friend_email', array(
	        'type'          => 'text',
	        'class'         => array('form-row-last'),
	        'label'         => __('Email'),
	        'placeholder'   => __('@'),
	        ), $checkout->get_value( 'friend_email' )
	   	);

	   	woocommerce_form_field( 'friend_msg', array(
	        'type'          => 'textarea',
	        'label'         => __('Mensaje'),
	        'placeholder'   => __('Dedicatoria especial'),
	        ), $checkout->get_value( 'friend_msg' )
	   	);
	}// add_gift_form_checkout_fields_form

	/**
	 * Check if current cart includes Gift products
	 */
	private function cart_has_gifts(){
		foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
			if( YC_Gift_Course::is_gift( $_product->id ) ) return true;
		}
		return false;
	}

	/**
	 * Return the id of the Gift in cart.
	 */
	private function get_gift_id_from_cart(){
		foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
			return $_product->id;
		}
		return 0;
	}

 	/**
	* Add a course as gift to cart. 
	*/
	public function send_gift_after_checkout(){
		$gift = new YC_Gift_Course( $_POST['gift_id'], 0 );
		$gift->send_to_friend( $_POST['friend_name'], $_POST['friend_email'], $_POST['friend_msg'] );
	}// send_gift_after_checkout

	/**
	 *  Add a custom email to the list of emails WooCommerce should load
	 * @param array $email_classes available email classes
	 * @return array filtered available email classes
	 */
	function add_gift_woocommerce_email( $email_classes ) {
	 
	    // include our custom email class
	    require( YC_REGALOS_PLUGIN_DIR . 'includes/class-wc-gift-email.php' );
	    $email_classes['WC_Gift_Email'] = new WC_Gift_Email();
	 
	    return $email_classes;
	 
	}

	/*=============================================
	=            #AJAX FUNCTIONS 		          =
	=============================================*/	

	/**
	* Send gift to friend.
	* @param string $name
	* @param string $email
	*/
	public function add_gift_to_cart(){
		$gift = new YC_Gift_Course( 0, $_POST['course_id'] );
		$gift->add_gift_to_cart();

		echo WC()->cart->get_checkout_url();
		wp_die();
	}// add_gift_to_cart

}// YC_Admin_Cursos_Settings




