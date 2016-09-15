<?php
	if( ! isset( $_GET['cid'] ) ){
		wp_redirect( site_url() );
		exit;
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
	<section>
		<h4 class="[ text-center ]">
			<?php if( 'es' == $lang ) : ?>
				Lecciones
			<?php else : ?>
				Lessons
			<?php endif; ?>
		</h4>
		<?php if( empty( $lecciones ) ) : ?>
			<p class="[ text-center ]">
				<?php if( 'es' == $lang ) : ?>
					Por el momento no hay lecciones en este módulo.
				<?php else : ?>
					There are no lessons in this module at the time.
				<?php endif; ?>
			</p>
		<?php else : ?>
			<?php foreach ( $lecciones as $lesson ) : ?>
				<div class="[ border-bottom--dark ]">
					<h5><?php echo $lesson->name ?></h5>
					<div class="[ row ]">
						<div class="[ col s12 m9 ]">
							<p><?php echo $lesson->short_description ?></p>
							<div class="[ padding-bottom ]">
								<a href="<?php echo $lesson->permalink . '?mid=' . $modulo->id . '&cid=' . $curso->id ?>" class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ]">ver más</a>
							</div>
						</div>
						<div class="[ col s12 m3 ][ text-center ]">
							<?php if ( $lesson->has_been_watched_by_user( get_current_user_id() ) ) : ?>
								<i class="[ icon icon-badge-star-1 icon--small ][ line-height--50 ][ bg-secondary ][ width--50 border-radius---50 ][ white-text text-center ]"></i>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
	<section class="[ text-center ]">
		<a href="<?php echo $curso->get_permalink() ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
			<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
			<span class="[ middle inline-block ]">
				<?php if( 'es' == $lang ) : ?>
					ir a curso
				<?php else : ?>
					go to course
				<?php endif; ?>
			</span>
		</a>
	</section>
</div>

<?php get_footer(); ?>