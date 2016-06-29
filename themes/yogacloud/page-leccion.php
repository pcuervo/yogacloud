<?php get_header(); the_post();  ?>
	<section>
		<div class="slider [ video-leccion ]">
			<ul class="slides">
				<li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light modal-trigger" href="#modal1"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li>
				<li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light modal-trigger" href="#modal1"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li>
				<li>
					<div class="[ main-banner ][ white-text text-center ]" style="height: 320px; background-size: cover; background-position: center bottom; background-image: url(<?php echo THEMEPATH; ?>images/photo-1464507768659-af94c4614d1a.jpg)">
						<div class="[ container relative ][ height---100 ] valign-wrapper">
							<a class="[ valign ][ block ][ width--75 ][ margin-auto ] waves-effect waves-light modal-trigger" href="#modal1"><img src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button"></a>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<!-- Modal Structure 1-->
		<div id="modal1" class="modal">
			<div class="modal-header">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><img src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu"></a>
			</div>
			<div class="modal-content [ video-leccion ]">
				<div class="video-container [ width---100 ]">
					<iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>

		<div class="[ row ][ text-center ]">
			<div class="[ col s6 ][ bg-primary ][ border-right--light ][ waves-effect waves-light ]">
				<a href="" id="prev" class="[ padding-vertical--small ][ white-text ][ block ]">
					<img class="[ margin-right ][ inline-block middle ]" src="<?php echo THEMEPATH; ?>icons/left-arrow.png" alt="">
					<span class="[ inline-block middle ]">anterior</span>
				</a>
			</div>
			<div class="[ col s6 ][ bg-primary ][ waves-effect waves-light ]">
				<a href="" id="next" class="[ padding-vertical--small ][ white-text ][ block ]">
					<span class="[ inline-block middle ]">siguiente</span>
					<img class="[ margin-left ][ inline-block middle ]" src="<?php echo THEMEPATH; ?>icons/right-arrow.png" alt="">
				</a>
			</div>
		</div>
	</section>

	<section class="[ container ]">
		<article class="[ content-user ]">
			<h5>Lección 1 - Placet igitur tibi cato cum res sumpseris non concessas.</h5>
			<p>Verum hoc loco sumo verbis his eandem certe vim voluptatis Epicurum nosse quam ceteros. Si enim ad populum me vocas, eum. Sed residamus, inquit, si placet. Cave putes quicquam esse verius. Duo Reges: constructio interrete.</p>
			<img src="<?php echo THEMEPATH; ?>images/sky.png" alt="sky image">
			<p>Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Quid, si non sensus modo ei sit datus, verum etiam animus hominis? Quamvis enim depravatae non sint, pravae tamen esse possunt. Egone quaeris, inquit, quid sentiam? [redacted]tilio Rufo.</p>
			<iframe src="https://player.vimeo.com/video/97989105?autoplay=1&color=00ddb3&title=0&byline=0&portrait=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<iframe width="100%" height="150" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/256340512&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=false"></iframe>
		</article>
		<div class="[ text-center ][ margin-bottom--large ]">
			<a class="[ btn btn-rounded ][ waves-effect waves-light ]">
				<img class="[ middle inline-blok ]" src="<?php echo THEMEPATH; ?>icons/download.png" alt="download image">
				<span class="[ middle inline-blok ]">descargar notas</span>
			</a>
		</div>
	</section>

<?php get_footer(); ?>