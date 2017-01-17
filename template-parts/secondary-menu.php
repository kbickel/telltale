<?php
/**
 * Template part for displaying the top menu.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Telltale
 */


	if ( has_nav_menu( 'secondary' ) ) {
		echo '<div id="secondary-menu">';
			wp_nav_menu( array( 'theme_location' => 'secondary' ) );
		echo '</div>';
	}
?>