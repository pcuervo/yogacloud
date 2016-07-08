<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account-dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<section style="background-color: #f8f8f8;">
	<div class="">
		<div class="[ row ][ no-margin ]">
			<div class="[ col s12 m6 ][ text-center ][ border-right--primary ][ margin-bottom ]">
				<img src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
				<h5>
					<?php
						echo sprintf( esc_attr__( '%s%s%s', 'woocommerce' ), esc_html( $current_user->display_name ), '<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">', '</a>' );
					?>
				</h5>
				<a href="<?php echo site_url('/my-account/edit-account/'); ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">editar información</a>
			</div>
			<div class="[ col s12 m6 ]">
				<h5 class="[ text-center ][ margin-bottom ]">Cursos completados</h5>
				<p><i class="[ icon icon-badge-star-1 icon-large ][ color-primary ]"></i> Curso básico de Yoga</p>
				<p><i class="[ icon icon-badge-star-1 icon-large ][ color-primary ]"></i> Curso intermedio de Yoga</p>
			</div>
		</div>
	</div>
</section>


<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );
?>
