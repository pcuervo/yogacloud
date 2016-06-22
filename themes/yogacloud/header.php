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
		<!-- Favicon - generated with http://www.favicomatic.com/
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">-->
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>style.css">
		<!-- Google font(s) -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<!-- Font awesome -->
		<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->

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
						<a href="" class="[ block ][ float-left ][ margin-right ]">
							<img src="<?php echo THEMEPATH; ?>icons/account-circle-1.png" alt="user menu">
						</a>
						<div class="[ block ][ float-right ][ line-height--48 ]">
							<div id="js-btn-nav">
								<img src="<?php echo THEMEPATH; ?>icons/hamburguer-menu.png" alt="menu">
							</div>
						</div>

						<!-- Menú -->
						<div class="[ js-hidden ][ nav-mobile right-767 ]">

							<div class="container [ padding-vertical ][ white-text ]">
								<div href="" class="[ block ][ float-right ]">
									<div id="js-hide-nav">
										<img src="<?php echo THEMEPATH; ?>icons/Close.png" alt="menu">
									</div>
								</div>
								<div class="[ clearfix ]"></div>
								<div class="[ margin-bottom--xlarge ]">
									<h5><a class="[ white-text ]" href="<?php echo site_url('/'); ?>#cursos">Cursos</a></h5>
									<h5><a class="[ white-text ]" href="<?php echo site_url('/tienda/'); ?>">Tienda</a></h5>
									<h5><a class="[ white-text ]" href="">Buscar</a></h5>
									<h5>
										<a class="[ white-text ]" href="">EN</a> /
										<a class="[ white-text ][ text-bold ]" href="">ES</a>
									</h5>
								</div>
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
			</nav>
		</header>




