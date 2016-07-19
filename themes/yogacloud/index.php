<?php get_header(); ?>
	<article class="[ main-banner ]">
		<div class="[ relative ][ overflow-hidden width---100 ]">
			<video class="[ center-full ][ min-width---100 min-height---100 ]" autoplay muted loop poster="<?php echo THEMEPATH; ?>images/video-poster.png">
				<source src="<?php echo THEMEPATH; ?>video/landing.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>video/landing.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>video/landing.ogv" type="video/ogg">
			</video>
			<div class="[ gradient-linear-opacity ][ padding-vertical--large ][ relative z-index-1 ][ min-height--500-l ]">
				<div class="[ container ][ white-text text-center ]">
					<div class="[ row ]">
						<div class="[ col s12 ]">
							<h1><img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-vertical-light.png" alt="Logo yogacloud"></h1>
							<h2 class="[ padding-sides no-margin ]">Vive la experiencia de cursos en línea.</h2>
							<h2 class="[ padding-sides no-margin ]">Tú eliges la hora y el lugar, nosotros a los expertos.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="[ relative ][ bottom--22 ][ text-center ]">
			<a href="#cursos" class="[ btn btn-rounded waves-effect waves-light ]">ver cursos</a>
		</div>
	</article>

	<?php
		$cursos_args = array(
	        'post_type' => 'product',
	        'posts_per_page' => -1,
	        'tax_query' => array(
		        array(
		            'taxonomy' => 'product_type',
		            'field'    => 'slug',
		            'terms'    => 'simple_course',
		        ),
		    ),
	   	);
		$cursos_query = new WP_Query( $cursos_args );
		if( $cursos_query->have_posts() ) : ?>
		<section class="[ container ][  scrollspy ]" id="cursos">
			<div class="[ row ]">
				<?php while( $cursos_query->have_posts() ) : $cursos_query->the_post();

					if( ! is_curso( $post->ID ) ) continue;

					$image_id = get_post_thumbnail_id();
					$image_url_array = wp_get_attachment_image_src($image_id, 'medium', true);
					$image_url = $image_url_array[0];
					$curso = new YC_Curso( $post->ID );
				?>

					<article class="[ col s12 m6 ]">
						<div id="box-card" class="[ card ]">
							<div class="[ row ]">
								<div class="[ card-image ][ col s6 ][  waves-effect waves-block waves-light ]">
									<div class="[ bg-image--rectangle ]" style="width: 100%; background-position: center; background-size: cover; background-position: center bottom; background-image: url(<?php echo $image_url; ?>)">
										<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
											<!-- new -->
											<?php if( $curso->is_new ) : ?>
												<div id="promo" class="[ nuevo ]"></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="[ col s6 no-padding-left ]">
									<div class="[ card-content ][ height-content ][ overflow-hidden ][ relative ]">
										<h5 class="[ card-title ][ no-margin margin-bottom ]"><strong><?php the_title(); ?></strong></h5>
										<?php echo $curso->subtitle; ?>
										<div class="[ gradient-text ]"></div>
									</div>
									<div class="[ relative ][ top--22 ][ text-center ]">
										<?php if ( $curso->was_bought_by_user( get_current_user_id() ) ) : ?>
											<a href="<?php echo get_the_permalink() ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
										<?php elseif ( 'yes' ==  $curso->is_coming_soon ) : ?>
											<button class="[ btn btn-rounded disabled waves-effect waves-light ]">próximamente</button>
										<?php else : ?>
											<a href="<?php echo get_the_permalink() ?>" class="[ btn btn-rounded btn-hollow waves-effect waves-light ]">más info</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</article>

				<?php endwhile; ?>

			</div>
		</section>

	<?php endif; wp_reset_postdata(); ?>

	<?php
		$yoga_project_query = new WP_Query( array( 'pagename' => 'yoga-project' ) );
		if( $yoga_project_query->have_posts() ) : while( $yoga_project_query->have_posts() ) : $yoga_project_query->the_post();
		$logos = get_attached_media( 'image' );
	?>

			<section class="[ gradient-diagonal ][ padding-vertical ]" >
				<div class="[ container ]">
					<div class="[ row ][ no-margin-bottom ]">
						<div class="[ col s12 m10 offset-m1 l8 offset-l2 ][ white-text ]">
							<h4 class="[ text-center ][ no-margin-top ]">The Yoga Project</h4>
							<div class="[ font-medium ]">
								<?php the_content( ); ?>
							</div>
							<div class="[ text-center ]">
								<a href="http://agoralucis.com/" target="_blank">
									<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/agoralucis.png" alt="Agora Lucis - Centro de yoga">
								</a>
								<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/shambalante.png" alt="Shambalanté - Centro de desarrollo humano">
								<a href="http://yogacloud.tv/" target="_blank">
									<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/yogacloud.png" alt="YogaCloud - Clases de yoga en línea">
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

	<?php endwhile; endif; wp_reset_postdata(); ?>

	<?php
		$testimonials_args = array(
			'post_type' => 'testimoniales',
			'posts_per_page' => '3'
		);
		$testimonials_query = new WP_Query( $testimonials_args );
		if( $testimonials_query->have_posts() ) :

	?>

		<section id="testimonials" class="[ container ]">
			<h5 class="[ text-center ][ padding-top ]">Testimoniales</h5>
			<div class="slider testimonials">
				<ul class="slides">
					<?php while( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
						<li>
							<div class="caption">
								<div class="[  center-align ]">
									<?php the_post_thumbnail('thumbnail', array('class' => '[  center-align ][ margin-bottom--small ][ border-radius---50 ][ profile ]') ); ?>
								</div>
								<i class="[ icon icon-quote icon-xxsmall ][ color-primary ][ absolute ][ no-margin-sides ]"></i>
								<div class="[ content-testimonial ]">
									<div class="[ font-italic ][ relative ]">
										<?php the_content(); ?>
										<i class="[ icon icon-quote icon-xxsmall ][ color-primary ][ rotate-180 ][ absolute bottom-0 right-0 ]"></i>
									</div>
									<h6 class="[ color-dark ][ text-uppercase ]"><?php the_title(); ?></h6>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</section>

	<?php endif; wp_reset_postdata(); ?>

	<div class="[ clearfix ]"></div>

	<?php if ( ! is_user_logged_in() ){ ?>

		<section class="[ relative ][ no-margin-bottom ][ main-banner ]" style="background-position: center; background-size: cover; background-image: url(<?php echo THEMEPATH; ?>images/photo-1435459183098-d8ad15d23c54.jpg)">
			<div class="[ gradient-diagonal-opacity ][ padding-vertical ]">
				<div class="[ white-text ][ text-center ][ padding ]">
					<h5>Regístrate y obtén lecciones gratis.</h5>
					<a class="[ btn btn-rounded btn-light waves-effect waves-light ]" href="<?php echo site_url('/my-account/'); ?>">registrarme</a>
				</div>
			</div>
		</section>

	<?php } ?>


<?php get_footer(); ?>