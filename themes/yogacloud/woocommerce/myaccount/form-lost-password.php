<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>
<div class="[ row ]">
	<div class="[ col s12 m8 offset-m2 l6 offset-l3 ]">
		<form method="post" class="woocommerce-ResetPassword lost_reset_password">
			<h5 class="[ text-center ]">¿Perdiste tu contraseña?</h5>
			<p class="[ text-center ]"><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Por favor ingresa tu usuario o dirección de email. Recibirás un link via email para crear una nueva contraseña.', 'woocommerce' ) ); ?></p>

			<div class="[ width---100-all ]">
				<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first ">
					<label for="user_login"><?php _e( 'Nombre de usuario o email', 'woocommerce' ); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" required  data-parsley-required-message="Este campo es obligatorio."/>
				</p>
			</div>

			<div class="clear"></div>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<p class="woocommerce-FormRow form-row [ text-right ]">
				<input type="hidden" name="wc_reset_password" value="true" />
				<input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Restablecer contraseña', 'woocommerce' ); ?>" />
			</p>

			<?php wp_nonce_field( 'lost_password' ); ?>

		</form>
	</div>
</div>


