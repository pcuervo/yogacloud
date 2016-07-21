<?php get_header(); the_post();  ?>
	<div class="[ container ]">
		<section class="[ text-center ]">
			<h5>Resultados para:</h5>
			<h5>Lorem ipsum</h5>
		</section>
		<section>
			<h6 class="[ text-center ][ margin-bottom ]">Maestros</h6>
			<div class="[ row ]">
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile1.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ][ waves-effect waves-light ]">ver más</a>
				</div>
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ][ waves-effect waves-light ]">ver más</a>
				</div>
				<div class="[ col s4 ]">
					<img class="[ border-radius---50 ][ width--80 ]" src="<?php echo THEMEPATH; ?>images/profile2.png" alt="">
					<p>Juan O'Donoju</p>
					<a class="[ btn btn-rounded btn-primary-hollow ][ waves-effect waves-light ]">ver más</a>
				</div>
			</div>
		</section>
		<section>
			<h6 class="[ text-center ][ margin-bottom ]">Cursos</h6>
			<div class="[ row ]">
				<article class="[ col s12 m6 ]">
				<div id="box-card" class="[ card ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ][ width---100 ][ background-image ]" style="background-image: url(<?php echo $image_url; ?>)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Título del curso</span>
									<div id="promo" class="[ nuevo ]">
										<div></div>
										<p class="text-nuevo">NUEVO</p>
										<p class="text-destacado">DESTACADO</p>
										<p class="text-proximamente">PRÓXIMAMENTE</p>
									</div>
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]" id="cursos">
								<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
							</div>
						</div>
					</div>
				</div>
			</article>

			<article class="[ col s12 m6 ][ scrollspy ]">
				<div class="[ card ]">
					<div class="[ row ]">
						<div class="[ card-image ][ col s12 l6 ]">
							<div class="[ bg-image--rectangle ][ width---100 ][ background-image ]" style="background-image: url(<?php echo $image_url; ?>)">
								<div class="[ gradient-linear-opacity--light ][ width---100 height---100 ][ relative ]">
									<span class="[ card-title ]">Título del curso</span>
									<!-- ej- sin promo -->
								</div>
							</div>
						</div>
						<div class="[ col l6 ]">
							<div class="[ card-content ][ text-ellipsis height-box-ellipsis ]" id="cursos">
								<p>Diodorus eius auditor adiungit ad honestatem vacuitatem doloris quod non faceret si in voluptate summum bonum poneret non igitur bene verba tu fingas et ea dicas quae non sentias nam. specializing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
							</div>
							<div class="[ relative ][ top--22 ][ text-center ]">
								<a href="<?php echo site_url('/curso/'); ?>" class="[ btn btn-rounded waves-effect waves-light ]">más info</a>
							</div>
						</div>
					</div>
				</div>
			</article>
			</div>
		</section>
	</div>

<?php get_footer(); ?>