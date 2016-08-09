<?php
	if( ! isset( $_GET['mid'] ) || ! isset( $_GET['cid'] ) ){
		wp_redirect( home_url() );
		exit;
	}

	$curso = new YC_Curso( $_GET['cid'] );
	$modulo = new YC_Modulo( array( 'id' => $_GET['mid'] ) );
	$leccion = new YC_Leccion( array( 'id' => get_the_id() ) );
	$leccion->get_position( $modulo->id );
	$leccion->set_curso_id( $curso->id );
	$leccion->set_modulo_id( $modulo->id );
	$video_info = $leccion->get_video_info();
	$previous_post_link = $modulo->get_previous_lesson_link( $leccion->get_position( $modulo->id ) );
	$next_post_link = $modulo->get_next_lesson_link( $leccion->get_position( $modulo->id ) );

	$badges = $curso->get_badges();

	if ( ! $curso->was_bought_by_user( get_current_user_id() ) && ! $leccion->is_free() ){
		wp_redirect( $curso->get_permalink() );
	}
	get_header();
	the_post();

	$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>

<section class="[ text-center ]">
	<?php if ( ! empty( $video_info ) ) : ?>
		<article class="[ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen_button min-height--500-l ][ no-margin ]" >
			<div class="video-container [ controls-show ]">
				<?php echo $video_info['iframe']; ?>
			</div>
			<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ][ hide-on-small-and-down ][ background-image ]" style="background-image: url(<?php echo $video_info['thumbnail']; ?>)">
				<div class="[ container relative ][ height---100 ] valign-wrapper">
					<a id="play-button" class="[ valign ][ block ][ width--80 height--80 ][ margin-auto ][ btn btn-rounded ][ waves-effect waves-light ]">
						<img class="[ center-full ]" src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button">
					</a>
				</div>
			</div>
		</article>
	<?php else : ?>
		<h3 class="[ color-secondary ][ margin-top--large no-margin-bottom ]">La lección aún no está disponible, lo sentimos.</h3>
	<?php endif; ?>

	<?php if ( $leccion->has_been_watched_by_user( get_current_user_id() ) ) : ?>
		<article class="[ bg-secondary ][ padding-vertical--xsmall margin-bottom--small ][ lesson-completed ]">
			<h6 class="[ white-text ][ no-margin ]"><small>
				<?php if( 'es' == $lang ) : ?>
					Lección completada
				<?php else : ?>
					Lesson completed
				<?php endif; ?>
			</small><i class="[ icon icon-badge-star-1 icon-xsmall ][ color-light ]"></i></h6>
		</article>
	<?php else : ?>
		<article class="[ bg-secondary ][ padding-vertical--xsmall margin-bottom--small ][ transition not-visible ][ lesson-completed js-lesson-completed ]">
			<h6 class="[ white-text ][ no-margin ]"><small>
				<?php if( 'es' == $lang ) : ?>
					Lección completada
				<?php else : ?>
					Lesson completed
				<?php endif; ?>
			</small><i class="[ icon icon-badge-star-1 icon--small ][ color-light ]"></i></h6>
		</article>
	<?php endif; ?>

	<article class="">
		<!-- Switch -->
		<div class="[ switch ]">
			<label>
				<?php if( 'es' == $lang ) : ?>
					<small>Reproducción automática</small>
				<?php else : ?>
					<small>Autoplay</small>
				<?php endif; ?>
				<input id="autoplay" type="checkbox">
				<span class="lever"></span>
			</label>
		</div>
	</article>

	<article class="[ text-center ][ hide-on-large-only ]">
		<?php if( $previous_post_link ) : ?>
			<a href="<?php $previous_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
				<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<?php if( 'es' == $lang ) : ?>
					<span class="[ middle inline-block ]">anterior</span>
				<?php else : ?>
					<span class="[ middle inline-block ]">before</span>
				<?php endif; ?>
			</a>
		<?php endif; ?>
		<?php if( $next_post_link ) : ?>
			<a href="<?php echo $next_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ][ js-siguiente ]">

				<?php if( 'es' == $lang ) : ?>
					<span class="[ middle inline-block ]">siguiente</span>
				<?php else : ?>
					<span class="[ middle inline-block ]">after</span>
				<?php endif; ?>
				<i class="[ no-margin-sides ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
			</a>
		<?php endif; ?>
	</article>
