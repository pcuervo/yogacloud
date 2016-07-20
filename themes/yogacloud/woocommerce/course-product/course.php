<?php
	global $product;
	$curso 			= new YC_Curso( $product->id );
	$badge 			= $curso->get_badges();
	$modulos 		= $curso->get_modulos();
	$maestros 		= $curso->get_maestros();
	$trailer_info 	= $curso->get_trailer_info();
?>

<?php if ( ! empty( $trailer_info ) ) : ?>
	<section id="video-whit-button" class="[ min-height--500-l ][ no-margin ][ main-banner ][ white-text text-center ][ relative overflow-hidden ][ width---100 ][ max-height-screen_button ]" >
		<div class="video-container [ controls-show ]">
			<?php echo $trailer_info['iframe']; ?>
		</div>
		<div id="background-video" class="[ absolute top--0 width---100 height---100 ][ in-front ][ hide-on-small-and-down ]" style=" background-size: cover; background-position: center bottom; background-image: url(<?php echo $trailer_info['thumbnail']; ?>">
			<div class="[ gradient-linear-opacity ][ height---100 ][ relative ]">
				<div class="[ container relative ][ height---100 ] valign-wrapper">
					<a id="play-button" class="[ valign ][ block ][ width--80 height--80 ][ margin-auto ][ btn btn-rounded ][ waves-effect waves-light ]">
						<img class="[ center-full ]" src="<?php echo THEMEPATH; ?>icons/play-button.png" alt="play button">
					</a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if( ! $curso->was_bought_by_user( get_current_user_id() ) ) : ?>
	<div class="[ relative ][ bottom--22 ][ z-index-10 ][ text-center ]">
		<?php wc_get_template( 'single-product/add-to-cart/course.php' ); ?>
	</div>
<?php endif; ?>

<section class="[ container ]">
	<h1 class="[ h2 ][ width---100 ][ text-center ]"><?php echo $curso->get_name(); ?></h1>
	<h2 class="[ h4 ][ width---100 ][ text-center ]"><?php echo $curso->subtitle; ?></h2>
	<div class="[ row ]">
		<div class="[ col s12 offset-m2 m8 offset-l3 l6 ]">
			<div class="[ row ][ text-center ][ margin-top ]">
				<div class="[ col s4 ][ border-right--dark ][ <?php echo empty( $curso->lessons_per_week ) ? 'offset-s2' : ''  ?> ]">
					<h5 class="[ no-margin-bottom ]"><?php echo $curso->num_lessons ?></h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">lecciones</p>
				</div>
				<?php if ( ! empty( $curso->lessons_per_week ) ) : ?>
					<div class="[ col s4 ][ border-right--dark ]">
						<h5 class="[ no-margin-bottom ]">1</h5>
						<p class="[ margin-bottom--xsmall no-margin-top ]">por semana</p>
					</div>
				<?php endif; ?>
				<div class="[ col s4 ]">
					<h5 class="[ no-margin-bottom ]"><?php echo $curso->hours?></h5>
					<p class="[ margin-bottom--xsmall no-margin-top ]">horas</p>
				</div>
			</div>
		</div>
	</div>
	<article class="[ row ][ text-center ]">
		<div class="[ col col s12 m10 offset-m1 l8 offset-l2 ]">
			<p><?php echo get_the_content(); ?></p>
		</div>
	</article>
	<div class="[ text-center ][ hidden ]">
		<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ text-center ]">regalar curso</a>
	</div>
