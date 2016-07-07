<?php 

/**
 * Admin panel settings for Cursos YogaCloud.
 *
 * This class will create menu items in admin panel, as well as initial setup
 * of post types and all required elements...
 *
 * @since 1.0.0
 */

class WC_Product_Simple_Course extends WC_Product_Simple {
	public function __construct( $product ) {
		error_log('are we ever here');
		$this->product_type = 'simple_course';
		parent::__construct( $product );
	}
}