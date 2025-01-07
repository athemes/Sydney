/**
 * Initialize the Sydney Style Book functionality.
*/
( function( $ ) {
    $( document ).ready( function() {
        // Open the Style Book
        $( '.sydney-style-book-toggle' ).on( 'click', function(e) {
            e.preventDefault();
            var $styleBook = $( '.sydney-style-book' );

            if ( $styleBook.length ) {
                $styleBook.remove();
            } else {
                var template = wp.template( 'sydney-style-book' );
                $( 'body' ).append( template );
                
                //Close button
                $( '.sydney-style-book-close' ).on( 'click', function() {
                    $( '.sydney-style-book' ).remove();
                } );
            }
        } );

    } );
} )( jQuery );

/**
 * Handle live previews for the Style Book.
 */
( function( $ ) {
    //Global colors
    for (let i = 1; i <= 9; i++) {
        wp.customize(`global_color_${i}`, function( value ) {
            value.bind( function( newval ) {
                $( `.sydney-style-book-color-value[data-color-setting="global_color_${i}"]` ).css( 'background-color', newval );
            } );
        });
    }

    //Heading colors
    for (let i = 1; i <= 6; i++) {
        wp.customize(`color_heading_${i}`, function( value ) {
            value.bind( function( newval ) {
                $( `.sydney-style-book h${i}.style-book-heading` ).css( 'color', newval );
            } );
        });
    }

    //Text colors
    wp.customize('body_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.sydney-style-book .style-book-body' ).css( 'color', newval );
        } );
    });

    //Button colors
    var buttonColors = { 'button_background_color': 'background-color', 'button_color': 'color', 'button_border_color': 'border-color' };
    $.each( buttonColors, function( option, prop ) {
        wp.customize(option, function( value ) {
            value.bind( function( newval ) {
                $( `.sydney-style-book .roll-button` ).css( prop, newval );
            } );
        });
    } );

    //Heading typography
	wp.customize( 'sydney_headings_font', function( value ) {
		value.bind( function( to ) {

			$( 'head' ).find( '#sydney-preview-style-book-google-fonts-headings-css' ).remove();
			$( 'head' ).find( '#sydney-preview-style-book-headings-weight-css' ).remove();

			$( 'head' ).append( '<link id="sydney-preview-style-book-google-fonts-headings-css" href="" rel="stylesheet">' );

			$( '#sydney-preview-style-book-google-fonts-headings-css' ).attr( 'href', 'https://fonts.googleapis.com/css?family=' + jQuery.parseJSON( to )['font'].replace(/ /g, '+') + ':' + jQuery.parseJSON( to )['regularweight'] + '&display=swap' );

			$( '.style-book-heading' ).css( 'font-family', jQuery.parseJSON( to )['font'] );

			$( 'head' ).append('<style id="sydney-preview-style-book-headings-weight-css" type="text/css">.style-book-heading {font-weight:' + jQuery.parseJSON( to )['regularweight'] + ';}</style>');

		} );
	} );

    var headingsTypography = { 
        'headings_line_height': 'line-height',
        'headings_letter_spacing': 'letter-spacing',
        'headings_text_transform': 'text-transform',
        'menu_items_text_transform': 'text-transform',
        'headings_text_decoration': 'text-decoration'
    };

    $.each( headingsTypography, function( option, prop ) {
        wp.customize(option, function( value ) {
            value.bind( function( newval ) {
                $( '.style-book-heading' ).css( prop, newval );
            } );
        });
    });

} )( jQuery );