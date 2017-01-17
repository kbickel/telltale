<?php
/**
 * Telltale Customizer.
 *
 * @package Telltale
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function telltale_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' , array(
		'default' => '#404040'
	) );

	// Removes default 'Header Image' control from the customizer
	$wp_customize->remove_control('header_image');


	//***** HEADER COLOR *****
	// SETTING - Header Background Color
	$wp_customize->add_setting( 'header_background', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'default' => '#fff',
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'sanitize_hex_color'
	) );

	// CONTROL - Header Color Picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background', array(
	  'label' => __( 'Header Background Color', 'telltale' ),
	  'section' => 'colors'
	) ) );


	//***** MENU TEXT COLOR *****
	// SETTING - Menu Text Color
	$wp_customize->add_setting( 'menu_textcolor', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'default' => '#404040',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'sanitize_hex_color'
	) );

	// CONTROL - Color Picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_textcolor', array(
	  'label' => __( 'Menu Text Color', 'telltale' ),
	  'section' => 'colors'
	) ) );


	//***** HEADER BORDER COLOR *****
	// SETTING - Header Border Color
	$wp_customize->add_setting( 'header_border', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'default' => '#404040',
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'sanitize_hex_color'
	) );

	// CONTROL - Color Picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_border', array(
	  'label' => __( 'Header Border Color', 'telltale' ),
	  'section' => 'colors'
	) ) );


	//***** TITLE/HEADING COLOR *****
	// SETTING - Title/Heading Color
	$wp_customize->add_setting( 'heading', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'default' => '#404040',
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'sanitize_hex_color'
	) );

	// CONTROL - Color Picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading', array(
	  'label' => __( 'Page Title & Headings', 'telltale' ),
	  'section' => 'colors'
	) ) );


	//***** ACCENT COLOR *****
	// SETTING - Accent Color
	$wp_customize->add_setting( 'accent', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'default' => '#404040',
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'sanitize_hex_color'
	) );

	// CONTROL - Color Picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent', array(
	  'label' => __( 'Accent Color', 'telltale' ),
	  'section' => 'colors'
	) ) );


	//***** FIXED HEADER *****
	// SETTING - Fixed Header Image
	$wp_customize->add_setting( 'fixed_header', array(		
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'sanitize_checkbox'
	) );

	// CONTROL - Fixed Header Image
	$wp_customize->add_control( 'fixed_header', array(
	  'type' => 'checkbox',
	  'priority' => 0,
	  'section' => 'header_image',
	  'label' => __( 'Fixed Header Image', 'telltale' ),
	  'description' => __( 'Controls whether or not featured images on pages and posts should be fixed.', 'telltale' ),
	) );


	//***** CUSTOM CSS *****
	// SECTION - Custom CSS
	$wp_customize->add_section( 'custom_css', array(
	  'title' => __( 'Custom CSS', 'telltale' ),
	  'description' => __( 'Add custom CSS here', 'telltale' ),
	  'priority' => 160,
	  'capability' => 'edit_theme_options'
	) );

	// SETTING - Custom CSS
	$wp_customize->add_setting( 'custom_css', array(
	  'type' => 'theme_mod',
	  'capability' => 'edit_theme_options',
	  'transport' => 'postMessage',
	  'sanitize_callback' => 'sanitize_css'
	) );

	// CONTROL - Custom CSS
	$wp_customize->add_control( 'custom_css', array(
	  'label' => __( 'Custom CSS', 'telltale' ),
	  'type' => 'textarea',
	  'section' => 'custom_css'
	) );
}
add_action( 'customize_register', 'telltale_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function telltale_customize_preview_js() {
	wp_enqueue_script( 'telltale_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'telltale_customize_preview_js' );

// Sanitize custom css 
function sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}

// Sanitize checkbox
function sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
