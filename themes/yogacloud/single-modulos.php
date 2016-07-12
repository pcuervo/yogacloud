<?php
	if( ! isset( $_GET['cid'] ) ){
		wp_redirect( home_url() );
	}

	$curso = new YC_Curso( $_GET['cid'] );
	$modulo = new YC_Modulo( array( 'id' => get_the_id() ) );
	$lecciones = $modulo->get_lecciones();

	if ( ! $curso->was_bought_by_user( get_current_user_id() ) ){
		wp_redirect( $curso->get_permalink() );
	}

	get_header();
	the_post();
?>

<section>
	<article class="[ container ]">
		<div class="[ row ][ text-center ]">
			<div class="[ col s12 ]">
				<h1 class="[ width---100 ]"><?php echo $modulo->name ?></h1>
				<h6 class="[ width---100 ]"><strong><?php echo $curso->get_name() ?></strong></h6>
			</div>
			<div class="[ col s12 m10 offset-m1 l8 offset-l2 ]">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
</section>

<section class="[ no-margin ]">
	<h5 class="[ text-center ][ margin-bottom ]">Lecciones</h5>
	<div class="[ container--on-med-and-up ]">
		<div class="[ row ][ no-margin ]">
		<?php if( empty( $lecciones ) ) : ?>
			<p>Por el momento no hay lecciones en este módulo.</p>
		<?php else : ?>
			<?php foreach ( $lecciones as $lesson ) : ?>
				<div class="[ col s12 m6 ][ margin-bottom--on-med-and-up ]">
						<a class="[ white-text ]" href="<?php echo $lesson->permalink . '?mid=' . $modulo->id ?>">
						<div class="[ main-banner ]" >
							<div class="[ gradient-linear ]">
								<div class="[ min-height--160 ][ relative ]">
									<h2 class="[ padding-sides padding-vertical--small ][ no-margin ]"><strong><?php echo $lesson->name ?></strong><br><?php echo $lesson->description ?></h2>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
</section>

<!-- BLOQUEADO -->
<!-- <div class="[ col s12 m6 ][ margin-bottom--on-med-and-up ]">
		<a class="[ white-text ]" data-position="bottom" data-delay="50" onclick="Materialize.toast('Esta lección se desbloqueara una vez que termines con las lecciones anteriores.', 4000)">
			<div class="[ main-banner ]" style="background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1463214551910-9d4d4e4ee844.jpg)">
				<div class="[ gradient-linear-opacity ]">
					<div class="[ min-height--160 ][ relative ]">
						<h2 class="[ padding-sides padding-vertical--small ][ no-margin ][ color-secondary--transparent--light ]"><strong>Lección 4</strong><br>Placet igitur tibi cato cum res sumpseris non concessas.</h2>
						<!-- bloqueado
						<div class="[ valign-wrapper ][ absolute ][ width---100 ][ height---100 ][ top--0 ][ text-center ]">
							<i class="[ valign ][ width---100 ][ icon icon-look icon-small padding-sides--xsmall white-text ]"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div> -->

<?php get_footer(); ?>