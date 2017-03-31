<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';

?>
<?php if ( is_product() ) { ?>
	<div class="[ col s12 m6 l3 ][ box-btn--middle ][ relative ][ box-shadow ][ content-product ]">
<?php } ?>
<?php if ( ! is_product() ) { ?>
	<div class="[ col s12 m6 l4 ][ box-btn--middle ][ relative ][ box-shadow ][ content-product ]">
<?php } ?>
	<li <?php post_class(); ?>>
		<div>
			<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
			?>
		</div>

		<div class="[ box-product ]">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</div>
		<div class="[ info-product ]">
			<div class="[ text-center ][ title-product ][ valign-wrapper ]">
				<?php
					/**
					 * woocommerce_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_product_title - 10
					 */
					 do_action( 'woocommerce_shop_loop_item_title' );
				 ?>
			</div>
		</div>
	</li>
	<?php if ( is_page('tienda') ) { ?>
		<div class="[ box-product-price ][ text-center ][ relative top---55 ]">
			<div class="[ btn btn-rounded btn-delivery ][ waves-effect waves-light ][ margin-bottom--small ]">
	<?php } ?>
	<?php if ( ! is_page('tienda') ) { ?>
		<div class="[ box-product-price ][ text-center ][ relative top---22 ]">
			<div class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-bottom--small ]">
	<?php } ?>

			<?php if( 'es' == $lang ) : ?>
				VER -
			<?php else : ?>
				SEE -
			<?php endif; ?>

			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
		<div class="[ buttons-cart ][ hidden ]">
			<?php
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	</div>
</div>