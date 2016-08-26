<?php get_header(); the_post();  ?>

	<section class="[ main-banner ][ box-btn ][ background-image ][ background-image--woman ]">
		<div class="[ gradient-linear-opacity ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<h1 class="[ padding-sides ]">Yoga cloud tienda</h1>
						<h2 class="[ padding-sides ]"> Primum in nostrane potestate est quid meminerimus duo.</h2>
						<div class="[ relative ][ top--22 ]">
							<a href="<?php echo site_url('/productos/'); ?>" class="[ btn btn-rounded ][ waves-effect waves-light ]">ver todos los productos</a>
						</div>
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

	<?php
		$promociones_args = array(
			'post_type' => 'promociones',
			'posts_per_page' => '3'
		);
		$promociones_query = new WP_Query( $promociones_args );
		$promociones_count = 1;
		$post_count = $promociones_query->post_count;
		if( $promociones_query->have_posts() ) :
	?>

	<section class="[ container ]">
		<div class="[ row ][ no-margin ]">

			<?php while( $promociones_query->have_posts() ) : $promociones_query->the_post();

				$content = get_the_content();
				$contentURL = wp_extract_urls( $content );

				$bg_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				if ( $promociones_count == 1 ) : ?>
					<article class="[ col s12 m6 ]">
						<div class="[ card-image ][ relative ][ text-center ]">
							<div class="[ background-image ][ height--440 ]" style="background-image: url(<?php echo $bg_image; ?>)">
								<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ][ padding-sides padding-vertical--xlarge ][ valign-wrapper ]">
									<div class="[ valign ][ width---100 ]">
										<h4 class="[ white-text ][ no-margin-top ]"><?php the_title(); ?></h4>
										<a href="<?php echo $contentURL[0]; ?>" class="[ btn btn-rounded btn-light ][ margin-auto ][ width--190 ][ valign ]">ver más</a>
									</div>
								</div>
							</div>
						</div>
					</article>
				<?php endif; ?>

				<?php if ( $promociones_count == 2 ) :
					 echo '<div class="[ col s12 m6 ]">';
				endif; ?>

				<?php if ( $promociones_count != 1 ) : ?>
					<article>
						<div class="[ card-image ][ relative ][ text-center ]">
							<div class="[ background-image ][ height--210 ]" style="background-image: url(<?php echo $bg_image; ?>)">
								<div class="[ gradient-linear-opacity--light-2 ][ width---100 height---100 ][ padding-sides padding-vertical ][ valign-wrapper ]">
									<div class="[ valign ][ width---100 ]">
										<h4 class="[ white-text ][ width---100 ][ no-margin-top ]"><?php the_title(); ?></h4>
										<a href="<?php echo $contentURL[0]; ?>" class="[ btn btn-rounded btn-light ]">ver más</a>
									</div>
								</div>
							</div>
						</div>
					</article>

				<?php endif; ?>

				<?php if ($promociones_count == $post_count ) :
					echo '</div>';
				endif; ?>

			<?php $promociones_count++; endwhile; ?>
		</div>
	</section>

	<?php endif; ?>

	<section class="[ margin-bottom ]">
		<article class="[ gradient-diagonal ][ padding ]">
			<div class="[ container ]">
				<h5 class="[ text-center ][ white-text ][ margin-bottom ]">Las marcas más vendidas</h5>
				<div class="[ row ]">
					<?php
						$marcas_args = array(
							'post_type' => 'marcas',
							'posts_per_page' => '-1'
						);
						$marcas_query = new WP_Query( $marcas_args );
						if( $marcas_query->have_posts() ) : while( $marcas_query->have_posts() ) : $marcas_query->the_post();
					?>
						<div class="[ col s6 m4 ][ padding-xsmall ][ height--90 ][ text-center ][ margin-bottom ]">
							<?php the_post_thumbnail('full', array('class'=>'[ responsive-img ]')); ?>
						</div>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>

		</article>
		<div class="[ container ]">
			<h5 class="[ text-center ][ margin-bottom ]">Lo más vendido</h5>
			<div class="[ row ][ popular-product ]">

				<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 6,
						'meta_key' => 'total_sales',
						'orderby' => 'meta_value_num',
					);

					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
						woocommerce_get_template_part( 'content', 'product' );
						endwhile;
					}

					wp_reset_query();
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>