jQuery( function($) {
	// close postboxes that should be closed
	jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
	postboxes.add_postbox_toggles('wppiwik');
} );