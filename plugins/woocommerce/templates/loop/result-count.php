<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>
<section class="[ main-banner ][ box-btn ][ background-image ][ background-image--woman ]">
	<div class="[ gradient-linear-opacity ]">
		<div class="[ container ]">
			<div class="[ row ]">
				<div class="[ col s12 ][ white-text text-center ]">
					<h1 class="[ padding-sides ]">Yoga cloud tienda</h1>
					<h2 class="[ padding-sides ]"> Primum in nostrane potestate est quid meminerimus duo.</h2>
					<?php if( ! is_page('productos') ) { ?>
						<div class="[ relative ][ top--22 ]">
							<a href="<?php echo site_url('/productos/'); ?>" class="[ btn btn-rounded ][ waves-effect waves-light ]">ver todos los productos</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="[ container ][ text-center ][ product-menu ]">
		<a href="<?php echo site_url('producto-categoria/libros'); ?>">libros</a>
		<a href="<?php echo site_url('producto-categoria/meditacion'); ?>">Meditación</a>
		<!-- Dropdown Trigger -->
		<a class='dropdown-button btn' href='#' data-activates='salud-belleza'>Salud y Belleza</a>
			<!-- Dropdown Structure -->
			<ul id='salud-belleza' class='dropdown-content'>
				<li><a href="<?php echo site_url('producto-categoria/salud-belleza/aromaterapia'); ?>">Aromaterápia</a></li>
				<li><a href="<?php echo site_url('producto-categoria/salud-belleza/suplementos-alimenticios'); ?>">Suplementos alimenticios</a></li>
			</ul>
		<a href="<?php echo site_url('producto-categoria/musica'); ?>">Música</a>
		<a href="<?php echo site_url('producto-categoria/joyeria'); ?>">Joyería</a>
		<a href="<?php echo site_url('producto-categoria/ropa'); ?>">Ropa</a>
		<a href="<?php echo site_url('producto-categoria/yoga'); ?>">Yoga</a>
		<a href="<?php echo site_url('producto-categoria/arte-y-decoracion'); ?>">Arte y Decoración</a>
</section>

<p class="woocommerce-result-count [ container ][ margin-bottom ]">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	if ( $total <= $per_page || -1 === $per_page ) {
		printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
