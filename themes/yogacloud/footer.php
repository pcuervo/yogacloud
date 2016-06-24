<?php global $result; ?>
		<footer class="page-footer">
			<div class="container">
				<div class="row [ border-bottom--light ][ padding-bottom ]">
					<div class="col l4 s12 [ margin-bottom ]">
						<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
						<a href="tel:+525552555555"><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/phone.png" alt="télefono"></a>
						<a href="mailto:contacto@yogacloud.com"><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/mail.png" alt="correo"></a>
					</div>
					<div class="col l4 s12">
						<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
						<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/twitter.png" alt="twitter"></a>
						<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/facebook.png" alt="facebook"></a>
						<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/instagram.png" alt="instagram"></a>
					</div>
				</div>
				<div class="col l4 s12">
					<h5><a href="<?php echo site_url('/'); ?>"><img class="logo" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud"></a></h5>
					<div class="[ row ]">
						<div class="col s4">
							<a class="grey-text text-lighten-3" href="<?php echo site_url('/aviso-legal/'); ?>">Aviso Legal</a>
						</div>
						<div class="col s4">
							<a class="grey-text text-lighten-3" href="<?php echo site_url('/politica-de-cookies/'); ?>">Política de Cookies</a>
						</div>
						<div class="col s4">
							<a class="grey-text text-lighten-3" href="<?php echo site_url('/politica-de-privacidad/'); ?>">Política de Privacidad</a>
						</div>
					</div>
				</div>
				<div class="[ white-text ]">
					© Copyright 2016
				</div>
			</div>
		</footer>

		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="<?php echo THEMEPATH; ?>js/functions.js"></script>
		<script>
			$( document ).ready(function() {
				/**
				 * On ready
				**/
				imgToSvg();
				$('.slider').slider({
					interval: 4000
				});
				$('.scrollspy').scrollSpy();
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
