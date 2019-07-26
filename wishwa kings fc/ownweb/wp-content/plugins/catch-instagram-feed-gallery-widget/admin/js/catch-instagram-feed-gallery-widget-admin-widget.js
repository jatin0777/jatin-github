(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(function() {
        
        $('.show-more').on('click', function() {
            $(this).next('.more-options').toggle();
        });

        $(".show-more").toggle(function() {
            $(this).html('Hide Options<i class="dashicons dashicons-arrow-up"></i>')
                .stop();
        }, function() {
            $(this).html('More Options<i class="dashicons dashicons-arrow-down"></i>')
                .stop();
        });
        
        /* CPT switch */
        $( '.ctp-switch' ).on( 'click', function() {
            var loader = $( this ).parent().next();
            
            loader.show();
                
            var main_control = $( this );
            var data = {
                'action'      : 'ctp_switch',
                'value'       : this.checked,
                'option_name' : main_control.attr( 'rel' )
            };

            $.post( ajaxurl, data, function( response ) {
                response = $.trim( response );

                if ( '1' == response ) {
                    main_control.parent().parent().addClass( 'active' );
                    main_control.parent().parent().removeClass( 'inactive' );
                } else if( '0' == response ) {
                    main_control.parent().parent().addClass( 'inactive' );
                    main_control.parent().parent().removeClass( 'active' );
                } else {
                    alert( response );
                }
                loader.hide();
            });
        });
        /* CPT switch End */
    });

    $(document).on('widget-added widget-updated', function(e, widget) {
        /* Show More event */
        $('.show-more').on('click', function() {
            $(this).next('.more-options').toggle();
        });

        $(".show-more").toggle(function() {
            $(this).html('Hide Options<i class="dashicons dashicons-arrow-up"></i>')
                .stop();
        }, function() {
            $(this).html('More Options<i class="dashicons dashicons-arrow-down"></i>')
                .stop();
        });
    });

})(jQuery);