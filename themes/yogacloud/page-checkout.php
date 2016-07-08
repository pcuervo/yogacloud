<?php
	get_header();
	echo do_shortcode( '<section class="[ container ]"><div class="[ margin-top ]">[woocommerce_checkout]</div></section>' );
	get_footer();
?>