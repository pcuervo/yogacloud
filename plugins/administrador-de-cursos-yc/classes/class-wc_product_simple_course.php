<?php 

/**
 * Course Product Type.
 *
 * Extend WooCommerce Simple Product to create a Simple Course Product
 *
 * @since 1.0.0
 */
 
class WC_Product_Simple_Course extends WC_Product_Simple {
	public function __construct( $product ) {

		$this->virtual = 'yes';
        $this->manage_stock = 'no';   
		$this->product_type = 'simple_course';

		parent::__construct( $product );
	}
}