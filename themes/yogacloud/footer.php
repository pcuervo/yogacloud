<?php global $result; ?>
		<footer class="page-footer">
			<div class="container">
				<div class="row [ border-bottom--light ][ padding-bottom ]">
					<div class="col l4 s12 [ margin-bottom ]">
						<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
						<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon-phone-circle-1 icon-xlarge padding-sides--xsmall ]"></i></a>
						<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon-email-circle-1 icon-xlarge padding-sides--xsmall ]"></i></a>
					</div>
					<div class="col l4 s12">
						<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
						<a href="" class="[ white-text ]"><i class="[ icon-twitter icon-large padding-sides--xsmall ]"></i></a>
						<a href="" class="[ white-text ]"><i class="[ icon-facebook icon-xlarge padding-sides--xsmall ]"></i></a>
						<a href="" class="[ white-text ]"><i class="[ icon-instagram icon-xlarge padding-sides--xsmall ]"></i></a>
						<img src="" alt="">
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
		<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/functions.js"></script>
		<script type="text/javascript" src="<?php echo THEMEPATH; ?>js//jquery.star.rating.js"></script>
		<script>
			$( document ).ready(function() {
				/**
				 * On ready
				**/
				imgToSvg();
				$('.slider').slider({
					indicators: true,
					interval: 4000
				});
				$('.modal-trigger').leanModal();
				$('.scrollspy').scrollSpy();
				$('.rating').addRating();
				modalMaestros();
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
