<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<h5>Mis cursos</h5>
	<table class="woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table [ mis-cursos ]">
		<thead>
			<tr>
				<th></th>
				<th>Nombre del curso</th>
				<th>Badges</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>
					<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg" alt="curso">
				</td>
				<td>
					Lorem ipsum dolor sit
				</td>
				<td>
					<i class="[ icon icon-badge-star-1 icon-large ][ color-primary ]">
				</td>
				<td class="[ text-right ]"><a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a></td>
			</tr>
			<tr>
				<td>
					<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg" alt="curso">
				</td>
				<td>
					Lorem ipsum dolor sit
				</td>
				<td>
					<i class="[ icon icon-badge-star-1 icon-large ][ color-primary ]">
				</td>
				<td class="[ text-right ]"><a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a></td>
			</tr>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( $current_page !== intval( $customer_orders->max_num_pages ) ) : ?>
				<a class="woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Go Shop', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
