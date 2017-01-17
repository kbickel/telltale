/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Menu text color.
	wp.customize( 'menu_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.main-navigation a' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.main-navigation a' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.main-navigation a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header background color.
	wp.customize( 'header_background', function( value ) {
	    value.bind( function( to ) {
	      $( '#masthead, #masthead #search, #masthead #search .search-field, .bottom-header' ).css( {
				'background': to
			} );
	    } );
	} );

	// Header border color.
	wp.customize( 'header_border', function( value ) {
	    value.bind( function( to ) {
	      $( '#masthead, .bottom-header' ).css( {
				'border-color': to
			} );
	    } );
	} );

	// Title/headings color.
	wp.customize( 'heading', function( value ) {
	    value.bind( function( to ) {
	      $( '.no-image .entry-title, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5' ).css( {
				'color': to
			} );
	    } );
	} );

	// Accent color.
	wp.customize( 'accent', function( value ) {
	    value.bind( function( to ) {
	      $( 'blockquote, table tfoot' ).css( {
				'border-color': to
			} );
	      $( '.entry-meta .fa, .entry-footer .fa, input.submit, blockquote p:before, blockquote p:after' ).css( {
				'color': to
			} );
	    } );
	} );

	// Custom CSS
	wp.customize( 'custom_css', function( value ) {
	    value.bind( function( to ) {
	      $( '.custom-css' ).html( to );
	    } );
	} );

} )( jQuery );
