/**
* @package WordPress
* @subpackage Accio
* @since Accio 1.0
*
* Theme Customizer Scripts
* Created by djdesignerlab
*
*/


(function($) {

	wp.customize('accio_custom_settings[text_color]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_text_color"> ' +
				'body { color: ' + newval + ' }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[border_color]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_border_color"> ' +
				'header,' +
				'footer,' +
				'article.hentry,' +
				'.widget,' +
				'.author-bio,' +
				'#respond,' +
				'#comments,' +
				'.intro-box-inner,' +
				'.comments-disabled { border-color: ' + newval + ' }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[content_bg_color]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_content_bg_color"> ' +
				'body { background: ' + newval + ' }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[accent_primary]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_accent_primary"> ' +
				'.color,' +
				'#logo a:hover,' +
				'a:hover,' +
				'#footer-credits a:hover,' +
				'.color-text,' +
				'footer .widget a:hover,' +
				'.about-author .title a,' +
				'.entry-content a,' +
				'.entry-title a:hover,' +
				'form label.error { color: ' + newval + '; }' +
				'.flexslider .flex-direction-nav a:hover,' +
				'#back-to-top:hover,' +
				'.highlight-text,' +
				'.more-link:hover,' +
				'.button-main.active,' +
				'.flickr_badge_image,' +
				'a.button-main,' +
				'a.button-main.toggle:hover,' +
				'.byuser .author-tag,' +
				'.bypostauthor .author-tag,' +
				'.accent,' +
				'input[type="submit"],' +
				'button[type="submit"]' +
				'a.share-button.active,' +
				'.pagination .prev-post a,' +
				'.pagination .next-post a,' +
				'.next-page a,' +
				'.prev-page a,' +
				'.post-navigation a { background: ' + newval + '; }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[accent_secondary]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_accent_secondary"> ' +
				'.post-navigation a,' +
				'.pagination .prev-post a,' +
				'.pagination .next-post a,' +
				'a.button-main,' +
				'a.button-main.toggle:hover,' +
				'input[type="submit"]' +
				'button[type="submit"],' +
				'.next-page a,' +
				'.prev-page a,' +
				'a.share-button.active { border-bottom-color: ' + newval + ' }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[accent_media]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_accent_media"> ' +
				'.jp-play-bar,' +
				'.jp-volume-bar-value,' +
				'body .mejs-controls div.mejs-time-rail .mejs-time-current,' +
				'body .mejs-video .mejs-controls div.mejs-volume-slider .mejs-volume-handle,' +
				'body .mejs-controls div.mejs-horizontal-volume-slider .mejs-horizontal-volume-current { background: ' + newval + ' }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[google_font]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_google_font"> ' +
				'body { font-family: ' + newval + ',Helvetica, Arial, sans-serif; }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[system_font]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_system_font"> ' +
				'body { font-family: ' + newval + ',Helvetica, Arial, sans-serif; }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[font_size]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_font_size"> ' +
				'body { font-size: ' + newval + '; }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[font_line_height]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_font_line_height"> ' +
				'body { line-height: ' + newval + 'px; }' +
			'</style>');
		});
	});

	wp.customize('accio_custom_settings[font_weight]', function (value) {
		value.bind(function (newval) {

			$('html > head').append('<style type="text/css" id="accio_font_weight"> ' +
				'body { font-weight: ' + newval + ' }' +
			'</style>');
		});
	});


})(jQuery);
