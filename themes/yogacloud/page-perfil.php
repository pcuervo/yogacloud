<?php get_header(); the_post();  ?>
	<section class="">
		<div class="[ container ][ padding-vertical ]">
			<div class="[ row ]">
				<div class="[ col s6 ][ text-center ][ border-right--primary ]">
					<img src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
					<h5>Raúl de Zamacona</h5>
					<p><strong class="[ color-primary ]">Email: </strong>raul@email.com</p>
					<p><strong class="[ color-primary ]">Contraseña: </strong>*********</p>
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header">
								<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">editar</a>
							</div>
							<div class="collapsible-body">
								<form id="form-registro" name="form-login" role="form" method="POST" class="col s12" data-parsley-validate>
									<div class="row">
										<div class="input-field col s12">
											<input id="user_name" type="text" class="validate" required data-parsley-error-message="El usuario es obligatorio.">
											<label for="user_name">Nombre de usuario*</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="email" type="email" class="validate" required data-parsley-type-message="La dirección de correo es inválida." data-parsley-required-message="El correo es obligatorio.">
											<label for="email">Correo*</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="password" type="password" class="validate" required data-parsley-required-message="La contraseña es obligatoria.">
											<label for="password">Contraseña*</label>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<button class="btn waves-effect waves-light [ btn-rounded ][ float-right ]" type="submit" name="action">Enviar</button>
										</div>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</div>
				<div class="[ col s6 ]">
					<h5 class="[ text-center ][ margin-bottom ]">Badges</h5>
					<p>Curso básico de Yoga</p>
				</div>
			</div>
		</div>
	</section>
	<section class="[ container ]">
		<h5 class="[ text-center ]">Mis cursos</h5>

	</section>

<?php get_footer(); ?>