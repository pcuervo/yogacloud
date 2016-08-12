<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
	exit; // Exit if accessed directly
}

$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>
		<div class="[ row ]">
			<div class="[ col s12 ] ">
				<div class="[ text-center ]">
					<h4>
						<?php if( 'es' == $lang ) : ?>
							¡Bienvenido!
						<?php else : ?>
							Welcome!
						<?php endif; ?>
					</h4>
					<h5>
						<?php if( 'es' == $lang ) : ?>
							<?php _e( 'Ingresa en tu cuenta', 'woocommerce' ); ?>
						<?php endif; ?>
					</h5>
				</div>
				<form method="post" class="login [ no-padding ]">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="username">
							<?php if( 'es' == $lang ) : ?>
								<?php _e( 'Nombre de usuario o email', 'woocommerce' ); ?>
							<?php else : ?>
								<?php _e( 'Username', 'woocommerce' ); ?>
							<?php endif; ?>
						<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" required data-parsley-required-message="Este campo es obligatorio."/>
					</p>
					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="password">
							<?php if( 'es' == $lang ) : ?>
								<?php _e( 'Contraseña', 'woocommerce' ); ?>
							<?php else : ?>
								<?php _e( 'Password', 'woocommerce' ); ?>
							<?php endif; ?>
						<span class="required">*</span></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" required  data-parsley-required-message="Este campo es obligatorio."/>
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="form-row [ text-center ]">
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<?php if( 'es' == $lang ) : ?>
							<input type="submit" class="[ woocommerce-Button button ][ margin-bottom ]" name="login" value="<?php esc_attr_e( 'Ingresar', 'woocommerce' ); ?>" />
						<?php else : ?>
							<input type="submit" class="[ woocommerce-Button button ][ margin-bottom ]" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
						<?php endif; ?>
						<br />
						<br />
						<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" data-parsley-multiple="rememberme">
						<label for="rememberme" class="[ text-center ]"><?php _e( 'Remember me', 'woocommerce' ); ?></label>
					</p>
					<p class="woocommerce-LostPassword lost_password [ text-center ]">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
							<?php if( 'es' == $lang ) : ?>
								<?php _e( '¿Olvidaste tu contraseña?', 'woocommerce' ); ?>
							<?php else : ?>
								<?php _e( 'Lost your password?', 'woocommerce' ); ?>
							<?php endif; ?>
						</a>
					</p>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>
			</div>
		</div>


<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2">
		<div class="[ text-center ]">
			<h4>
				<?php if( 'es' == $lang ) : ?>
					¿Aún no tienes cuenta?
				<?php else : ?>
					No account yet?
				<?php endif; ?>
			</h4>
			<h5>
				<?php if( 'es' == $lang ) : ?>
					<?php _e( 'Regístrate', 'woocommerce' ); ?>
				<?php else : ?>
					<?php _e( 'Sing up', 'woocommerce' ); ?>
				<?php endif; ?>
			</h5>
		</div>

		<form method="post" class="register [ no-padding ]">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" required  data-parsley-required-message="Este campo es obligatorio."/>
				</p>

			<?php endif; ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" data-parsley-type-message="El email es inválido." data-parsley-required-message="El email es obligatorio."/>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" required  data-parsley-required-message="Este campo es obligatorio."/>
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="woocomerce-FormRow form-row [ text-center ]">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
