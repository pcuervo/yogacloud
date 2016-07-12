<?php get_header(); the_post();  ?>
	<section id="video-whit-button" class="[ min-height--500-l ][ no-margin ][ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen_button ]" >
		<div class="video-container">
			<iframe id="video" class="[ max-height-screen_button ]" src="https://player.vimeo.com/video/73308983?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ]" style=" background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
			<div class="[ gradient-linear-opacity ][ height---100 ][ relative ]">
				<div class="[ container relative ][ height---100 ] valign-wrapper">
					<h1 class="[ absolute ][ width---100 ]">Título curso</h1>
					<!-- play -->
					<a id="play-button" class="[ valign ][ block ][ width--80 height--80 ][ margin-auto no-padding ][ btn btn-rounded ][ waves-effect waves-light ] ">
						<img class="[ center-full ]" src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button">
					</a>
				</div>
			</div>
		</div>
	</section>
	<div class="[ relative ][ bottom--22 ][ z-index-10 ][ text-center ]">
		<a class="[ btn btn-rounded ][ waves-effect waves-light ]">tomar curso - $1200</a>
	</div>

	<section class="[ container ]">
		<div class="[ row ]">
			<div class="[ col s12 offset-m2 m8 offset-l3 l6 ]">
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
			</div>
		</div>
		<article class="[ row ][ text-center ]">
			<div class="[ col col s12 m10 offset-m1 l8 offset-l2 ]">
				<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
			</div>
		</article>
		<div class="[ text-center ]">
			<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ text-center ]">regalar curso</a>
		</div>
	</section>
	<div class="[ container ]">
		<div class="[ row ]">

			<div class="[ col col s12 m10 offset-m1 l8 offset-l2  ]">
				<section>
					<h4 class="[ text-center ]">Módulos</h4>
					<div class="[ border-bottom--dark ]">
						<h5>Módulo 1</h5>
						<p>Fortemne possumus dicere eundem illum torquatum quid quod.</p>
						<div class="[ padding-bottom ]">
							<a href="<?php echo site_url('/modulo/'); ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">ver más</a>
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
				</section>
			</div>
		</div>
	</div>
	<section class="[ text-center ][ hide-on-med-and-up ][ container ]">
		<h5 class="[ text-center ][ margin-bottom ]">Rating</h5>
		<!-- Rating -->
		<div class="rating"></div>
		<ul class="collapsible [ row ]" data-collapsible="accordion">
			<li>
				<div class="collapsible-header">
					<div class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ]">ver comentarios</div>
				</div>
				<div class="collapsible-body">
					<div class="[ content-comentario ]">
						<i class="[ icon icon-quote icon-xsmall ][ color-primary ][ absolute ]"></i>
						<div class="[ padding-left--large ]">
							<p class="[ font-italic ]">Excelente oportunidad de crecimiento personal la que ustedes nos ofrecen en esta plataforma. Gracias.</p>
							<h6 class="[ color-dark ][ text-uppercase ][ text-right ]">Tim Jonathan Doe</h6>
						</div>
					</div>
					<div class="[ content-comentario ]">
						<i class="[ icon icon-quote icon-xsmall ][ color-primary ][ absolute ]"></i>
						<div class="[ padding-left--large ]">
							<p class="[ font-italic ]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat.</p>
							<h6 class="[ color-dark ][ text-uppercase ][ text-right ]">Lorem ipsum</h6>
						</div>
					</div>
					<div class="[ content-comentario ]">
						<i class="[ icon icon-quote icon-xsmall ][ color-primary ][ absolute ]"></i>
						<div class="[ padding-left--large ]">
							<p class="[ font-italic ]">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<h6 class="[ color-dark ][ text-uppercase ][ text-right ]">Dolor sit</h6>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="collapsible-header">
					<div class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ]">comentar</div>
				</div>
				<div class="collapsible-body">
					<form class="col s12 [ margin-bottom ]">
						<div class="row">
							<div class="input-field col s12">
								<input id="first_name" type="text" class="validate">
								<label for="first_name">Nombre</label>
							</div>
							<div class="input-field col s12">
								<input id="email" type="email" class="validate">
								<label for="email">Email</label>
							</div>
							<div class="input-field col s12">
								<textarea id="textarea1" class="materialize-textarea"></textarea>
								<label for="textarea1">Comentario</label>
							</div>
						</div>
						<button class="btn waves-effect waves-light [ btn-rounded ][ float-right ]" type="submit" name="action">Enviar</button>
					</form>
				</div>
			</li>
		</ul>
	</section>
	<section class="[ text-center ][ hide-on-med-and-up ]">
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
	</section>

<?php get_footer(); ?>