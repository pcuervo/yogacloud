<?php 

class WC_Product_Simple_Gift extends WC_Product_Simple {
	public function __construct( $product ) {
		$this->product_type = 'simple_gift';
		parent::__construct( $product );
	}
}
