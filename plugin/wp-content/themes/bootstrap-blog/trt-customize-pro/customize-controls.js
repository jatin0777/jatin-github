( function( api ) {

	// Extends our custom "bootstrap-blog" section.
	api.sectionConstructor['bootstrap-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
