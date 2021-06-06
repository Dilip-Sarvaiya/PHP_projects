( function( api ) {

	// Extends our custom "surplus-concert" section.
	api.sectionConstructor['surplus-concert'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
