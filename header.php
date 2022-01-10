<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Odaseva
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		.bsnav.addShadow,
		.bsnav {
			background-color: <?php the_field('header_background'); ?>
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="navbar navbar-expand-lg bsnav justify-content-lg-around bsnav-transparent <?php if (get_field('light__header') == true) { ?>light__header<?php } else { ?>header-dark<?php } ?>" style="">

		<a class="navbar-brand" href="<?php bloginfo('home'); ?>">

			<?php if (get_theme_mod('theme_dark_logo')) : ?>
				<img width="110" height="23" class="logo-dark" src="<?php echo get_theme_mod('theme_dark_logo'); ?>" alt="<?php bloginfo('name'); ?>">
			<?php else : ?>
				<h1 class="site-title logo-dark"><?php bloginfo('name'); ?></h1>
			<?php endif; ?>

			<?php if (get_theme_mod('theme_light_logo')) : ?>
				<img width="110" height="23" class="logo-light" src="<?php echo get_theme_mod('theme_light_logo'); ?>" alt="<?php bloginfo('name'); ?>">
			<?php else : ?>
				<h1 class="site-title logo-light"><?php bloginfo('name'); ?></h1>
			<?php endif; ?>
		</a>

		<div class="d-lg-none button__trynow">
			<?php wp_nav_menu(array('theme_location' => 'login-menu', 'menu_class' => 'mobile__cta', 'fallback_cb' => '')); ?>
		</div>


		<button id="nav-icon1" class="navbar-toggler">
			<span></span>
			<span></span>
		</button>
		<div class="middle-navigation collapse navbar-collapse  justify-content-sm-end">

			<?php wp_nav_menu(array('theme_location' => 'main-menu', 'menu_class' => 'navbar-nav nav-main-menu navbar-mobile mr-0', 'fallback_cb' => '')); ?>

			<?php wp_nav_menu(array('theme_location' => 'login-menu', 'menu_class' => 'navbar-nav navbar-mobile top__right mr-0 d-none d-md-block d-lg-block', 'fallback_cb' => '')); ?>

			<div class="mobile__bottom__menu">
				<?php wp_nav_menu(array('theme_location' => 'login-menu', 'menu_class' => 'navbar-nav navbar-mobile top__right mr-0 d-md-none clearfix', 'fallback_cb' => '')); ?>
			</div>

		</div>
	</div>
	<div class="bsnav-mobile">
		<div class="bsnav-mobile-overlay"></div>
		<div class="navbar"></div>
	</div>