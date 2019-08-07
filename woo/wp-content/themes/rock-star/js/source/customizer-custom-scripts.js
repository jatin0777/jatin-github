( function( api ) {
    // Extends our custom "upgrade_button" section.
    api.sectionConstructor['upgrade_button'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );

/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 */

( function( api ) {
    wp.customize( 'rock_star_theme_options[reset_all_settings]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: rock_star_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );

    api.controlConstructor.radio = api.Control.extend( {
        ready: function() {
            if ( 'rock_star_theme_options[color_scheme]' === this.id ) {
                this.setting.bind( 'change', function( color_scheme ) {
                     color_hex_value = '#000000';

                     if ( 'light' == color_scheme ) {
                            color_hex_value = '#ffffff';

                    }

                    api( 'background_color' ).set( color_hex_value );
                            api.control( 'background_color' ).container.find( '.color-picker-hex' ).data( 'data-default-color', color_hex_value ).wpColorPicker( 'defaultColor', color_hex_value );
                });
            }
        }
    });
} )( wp.customize );