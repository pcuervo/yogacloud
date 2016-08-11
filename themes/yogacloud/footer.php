<?php
	global $result;
	$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>

		<footer class="page-footer">
			<div class="container">
				<div class="row [ border-bottom--light ][ padding-bottom ]">
					<div class="col s12 offset-m1 m5 offset-l2 l4 [ margin-bottom-s ]">
						<?php if( 'es' == $lang ) : ?>
							<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
						<?php else : ?>
							<h5 class="white-text [ no-margin-top ]">Need help?</h5>
						<?php endif; ?>
						<a href="tel://+525568404414" class="[ white-text ]"><i class="[ icon icon-phone icon--28 padding-sides--xsmall ]"></i></a>
						<a href="#" class="[ white-text ][ js-contacto-email ]"><i class="[ margin-right ][ icon icon-email-fill icon--23 padding-sides--xsmall ]"></i></a>
					</div>
					<div class="col s12 m5 l4">
						<?php if( 'es' == $lang ) : ?>
							<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
						<?php else : ?>
							<h5 class="white-text [ no-margin-top ]">Let's be friends</h5>
						<?php endif; ?>
						<a href="https://twitter.com/theyogacloud" target="_blank" class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ]"></i></a>
						<a href="https://www.facebook.com/TheYogaCloud" target="_blank" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
						<a href="https://www.instagram.com/theyogacloud/" target="_blank" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
					</div>
				</div>
				<div class="[ row ][ margin-bottom--small">
					<div class="col s12 offset-l2 l8">
						<a href="http://yogacloud.tv/" target="_blank">
							<img class="logo center-block" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
						</a>
						<div class="[ row ][ no-margin ]">
							<div class="[ col s4 ]">
								<p class="[ light-text text-lighten-3 ]">
									<?php if( 'es' == $lang ) : ?>
										<a class="[ light-text text-lighten-3 ]" href="<?php echo site_url('/politica-de-proteccion-de-datos/'); ?>">Política de protección de datos</a>
									<?php else : ?>
										<a class="[ light-text text-lighten-3 ]" href="<?php echo site_url('/politica-de-proteccion-de-datos/'); ?>">Privacy policy</a>
									<?php endif; ?>
								</p>
							</div>
							<div class="[ col s4 ]">
								<p class="[ light-text text-lighten-3 ]">
									<?php if( 'es' == $lang ) : ?>
										<a class="[ light-text text-lighten-3 ]" href="<?php echo site_url('/politica-de-cookies/'); ?>">Política de Cookies</a>
									<?php else : ?>
										<a class="[ light-text text-lighten-3 ]" href="<?php echo site_url('/politica-de-cookies/'); ?>">Cookies policy</a>
									<?php endif; ?>
								</p>
							</div>
							<div class="[ col s4 ]">
								<p class="[ light-text text-lighten-3 ]">© Copyright 2016</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		</div><!-- end main-body -->
		<?php wp_footer(); ?>
	</body>
</html>
