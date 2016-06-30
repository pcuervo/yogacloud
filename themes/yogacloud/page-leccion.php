<?php get_header(); the_post();  ?>
	<section class="[ text-center ]">
		<div class="slider [ video-leccion ][ margin-bottom--small ]">
			<ul class="slides">
				<li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<!-- <div class="valign-wrapper">
							<video id="video_player" class="responsive-video [ valign ]" controls>
								<source src="<?php echo THEMEPATH; ?>video/yogacloud.mp4" type="video/mp4">
							</video>
						</div> -->
						<video id="video_player" class="[ absolute ][ z-index--1 ][ min-width---100 ]" autoplay loop>
				<source src="<?php echo THEMEPATH; ?>video/yogacloud.mp4" type="video/mp4">
			</video>
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a id="play-button" class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li>
				<!-- <li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li>
				<li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li> -->
			</ul>
		</div>

		<div class="[ text-center ][ hide-on-large-only ]">
			<a href="" id="prev" class="[ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]">
				<i class="[ no-margin-sides ][ icon icon-angle-left icon-xsmall ][ color-light ]"></i>
				<span class="[ middle inline-block ]">anterior</span>
			</a>
			<a href="" id="next" class="[ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
				<span class="[ middle inline-block ]">siguiente</span>
				<i class="[ no-margin-sides ][ icon icon-angle-right icon-xsmall ][ color-light ]"></i>
			</a>
		</div>
	</section>



	<div class="[ container ]">
		<div class="[ row ]">
			<div class="[ hide-on-med-and-down ][ col l2 ]">
				<a href="" id="prev" class="[ btn-rectangular-on-large ][ btn btn-rounded ][ btn-gray ][ waves-effect waves-light ][ margin-right--xsmall ]">
					<img class="[ middle inline-block ][ hidden--large ][ margin-right--xsmall ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
					<span class="[ middle inline-block ]">anterior</span>
				</a>
			</div>
			<section class="[ col s12 l8 ]">
				<article class="[ content-user ]">
					<h5>Lección 1 - Placet igitur tibi cato cum res sumpseris non concessas.</h5>
					<p>Verum hoc loco sumo verbis his eandem certe vim voluptatis Epicurum nosse quam ceteros. Si enim ad populum me vocas, eum. Sed residamus, inquit, si placet. Cave putes quicquam esse verius. Duo Reges: constructio interrete.</p>
					<img src="<?php echo THEMEPATH; ?>images/sky.png" alt="sky image">
					<p>Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Quid, si non sensus modo ei sit datus, verum etiam animus hominis? Quamvis enim depravatae non sint, pravae tamen esse possunt. Egone quaeris, inquit, quid sentiam? [redacted]tilio Rufo.</p>
					<div class="video-container">
						<iframe src="https://player.vimeo.com/video/97989105?autoplay=1&color=00ddb3&title=0&byline=0&portrait=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<iframe width="100%" height="150" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/256340512&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=false"></iframe>
				</article>
				<article class="[ text-center ]">
					<a class="[ btn btn-rounded ][ waves-effect waves-light ]">
						<img class="[ middle inline-block ][ width--18 ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
						<span class="[ middle inline-block ]">descargar notas</span>
					</a>
				</article>
			</section>
			<div class="[ hide-on-med-and-down ][ col l2 ]">
				<a href="" id="next" class="[ float-right ][ btn-rectangular-on-large ][ btn btn-rounded ][ waves-effect waves-light ][ margin-left--xsmall ]">
					<span class="[ middle inline-block ]">siguiente</span>
					<img class="[ middle inline-block ][ hidden--large ][ margin-left--xsmall ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
				</a>
			</div>
		</div>
	</div>


<?php get_footer(); ?>