/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'h1.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( 'h2.site-description' ).text( to );
		} );
	} );
	

	wp.customize( 'site_identity_font_family', function( value ) {
		value.bind( function( to ) {
    		$("head").append("<link href='https://fonts.googleapis.com/css?family=" + to + ":200,300,400,500,600,700,800,900|' rel='stylesheet' type='text/css'>");
			$( 'header .logo h1' ).css( 'font-family', to );
		} );
	} );

	wp.customize( 'bootstrap_blog_logo_size', function( value ) {
		value.bind( function( to ) {
			$( 'header .logo h1' ).css( 'font-size', to + "px" );
			$( 'header .logo img' ).css( 'height', ( to * 2 ) + "px" );
		} );
	} );

	wp.customize( 'font_family', function( value ) {
		value.bind( function( to ) {
    		$("head").append("<link href='https://fonts.googleapis.com/css?family=" + to + ":200,300,400,500,600,700,800,900|' rel='stylesheet' type='text/css'>");
			$( 'body' ).css( 'font-family', to );
		} );
	} );

	wp.customize( 'font_size', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-size', to );
		} );
	} );

	wp.customize( 'bootstrap_blog_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-weight', to );
		} );
	} );


	wp.customize( 'bootstrap_blog_line_height', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'line-height', to + 'px' );
		} );
	} );



	// Heading Options:

	wp.customize( 'heading_font_family', function( value ) {
		value.bind( function( to ) {
    		$("head").append("<link href='https://fonts.googleapis.com/css?family=" + to + ":200,300,400,500,600,700,800,900|' rel='stylesheet' type='text/css'>");
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-family', to );
		} );
	} );


	wp.customize( 'heading_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-weight', to );
		} );
	} );



	wp.customize( 'bootstrap_blog_heading_1_size', function( value ) {
		value.bind( function( to ) {
			$( 'h1'  ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'bootstrap_blog_heading_2_size', function( value ) {
		value.bind( function( to ) {
			$( 'h2'  ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'bootstrap_blog_heading_3_size', function( value ) {
		value.bind( function( to ) {
			$( 'h3'  ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'bootstrap_blog_heading_4_size', function( value ) {
		value.bind( function( to ) {
			$( 'h4'  ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'bootstrap_blog_heading_5_size', function( value ) {
		value.bind( function( to ) {
			$( 'h5'  ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'bootstrap_blog_heading_6_size', function( value ) {
		value.bind( function( to ) {
			$( 'h6'  ).css( 'font-size', to + 'px' );
		} );
	} );

	


} )( jQuery );