</section>
<div class="[ container ]">
	<div class="[ row ]">
		<div class="[ col s12 m4 l2 ][ float-right--on-med-and-up ]">
			<?php if( $curso->was_bought_by_user( get_current_user_id() ) && ! empty( $badge ) ) : ?>
				<section class="[ text-center ]">
					<h5 class="[ margin-bottom ]">Progreso</h5>
					<div class="[ row ]">
						<div class="[ progress progress--large ]">
							<img class="[ responsive-img ][ relative z-index-1 ]" src="<?php echo $badge[0]->thumb_url ?>" alt="icon badge">
							<div class="[ progress-percent progress-<?php echo $curso->get_progress_by_user( get_current_user_id() ) ?> ]"></div>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<section class="[ text-center ]">
				<h5 class=" margin-bottom ]">Rating</h5>
				<div class="[ rating-show ]" >
					<?php for ($x = 1; $x <= $curso->get_ratings(); $x++) :  ?>
						<i class="[ material-icons ][ color-primary ]">favorite</i>
					<?php endfor;
					$border = 5 - $curso->get_ratings();
					for ($x = 1; $x <= $border; $x++) :  ?>
						<i class="[ material-icons ][ color-primary ]">favorite_border</i>
					<?php endfor; ?>
				</div>
			</section>

			<?php if ( ! empty($maestros) ): ?>

				<section class="[ text-center ]">
					<h5 class="[ margin-bottom ]">Impartido por</h5>
					<?php foreach ( $maestros as $maestro ) : ?>
						<article>
							<?php echo $maestro->thumbnail; ?>
							<div class="[ clearfix ]"></div>
							<a class="[ btn btn-rounded btn-primary-hollow waves-effect waves-light ][ btn-small ] waves-effect waves-light modal-trigger" href="#maestro-modal-<?php echo $maestro->id ?>">ver más</a>
						</article>

						<!-- Modal Structure -->
						<div id="maestro-modal-<?php echo $maestro->id ?>" class="modal [ maestros-transparent ][ white-text ]">
							<div class="modal-content [ white-text ]">
								<div class="[ row ][ padding-top--large ]">
									<div class="[ col s12 m8 offset-m2 l6 offset-l3 ]">
										<a href="#!" class="[ block ][ no-padding ] modal-action modal-close waves-effect waves-green btn-flat"><img class="[ float-right ]" src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu"></a>
										<h3 class="[ text-center ][ margin-bottom ]"><?php echo $maestro->name; ?></h3>
										<?php echo $maestro->medium; ?>
										<div class="[ text-center ][ margin-bottom ]">
											<?php if ( !empty($maestro->twitter) ){ ?>
												<a target="_blank" href="<?php echo $maestro->twitter; ?>" class="[ white-text ]"><i class="[ icon-twitter icon-iconed padding-sides--xsmall ]"></i></a>
											<?php } ?>
											<?php if ( !empty($maestro->facebook) ){ ?>
												<a target="_blank" href="<?php echo $maestro->facebook; ?>" class="[ white-text ]"><i class="[ icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
											<?php } ?>
											<?php if ( !empty($maestro->instagram) ){ ?>
												<a target="_blank" href="<?php echo $maestro->instagram; ?>" class="[ white-text ]"><i class="[ icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
											<?php } ?>
										</div>
										<div class="[ margin-bottom ][ flow-text ]">
											<?php echo apply_filters('the_content', $maestro->description); ?>
										</div>
										<?php if ( !empty($maestro->url) ){ ?>
											<a class="[ white-text ][ text-underline ]" href="<?php echo $maestro->url; ?>"><?php echo $maestro->url; ?></a>
										<?php } ?>
									</div>
								</div>

							</div>
						</div>

					<?php endforeach; ?>

				</section>

			<?php endif; ?>

			<section class="[ text-center ]">
				<h5 class="[ margin-bottom ]">Comparte este curso</h5>
				<?php echo do_shortcode("[apss_share networks='facebook, twitter' share_text='']"); ?>
			</section>

		</div>
		<div class="[ col s12 m8 l10 ]">
			<section>
				<h4 class="[ text-center ]">Temario</h4>
				<ul class="collapsible" data-collapsible="expandable">
					<?php foreach ( $modulos as $modulo ) :
						$lecciones = $modulo->get_lecciones();
						?>
						<li class="[ active ]">
							<div class="[ collapsible-header active ]">
								<div class="[ padding ][ course--module ]">
									<div class="[ row ][ no-margin ]">
										<div class="[ col s12 m9 ]">
											<h5 class="[ no-margin ]"><?php echo $modulo->name ?></h5>
											<p class="[ no-margin-bottom ]"><?php echo $modulo->description ?></p>
										</div>
										<div class="[ col s12 m3 ][ width---19-m padding-left-m ][ text-center ]">
											<?php if ( $modulo->get_progress_by_user( get_current_user_id() ) === 100 ) : ?>
												<i class="[ icon icon-badge-star-1 icon-medium ][ line-height--80 ][ bg-primary ][ width--80 border-radius---50 ][ white-text text-center ]"></i>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="[ collapsible-body ]">
								<?php foreach ( $lecciones as $key => $lesson ) : ?>
									<?php if( $curso->was_bought_by_user( get_current_user_id() ) || $lesson->is_free() ) : ?>
										<a class="[ color-dark ][ transition ][ waves-effect waves-light ] " href="<?php echo $lesson->permalink . '?mid=' . $modulo->id . '&cid=' . $curso->id ?>">
									<?php endif; ?>
										<div class="[ course--module--lesson ][ color-dark ]">
											<div class="[ width---80-m ][ inline-block ][ middle ][ padding-left ]">
												<h6 class="[ no-margin ][ relative ]">
													<?php echo $key+1 . '. ' . $lesson->name ?>
												</h6>
												<p class="[ no-margin-bottom ]"><?php echo $lesson->short_description ?></p>
											</div>
											<div class="[ width---19-m height---100 ][ inline-block ][ middle ][ text-center ]">
												<?php if( $lesson->is_free() ) : ?>
													<div id="promo" class="[ gratis badge ]"></div>
													<!-- <span class="[ gratis badge ]"></span> -->
												<?php endif; ?>
												<?php if ( $lesson->has_been_watched_by_user( get_current_user_id() ) ) : ?>
													<i class="[ icon icon-badge-star-1 icon-large ][ color-secondary ][ text-center ]"></i>
												<?php endif; ?>
											</div>
										</div>
									<?php if( $curso->was_bought_by_user( get_current_user_id() ) || $lesson->is_free() ) : ?>
										</a>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		</div>
	</div>
</div>