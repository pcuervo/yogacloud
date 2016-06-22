<?php get_header(); the_post();  ?>

	<section class="[ container ]">
		<div class="[ text-center ][ margin-bottom ]">
			<h5>Resultados para:</h5>
			<h5>Lorem ipsum</h5>
		</div>
		<article>
			<h6 class="[ text-center ][ margin-bottom ]">Maestros</h6>
			<div class="[ row ]">
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile1.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ]">ver más</a>
				</div>
			</div>
		</article>
		<article>
			<h6 class="[ text-center ][ margin-bottom ]">Cursos</h6>
		</article>
	</section>

<?php get_footer(); ?>