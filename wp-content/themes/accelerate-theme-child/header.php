<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<title><?php bloginfo('name'); wp_title('|'); ?></title>
	<!-- <title><?php //wp_title('|', true, 'right'); ?></title> -->
	<meta name="descdription" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php //echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!--Modernizr-->
<//script src="<?php //echo get_template_directory_uri(); ?>/js/plugins/modernizr-2.6.1.min.js"><//script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
<!-- 				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-bars"><?php //_e( 'Menu', 'accelerate-theme-child' ); ?></i></button> -->
				<?php wp_nav_menu( array( 'theme_location' => 'top-nav', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
			<div class="clearfix"></div>
		</div>

	</header><!-- #masthead -->

	<div id="main" class="site-main">
