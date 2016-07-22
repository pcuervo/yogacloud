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
	$video_info = $leccion->get_video_info();
	$previous_post_link = $modulo->get_previous_lesson_link( $leccion->get_position( $modulo->id ) );
	$next_post_link = $modulo->get_next_lesson_link( $leccion->get_position( $modulo->id ) );



	if ( ! $curso->was_bought_by_user( get_current_user_id() ) && ! $leccion->is_free() ){
		wp_redirect( $curso->get_permalink() );
	}
	get_header();
	the_post();
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
			<h6 class="[ white-text ][ no-margin ]"><small>Lección completada</small><i class="[ icon icon-badge-star-1 icon-xsmall ][ color-light ]"></i></h6>
		</article>
	<?php else : ?>
		<article class="[ bg-secondary ][ padding-vertical--xsmall margin-bottom--small ][ transition not-visible ][ lesson-completed js-lesson-completed ]">
			<h6 class="[ white-text ][ no-margin ]"><small>Lección completada</small><i class="[ icon icon-badge-star-1 icon--small ][ color-light ]"></i></h6>
		</article>
	<?php endif; ?>

	<article class="[ container ]">
		<!-- Switch -->
		<div class="[ switch ][ margin-bottom--small ]">
			<label>
				<small>Reproducción automática</small>
				<input type="checkbox">
				<span class="lever"></span>
			</label>
		</div>
	</article>

	<article class="[ text-center ][ hide-on-large-only ]">
		<a href="<?php echo $modulo->permalink; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-bottom ]">
			<span class="[ middle inline-block ]"><?php echo $modulo->name; ?></span>
		</a>
		<br />
		<?php if( $previous_post_link ) : ?>
			<a href="<?php $previous_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
				<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<span class="[ middle inline-block ]">anterior</span>
			</a>
		<?php endif; ?>
		<?php if( $next_post_link ) : ?>
			<a href="<?php echo $next_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
				<span class="[ middle inline-block ]">siguiente</span>
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
					<span class="[ middle inline-block ]">anterior</span>
				</a>
			<?php else : ?>
				&nbsp;
			<?php endif; ?>
		</div>
		<section class="[ col s12 l8 ]">
			<article class="[ text-center ][ margin-bottom--large ]">
				<a href="<?php echo $modulo->permalink . '?cid=' . $curso->id ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ][ hide-on-med-and-down ]">
					<span class="[ middle inline-block ]"><?php echo $modulo->name; ?></span>
				</a>
			</article>
 			<article class="[ content-user ]">
				<h1 class="[ h5 ]"><?php the_title(); ?><?php echo ( !empty($leccion->length()) ? ' <small>'.$leccion->length().'</small>' : ''); ?></h1>
				<p><?php echo get_the_content(); ?></p>
				<?php if( '' != $leccion->get_soundcloud_url() ) : ?>
				<?php endif; ?>
			</article>
			<?php
			$notas = get_attached_media( 'application/pdf', $post->id );
			foreach ($notas as $key => $nota) { ?>
				<article class="[ text-center ]">
					<a class="[ btn btn-rounded ][ waves-effect waves-light ]" href="<?php echo $nota->guid; ?>">
						<img class="[ middle inline-block ][ width--18 ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
						<span class="[ middle inline-block ]">descargar notas</span>
					</a>
				</article>
			<?php } ?>
		</section>
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<?php if( $next_post_link ) : ?>
				<a href="<?php echo $next_post_link . '&cid=' . $curso->id; ?>" class="[ height--40 line-height--37 ][ float-right ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
					<span class="[ middle inline-block ]">siguiente</span>
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
				<h3 class="[ white-text ][ ]"><strong>¡Haz completado el curso!</strong></h3>
				<i class="[ icon icon-badge-star-1 icon-xlarge ][ color-light ][ margin-bottom--large ]"></i>
				<?php  echo do_shortcode('[show_rating]');  ?>
			</div>
		</div>

	</div>
</div>


<?php get_footer(); ?>