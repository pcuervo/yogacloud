<?php global $result; ?>
		<footer class="page-footer">
			<div class="container">
				<div class="row [ border-bottom--light ][ padding-bottom ]">
					<div class="col s12 offset-m1 m5 offset-l2 l4 [ margin-bottom ]">
						<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
						<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon icon-phone icon-large padding-sides--xsmall ]"></i></a>
						<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon icon-email-fill icon-iconed padding-sides--xsmall ][ relative bottom-2 ]"></i></a>
					</div>
					<div class="col s12 m5 l4">
						<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
						<a href="" class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ][ line-height---1_8 ]"></i></a>
						<a href="" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ][ line-height---1_8 ]"></i></a>
						<a href="" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ][ line-height---1_8 ]"></i></a>
						<img src="" alt="">
					</div>
				</div>
				<div class="[ row ]">
					<div class="col s12 offset-l2 l8">
						<h5><a href="<?php echo site_url('/'); ?>"><img class="logo center-block" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud"></a></h5>
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
				$('.dropdown-button').dropdown();
				$('.dropdown-button').dropdown({
						hover: true, // Activate on hover
					}
				);
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
