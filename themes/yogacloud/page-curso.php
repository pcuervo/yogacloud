<?php get_header(); the_post();  ?>
	<div class="[ main-banner ][ margin-bottom--xlarge ]" style="background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
		<div class="[ gradient-linear-opacity ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<h1 class="[ padding-sides ]">Yoga cloud cursos</h1>
						<a class="[ block ][ width--75 ][ margin-auto ] waves-effect waves-light modal-trigger" href="#modal1"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						<div class="[ relative ][ top--15 ]">
							<a class="[ btn btn-rounded ][ waves-effect waves-light ]">tomar curso - $1200</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Structure 1-->
	<div id="modal1" class="modal">
		<div class="modal-header">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat [ white-text ]"><i class="[ icon icon-close icon-small ][ color-light ][ relative bottom-2 ]"></i></a>
		</div>
		<div class="modal-content [ video-leccion ]">
			<div class="video-container [ width---100 ]">
				<iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
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
				<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ text-center ]">regalar curso</a>
			</div>
		</article>
		<article class="[ text-center ][ margin-bottom--xlarge ]">
			<h5 class="[ text-center ]">Impartido por</h5>
			<div class="[ row ]">
				<div class="[ col s6 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile1.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ] waves-effect waves-light modal-trigger" href="#maestro1">ver más</a>
				</div>
				<div class="[ col s6 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ] waves-effect waves-light modal-trigger" href="#maestro2">ver más</a>
				</div>
			</div>
		</article>

		<!-- Modal Structure -->
		<div id="maestro1" class="modal [ maestros-transparent ][ white-text ]">
			<div class="modal-content">
				<a href="#!" class="[ block ][ no-padding ] modal-action modal-close waves-effect waves-green btn-flat"><img class="[ float-right ]" src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu"></a>
				<h5 class="[ text-center ]">Juan O'Donoju</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<p>
				<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				<div class="[ text-center ]">
					<a href="" class="[ white-text ]"><i class="[ icon-twitter icon-iconed padding-sides--xsmall ]"></i></a>
					<a href="" class="[ white-text ]"><i class="[ icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
					<a href="" class="[ white-text ]"><i class="[ icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
				</div>
			</div>
		</div>

		<article>
			<h4 class="[ text-center ]">Módulos</h4>
			<div class="[ border-bottom--dark ]">
				<h5>Módulo 1</h5>
				<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
				<div class="[ padding-bottom ]">
					<a href="<?php echo site_url('/modulo/'); ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ]">ver más</a>
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
			<!-- Rating -->
			<div class="rating"></div>
			<a href="<?php echo site_url('/'); ?>#testimonials" rel='m_PageScroll2id' class="_mPS2id-h [ btn btn-rounded btn-primary-hollow waves-effect waves-light ]">ver comentarios</a>
		</article>
		<article class="[ text-center ]">
			<h5 class="[ text-center ][ margin-bottom ]">Compártelo</h5>
			<div class="[ icon-comparte ]">
				<a href="">
					<i class="[ icon icon-twitter-circle icon-xlarge ][ relative bottom-2 ]"></i>
				</a>
				<a href="">
					<i class="[ icon icon-facebook-circle icon-xlarge ][ relative bottom-2 ]"></i>
				</a>
				<a href="">
					<i class="[ icon icon-email-circle-1 icon-xlarge ][ color-primary ][ relative bottom-2 ]"></i>
				</a>
			</div>
		</article>
	</section>

<?php get_footer(); ?>