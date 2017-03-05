<?php
/**
 * The header for our theme.
 *
 * @package Inhabitent_WordPress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<script src="https://use.fontawesome.com/b6d7953a77.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
						</a></h1>
					<p class="site-description">						
			
					</p>
					
				</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<a href="" class="navIcon"><img src="<?php echo get_bloginfo("stylesheet_directory")?>/images/logos/inhabitent-logo-tent-white.svg"></a>
				
				<div class="nav-action">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html( 'Primary Menu' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
					<form class="flex">
						<i class="fa fa-search" aria-hidden="true"></i>
						<input type="text" name="search" placeholder="search">
					</form>
					
				</div>
					
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

			<div id="content" class="site-content">
