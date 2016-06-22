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
			<div class="[ row ]">
				<div class="[ col s12 ]">
					<div class="[ card ]">
						<div class="[ card-image ]">
							<div style="height: 200px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1445384763658-0400939829cd.jpg)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ]">
									<span class="[ card-title ]">Título del curso</span>
								</div>
							</div>
						</div>
						<div class="[ card-content ]">
						<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
						</div>
						<div class="[ btn-main-cta ][ relative ][ top--15 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded ]">más info</a>
						</div>
					</div>
				</div>
				<div class="[ col s12 ]">
					<div class="card">
						<div class="[ card-image ]">
						<div style="height: 200px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1463214551910-9d4d4e4ee844.jpg)">
							<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ]">
								<span class="[ card-title ]">Título del curso</span>
							</div>
						</div>
						</div>
						<div class="[ card-content ]">
						<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing</p>
						</div>
						<div class="[ btn-main-cta ][ relative ][ top--15 ][ text-center ]">
							<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded ]">más info</a>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>

<?php get_footer(); ?>