<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Telltale
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'telltale' ); ?></a>
	<div id="mobile-menu-filter"></div>

	<header id="masthead" class="site-header" role="banner">
		<div class="top-header">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : 
					if ( has_custom_logo( $blog_id = 0 ) ) {
						the_custom_logo( $blog_id = 0 );
					}
					else {
						?> <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } ?>
				<?php else : 
					if ( has_custom_logo( $blog_id = 0 ) ) {
						the_custom_logo( $blog_id = 0 );
					} 
					else {
						?><p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php }
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<!-- Desktop Menu -->
				<div id="desktop-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
				<!-- Mobile Menu -->
				<div id="mobile-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<a href="#close" id="close"><?php esc_html_e( 'Close', 'telltale' ); ?><i class="fa fa-times" aria-hidden="true"></i></a>
				</div>
			</nav><!-- #site-navigation -->
		</div><!-- .top-header -->

		<div class="bottom-header">
			<a id="open" href="#mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i><?php esc_html_e( 'Menu', 'telltale' ); ?></a>
			<div id="search">
				<a href="#search-open" id="search-open"><i class="fa fa-search" aria-hidden="true"></i><?php esc_html_e( 'Search', 'telltale' ); ?></a>
				<a href="#search-close" id="search-close"><i class="fa fa-times" aria-hidden="true"></i><?php esc_html_e( 'Cancel', 'telltale' ); ?></a>
				<?php get_search_form(); ?>
			</div>
		</div> <!-- .bottom-header -->
	</header><!-- #masthead -->
