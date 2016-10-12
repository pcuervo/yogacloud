<?php
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * A custom Gift WooCommerce Email class
 *
 * @since 0.1
 * @extends \WC_Email
 */
class WC_Gift_Email extends WC_Email {

	/**
	 * Set email defaults
	 *
	 * @since 0.1
	 */
	public function __construct() {
	 
	    // set ID, this simply needs to be a unique name
	    $this->id = 'wc_gift';
	 
	    // this is the title in WooCommerce Email settings
	    $this->title = 'Gift';
	 
	    // this is the description in WooCommerce email settings
	    $this->description = 'Gift Notification emails are sent when a customer gives a course as gift to another user';
	 
	    // these are the default heading and subject lines that can be overridden using the settings
	    $this->heading = 'Gift';
	    $this->subject = 'Gift';
	 
	    // these define the locations of the templates that this email should use, we'll just use the new order template since this email is similar
	    $this->template_html  = 'emails/admin-new-order.php';
	    $this->template_plain = 'emails/plain/admin-new-order.php';
	 
	    // Trigger on new paid orders
	    //add_action( 'woocommerce_order_status_pending_to_processing_notification', array( $this, 'trigger' ) );
	    //add_action( 'woocommerce_order_status_failed_to_processing_notification',  array( $this, 'trigger' ) );
	 
	    // Call parent constructor to load any other defaults not explicity defined here
	    parent::__construct();
	 
	    // this sets the recipient to the settings defined below in init_form_fields()
	    $this->recipient = $this->get_option( 'recipient' );
	 
	    // if none was entered, just use the WP admin email as a fallback
	    if ( ! $this->recipient )
	        $this->recipient = get_option( 'admin_email' );
	}

	/**
	 * Determine if the email should actually be sent and setup email merge variables
	 *
	 * @param int $order_id
	 */
	public function trigger( $order_id ) {
	 
	    // setup order object
	    //$this->object = new WC_Order( $order_id );
	 
	    // replace variables in the subject/headings
	    // $this->find[] = '{order_date}';
	    // $this->replace[] = date_i18n( woocommerce_date_format(), strtotime( $this->object->order_date ) );
	 
	    // $this->find[] = '{order_number}';
	    // $this->replace[] = $this->object->get_order_number();
	 
	    if ( ! $this->is_enabled() || ! $this->get_recipient() )
	        return;
	 
	    // woohoo, send the email!
	    $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	}

	/**
	 * get_content_html function.
	 *
	 * @since 0.1
	 * @return string
	 */
	public function get_content_html() {
	    ob_start();
	    woocommerce_get_template( $this->template_html, array(
	        'email_heading' => $this->get_heading()
	    ) );
	    return ob_get_clean();
	}
} // end \WC_Gift_Email class
