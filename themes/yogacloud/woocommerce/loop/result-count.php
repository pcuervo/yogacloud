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

$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';

?>
<section class="[ main-banner ][ box-btn ][ background-image ][ background-image--woman ]">
	<div class="[ gradient-linear-opacity ]">
		<div class="[ container ]">
			<div class="[ row ]">
				<div class="[ col s12 ][ white-text text-center ]">
					<h1 class="[ padding-sides ]">
						<?php if( 'es' == $lang ) : ?>
							Yoga cloud tienda
						<?php else : ?>
							Yoga cloud store
						<?php endif; ?>
					</h1>
					<h2 class="[ padding-sides ]"><?php echo !empty($wp_query->query['product_cat']) ? $wp_query->query['product_cat']: '';?></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="[ container ][ text-center ][ product-menu ]">
	<?php
	$taxonomy     = 'product_cat';
	$orderby      = 'name';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 1;

	$args = array(
	     'taxonomy'     => $taxonomy,
	     'orderby'      => $orderby,
	     'show_count'   => $show_count,
	     'pad_counts'   => $pad_counts,
	     'hierarchical' => $hierarchical,
	     'title_li'     => $title,
	     'hide_empty'   => $empty
	);
	$all_categories = get_categories( $args );
	foreach ($all_categories as $cat) {
		$hasChildren = get_term_children($cat->term_id, $taxonomy);
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;
			if( $hasChildren ) {
				echo '<a class="[ dropdown-button btn ]" href="#" data-activates="'.$cat->slug.'">'. $cat->name .'</a>';
			} else {
				echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
			}

			$args2 = array(
			    'taxonomy'     => $taxonomy,
			    'child_of'     => 0,
			    'parent'       => $category_id,
			    'orderby'      => $orderby,
			    'show_count'   => $show_count,
			    'pad_counts'   => $pad_counts,
			    'hierarchical' => $hierarchical,
			    'title_li'     => $title,
			    'hide_empty'   => $empty
	        );
	        $sub_cats = get_categories( $args2 );
	        if($sub_cats) { ?>
	        	<ul id="<?php echo $cat->slug; ?>" class="dropdown-content">
	            <?php foreach($sub_cats as $sub_category) {
					echo '<li><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a></li>';
	            } ?>
	            </ul>
	        <?php }
	    }
	}
	?>
</section>