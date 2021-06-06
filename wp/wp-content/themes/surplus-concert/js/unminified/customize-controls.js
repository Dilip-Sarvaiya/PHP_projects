( function( $, api ) {
	/* === Repeater Text Control === */
	api.controlConstructor['repeater-text'] = api.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			control.initCustomControl();
		},

		initCustomControl: function() {

			'use strict';

			var control = this;

			control.populate(control);

			control.container.on( 'click', '.btn-add-field', control, function(event) {
				control.add(event);
			} );
			control.container.on( 'change', '.repeater-text-single-field', control, function() {
				control.updateValue();
			} );
			control.container.on( 'click', '.btn-remove-field', control, function(event) {
				control.remove(event);
				control.updateValue();
			} );
		},

		populate: function() {

			'use strict';

			var wrapper = this.selector;
			var multi_saved_value = jQuery(wrapper).find( '.repeater-text-value' ).val();
			if ( multi_saved_value.length > 0 ) {
				var multi_saved_values = multi_saved_value.split( '|' );
				jQuery(wrapper).find( '.repeater-text-fields' ).empty();
				jQuery.each(multi_saved_values, function( i, value ) {
					jQuery(wrapper).find( '.repeater-text-fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
				});
			}
		},

		add: function(event) {
			'use strict';

			event.preventDefault();
			jQuery(event.target).parent('.repeater-text-input').find('.repeater-text-fields').append( '<div class="set"><input type="text" value="" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
		},

		remove: function(event) {
			'use strict';

			event.preventDefault();
			jQuery(event.target).parent().parent().remove();
		},

		updateValue: function() {
			'use strict';

			var values = '';
			var wrapper = this.selector;
			jQuery(wrapper).find( '.repeater-text-fields .repeater-text-single-field' ).each(function() {
				values += jQuery(this).val() + '|';
			});

			jQuery(wrapper).find( '.repeater-text-value' ).val( values.slice( 0, -1 ) ).change();
		}

	});
} )( jQuery, wp.customize );

jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */

    // Scroll to section
    $('body').on('click', '#sub-accordion-panel-frontpage_panel .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });
});

function scrollToSection( section_id ){
    var preview_section_id = "slider-banner-wrapper";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        case 'accordion-section-about_section':
        preview_section_id = "about-section";
        break;

        case 'accordion-section-blog_section':
        preview_section_id = "latest-posts";
        break;

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}
