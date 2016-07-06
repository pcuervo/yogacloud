<?php get_header(); ?>

	<article class="[ main-banner ]">
		<div class="[ relative ][ overflow-hidden width---100 ]">
			<video class="[ center-full ][ min-width---100 min-height---100 ]" autoplay muted loop>
				<source src="<?php echo THEMEPATH; ?>video/yogacloud.mp4" type="video/mp4">
			</video>
			<div class="[ gradient-linear-opacity ][ padding-vertical--large ][ relative z-index-1 ]">
				<div class="[ container ]">
					<div class="[ row ]">
						<div class="[ col s12 ][ white-text text-center ]">
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

	<section class="[ container ][  scrollspy ]" id="cursos">
		<div class="[ row ]">
			<article class="[ col s12 m6 ]">
				<div id="box-card" class="[ card ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1445384763658-0400939829cd.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Título del curso</span>
								<!-- promo -->
									<div id="promo" class="[ nuevo ]"></div>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]" id="cursos">
								<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
							</div>
						</div>
					</div>
				</div>
			</article>

			<article class="[ col s12 m6 ][ scrollspy ]">
				<div class="[ card ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1445384763658-0400939829cd.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Título del curso</span>
									<div id="promo" class="[ destacado ]"></div>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]" id="cursos">
								<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="[ col s12 m6 offset-m3 ]">
				<div class="[ card ]">
					<div class="[ row ]">
						<div id="content-curso" class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1445384763658-0400939829cd.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Título del curso</span>
									<div id="promo" class="[ proximamente ]"></div>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]" id="cursos">
								<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>

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
								<?php foreach( $logos as $logo ) { ?>
									<img class="[ width--120 ][ margin-sides ]" src="<?php echo $logo->guid; ?>">
								<?php } ?>
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

	<section class="[ relative ][ no-margin-bottom ][ main-banner ]" style="background-position: center; background-size: cover; background-image: url(<?php echo THEMEPATH; ?>images/photo-1435459183098-d8ad15d23c54.jpg)">
		<div class="[ gradient-diagonal-opacity ][ padding-vertical ]">
			<div class="[ white-text ][ text-center ][ padding ]">
				<h5>Regístrate y obtén lecciones gratis.</h5>
				<a class="[ btn btn-rounded btn-light waves-effect waves-light ]">registrarme</a>
			</div>
		</div>
	</section>


<?php get_footer(); ?>