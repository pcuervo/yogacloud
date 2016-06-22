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
				<div class="nav-wrapper">
					<a href="<?php echo site_url('/'); ?>"><img class="[ logo ]" src="<?php echo THEMEPATH; ?>images/logo-horizontal-light.png" alt="Logo yogacloud"></a>
					<a href="<?php echo site_url('/'); ?>" data-activates="mobile-demo" class="button-collapse"><img src="<?php echo THEMEPATH; ?>icons/hamburguer-menu.png" alt="menu"></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="sass.html">Cursos</a></li>
						<li><a href="badges.html">Tienda</a></li>
						<li><a href="collapsible.html">Buscar</a></li>
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a href="sass.html">Cursos</a></li>
						<li><a href="badges.html">Tienda</a></li>
						<li><a href="collapsible.html">Buscar</a></li>
					</ul>
				</div>
			</nav>

		</header>




