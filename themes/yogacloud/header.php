<?php
	$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?></title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SEO -->
		<meta name="keywords" content="cursos, cursos en línea, meditación, meditación en línea, yoga cloud, yoga, yoga en línea, despertar espiritual, budismo y paz interior, paz interior, budismo,  técnicas del nahual, nahual, tradición oculta occidental, shambalanté, the yoga project, agora lucis, lecciones gratis, yogacloud, concepción cosmogónica de los toltecas, equilibrio físico y mental, prácticas prehispánicas naguales, frank díaz, fundación dondé, fundación donde">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<!-- Facebook, Twitter metas -->
		<?php if( is_curso( get_the_id() ) ) : ?>
			<meta property="og:title" content="<?php echo get_the_title(); ?>">
			<meta name="twitter:title" content="<?php echo get_the_title(); ?>" />
			<meta property="og:type" content="article" />
			<meta name="og:url" content="<?php echo get_the_permalink(); ?>" />
		<?php else : ?>
			<meta property="og:title" content="<?php bloginfo('name'); ?>" />
			<meta name="twitter:title" content="<?php bloginfo('name'); ?>" />
			<meta property="og:type" content="website" />
			<meta name="og:url" content="<?php echo site_url(); ?>" />
		<?php endif; ?>
		<meta name="og:description" content="<?php bloginfo('description'); ?>" />

		<meta property="og:image" content="<?php echo THEMEPATH; ?>images/fb-share.jpg">
		<meta property="og:image:width" content="210" />
		<meta property="og:image:height" content="110" />
		<meta property="fb:app_id" content="1750075545245803" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@TheYogaCloud" />
		<meta name="twitter:description" content="<?php bloginfo('description'); ?>" />
		<meta name="twitter:image" content="<?php echo THEMEPATH; ?>images/fb-share.jpg" />
		<!-- Canonical URL -->
		<link rel="canonical" href="https://cursos.yogacloud.tv/" />
		<!-- Compatibility -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="cleartype" content="on">

		<!-- Favicon - generated with http://www.favicomatic.com/ -->
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo THEMEPATH; ?>favicon/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>favicon/favicon-128.png" sizes="128x128" />

		<!-- Google font(s) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">

		<!-- Sitemap Google Verify -->
		<meta name="google-site-verification" content="wDczCCyydn5g6YFIhvgsepROo8bFj1fRT26cj-TMInM" />

		<!-- Hotjar Tracking Code for https://cursos.yogacloud.tv -->
		<script>
		    (function(h,o,t,j,a,r){
		        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		        h._hjSettings={hjid:254649,hjsv:5};
		        a=o.getElementsByTagName('head')[0];
		        r=o.createElement('script');r.async=1;
		        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		        a.appendChild(r);
		    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-80727980-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>

	<body>
		<header class="[ js-header ]">
			<nav>
				<div class="nav-wrapper [ container ]">
					<?php if( 'es' == $lang ) : ?>
						<a class="[ logo ]" href="<?php echo site_url('/'); ?>">
					<?php else : ?>
						<a class="[ logo ]" href="<?php echo site_url('/?lang=en'); ?>">
					<?php endif; ?>
							<img src="<?php echo THEMEPATH; ?>images/logos/cloud-primary.png" alt="Logo yogacloud">
						</a>
					<!-- Menu mobile -->
					<div class="[ inline-block ][ float-right ][ hide-on-large-only ][ menu-mobile ]">
						<!-- btn user menu -->
						<div class="[ block ][ float-left ]">
							<div id="js-btn-user">
								<i class="[ icon icon-user icon-iconed ][ color-primary ][ line-height--55 ]"></i>
							</div>
						</div>

						<!-- User menu -->
						<div class="[ js-hidden ][ user-mobile right-1000 ]">
							<!-- header User -->
							<div class="[ bg-light ][ height--64 ]">
								<div class="[ container ]">
									<a class="[ block ][ float-left ][ logo ]" href="<?php echo site_url('/'); ?>">
										<img src="<?php echo THEMEPATH; ?>images/logos/cloud-primary.png" alt="Logo yogacloud">
									</a>
									<div class="[ inline-block ][ float-right ]">
										<div class="[ block ][ float-left ][ margin-right--small ][ line-height--55 ]">
											<div id="js-btn-nav--user">
												<i class="[ icon icon-hamburger-menu icon--small ][ color-primary ]"></i>
											</div>
										</div>
										<div class="[ block ][ float-right ][ line-height--55 ]">
											<div id="js-hide-user">
												<i class="[ icon icon-close icon-small ][ color-primary ][ no-margin-right ]"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="container [ white-text ]">
								<!-- end Header User -->
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<?php if ( is_user_logged_in() ){
										$current_user = wp_get_current_user(); ?>
										<h5 class="[ no-margin-bottom ] ]">
											<?php if( 'es' == $lang ) : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>"><?php echo $current_user->user_firstname; ?></a>
											<?php else : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(site_url('my-account/?lang=en')) echo 'active'; ?>" href="<?php echo site_url('/my-account/?lang=en'); ?>"><?php echo $current_user->user_firstname; ?></a>
											<?php endif; ?>
										</h5>
										<div class="divider [ width--50 ][ margin-auto ]"></div>
										<h5 class="[ no-margin ]">
											<?php if( 'es' == $lang ) : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>">Mis cursos</a>
											<?php else : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(site_url('my-account/?lang=en')) echo 'active'; ?>" href="<?php echo site_url('/my-account/?lang=en'); ?>">My courses</a>
											<?php endif; ?>
										</h5>
										<div class="divider [ width--50 ][ margin-auto ]"></div>
										<h5 class="[ no-margin ]">
											<?php if( 'es' == $lang ) : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ]" href="<?php echo site_url('/my-account/customer-logout/'); ?>">Salir</a>
											<?php else : ?>
												<a class="[ padding-vertical ][ block ][ width---100 ][ white-text ]" href="<?php echo site_url('/my-account/customer-logout/?lang=en'); ?>">Sing out</a>
											<?php endif; ?>
										</h5>
									<?php } ?>
									<?php if ( ! is_user_logged_in() ){ ?>
										<h5 class="[ no-margin-bottom ]">
											<?php if( 'es' == $lang ) : ?>
												<a class="[ white-text ][ block ][width---100 ][ padding-vertical ] <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>">Ingresa / Registrate</a>
											<?php else : ?>
												<a class="[ white-text ][ block ][width---100 ][ padding-vertical ] " href="<?php echo site_url('/my-account/?lang=en'); ?>">Login / Register</a> <!-- <?php if(site_url('my-account/?lang=en')) echo 'active'; ?> -->
											<?php endif; ?>
										</h5>
									<?php } ?>
								</div>
								<div class="[ footer-menu ]">
									<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
										<h5 class="white-text [ no-margin-top ]">
											<?php if( 'es' == $lang ) : ?>
												¿Necesitas ayuda?
											<?php else : ?>
												Need Help?
											<?php endif; ?>
										</h5>
										<a href="tel:+525568404414" class="[ white-text ]"><i class="[ icon icon-phone icon--28 padding-sides--xsmall ]"></i></a>
										<a href="#" class="[ white-text ][ js-contacto-email ]"><i class="[ margin-right ][ icon icon-email-fill icon--23 padding-sides--xsmall ]"></i></a>
									</div>
									<div>
										<h5 class="white-text [ no-margin-top ]">
											<?php if( 'es' == $lang ) : ?>
												Seámos amigos
											<?php else : ?>
												Let’s be friends
											<?php endif; ?>
										</h5>
										<a href="https://twitter.com/theyogacloud" target="_blank"  class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ]"></i></a>
										<a href="https://www.facebook.com/TheYogaCloud" target="_blank" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
										<a href="https://www.instagram.com/theyogacloud/" target="_blank" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- end user menu -->

						<!-- btn Menú -->
						<div class="[ block ][ float-right ][ line-height--54 ]">
							<div id="js-btn-nav">
								<i class="[ icon icon-hamburger-menu icon--small ][ color-primary ]"></i>
							</div>
						</div>

						<!-- Menu -->
						<div class="[ js-hidden ][ nav-mobile right-1000 ]">
							<div class="[ bg-light ][ height--64 ]">
								<div class="[ container ]">
									<!-- header menu -->
									<?php if( 'es' == $lang ) : ?>
										<a class="[ block ][ float-left ][ logo ]" href="<?php echo site_url('/'); ?>">
									<?php else : ?>
										<a class="[ block ][ float-left ][ logo ]" href="<?php echo site_url('/?lang=en'); ?>">
									<?php endif; ?>
										<img src="<?php echo THEMEPATH; ?>images/logos/cloud-primary.png" alt="Logo yogacloud">
									</a>
									<div class="[ inline-block ][ float-right ][ line-height--54 ]">
										<div class="[ block ][ float-left ]">
											<div id="js-btn-user--nav">
												<i class="[ icon icon-user icon-iconed ][ color-primary ]"></i>
											</div>
										</div>
										<div class="[ block ][ float-right ]">
											<div id="js-hide-nav">
												<i class="[ icon icon-close icon-small ][ color-primary ][ no-margin-right ]"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="[ white-text ]">

								<!-- end Header menu -->
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<h5 class="[ no-margin ]" id="cursos-nav">
										<?php if( 'es' == $lang ) : ?>
											<a class="[ white-text ][ block padding-vertical ][ margin-top--small ] <?php if(site_url('/#cursos')) echo 'active'; ?>" href="<?php echo site_url('/#cursos'); ?>">Cursos</a>
										<?php else : ?>
											<a class="[ white-text ][ block padding-vertical ][ margin-top--small ] <?php if(site_url('/')) echo 'active'; ?>" href="<?php echo site_url('/?lang=en'); ?>">Courses</a>
										<?php endif; ?>
									</h5>
									<div class="divider [ width--50 ][ margin-auto ]"></div>
									<h5 class="[ no-margin ]">
										<a class="[ white-text ][ block padding-vertical ]" href="https://yogacloud.net/" target="_blank">Yoga online</a>
									</h5>
									<div class="divider [ width--50 ][ margin-auto ]"></div>
									<?php do_action('wpml_add_language_selector'); ?>
								</div>
								<div class="[ container ]">
									<div class="[ footer-menu ]">
										<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
											<?php if( 'es' == $lang ) : ?>
												<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
											<?php else : ?>
												<h5 class="white-text [ no-margin-top ]">Need Help?</h5>
											<?php endif; ?>
											<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon icon-phone icon--28 padding-sides--xsmall ]"></i></a>
											<a href="#" class="[ white-text ][ js-contacto-email ]"><i class="[ margin-right ][ icon icon-email-fill icon--23 padding-sides--xsmall ]"></i></a>
										</div>
										<div>
											<?php if( 'es' == $lang ) : ?>
												<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
											<?php else : ?>
												<h5 class="white-text [ no-margin-top ]">Let’s be friends</h5>
											<?php endif; ?>
											<a href="https://twitter.com/theyogacloud" target="_blank"  class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ]"></i></a>
											<a href="https://www.facebook.com/TheYogaCloud" target="_blank" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
											<a href="https://www.instagram.com/theyogacloud/" target="_blank" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				<!-- menu desktop -->
					<div class="[ menu-desktop ][ hide-on-med-and-down ]">
						<?php if(is_front_page() ) { ?>

							<?php if( 'es' == $lang ) : ?>
								<a class="<?php if(is_page('front-page#cursos')) echo 'active'; ?>" href="#cursos">Cursos</a>
							<?php else : ?>
								<a class="<?php if(is_page('front-page#cursos')) echo 'active'; ?>" href="#cursos">Courses</a>
							<?php endif; ?>

						<?php } ?>
						<?php if( ! is_front_page() ) { ?>

							<?php if( 'es' == $lang ) : ?>
								<a class="<?php if(is_page('curso')) echo 'active'; ?>" href="<?php echo site_url('/#cursos'); ?>">Cursos</a>
							<?php else : ?>
								<a class="<?php if(is_page('curso')) echo 'active'; ?>" href="<?php echo site_url('/?lang=en'); ?>">Courses</a>
							<?php endif; ?>

						<?php } ?>
						<a class="" href="https://yogacloud.net/" target="_blank">Yoga online</a>
						<!-- Dropdown Structure -->
						<?php if ( is_user_logged_in() ){ ?>
							<!-- Dropdown Trigger -->
							<?php if( 'es' == $lang ) : ?>
								<a class="dropdown-button <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('my-account'); ?>" data-activates="dropdown-user">
							<?php else : ?>
								<a class="dropdown-button <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('my-account/?lang=en'); ?>" data-activates="dropdown-user">
							<?php endif; ?>
									<i class="[ icon icon-user icon-small ][ no-margin-sides ][ color-primary ][ line-height--52 ]"></i>
									<div class="[ overflow-hidden text-overflow--ellipsis white-space--nowrap inline-block middle ]"><?php echo $current_user->user_firstname; ?></div>
									<i class="[ icon icon-angle-down icon-xsmall ][ color-primary ][ line-height--30 ][ no-margin-sides ]"></i>
								</a>
							<!-- Dropdown Structure -->
							<ul id="dropdown-user" class="dropdown-content">
								<li>
									<?php if( 'es' == $lang ) : ?>
										<a href="<?php echo site_url('my-account'); ?>" class="<?php if(is_page('my-account')) echo 'active'; ?>">Mis cursos</a>
									<?php else : ?>
										<a href="<?php echo site_url('my-account/?lang=en'); ?>" class="<?php if(is_page('my-account')) echo 'active'; ?>">My courses</a>
									<?php endif; ?>
								</li>
								<li><a href="<?php echo site_url('/my-account/customer-logout/'); ?>">Sign out</a></li>
							</ul>
						<?php } ?>
						<?php if ( ! is_user_logged_in() ){ ?>
							<?php if( 'es' == $lang ) : ?>
								<a class="<?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('my-account'); ?>">Ingresa / Registrate</a>
							<?php else : ?>
								<a class="" href="<?php echo site_url('my-account/?lang=en'); ?>">Login / Register</a><!-- <?php if(site_url('my-account/?lang=en')) echo 'active'; ?> -->
							<?php endif; ?>
						<?php } ?>
						<!-- language -->
						<?php do_action('wpml_add_language_selector'); ?>
					</div>
				</div>
			</nav>
		</header>

		<div class="[ main-body ]"> <!-- for footer bottom -->