</section>

<div class="[ container ]">
	<div class="[ row ][ no-margin ]">
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<?php if( $previous_post_link ) : ?>
				<a href="<?php echo $previous_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>

					<?php if( 'es' == $lang ) : ?>
						<span class="[ middle inline-block ]">anterior</span>
					<?php else : ?>
						<span class="[ middle inline-block ]">before</span>
					<?php endif; ?>
				</a>
			<?php else : ?>
				&nbsp;
			<?php endif; ?>
		</div>
		<section class="[ col s12 l8 ]">
 			<article class="">
 				<div class="[ text-center ]">
					<h1 class="[ h4 ][ no-margin-top ]"><?php the_title(); ?><?php echo ( ! empty($leccion->length()) ? ' <span class="[ h6 ]">'.$leccion->length().'</span>' : ''); ?></h1>
					<?php if( 'es' == $lang ) : ?>
						<h2 class="[ h6 ]">Curso - <?php echo $curso->get_name(); ?></h2>
					<?php else : ?>
						<h2 class="[ h6 ]">Course - <?php echo $curso->get_name(); ?></h2>
					<?php endif; ?>
					<a href="<?php echo $curso->permalink; ?>" class="[ btn btn-rounded btn-hollow btn-small ][ waves-effect waves-light ]">

						<?php if( 'es' == $lang ) : ?>
							Lección completada
						<?php else : ?>
							ver curso
						<?php endif; ?>
					</a>
				</div>
				<div class="[ content-user ]">
					<?php the_content(); ?>
				</div>
				<?php if( '' != $leccion->get_soundcloud_url() ) : ?>
				<?php endif; ?>
			</article>
			<?php
			$notas = get_attached_media( 'application/pdf', $post->id );
			foreach ($notas as $key => $nota) { ?>
				<article class="[ text-center ]">
					<a class="[ btn btn-rounded ][ waves-effect waves-light ]" href="<?php echo $nota->guid; ?>">
						<img class="[ middle inline-block ][ width--18 ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
						<?php if( 'es' == $lang ) : ?>
							<span class="[ middle inline-block ]">descargar notas</span>
						<?php else : ?>
							<span class="[ middle inline-block ]">download notes</span>
						<?php endif; ?>
					</a>
				</article>
			<?php } ?>
		</section>
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<?php if( $next_post_link ) : ?>
				<a href="<?php echo $next_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ float-right ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ][ js-siguiente ]">
					<?php if( 'es' == $lang ) : ?>
						<span class="[ middle inline-block ]">siguiente</span>
					<?php else : ?>
						<span class="[ middle inline-block ]">after</span>
					<?php endif; ?>
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
				</a>
			<?php else : ?>
				&nbsp;
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="curso-modal" class="[ modal ][ maestros-transparent ][ white-text ]">
	<div class="modal-content [ white-text ]">
		<div class="[ row ][ padding-top--large ]">
			<div class="[ col s12 m8 offset-m2 l6 offset-l3 ][ text-center ]">
				<a href="#!" class="[ block ][ no-padding ] modal-action modal-close waves-effect waves-green btn-flat"><img class="[ float-right ]" src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu"></a>
				<?php if( 'es' == $lang ) : ?>
					<h3 class="[ white-text ][ ]"><strong>¡Haz completado el curso!</strong></h3>
				<?php else : ?>
					<h3 class="[ white-text ][ ]"><strong>You have completed the course!</strong></h3>
				<?php endif; ?>
				<img src="<?php echo $badges[0]->thumb_url; ?>" alt="Badge curso">
				<?php  echo do_shortcode('[show_rating]');  ?>
			</div>
		</div>

	</div>
</div>


<?php get_footer(); ?>