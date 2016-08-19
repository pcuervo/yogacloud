<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
?>
	<div class="[ col s12 m6 ]">
		<div class="images">
			<div id="slideshow-1">
				<div id="cycle-1" class="cycle-slideshow"
				data-cycle-slides="> div"
				data-cycle-timeout="0"
				data-cycle-prev="#slideshow-1 .cycle-prev"
				data-cycle-next="#slideshow-1 .cycle-next"
				data-cycle-caption="#slideshow-1 .custom-caption"
				data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
				data-cycle-fx="tileBlind"
				>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda1.png" width=500 height=500></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda2.png" width=500 height=500></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda3.png" width=500 height=500></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda1.png" width=500 height=500></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda2.png" width=500 height=500></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda3.png" width=500 height=500></div>
				</div>
			</div>

			<div id="slideshow-2">
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
				data-allow-wrap="false"
				>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda1.png" width=100 height=100></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda2.png" width=100 height=100></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda3.png" width=100 height=100></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda1.png" width=100 height=100></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda2.png" width=100 height=100></div>
					<div><img src="<?php echo THEMEPATH; ?>images/tienda3.png" width=100 height=100></div>
				</div>
			</div>



			<?php
				if ( has_post_thumbnail() ) {
					$attachment_count = count( $product->get_gallery_attachment_ids() );
					$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
					$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
					$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title'	 => $props['title'],
						'alt'    => $props['alt'],
					) );
					echo apply_filters( 'woocommerce_single_product_image_html',
						sprintf(
							'<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '"><div class="[ width---100-all height-auto-all ]">%s</div></a>',
							esc_url( $props['url'] ),
							esc_attr( $props['caption'] ),
							$image
						),
						$post->ID
					);
				} else {
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
				}

				do_action( 'woocommerce_product_thumbnails' );
			?>
		</div>
	</div>

