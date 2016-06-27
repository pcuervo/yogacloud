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
			<nav>
				<div class="nav-wrapper [ container ]">
					<a class="[ block ][ float-left ]" href="<?php echo site_url('/'); ?>">
						<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
					</a>
					<div class="[ inline-block ][ float-right ]">
						<!-- btn user menu -->
						<div class="[ block ][ float-left ][ margin-right ]">
							<div id="js-btn-user">
								<i class="[ icon icon-account-circle icon-iconed ][ color-light ][ relative bottom-2 ]"></i>
							</div>
						</div>

						<!-- User menu -->
						<div class="[ js-hidden ][ user-mobile right-767 ]">

							<div class="container [ padding-bottom padding-top--small ][ white-text ]">
								<!-- header User -->
								<a class="[ block ][ float-left ]" href="<?php echo site_url('/'); ?>">
									<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
								</a>
								<div class="[ inline-block ][ float-right ]">
									<div class="[ block ][ float-left ][ margin-right ][ line-height--48 ]">
										<div id="js-btn-nav--user">
											<i class="[ icon icon-hamburger-menu icon--small ][ color-light ]"></i>
										</div>
									</div>
									<div class="[ block ][ float-right ][ line-height--48 ][ margin-top--xxsmall ]">
										<div id="js-hide-user">
											<i class="[ icon icon-close icon-small ][ color-light ][ relative bottom-2 ]"></i>
										</div>
									</div>
								</div>
								<!-- end Header User -->
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<?php if ( is_user_logged_in() ){ ?>
										<h5><a class="[ white-text ]" href="">Raúl De Zamacona</a></h5>
										<h5><a class="[ white-text ]" href="">Mis cursos</a></h5>
										<h5><a class="[ white-text ]" href="">Sing out</a></h5>
									<?php } ?>
									<?php if ( ! is_user_logged_in() ){ ?>
										<h5><a class="[ white-text ]" href="">Login</a></h5>
										<h5><a class="[ white-text ]" href="">Sing up</a></h5>
									<?php } ?>
								</div>
								<div class="[ footer-menu ]">
									<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
										<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
										<a href="tel:+525552555555"><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/phone.png" alt="télefono"></a>
										<a href="mailto:contacto@yogacloud.com"><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/mail.png" alt="correo"></a>
									</div>
									<div>
										<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/twitter.png" alt="twitter"></a>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/facebook.png" alt="facebook"></a>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/instagram.png" alt="instagram"></a>
									</div>
								</div>
							</div>
						</div>
						<!-- end user menu -->

						<!-- btn Menú -->
						<div class="[ block ][ float-right ][ line-height--48 ]">
							<div id="js-btn-nav">
								<i class="[ icon icon-hamburger-menu icon--small ][ color-light ][ relative bottom-3 ]"></i>
							</div>
						</div>

						<!-- Menu -->
						<div class="[ js-hidden ][ nav-mobile right-767 ]">

							<div class="container [ padding-bottom padding-top--small ][ white-text ]">
								<!-- header menu -->
								<a class="[ block ][ float-left ]" href="<?php echo site_url('/'); ?>">
									<img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud">
								</a>
								<div class="[ inline-block ][ float-right ]">
									<div class="[ block ][ float-left ][ margin-right ][ line-height--48 ]">
										<div id="js-btn-user--nav">
											<i class="[ icon icon-account-circle icon-iconed ][ color-light ]"></i>
										</div>
									</div>
									<div class="[ block ][ float-right ][ line-height--48 ][ margin-top--xsmall ]">
										<div id="js-hide-nav">
											<i class="[ icon icon-close icon-small ][ color-light ][ relative bottom-5 ]"></i>
										</div>
									</div>
								</div>
								<!-- end Header menu -->
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<h5 class="[ no-margin padding-bottom ]" id="cursos-nav"><a class="[ white-text ]" href="<?php echo site_url('/'); ?>#cursos">Cursos</a></h5>
									<h5 class="[ no-margin padding-bottom ]"><a class="[ white-text ]" href="<?php echo site_url('/tienda/'); ?>">Tienda</a></h5>
									<h5 id="title-search-nav" class="[ white-text ][ no-margin padding-bottom ]">Buscar</h5>
									<form id="form-search-nav" class="hidden">
										<input class="[ input-search-nav ]" id="search" type="search" required>
										<button class="btn [ btn-rounded btn-light-hollow ] waves-effect waves-light" type="submit" name="action">Buscar</button>
									</form>
									<h5 class="[ no-margin padding-bottom ]">
										<a class="[ white-text ]" href="">EN</a> /
										<a class="[ white-text ][ text-bold ]" href="">ES</a>
									</h5>
								</div>
								<div class="[ footer-menu ]">
									<div class="[ border-bottom--light ][ padding-bottom margin-bottom ]">
										<h5 class="white-text [ no-margin-top ]">¿Necesitas ayuda?</h5>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/phone.png" alt="télefono"></a>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/mail.png" alt="correo"></a>
									</div>
									<div>
										<h5 class="white-text [ no-margin-top ]">Seámos amigos</h5>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/twitter.png" alt="twitter"></a>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/facebook.png" alt="facebook"></a>
										<a href=""><img class="[ padding-sides--xsmall ]" src="<?php echo THEMEPATH; ?>icons/instagram.png" alt="instagram"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>




