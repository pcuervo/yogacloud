<?php get_header(); the_post();  ?>
	<section class="[ main-banner ]" style="background-position: center; background-size: cover; background-image: url(<?php echo THEMEPATH; ?>images/photo-1456426531648-850ec2f5a462.jpg)">
		<div class="[ gradient-linear-opacity ][ padding-vertical ]">
			<div class="[ container ]">
				<div class="[ row ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-vertical-light.png" alt="Logo yogacloud">
						<h1 class="[ padding-sides ]">Recuperar contraseña</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="[ container ]">
		<div class="[ row ]">
			<div class="[ col s12 m8 offset-m2 l6 offset-l3 ]">
				<div class="[ text-center ]">
					<p class="[ padding-sides--small ]">Por favor, escribe tu nombre de usuario o tu correo electrónico. Recibirás un enlace para restablecer tu contraseña.</p>
				</div>
				<form id="form-registro" name="form-login" role="form" method="POST" class="col s12" data-parsley-validate>
					<div class="row">
						<div class="input-field col s12">
							<input id="user_login" type="text" class="validate" required data-parsley-error-message="Este campo es obligatorio.">
							<label for="user_login">Nombre de usuario o email*</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<button class="btn waves-effect waves-light [ btn-rounded ][ float-right ]" type="submit" name="action">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

<?php get_footer(); ?>