<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Peloton Capital</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="<?php echo (is_front_page()) ? "home" : "notHome"; ?> cbp-spmenu-push">
	<header role="banner" id="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-2">
					<?php 
					if ( function_exists( 'ot_get_option' ) ) {
					  	$site_logo_light = ot_get_option( 'pt_site_logo_light', "" );
					  	$site_logo_dark = ot_get_option( 'pt_site_logo_dark', "" );
					}
					?>
					<div <?php if (empty($site_logo_light) || (empty($site_logo_dark))): ?> class="logo" <?php endif; ?>>
						
						<a href="<?php echo site_url(); ?>">
							<?php if (!empty($site_logo_light) && !(empty($site_logo_dark))): ?>
							<img src="<?php echo $site_logo_dark ?>" class="dark">
							<img src="<?php echo $site_logo_light ?>" class="light">
							<?php endif; ?>
						</a>
					</div>
					<div class="menuBtn">
						<button type="button" class="toogle-menu visible-xs" id="showRightPush">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<?php
					wp_nav_menu(array(
									 'theme_location' => 'primary',
									   'container_class' => 'col-xs-12 col-sm-8 col-md-10 hidden-xs',
									   'menu_class' => 'mainNavigation nav navbar-nav',
									   'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item menu-login">
															<a href="'. site_url() .'/admin">Login</a>
														</li></ul>'
									   ) );
				?>
			</div>
		</div> 
		<nav class="cbp-spmenu right-side-nav visible-xs" id="cbp-spmenu-s2">
			<div class="res-menu-block">
				<div class="menu-header visible-xs">Menu
					<div class="close-icon"></div>
				</div>
				<?php
					wp_nav_menu(array(
									  'theme_location' => 'responsive',
									  'menu_class' => 'navbar-nav',
									   'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item menu-login">
															<a href="'. site_url() .'/admin">Login</a>
														</li></ul>'
									  ));
				?>
			</div>
		</nav>
	</header>