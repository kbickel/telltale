<?php
/**
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Telltale
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses telltale_header_style()
 */
function telltale_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'telltale_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'telltale_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'telltale_custom_header_setup' );

if ( ! function_exists( 'telltale_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see telltale_custom_header_setup().
 */
function telltale_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>

	<?php
}
endif;

function telltale_customize_css()
{ ?>
	<!-- ***** Header Background Color ***** -->
    <style type="text/css">
        #masthead, #masthead #search, #masthead #search .search-field, .bottom-header, #mobile-menu { background: <?php echo get_theme_mod('header_background', '#fff'); ?>; }
    </style>

 	<!-- ***** Header Border Color ***** -->
    <style type="text/css">
        #masthead, .bottom-header { border-color: <?php echo get_theme_mod('header_border', '#404040'); ?>; }
    </style>

    <!-- ***** Accent Color ***** -->
    <style type="text/css">
        blockquote, table tfoot { border-color: <?php echo get_theme_mod('accent', '#404040'); ?>; }
    </style>

    <style type="text/css">
        .entry-meta .fa, .entry-footer .fa, input.submit, blockquote p:before, blockquote p:after { color: <?php echo get_theme_mod('accent', '#404040'); ?>; }
    </style>

    <!-- ***** Title/Heading Color ***** -->
    <style type="text/css">
        .no-image .entry-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5 { color: <?php echo get_theme_mod('heading', '#404040'); ?>; }
    </style>

    <!-- ***** Menu Text Color ***** -->
    <style type="text/css">
        .main-navigation a, #masthead #search .search-submit, #masthead #search .search-field, .archive-title, .select-dropdown select, a.search-submit, #open, #close { color: <?php echo get_theme_mod('menu_textcolor', '#404040'); ?>; }
    </style>
    
    <?php
    //***** Fixed Header *****
    if (true === get_theme_mod('fixed_header')) {
    	?>
    	<style>
    		.site-main .header-background { background-attachment: fixed!important; }
    	</style>
    	<?php
    }

    //***** Custom CSS *****
    ?>
    <style class="custom-css">
    	<?php echo get_theme_mod('custom_css'); ?>;
    </style>
    <?php
}
add_action( 'wp_head', 'telltale_customize_css');
