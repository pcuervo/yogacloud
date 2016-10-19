<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	if( is_curso( $post->ID ) ){
		wc_get_template( 'course-product/course.php' );
		return;
	}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}
	global $post, $product;
?>

		<div class="[ container ]" itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="[ row ][ margin-top--large ]">
				<div class="[ col s12 m6 ][ margin-bottom--large ]">
					<div class="images">
						<?php if ( $product->is_on_sale() ) : ?>
							<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale [ padding-left--small ][ color-primary ][ font-size--24 ]">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
						<?php endif; ?>
						<div id="slideshow-1">
							<div id="cycle-1" class="cycle-slideshow"
							data-cycle-slides="> div"
							data-cycle-timeout="0"
							data-cycle-prev="#slideshow-1 .cycle-prev"
							data-cycle-next="#slideshow-1 .cycle-next"
							data-cycle-caption="#slideshow-1 .custom-caption"
							data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
							data-cycle-fx="scrollHorz" >
								<?php
									/**
									 * woocommerce_before_single_product_summary hook.
									 *
									 * @hooked woocommerce_show_product_sale_flash - 10
									 * @hooked woocommerce_show_product_images - 20
									 */
									do_action( 'woocommerce_before_single_product_summary' );
								?>
							</div> <!-- cycle-1 -->
						</div> <!-- slideshow-1 -->

						<div id="slideshow-2" class="[ hidden ]">
							<div id="cycle-2" class="cycle-slideshow"
							data-cycle-slides="> div"
							data-cycle-timeout="0"
							data-cycle-prev="#slideshow-2 .cycle-prev"
							data-cycle-next="#slideshow-2 .cycle-next"
							data-cycle-caption="#slideshow-2 .custom-caption"
							data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
							data-cycle-fx="carousel"
							data-cycle-carousel-visible="6"
							data-cycle-carousel-fluid=true
							data-allow-wrap="false">
								<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
							</div><!-- end cycle 2 -->
						</div><!-- slideshow-2 -->
					</div>
				</div>

				<div class=" [ col s12 m6 ]">

					<div class="summary entry-summary">

						<?php
							/**
							 * woocommerce_single_product_summary hook.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 */
							do_action( 'woocommerce_single_product_summary' );
						?>

					</div><!-- .summary -->

					<?php
						/**
						 * woocommerce_after_single_product_summary hook.
						 *
						 * @hooked woocommerce_output_product_data_tabs - 10
						 * @hooked woocommerce_upsell_display - 15
						 * @hooked woocommerce_output_related_products - 20
						 */
						do_action( 'woocommerce_after_single_product_summary' );
					?>

					<meta itemprop="url" content="<?php the_permalink(); ?>" />

				</div><!-- #product-<?php the_ID(); ?> -->
			</div><!-- end col -->
		</div> <!-- end row -->
	<!-- </div> end container-->

<?php do_action( 'woocommerce_after_single_product' ); ?>
