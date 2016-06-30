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
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">

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
		<header>
			<div class="[ nav-user-desktop ][ container ][ hide-on-small-only ]">
				<!-- Dropdown Trigger -->
				<img class="image-user" src="<?php echo THEMEPATH; ?>images/testimonial.png" alt="image user">
				<a class="dropdown-button" href="#" data-activates="dropdown-user">Raúl De Zamacona</a>
				<!-- Dropdown Structure -->
				<ul id="dropdown-user" class="dropdown-content">
					<li><a href="#!">Mis cursos</a></li>
					<li><a href="#!">Sing out</a></li>
				</ul>
				<a class="[ margin-left ]" href="<?php echo site_url('/'); ?>">English </a><span>/ </span><a href="<?php echo site_url('/'); ?>"> Español</a>
			</div>
			<nav>
				<div class="nav-wrapper [ container ]">
					<a class="[ logo ]" href="<?php echo site_url('/'); ?>">
						<img class="[ hide-on-small-only ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
						<img class="[ hide-on-med-and-up ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal.png" alt="Logo yogacloud">
					</a>
				<!-- Menu mobile -->
					<div class="[ inline-block ][ float-right ][ hide-on-med-and-up ]">
						<!-- btn user menu -->
						<div class="[ block ][ float-left ]">
							<div id="js-btn-user">
								<i class="[ icon icon-user icon-iconed ][ color-light ][ line-height--64 ]"></i>
							</div>
						</div>

						<!-- User menu -->
						<div class="[ js-hidden ][ user-mobile right-767 ]">
							<!-- header User -->
							<div class="[ bg-light ][ height--64 ]">
								<div class="[ container ]">
									<a class="[ block ][ float-left ][ logo ]" href="<?php echo site_url('/'); ?>">
										<img src="<?php echo THEMEPATH; ?>images/logo-horizontal.png" alt="Logo yogacloud">
									</a>
									<div class="[ inline-block ][ float-right ]">
										<div class="[ block ][ float-left ][ margin-right--small ][ line-height--64 ]">
											<div id="js-btn-nav--user">
												<i class="[ icon icon-hamburger-menu icon--small ][ color-primary ]"></i>
											</div>
										</div>
										<div class="[ block ][ float-right ][ line-height--62 ]">
											<div id="js-hide-user">
												<i class="[ icon icon-close icon-small ][ color-primary ]"></i>
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
										<h5><a class="[ white-text ]" href="">Raúl De Zamacona</a></h5>
										<div class="divider [ width--50 ][ margin-vertical--auto ]"></div>
										<h5><a class="[ white-text ]" href="">Mis cursos</a></h5>
										<div class="divider [ width--50 ][ margin-vertical--auto ]"></div>
										<h5><a class="[ white-text ]" href="">Salir</a></h5>
									<?php } ?>
									<?php if ( ! is_user_logged_in() ){ ?>
										<h5><a class="[ white-text ]" href="">Login</a></h5>
										<div class="divider [ width--50 ][ margin-vertical--auto ]"></div>
										<h5><a class="[ white-text ]" href="">Sing up</a></h5>
									<?php } ?>
								</div>
								<div class="[ footer-menu ]">
									<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
										<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
										<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon-phone icon-large inline padding-sides--xsmall ]"></i></a>
										<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon-email-fill icon-iconed inline padding-sides--xsmall ][ relative bottom-2 ]"></i></a>
									</div>
									<div>
										<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
										<a href="" class="[ white-text ]"><i class="[ icon-twitter inline icon-medium padding-sides--xsmall ]"></i></a>
										<a href="" class="[ white-text ]"><i class="[ icon-facebook inline icon-iconed padding-sides--xsmall ]"></i></a>
										<a href="" class="[ white-text ]"><i class="[ icon-instagram inline icon-iconed padding-sides--xsmall ]"></i></a>
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
						<div class="[ js-hidden ][ nav-mobile right-767 ]">
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
												<i class="[ icon icon-close icon-small ][ color-light ]"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="[ white-text ]">

								<!-- end Header menu -->
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<h5 class="[ no-margin-bottom ]" id="cursos-nav">
										<a class="[ white-text ]" href="<?php echo site_url('/'); ?>#cursos">Cursos</a>
										<div class="divider [ width--50 ][ margin-vertical--auto ]"></div>
									</h5>
									<h5 class="[ no-margin ]">
										<a class="[ white-text ]" href="<?php echo site_url('/tienda/'); ?>">Tienda</a>
										<div class="divider divider-hidden [ width--50 ][ margin-vertical--auto ]"></div>
									</h5>
									<div id="box-form">
										<h5 id="title-search-nav" class="[ white-text ][ no-margin ]">
											Buscar
											<div class="divider divider-hidden [ width--50 ][ margin-vertical--auto ]"></div>
										</h5>
										<form id="form-search-nav" class="hidden">
											<input class="[ input-search-nav ]" id="search" type="search" required>
											<button class="btn [ btn-rounded btn-primary-hollow btn-small ] waves-effect waves-light" type="submit" name="action">buscar</button>
										</form>
									</div>
									<h5 class="[ no-margin padding-bottom ]">
										<a class="[ white-text ]" href="">EN</a> /
										<a class="[ white-text ][ text-bold ]" href="">ES</a>
									</h5>
								</div>
								<div class="[ container ]">
									<div class="[ footer-menu ]">
										<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
											<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
											<a href="tel:+525552555555" class="[ white-text ]"><i class="[ icon-phone icon-large inline padding-sides--xsmall ]"></i></a>
											<a href="mailto:contacto@yogacloud.com" class="[ white-text ]"><i class="[ icon-email-fill icon-iconed inline padding-sides--xsmall ][ relative bottom-2 ]"></i></a>
										</div>
										<div>
											<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
											<a href="" class="[ white-text ]"><i class="[ icon-twitter inline icon-medium padding-sides--xsmall ]"></i></a>
											<a href="" class="[ white-text ]"><i class="[ icon-facebook inline icon-iconed padding-sides--xsmall ]"></i></a>
											<a href="" class="[ white-text ]"><i class="[ icon-instagram inline icon-iconed padding-sides--xsmall ]"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				<!-- menu desktop -->
					<div class="[ menu-desktop ][ hide-on-small-only ]">
						<a href="<?php echo site_url('/'); ?>#cursos">Cursos</a>
						<a href="<?php echo site_url('/tienda/'); ?>">Tienda</a>
						<a class="dropdown-button" href="#" data-activates="dropdown-search">Buscar</a>
						<!-- Dropdown Structure -->
						<ul id="dropdown-search" class="dropdown-content">
							<form>
								<input class="[ input-search-nav ]" id="search" type="search" required>
								<button class="btn [ btn-rounded btn-light-hollow btn-small ] waves-effect waves-light" type="submit" name="action">buscar</button>
							</form>
						</ul>
					</div>
				</div>
			</nav>
		</header>




