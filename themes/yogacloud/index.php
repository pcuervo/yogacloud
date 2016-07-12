<?php get_header(); ?>
	<article class="[ main-banner ]">
		<div class="[ relative ][ overflow-hidden width---100 ]">
			<video class="[ center-full ][ min-width---100 min-height---100 ]" autoplay muted loop>
				<source src="<?php echo THEMEPATH; ?>video/landing.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>video/landing.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>video/landing.ogv" type="video/ogg">
			</video>
			<div class="[ gradient-linear-opacity ][ padding-vertical--large ][ relative z-index-1 ][ min-height--500-l ]">
				<div class="[ container ][ white-text text-center ]">
					<div class="[ row ]">
						<div class="[ col s12 ]">
							<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-vertical-light.png" alt="Logo yogacloud">
							<h2 class="[ padding-sides ]"> Primum in nostrane potestate est quid meminerimus duo.</h2>
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
			'posts_per_page' => '-1'
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
								<div class="[ card-image ][ col s12 l6 ]">
									<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo $image_url; ?>)">
										<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
											<span class="[ card-title ]"><?php the_title(); ?></span>
											<!-- promo -->
											<div id="promo" class="[ proximamente ]"></div>
										</div>
									</div>
								</div>
								<div class="[ col l6 ]">
									<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
										<?php the_excerpt(); ?>
										<?php ?>
									</div>
									<div class="[ relative ][ top--22 ][ text-center ]">
										<?php if ( $curso->was_bought_by_user( get_current_user_id() ) ) : ?>
											<a href="<?php echo get_the_permalink() ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
										<?php else : ?>
											<a href="<?php echo get_the_permalink() ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
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
									<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/agoralusis.png">
								</a>
								<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/shambalante.png">
								<a href="https://yogacloud.net/" target="_blank">
									<img class="[ width--170 ][ margin-sides ][ ]" src="<?php echo THEMEPATH; ?>images/logos/yogacloud.png">
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
								<i class="[ icon icon-quote icon-xsmall ][ color-primary ][ absolute ]"></i>
								<div class="[ content-testimonial ]">
									<div class="[ font-italic ]">
										<?php the_content(); ?>
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
					<a class="[ btn btn-rounded btn-light waves-effect waves-light ] modal-trigger" href="#registrate">registrarme</a>
				</div>
			</div>
		</section>

	<?php } ?>


<?php get_footer(); ?>