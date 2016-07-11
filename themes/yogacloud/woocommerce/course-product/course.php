<?php
	global $product;
	$curso 		= new YC_Curso( $product->id );
	$modulos 	= $curso->get_modulos();
	$maestros 	= $curso->get_maestros();
?>

<section id="video-whit-button" class="[ min-height--500-l ][ no-margin ][ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen_button ]" >
	<div class="video-container">
		<?php echo $curso->trailer_info['iframe']; ?>
	</div>
	<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ]" style=" background-size: cover; background-position: center bottom; background-image: url(<?php echo $curso->trailer_info['thumbnail']; ?>">
		<div class="[ gradient-linear-opacity ][ height---100 ][ relative ]">
			<div class="[ container relative ][ height---100 ] valign-wrapper">
				<h1 class="[ absolute ][ width---100 ]"><?php echo $curso->get_name(); ?></h1>
				<a id="play-button" class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
			</div>
		</div>
	</div>
</section>
<div class="[ relative ][ bottom--22 ][ z-index-10 ][ text-center ]">
	<?php wc_get_template( 'single-product/add-to-cart/course.php' ); ?>
</div>

<section class="[ container ]">
	<div class="[ row ]">
		<div class="[ col s12 offset-m2 m8 offset-l3 l6 ]">
			<div class="[ row ][ text-center ]">
				<div class="[ col s4 ][ border-right--dark ][ <?php echo empty( $curso->lessons_per_week ) ? 'offset-s2' : ''  ?> ]">
					<h5 class="[ no-margin-bottom ]"><?php echo $curso->num_lessons ?></h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">lecciones</p>
				</div>
				<?php if ( ! empty( $curso->lessons_per_week ) ) : ?>
					<div class="[ col s4 ][ border-right--dark ]">
						<h5 class="[ no-margin-bottom ]">1</h5>
						<p class="[ margin-bottom--xsmall no-margin-top ]">por semana</p>
					</div>
				<?php endif; ?>
				<div class="[ col s4 ]">
					<h5 class="[ no-margin-bottom ]"><?php echo $curso->hours?></h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">horas</p>
				</div>
			</div>
		</div>
	</div>
	<article class="[ row ][ text-center ]">
		<div class="[ col col s12 m10 offset-m1 l8 offset-l2 ]">
			<p><?php echo get_the_content(); ?></p>
		</div>
	</article>
	<div class="[ text-center ][ hidden ]">
		<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ text-center ]">regalar curso</a>
	</div>
</section>
<div class="[ container ]">
	<div class="[ row ]">
		<div class="[ col s12 m6 l4 ][ float-right--on-med-and-up ]">
			<section class="[ text-center ]">
				<h5 class="[ text-center ][ margin-bottom ]">Impartido por</h5>
				<div class="[ row ]">
					<?php foreach ( $maestros as $maestro ) : ?>
						<article class="[ col s6 ]">
							<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile1.png" alt="">
							<p><?php echo $maestro->name ?></p>
							<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ] waves-effect waves-light modal-trigger" href="#maestro-modal">ver más</a>
						</article>	
					<?php endforeach; ?>
				</div>

				<!-- Modal Structure -->
				<div id="maestro-modal" class="modal [ maestros-transparent ][ white-text ]">
					<div class="modal-content [ white-text ]">
						<div class="[ row ]">
							<div class="[ col s12 m8 offset-m2 l6 offset-l3 ]">
								<a href="#!" class="[ block ][ no-padding ] modal-action modal-close waves-effect waves-green btn-flat"><img class="[ float-right ]" src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu"></a>
								<h5 class="[ text-center ][ margin-bottom ]">Juan O'Donoju</h5>
								<img class="[ border-radius---50 ][ width--80 ][ margin-bottom ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
								<div class="[ text-center ][ margin-bottom ]">
									<a href="" class="[ white-text ]"><i class="[ icon-twitter icon-iconed padding-sides--xsmall ]"></i></a>
									<a href="" class="[ white-text ]"><i class="[ icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
									<a href="" class="[ white-text ]"><i class="[ icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
								</div>
								<div class="[ margin-bottom ]">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
								</div>
								<a class="[ white-text ][ text-underline ]" href="">http://loremipsum-dolor-sit</a>
							</div>
						</div>

					</div>
				</div>
			</section>
			<section class="[ text-center ][ hide-on-small-only ][ hidden ]">
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
			<section class="[ text-center ][ hide-on-small-only ][ hidden ]">
				<h5 class="[ text-center ][ margin-bottom ]">Compártelo</h5>
				<div class="[ icon-comparte ]">
					<a href="">
						<i class="[ icon icon-circle-twitter-bird icon-xlarge ][ relative bottom-2 ]"></i>
					</a>
					<a href="">
						<i class="[ icon icon-circle-facebook icon-xlarge ][ relative bottom-2 ]"></i>
					</a>
					<a href="">
						<i class="[ icon icon-email-circle icon-xlarge ][ relative bottom-2 ]"></i>
					</a>
				</div>
			</section>
		</div>
		<div class="[ col s12 m6 l8 ]">
			<section>
				<h4 class="[ text-center ]">Módulos</h4>
				<?php foreach ( $modulos as $modulo ) : ?>
					<div class="[ border-bottom--dark ]">
						<h5><?php echo $modulo->name ?></h5>
						<p><?php echo $modulo->description ?></p>
						<div class="[ padding-bottom ]">
							<a href="<?php echo $modulo->permalink . '?cid=' . $curso->id ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">ver más</a>
						</div>
					</div>
				<?php endforeach; ?>
				
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

