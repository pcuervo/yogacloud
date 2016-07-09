<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Yogacloud</title>
		<!-- Sets initial viewport load and disables zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- SEO -->
		<meta name="keywords" content="">
		<meta name="description" content="<?php bloginfo('description'); ?>">
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
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

	</head>

	<body>
		<header class="[ js-header ]">
			<nav>
				<div class="nav-wrapper [ container ]">
					<a class="[ logo ]" href="<?php echo site_url('/'); ?>">
						<img src="<?php echo THEMEPATH; ?>images/logos/cloud-primary.png" alt="Logo yogacloud">
					</a>
					<!-- Menu mobile -->
					<div class="[ inline-block ][ float-right ][ hide-on-large-only ][ menu-mobile ]">
						<!-- btn user menu -->
						<div class="[ block ][ float-left ]">
							<div id="js-btn-user">
								<i class="[ icon icon-user icon-iconed ][ color-light ][ line-height--64 ]"></i>
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
										<div class="[ block ][ float-left ][ margin-right--small ][ line-height--64 ]">
											<div id="js-btn-nav--user">
												<i class="[ icon icon-hamburger-menu icon--small ][ color-primary ]"></i>
											</div>
										</div>
										<div class="[ block ][ float-right ][ line-height--62 ]">
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
									<?php if ( is_user_logged_in() ){ ?>
										<h5 class="[ no-margin-bottom ] ]"><a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>">Raúl De Zamacona</a></h5>
										<div class="divider [ width--50 ][ margin-auto ]"></div>
										<h5 class="[ no-margin ]"><a class="[ padding-vertical ][ block ][ width---100 ][ white-text ] <?php if(is_page('orders')) echo 'active'; ?>" href="<?php echo site_url('/my-account/orders/'); ?>">Mis cursos</a></h5>
										<div class="divider [ width--50 ][ margin-auto ]"></div>
										<h5 class="[ no-margin ]"><a class="[ padding-vertical ][ block ][ width---100 ][ white-text ]" href="<?php echo site_url('/my-account/customer-logout/'); ?>">Salir</a></h5>
									<?php } ?>
									<?php if ( ! is_user_logged_in() ){ ?>
										<h5 class="[ no-margin-bottom ]"><a class="[ white-text ][ block ][width---100 ][ padding-vertical ] <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>">Ingresa / Registrate</a></h5>
									<?php } ?>
								</div>
								<div class="[ footer-menu ]">
									<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
										<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
										<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon icon-phone icon--28 padding-sides--xsmall ]"></i></a>
										<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon icon-email-fill icon--23 padding-sides--xsmall ]"></i></a>
									</div>
									<div>
										<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
										<a href="" class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ]"></i></a>
										<a href="" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
										<a href="" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- end user menu -->

						<!-- btn Menú -->
						<div class="[ block ][ float-right ][ line-height--62 ]">
							<div id="js-btn-nav">
								<i class="[ icon icon-hamburger-menu icon--small ][ color-light ]"></i>
							</div>
						</div>

						<!-- Menu -->
						<div class="[ js-hidden ][ nav-mobile right-1000 ]">
							<div class="[ bg-light ][ height--64 ]">
								<div class="[ container ]">
									<!-- header menu -->
									<a class="[ block ][ float-left ][ logo ]" href="<?php echo site_url('/'); ?>">
										<img src="<?php echo THEMEPATH; ?>images/logo-horizontal.png" alt="Logo yogacloud">
									</a>
									<div class="[ inline-block ][ float-right ][ line-height--64 ]">
										<div class="[ block ][ float-left ]">
											<div id="js-btn-user--nav">
												<i class="[ icon icon-user icon-iconed ][ color-light ]"></i>
											</div>
										</div>
										<div class="[ block ][ float-right ]">
											<div id="js-hide-nav">
												<i class="[ icon icon-close icon-small ][ color-light ][ no-margin-right ]"></i>
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
										<a class="[ white-text ][ block padding-vertical ] <?php if(is_page('curso')) echo 'active'; ?>" href="<?php echo site_url('/#cursos'); ?>">Cursos</a>
									</h5>
									<div class="divider [ width--50 ][ margin-auto ]"></div>
									<h5 class="[ no-margin ]">
										<a class="[ white-text ][ block padding-vertical ]" href="https://yogacloud.net/" target="_blank">Yoga online</a>
									</h5>
								</div>
								<div class="[ container ]">
									<div class="[ footer-menu ]">
										<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
											<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
											<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon icon-phone icon--28 padding-sides--xsmall ]"></i></a>
											<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon icon-email-fill icon--23 padding-sides--xsmall ]"></i></a>
										</div>
										<div>
											<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
											<a href="" class="[ white-text ]"><i class="[ icon icon-twitter icon-medium padding-sides--xsmall ]"></i></a>
											<a href="" class="[ white-text ]"><i class="[ icon icon-facebook icon-iconed padding-sides--xsmall ]"></i></a>
											<a href="" class="[ white-text ]"><i class="[ icon icon-instagram icon-iconed padding-sides--xsmall ]"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				<!-- menu desktop -->
					<div class="[ menu-desktop ][ hide-on-med-and-down ]">
						<?php if(is_front_page() ) { ?>
							<a class="<?php if(is_page('front-page#cursos')) echo 'active'; ?>" href="#cursos">Cursos</a>
						<?php } ?>
						<?php if( ! is_front_page() ) { ?>
							<a class="<?php if(is_page('curso')) echo 'active'; ?>" href="<?php echo site_url('/#cursos'); ?>">Cursos</a>
						<?php } ?>
						<a class="" href="https://yogacloud.net/" target="_blank">Yoga online</a>
						<!-- <a class="<?php if(is_page('tienda')) echo 'active'; ?>"  href="<?php echo site_url('/tienda/'); ?>">Tienda</a>
						<a class="dropdown-button button-form-search" href="#" data-activates="dropdown-search">Buscar</a> -->
						<!-- Dropdown Structure -->
						<ul id="dropdown-search" class="dropdown-content">
							<form>
								<input class="[ input-search-nav ]" id="search" type="search" required>
								<button class="btn [ btn-rounded btn-light-hollow btn-small ] waves-effect waves-light" type="submit" name="action">buscar</button>
							</form>
						</ul>

						<?php if ( is_user_logged_in() ){ ?>
							<!-- Dropdown Trigger -->
							<a class="dropdown-button <?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>" data-activates="dropdown-user">
								<img class="image-user" src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
								<div class="[ overflow-hidden text-overflow--ellipsis white-space--nowrap width--100 inline-block middle ]">Raúl De Zamacona</div>
								<i class="[ icon icon-angle-down icon-xsmall ][ color-primary ][ line-height--30 ][ no-margin-sides ]"></i>
							</a>
							<!-- Dropdown Structure -->
							<ul id="dropdown-user" class="dropdown-content">
								<li><a href="<?php echo site_url('/my-account/orders/'); ?>" class="<?php if(is_page('orders')) echo 'active'; ?>">Mis cursos</a></li>
								<li><a href="<?php echo site_url('/my-account/customer-logout/'); ?>">Sign out</a></li>
							</ul>
						<?php } ?>
						<?php if ( ! is_user_logged_in() ){ ?>
							<a class="<?php if(is_page('my-account')) echo 'active'; ?>" href="<?php echo site_url('/my-account/'); ?>">Ingresa / Registrate</a>
						<?php } ?>

						<!-- <a class="dropdown-button" href="#" data-activates="dropdown-language">
							<i class="[ icon icon-world icon-xsmall ][ color-primary ][ line-height--6 0 ][ no-margin-sides ]"></i>
							Español
						</a>
						<ul id="dropdown-language" class="dropdown-content">
							<li><a href="#!" class="">
								<i class="[ icon icon-world icon-xsmall ][ color-light ][ line-height--6 0 ][ no-margin-sides ]"></i>
								Inglés
							</a></li>
						</ul> -->
						<!-- <a href="<?php echo site_url('/'); ?>">
							<i class="[ icon icon-world icon-xsmall ][ color-primary ][ line-height--30 ][ no-margin-sides ]"></i>
							inglés
						</a> -->
					</div>
				</div>
			</nav>
		</header>

		<div class="[ main ]"> <!-- for footer bottom -->