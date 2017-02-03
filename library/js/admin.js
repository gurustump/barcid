/*
 * Admin Scripts File
 * Author: Matthew Stumphy
 *
 * Just any extra javascript to run in the admin area.
*/


jQuery(document).ready(function($) {
	toggleMetaboxes($);
	$('#page_template').change(function() {
		toggleMetaboxes($);
	});
});

function toggleMetaboxes($) {
	var pageTemplate = $('#page_template').val()
	if (pageTemplate == 'page-slider.php' ) {
		$('.cmb2-id--barcid-page-slider').show();
		$('.cmb2-id--barcid-page-header-block').hide();
	} else {
		$('.cmb2-id--barcid-page-slider').hide();
		$('.cmb2-id--barcid-page-header-block').show();
	}
}
