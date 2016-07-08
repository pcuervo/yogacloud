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
			<div class="[ col s6 ][ text-center ][ border-right--primary ]">
				<img src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
				<h5>
					<?php
						echo sprintf( esc_attr__( '%s%s%s', 'woocommerce' ), esc_html( $current_user->display_name ), '<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">', '</a>' );
					?>
				</h5>
				<a href="<?php echo site_url('/my-account/edit-account/'); ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">editar información</a>
			</div>
			<div class="[ col s6 ]">
				<h5 class="[ text-center ][ margin-bottom ]">Cursos completados</h5>
				<p><i class="[ icon icon-badge-star-1 icon-small ][ color-primary ]"></i> Curso básico de Yoga</p>
				<p><i class="[ icon icon-badge-star-1 icon-small ][ color-primary ]"></i> Curso intermedio de Yoga</p>
			</div>
		</div>
	</div>
</section>
<section>
	<h5 class="[ text-center ][ margin-bottom ]">Mis cursos</h5>
	<div class="[ row ]">
		<article class="[ col s12 m6 ][ margin-bottom ]">
			<div class="[ row ][ margin-bottom--small ]">
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
				</div>
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
				</div>
			</div>
			<div class="progress">
				<div class="determinate" style="width: 90%"></div>
			</div>
			<div id="box-card" class="[ card ][ margin-bottom--large ]">
				<div class="[ row ]">
					<div class="[ card-image ][ col s12 l6 ]">
						<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
								<span class="[ card-title ]">Curso dolor sit</span>
							</div>
						</div>
					</div>
					<div class="[ col l6 ]">
						<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</div>
						<div class="[ relative ][ top--22 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="[ col s12 m6 ][ margin-bottom ]">
			<div class="[ row ][ margin-bottom--small ]">
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
				</div>
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
				</div>
			</div>
			<div class="progress">
				<div class="determinate" style="width: 70%"></div>
			</div>
			<div id="box-card" class="[ card ][ margin-bottom--large ]">
				<div class="[ row ]">
					<div class="[ card-image ][ col s12 l6 ]">
						<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
								<span class="[ card-title ]">Curso dolor sit</span>
							</div>
						</div>
					</div>
					<div class="[ col l6 ]">
						<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</div>
						<div class="[ relative ][ top--22 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="[ col s12 m6 ][ margin-bottom ]">
			<div class="[ row ][ margin-bottom--small ]">
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
				</div>
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
				</div>
			</div>
			<div class="progress">
				<div class="determinate" style="width: 50%"></div>
			</div>
			<div id="box-card" class="[ card ][ margin-bottom--large ]">
				<div class="[ row ]">
					<div class="[ card-image ][ col s12 l6 ]">
						<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
								<span class="[ card-title ]">Curso dolor sit</span>
							</div>
						</div>
					</div>
					<div class="[ col l6 ]">
						<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</div>
						<div class="[ relative ][ top--22 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="[ col s12 m6 ][ margin-bottom ]">
			<div class="[ row ][ margin-bottom--small ]">
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
				</div>
				<div class="[ col s12 l6 ]">
					<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
				</div>
			</div>
			<div class="progress">
				<div class="determinate" style="width: 20%"></div>
			</div>
			<div id="box-card" class="[ card ][ margin-bottom--large ]">
				<div class="[ row ]">
					<div class="[ card-image ][ col s12 l6 ]">
						<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
								<span class="[ card-title ]">Curso dolor sit</span>
							</div>
						</div>
					</div>
					<div class="[ col l6 ]">
						<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</div>
						<div class="[ relative ][ top--22 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
						</div>
					</div>
				</div>
			</div>
		</article>
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
