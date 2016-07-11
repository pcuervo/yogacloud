<?php
	if( ! isset( $_GET['mid'] ) ){
		wp_redirect( home_url() );
	}

	get_header(); 
	the_post();  

	$modulo = new YC_Modulo( array( 'id' => $_GET['mid'] ) );
	$leccion = new YC_Leccion( array( 'name' => get_the_title() ) );
	$previous_post_link = '#';
	$next_post_link = '#';
?>

<section class="[ text-center ]">
	<article class="[ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen ][ min-height--500-l ]" >
		<div class="video-container">
			<iframe id="video" class="[ max-height-screen ]" src="https://player.vimeo.com/video/73308983?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ]" style=" background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
			<div class="[ container relative ][ height---100 ] valign-wrapper">
				<a id="play-button" class="[ valign ][ block ][ width--80 height--80 ][ margin-auto ][ btn btn-rounded ][ waves-effect waves-light ]">
					<img class="[ center-full ]" src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button">
				</a>
			</div>
		</div>
	</article>

	<div class="[ text-center ][ hide-on-large-only ]">
		<a href="<?php $previous_post_link; ?>" class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]">
			<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
			<span class="[ middle inline-block ]">anterior</span>
		</a>
		<a href="<?php $next_post_link; ?>" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
			<span class="[ middle inline-block ]">siguiente</span>
			<i class="[ no-margin-sides ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
		</a>
	</div>
</section>

<div class="[ container ]">
	<div class="[ row ]">
		<div class="[ hide-on-med-and-down ][ col l2 ]">
			<a href="<?php $previous_post_link; ?>" class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]">
				<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<span class="[ middle inline-block ]">anterior</span>
			</a>
		</div>
		<section class="[ col s12 l8 ]">
			<article class="[ content-user ]">
				<h5><?php echo $modulo->name; ?> - <?php the_title(); ?></h5>
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
			<a href="<?php $next_post_link; ?>" class="[ float-right ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
				<span class="[ middle inline-block ]">siguiente</span>
				<i class="[ no-margin-sides ][ hidden--large ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
			</a>
		</div>
	</div>
</div>


<?php get_footer(); ?>