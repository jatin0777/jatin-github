( function( api ) {

	api.AntreasContactFormControl = api.Control.extend( {

		ready: function() {
			var control = this,
				$kaliformsContainer = control.container.find('.cpotheme_contact_control__kali-forms');

			$kaliformsContainer.find('select').change(function() {
				var val = $( this ).val();
				control.settings.plugin_select( 'kali-forms' );
				control.settings.form_id( val );
			});

		}

	} );

	$.extend( api.controlConstructor, {
		'antreas-contactform-control': api.AntreasContactFormControl,
    });

})( wp.customize );
