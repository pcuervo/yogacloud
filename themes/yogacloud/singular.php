<?php get_header(); the_post();  ?>

	<div class="[ container ]">
		<div class="[ row ]">
			<section class="[ col s12 l8 ]">
				<h5><?php the_title(); ?></h5>
				<?php the_content( ); ?>
			</section>
		</div>
	</div>


<?php get_footer(); ?>