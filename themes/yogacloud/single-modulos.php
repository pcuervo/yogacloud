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

<div class="[ container ]">
	<div class="[ row ]">
		<div class="[ col s12 m6 l4 ][ float-right--on-med-and-up ]">
			<section class="[ text-center ]">
				<?php if ( 100 == $modulo->get_progress_by_user( get_current_user_id() ) ) : ?>
					<h5 class="[ text-center ][ margin-bottom ]">Completado</h5>
				<?php else : ?>
					<h5 class="[ text-center ][ margin-bottom ]">Progreso</h5>
				<?php endif; ?>
				<div class="[ row ]">
					<div class="[ progress progress--large ]">
						<p><i class="[ icon icon-badge-star-2 icon-iconed ][ white-text ][ relative z-index-1 ]"></i></p>
						<div class="[ progress-percent progress-<?php echo $modulo->get_progress_by_user( get_current_user_id() ) ?> ]"></div>
					</div>
				</div>
			</section>
		</div>
		<div class="[ col s12 m6 l8 ]">
			<section>
				<h4 class="[ text-center ]">Lecciones</h4>
				<div class="[ container--on-med-and-up ]">
					<div class="[ row ][ margin-bottom--xlarge ]">
						<?php if( empty( $lecciones ) ) : ?>
							<p class="[ text-center ]">Por el momento no hay lecciones en este módulo.</p>
						<?php else : ?>
							<?php foreach ( $lecciones as $lesson ) : ?>
								<div class="[ border-bottom--dark ]">
									<h5><?php echo $lesson->name ?></h5>
									<p><?php echo $lesson->description ?></p>
									<div class="[ padding-bottom ]">
										<a href="<?php echo $lesson->permalink . '?mid=' . $modulo->id . '&cid=' . $curso->id ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">ver más</a>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<div class="[ row ][ text-center ]">
						<a href="<?php echo $curso->get_permalink() ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
							<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
							<span class="[ middle inline-block ]">ir a lección</span>
						</a>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer(); ?>