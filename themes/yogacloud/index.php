<?php get_header(); ?>

	<div class="[ main-banner ][ margin-bottom--xlarge ]" style="background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
		<div class="[ gradient-linear-opacity ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<h1 class="[ padding-sides ]">Yoga cloud cursos</h1>
						<h2 class="[ padding-sides ]"> Primum in nostrane potestate est quid meminerimus duo.</h2>
						<div class="[ btn-main-cta ][ relative ][ top--15 ]">
							<a href="<?php echo site_url('/'); ?>#cursos" rel='m_PageScroll2id' class="_mPS2id-h [ btn btn-rounded ]">ver cursos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="[ container ]" id="cursos">
		<div class="[ row ]">
			<div class="[ col s12 ]">
				<div class="[ card ]">
					<div class="[ card-image ]">
						<div style="height: 200px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1445384763658-0400939829cd.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ]">
								<span class="[ card-title ]">Título del curso</span>
							</div>
						</div>
					</div>
					<div class="[ card-content ]">
					<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
					</div>
					<div class="[ btn-main-cta ][ relative ][ top--15 ][ text-center ]">
						<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded ]">más info</a>
					</div>
				</div>
			</div>
			<div class="[ col s12 ]">
				<div class="card">
					<div class="[ card-image ]">
						<div style="height: 200px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1463214551910-9d4d4e4ee844.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ]">
								<span class="[ card-title ]">Título del curso</span>
							</div>
						</div>
					</div>
					<div class="[ bg-secondary ][ text-center ][ white-text ]">
						<p class="[ no-margin ]">NUEVO</p>
					</div>
					<div class="[ card-content ]">
					<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
					</div>
					<div class="[ btn-main-cta ][ relative ][ top--15 ][ text-center ]">
						<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded ]">más info</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="[ gradient-diagonal ]" >
		<div class="[ container ]">
			<div class="[ row ]">
				<div class="[ col s12 ][ white-text ]">
					<h5 class="[ text-center ]">The Yoga Project</h5>
					<p>¡Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>
				</div>
				<div class="[ col s6 ]">
					<img class="[ responsive-img ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
				</div>
				<div class="[ col s6 ]">
					<img class="[ responsive-img ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
				</div>
			</div>
		</div>
	</section>

	<article>
		<h5 class="[ text-center ][ margin-bottom ]">Testimonials</h5>
		<?php  echo do_shortcode('[testimonial-free id="01"]'); ?>
	</article>


	<div class="slider">
		<ul class="slides">
			<li>
				<div class="caption center-align">
				<h3>This is our big Tagline!</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<div class="caption left-align">
				<h3>Left Aligned Caption</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<div class="caption right-align">
				<h3>Right Aligned Caption</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
			<li>
				<div class="caption center-align">
				<h3>This is our big Tagline!</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				</div>
			</li>
		</ul>
	</div>

	<div class="[ main-banner ]" style="background-size: cover; background-image: url(<?php echo THEMEPATH; ?>images/photo-1429277096327-11ee3b761c93.jpg)">
		<div class="[ gradient-diagonal-opacity ][ padding-vertical ]">
			<div class="[ white-text ][ text-center ][ padding ]">
				<h5>Regístrate y obtén lecciones gratis.</h5>
				<a class="[ btn btn-rounded btn-light ]">registrarme</a>
			</div>
		</div>
	</div>

<?php get_footer(); ?>