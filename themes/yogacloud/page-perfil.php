<?php get_header(); the_post();  ?>
	<section style="background-color: #f8f8f8;">
		<div class="[ container ][ padding-vertical ]">
			<div class="[ row ][ no-margin ]">
				<div class="[ col s6 ][ text-center ][ border-right--primary ]">
					<img src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
					<h5>Raúl de Zamacona</h5>
					<p><strong class="[ color-primary ]">Email: </strong>raul@email.com</p>
					<p><strong class="[ color-primary ]">Contraseña: </strong>*********</p>
					<ul class="collapsible [ no-margin ]" data-collapsible="accordion">
						<li>
							<div class="collapsible-header" style="background-color: #f8f8f8;">
								<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">editar información</a>
							</div>
							<div class="collapsible-body">
								<form id="form-perfil" name="form-login" role="form" method="POST" class="col s12" data-parsley-validate>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_name" type="text" class="validate" >
											<label for="user_name">Nombre de usuario</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="email" type="email" class="validate" data-parsley-type-message="La dirección de correo es inválida.">
											<label for="email">Correo</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="password" type="password" class="validate">
											<label for="password">Contraseña actual</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="new_password-1" type="password" class="validate">
											<label for="new_password-1">Nueva Contraseña</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="new_password-2" type="password" class="validate">
											<label for="new_password-2">Confirmar Nueva Contraseña</label>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<button class="btn waves-effect waves-light [ btn-rounded ][ float-right ]" type="submit" name="action">Actualizar datos</button>
										</div>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</div>
				<div class="[ col s6 ]">
					<h5 class="[ text-center ][ margin-bottom ]">Cursos completados</h5>
					<p><i class="[ icon icon-badge-star-1 icon-small ][ color-primary ]"></i> Curso básico de Yoga</p>
					<p><i class="[ icon icon-badge-star-1 icon-small ][ color-primary ]"></i> Curso intermedio de Yoga</p>
				</div>
			</div>
		</div>
	</section>
	<section class="[ container ]">
		<h5 class="[ text-center ][ margin-bottom ]">Mis cursos</h5>
		<div class="[ row ]">
			<article class="[ col s12 m6 ][ margin-bottom ]">
				<div class="[ row ][ margin-bottom--small ]">
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
					</div>
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
					</div>
				</div>
				<div class="progress">
					<div class="determinate" style="width: 90%"></div>
				</div>
				<div id="box-card" class="[ card ][ margin-bottom--large ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Curso dolor sit</span>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="[ col s12 m6 ][ margin-bottom ]">
				<div class="[ row ][ margin-bottom--small ]">
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
					</div>
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
					</div>
				</div>
				<div class="progress">
					<div class="determinate" style="width: 70%"></div>
				</div>
				<div id="box-card" class="[ card ][ margin-bottom--large ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Curso dolor sit</span>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="[ col s12 m6 ][ margin-bottom ]">
				<div class="[ row ][ margin-bottom--small ]">
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
					</div>
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
					</div>
				</div>
				<div class="progress">
					<div class="determinate" style="width: 50%"></div>
				</div>
				<div id="box-card" class="[ card ][ margin-bottom--large ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Curso dolor sit</span>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="[ col s12 m6 ][ margin-bottom ]">
				<div class="[ row ][ margin-bottom--small ]">
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Módulo: <span class="[ font-size--20 ]">3 de 5</span></h6>
					</div>
					<div class="[ col s12 l6 ]">
						<h6 class="[ margin-bottom--xsmall ]">Lección: <span class="[ font-size--20 ]">3 de 4</span></h6>
					</div>
				</div>
				<div class="progress">
					<div class="determinate" style="width: 20%"></div>
				</div>
				<div id="box-card" class="[ card ][ margin-bottom--large ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ]" style="width: 100%; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Curso dolor sit</span>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae debitis nostrum, illum nulla tenetur, officiis illo in, fuga consequatur officia porro qui. Ipsam excepturi nam ratione amet, cum quas maxime! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">ver curso</a>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>

<?php get_footer(); ?>