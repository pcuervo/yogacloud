<?php
	if( ! isset( $_GET['mid'] ) ){
		wp_redirect( home_url() );
	}

	get_header();
	the_post();

	$modulo = new YC_Modulo( array( 'id' => $_GET['mid'] ) );
	$leccion = new YC_Leccion( array( 'id' => get_the_id() ) );
	$leccion->get_position( $modulo->id );
	$previous_post_link = $modulo->get_previous_lesson_link( $leccion->get_position( $modulo->id ) );
	$next_post_link = $modulo->get_next_lesson_link( $leccion->get_position( $modulo->id ) );
	var_dump( $previous_post_link );
?>

<section class="[ text-center ]">
	<?php if ( ! empty( $leccion->video_info ) ) : ?>
		<article class="[ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen ][ min-height--500-l ]" >
			<div class="video-container">
				<?php echo $leccion->video_info['iframe']; ?>
			</div>
			<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ]" style=" background-size: cover; background-position: center bottom; background-image: url(<?php echo $leccion->video_info['thumbnail']; ?>)">
				<div class="[ container relative ][ height---100 ] valign-wrapper">
					<a id="play-button" class="[ valign ][ block ][ width--80 height--80 ][ margin-auto ][ btn btn-rounded ][ waves-effect waves-light ]">
						<img class="[ center-full ]" src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button">
					</a>
				</div>
			</div>
		</article>
	<?php endif; ?>

	<div class="[ text-center ][ hide-on-large-only ]">
		<a href="<?php echo $modulo->permalink; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-bottom ]">
			<span class="[ middle inline-block ]"><?php echo $modulo->name; ?></span>
		</a>
		<br />
		<?php if( $previous_post_link ) : ?>
			<a href="<?php $previous_post_link; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
				<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<span class="[ middle inline-block ]">anterior</span>
			</a>
		<?php else : ?>
			<button class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]" disabled="disabled">
				<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<span class="[ middle inline-block ]">anterior</span>
			</button>
		<?php endif; ?>
		<?php if( $next_post_link ) : ?>
			<a href="<?php echo $next_post_link; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
				<span class="[ middle inline-block ]">siguiente</span>
				<i class="[ no-margin-sides ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
			</a>
		<?php else : ?>
			<button class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]" disabled="disabled">
				<span class="[ middle inline-block ]">siguiente</span>
				<i class="[ no-margin-sides ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
			</button>
		<?php endif; ?>
	</div>
</section>

<div class="[ container ]">
	<div class="[ row ]">
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<?php if( $previous_post_link ) : ?>
				<a href="<?php echo $previous_post_link; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ]">
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
					<span class="[ middle inline-block ]">anterior</span>
				</a>
			<?php else : ?>
				<button href="<?php echo $previous_post_link; ?>" class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]" disabled="disabled">
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
					<span class="[ middle inline-block ]">anterior</span>
				</button>
			<?php endif; ?>
		</div>
		<section class="[ col s12 l8 ]">
<!-- 			<article>
				<div class="[ progress progress--large ]">
					<i class="[ icon icon-badge-star-2 icon-iconed ][ white-text ][ line-height--90 ][ relative z-index-1 ]"></i>
					<div class="[ progress-percent ][ progress-height ]"></div>
				</div>
			</article> -->
			<article class="[ content-user ]">
				<div class="[ text-center ]">
					<a href="<?php echo $modulo->permalink; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-right--xsmall ][ hide-on-med-and-down ]">
						<span class="[ middle inline-block ]"><?php echo $modulo->name; ?></span>
					</a>
				</div>
				<h5><?php the_title(); ?></h5>
				<p><?php echo get_the_content(); ?></p>
				<?php if( '' != $leccion->get_soundcloud_url() ) : ?>
<!-- 					<iframe width="100%" height="150" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/256340512&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=false"></iframe> -->
				<?php endif; ?>
			</article>
			<article class="[ text-center ]">
				<a class="[ btn btn-rounded ][ waves-effect waves-light ]">
					<img class="[ middle inline-block ][ width--18 ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
					<span class="[ middle inline-block ]">descargar notas</span>
				</a>
			</article>
		</section>
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<?php if( $next_post_link ) : ?>
				<a href="<?php echo $next_post_link; ?>" class="[ float-right ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
					<span class="[ middle inline-block ]">siguiente</span>
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
				</a>
			<?php else : ?>
				<button class="[ float-right ][ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-left--xsmall ]" disabled="disabled">
					<span class="[ middle inline-block ]">siguiente</span>
					<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
				</button>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>