<?php
	$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>
<?php get_header(); the_post();  ?>
	<section class="[ text-center ][ container ]">
		<h1 class="[ color-secondary ]">Error 404!</h1>
		<?php if( 'es' == $lang ) : ?>
			<h4 class="[ margin-bottom--xlarge ]">No se encontró la página que estás buscando</h4>
		<?php else : ?>
			<h4 class="[ margin-bottom--xlarge ]">Couldn't find what you're looking for</h4>
		<?php endif; ?>
		<h5>
			<?php if( 'es' == $lang ) : ?>
				<a class="[ color-primary ]" href="<?php echo site_url('/'); ?>">Volver a Yogacloud
			<?php else : ?>
				<a class="[ color-primary ]" href="<?php echo site_url('/?lang=en'); ?>">Return to Yogacloud
			<?php endif; ?>
					<img class="[ block ][ margin-auto ][ margin-top ]" src="<?php echo THEMEPATH; ?>images/logos/cloud-primary.png" alt="Logo yogacloud">
				</a>
		</h5>
	</section>




<?php get_footer(); ?>