<?php 

function telltale_scripts() {
	// CSS
	wp_enqueue_style( 'telltale-style', get_stylesheet_uri() );

	// Font Awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.min.css', array(), null, 'all' );

	// jQuery
	wp_enqueue_script( 'jquery' );

	// jQuery UI Accordion
	wp_enqueue_script( 'jquery-ui-accordion', null, array('jquery'), null, false );

	// Navigation
	wp_enqueue_script( 'telltale-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// Custom JS
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'jquery-ui-accordion'), null, true );

	wp_enqueue_script( 'telltale-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'telltale_scripts' );