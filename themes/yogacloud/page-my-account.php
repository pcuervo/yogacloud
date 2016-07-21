<?php get_header(); ?>
	<section class="[ main-banner ][ background-image ][ background-image--woman ]">
		<div class="[ gradient-linear-opacity ][ padding-vertical--xlarge ]">
			<div class="[ container ]">
				<div class="[ row ][ no-margin ]">
					<div class="[ col s12 ][ white-text text-center ]">
						<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-vertical-light.png" alt="Logo yogacloud">
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	echo do_shortcode( '<section class="[ container ]"><div class="[ margin-top ]">[woocommerce_my_account]</div></section>' );
	get_footer();
?>