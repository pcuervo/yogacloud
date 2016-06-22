<?php get_header(); the_post();  ?>
	<div class="[ main-banner ][ margin-bottom--xlarge ]" style="background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
		<div class="[ gradient-linear-opacity ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<h1 class="[ padding-sides ]">Yoga cloud cursos</h1>
						<img src="<?php echo THEMEPATH; ?>images/play-button.png" alt="play button">
						<div class="[ btn-main-cta ][ relative ][ top--15 ]">
							<a class="[ btn btn-rounded ]">tomar curso - $1200</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="[ container ]">
		<article class="[ margin-bottom--xlarge ]">
			<div class="[ row ][ text-center ]">
				<div class="[ col s4 ][ border-right--dark ]">
					<h5 class="[ no-margin-bottom ]">30</h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">lecciones</p>
				</div>
				<div class="[ col s4 ][ border-right--dark ]">
					<h5 class="[ no-margin-bottom ]">1</h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">por semana</p>
				</div>
				<div class="[ col s4 ]">
					<h5 class="[ no-margin-bottom ]">50</h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">horas</p>
				</div>
			</div>
			<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
			<div class="[ text-center ]">
				<a class="[ btn btn-rounded btn-primary-hollow ][ text-center ]">regalar curso</a>
			</div>
		</article>
		<article class="[ text-center ][ margin-bottom--xlarge ]">
			<h5 class="[ text-center ]">Impartido por</h5>
			<div class="[ row ]">
				<div class="[ col s6 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile1.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
				<div class="[ col s6 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
			</div>
		</article>
		<article>
			<h4 class="[ text-center ]">Módulos</h4>
			<div class="[ border-bottom--dark ]">
				<h5>Módulo 1</h5>
				<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
				<div class="[ padding-bottom ]">
					<a href="<?php echo site_url('/modulo/'); ?>" class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
			</div>
			<div class="[ border-bottom--dark ]">
				<h5>Módulo 2</h5>
				<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
			</div>
			<div class="[ border-bottom--dark ]">
				<h5>Módulo 3</h5>
				<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
			</div>
			<div class="[ border-bottom--dark ]">
				<h5>Módulo 4</h5>
				<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
			</div>
		</article>
		<article class="[ text-center ][ margin-bottom--xlarge ]">
			<h5 class="[ text-center ][ margin-bottom ]">Rating</h5>
			<a class="[ btn btn-rounded btn-primary-hollow ]">ver comentarios</a>
		</article>
		<article class="[ text-center ]">
			<h5 class="[ text-center ][ margin-bottom ]">Compártelo</h5>
			<div>
				<a href="">
					<img class="[ margin-sides--xsmall ]" src="<?php echo THEMEPATH; ?>images/compartir-twitter.png" alt="compartir con twitter">
				</a>
				<a href="">
					<img class="[ margin-sides--xsmall ]" src="<?php echo THEMEPATH; ?>images/compartir-facebook.png" alt="compartir con facebook">
				</a>
				<a href="">
				<img class="[ margin-sides--xsmall ]" src="<?php echo THEMEPATH; ?>images/compartir-mail.png" alt="compartir con mail">
				</a>
			</div>
		</article>
	</section>

<?php get_footer(); ?>