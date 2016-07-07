<?php

// Column shortcode config
$accio_shortcodes['column'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '[row]{{child_shortcode}}[/row]',
	'popup_title' => __('Insert Column Shortcode', 'framework'),
	'child_shortcode' => array(
		'params' => array(
			'width' => array(
				'std' => '',
				'type' => 'select',
				'label' => __('Column', 'framework'),
				'desc' => __('Enter the column settings.', 'framework'),
				'options' => array(
					'span1' => 'span1',
					'span2' => 'span2',
					'span3' => 'span3',
					'span4' => 'span4',
					'span5' => 'span5',
					'span6' => 'span6',
					'span7' => 'span7',
					'span8' => 'span8',
					'span9' => 'span9',
					'span10' => 'span10',
					'span11' => 'span11',
					'span12' => 'span12'
				)
			),
			'offset' => array(
				'std' => 'offset0',
				'type' => 'select',
				'label' => __('Offset', 'framework'),
				'desc' => __('Enter the offset settings.', 'framework'),
				'options' => array(
					'offset0' => 'No offset',
					'offset1' => 'offset1',
					'offset2' => 'offset2',
					'offset3' => 'offset3',
					'offset4' => 'offset4',
					'offset5' => 'offset5',
					'offset6' => 'offset6',
					'offset7' => 'offset7',
					'offset8' => 'offset8',
					'offset9' => 'offset9',
					'offset10' => 'offset10',
					'offset11' => 'offset11',
					'offset12' => 'offset12'
				)
			)

		),
		'shortcode' => '[column width="{{width}}" offset="{{offset}}"]Enter your content here...[/column]',
		'clone_button' => __('+ Add New Column', 'framework')
	)
);

// Youtube shortcode config
$accio_shortcodes['youtube'] = array(
	'no_preview' => true,
	'params' => array(
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Youtube', 'framework'),
			'desc' => __('Enter the youtube id (e.g EYuTt9JdcvY)', 'framework'),
		)

	),
	'shortcode' => '[youtube id="{{id}}"]',
	'popup_title' => __('Insert Youtube Shortcode', 'framework')
);

// Vimeo shortcode config
$accio_shortcodes['vimeo'] = array(
	'no_preview' => true,
	'params' => array(
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Vimeo', 'framework'),
			'desc' => __('Enter the vimeo id (e.g 68596504)', 'framework'),
		)

	),
	'shortcode' => '[vimeo id="{{id}}"]',
	'popup_title' => __('Insert Vimeo Shortcode', 'framework')
);

// HTML5 Audio shortcode config
$accio_shortcodes['audio'] = array(
	'no_preview' => true,
	'params' => array(
		'mp3' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('mp3', 'framework'),
			'desc' => __('Enter the mp3 link.', 'framework'),
		),
		'ogg' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('ogg', 'framework'),
			'desc' => __('Enter the ogg link.', 'framework'),
		)

	),
	'shortcode' => '[audio mp3="{{mp3}}" ogg="{{ogg}}"]',
	'popup_title' => __('Insert Audio Shortcode', 'framework')
);

// Soundcloud shortcode config
$accio_shortcodes['soundcloud'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => 'http://soundcloud.com/djjunior/junior-top10-april-enjoyment-mix',
			'type' => 'text',
			'label' => __('URL', 'framework'),
			'desc' => __('Enter the url.', 'framework'),
		),
		'comments' => array(
			'std' => 'true',
			'type' => 'select',
			'label' => __('Comments', 'framework'),
			'desc' => __('Display comments?', 'framework'),
			'options' => array(
				'true' => 'true',
				'false' => 'false'
			)
		),
		'auto_play' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto Play', 'framework'),
			'desc' => '',
			'options' => array(
				'true' => 'true',
				'false' => 'false'
			)
		),
		'color' => array(
			'std' => 'ff7700',
			'type' => 'text',
			'label' => __('Color', 'framework'),
			'desc' => __('Enter the color code.', 'framework'),
		),
		'width' => array(
			'std' => '100%',
			'type' => 'text',
			'label' => __('Width', 'framework'),
			'desc' => __('Enter the width.', 'framework'),
		),
		'height' => array(
			'std' => '166',
			'type' => 'text',
			'label' => __('Height', 'framework'),
			'desc' => __('Enter the height.', 'framework'),
		)

	),
	'shortcode' => '[soundcloud url="{{url}}" comments="{{comments}}" auto_play="{{auto_play}}" color="{{color}}" width="{{width}}" height="{{height}}"]',
	'popup_title' => __('Insert Souncloud Shortcode', 'framework')
);

// HTML5 Video shortcode config
$accio_shortcodes['video'] = array(
	'no_preview' => true,
	'params' => array(
		'poster' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Poster Image', 'framework'),
			'desc' => __('Enter the url of the poster image.', 'framework'),
		),
		'mp4' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('mp4', 'framework'),
			'desc' => __('The URL to the .mp4 video file.', 'framework'),
		),
		'ogv' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('ogv', 'framework'),
			'desc' => __('The URL to the .ogv video file.', 'framework'),
		),
		'webm' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('webm', 'framework'),
			'desc' => __('The URL to the .webm video file.', 'framework'),
		)

	),
	'shortcode' => '[video poster="{{poster}}" mp4="{{mp4}}" ogv="{{ogv}}" webm="{{webm}}"]',
	'popup_title' => __('Insert Video Shortcode', 'framework')
);

// Buttons shortcode config
$accio_shortcodes['button'] = array(
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'framework'),
			'desc' => __('Add the button\'s url eg http://example.com', 'framework')
		),
		'color' => array(
			'type' => 'select',
			'label' => __('Button\'s Style', 'framework'),
			'desc' => __('Select the button\'s style, ie the buttons colour', 'framework'),
			'options' => array(
				'default' => 'Default',
				'green' => 'Green',
				'purple' => 'Purple',
				'yellow' => 'Yellow',
				'navy' => 'Navy',
				'strikemaster' => 'Strikemaster',
				'black' => 'Black',
				'red' => 'Red',
				'hippie-blue' => 'Hippie Blue',
				'picton-blue' => 'Picton Blue',
				'gray' => 'Gray'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button\'s Size', 'framework'),
			'desc' => __('Select the button\'s size', 'framework'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'framework'),
			'desc' => __('Add the button\'s text', 'framework'),
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button\'s Target', 'framework'),
			'desc' => __('Select the button\'s target', 'framework'),
			'options' => array(
				'_parent' => '_parent',
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
	),
	'shortcode' => '[button url="{{url}}" color="{{color}}" size="{{size}}" target="{{target}}"] {{content}} [/button]',
	'popup_title' => __('Insert Button Shortcode', 'framework')
);

// Alerts shortcode config
$accio_shortcodes['alert'] = array(
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => __('Alert\'s Style', 'framework'),
			'desc' => __('Select the slter\'s style, ie the alert colour', 'framework'),
			'options' => array(
				'red' => 'Red',
				'green' => 'Green',
				'grey' => 'Grey',
				'yellow' => 'Yellow',
				'blue' => 'Blue'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert\'s Text', 'framework'),
			'desc' => __('Add the alert\'s text', 'framework'),
		)

	),
	'shortcode' => '[alert color="{{color}}"] {{content}} [/alert]',
	'popup_title' => __('Insert Alert Shortcode', 'framework')
);

// Tooltips shortcode config
$accio_shortcodes['tooltip'] = array(
	'params' => array(
		'link' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Tooltip Link', 'framework'),
			'desc' => __('Enter the link for the tooltip.', 'framework')
		),
		'title' => array(
			'std' => 'Tooltip title',
			'type' => 'text',
			'label' => __('Tooltip Title', 'framework'),
			'desc' => __('Enter the link for the tooltip.', 'framework')
		),
		'info' => array(
			'std' => 'Your text here!',
			'type' => 'text',
			'label' => __('Tooltip Text', 'framework'),
			'desc' => __('Add the text in the tooltip.', 'framework')
		)

	),
	'shortcode' => '[tooltip link="{{link}}" title="{{title}}"] {{info}} [/tooltip]',
	'popup_title' => __('Insert Tooltip Shortcode', 'framework')
);

// Highlights shortcode config
$accio_shortcodes['highlight'] = array(
	'params' => array(
		'text' => array(
			'std' => __('Your text here!', 'framework'),
			'type' => 'text',
			'label' => __('Highlight Text', 'framework'),
			'desc' => __('Enter the text to be highlighted.', 'framework')
		)

	),
	'shortcode' => '[highlight] {{text}} [/highlight]',
	'popup_title' => __('Insert Highlight Shortcode', 'framework')
);


// Toggle content shortcode config
$accio_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '[toggles] {{child_shortcode}} [/toggles]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'framework'),
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Toggle Content Title', 'framework'),
				'desc' => __('Add the title that will go above the toggle content', 'framework'),
				'std' => 'Title'
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Toggle Content', 'framework'),
				'desc' => __('Add the toggle content.', 'framework'),
			)

		),
		'shortcode' => '[toggle title="{{title}}"] {{content}} [/toggle]',
		'clone_button' => __('+ Add Another Toggle', 'framework')
	)
);

// accordion content shortcode config
$accio_shortcodes['accordion'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '[accordions] {{child_shortcode}} [/accordions]',
	'popup_title' => __('Insert accordion Content Shortcode', 'framework'),
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('accordion Content Title', 'framework'),
				'desc' => __('Add the title that will go above the accordion content', 'framework'),
				'std' => 'Title'
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('accordion Content', 'framework'),
				'desc' => __('Add the accordion content.', 'framework'),
			)

		),
		'shortcode' => '[accordion title="{{title}}"] {{content}} [/accordion]',
		'clone_button' => __('+ Add Another Accordion', 'framework')
	)
);

// Social links shortcode config
$accio_shortcodes['social'] = array(
	'no_preview' => true,
	'params' => array(
		'facebook' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Facebook', 'framework'),
			'desc' => ''
		),
		'twitter' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Twitter', 'framework'),
			'desc' => ''
		),
		'linkedin' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Linkedin', 'framework'),
			'desc' => ''
		),
		'pinterest' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Pinterest', 'framework'),
			'desc' => ''
		),
		'paypal' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Paypal', 'framework'),
			'desc' => ''
		),
		'delicious' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Delicious', 'framework'),
			'desc' => ''
		),
		'gplus' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Google Plus', 'framework'),
			'desc' => ''
		),
		'stumbleupon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Stumble Upon', 'framework'),
			'desc' => ''
		),
		'foursquare' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Foursquare', 'framework'),
			'desc' => ''
		),
		'path' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Path', 'framework'),
			'desc' => ''
		),
		'dribbble' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Dribbble', 'framework'),
			'desc' => ''
		),
		'tumblr' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Tumblr', 'framework'),
			'desc' => ''
		),
		'flickr' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Flickr', 'framework'),
			'desc' => ''
		),
		'spotify' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Spotify', 'framework'),
			'desc' => ''
		),
		'instagram' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Instagram', 'framework'),
			'desc' => ''
		),
		'behance' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Behance', 'framework'),
			'desc' => ''
		),
		'github' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Github', 'framework'),
			'desc' => ''
		),
		'fivehundredpx' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Fivehundredpx', 'framework'),
			'desc' => ''
		),
		'grooveshark' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Grooveshark', 'framework'),
			'desc' => ''
		),
		'forrst' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Forrst', 'framework'),
			'desc' => ''
		),
		'digg' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Digg', 'framework'),
			'desc' => ''
		),
		'reddit' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Reddit', 'framework'),
			'desc' => ''
		),
		'rss' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Rss', 'framework'),
			'desc' => ''
		),
		'skype' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Skype', 'framework'),
			'desc' => ''
		),
		'youtube' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Youtube', 'framework'),
			'desc' => ''
		),
		'vimeo' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Vimeo', 'framework'),
			'desc' => ''
		),
		'myspace' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Myspace', 'framework'),
			'desc' => ''
		),
		'amazon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Amazon', 'framework'),
			'desc' => ''
		),
		'ebay' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Ebay', 'framework'),
			'desc' => ''
		),
		'lastfm' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lastfm', 'framework'),
			'desc' => ''
		),
		'soundcloud' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Soundcloud', 'framework'),
			'desc' => ''
		),
		'posterous' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posterous', 'framework'),
			'desc' => ''
		),
		'picasa' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Picasa', 'framework'),
			'desc' => ''
		),
		'wordpress' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('WordPress', 'framework'),
			'desc' => ''
		),
		'windows' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Windows', 'framework'),
			'desc' => ''
		),
		'evernote' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Evernote', 'framework'),
			'desc' => ''
		)

	),
	'shortcode' => '[social twitter="{{twitter}}" facebook="{{facebook}}" linkedin="{{linkedin}}" pinterest="{{pinterest}}" paypal="{{paypal}}" delicious="{{delicious}}" gplus="{{gplus}}" stumbleupon="{{stumbleupon}}" foursquare="{{foursquare}}" path="{{path}}" dribbble="{{dribbble}}" tumblr="{{tumblr}}" flickr="{{flickr}}" spotify="{{spotify}}" instagram="{{instagram}}" behance="{{behance}}" github="{{github}}" fivehundredpx="{{fivehundredpx}}" grooveshark="{{grooveshark}}" forrst="{{forrst}}" digg="{{digg}}" reddit="{{reddit}}" rss="{{rss}}" skype="{{skype}}" youtube="{{youtube}}" vimeo="{{vimeo}}" myspace="{{myspace}}" amazon="{{amazon}}" ebay="{{ebay}}" lastfm="{{lastfm}}" soundcloud="{{soundcloud}}" posterous="{{posterous}}" picasa="{{picasa}}" wordpress="{{wordpress}}" windows="{{windows}}" evernote="{{evernote}}"]',
	'popup_title' => __('Insert Social Links Shortcode', 'framework')
);

// // tab content shortcode config
// $accio_shortcodes['tabs'] = array(
// 	'no_preview' => true,
// 	'params' => array(),
// 	'child_shortcode' => array(
// 		'params' => array(
// 			'title' => array(
// 				'type' => 'text',
// 				'label' => __('Tab Title', 'framework'),
// 				'desc' => __('Add the title that will go above the accordion content', 'framework'),
// 				'std' => 'Title'
// 			),
// 			'content' => array(
// 				'std' => 'Content',
// 				'type' => 'textarea',
// 				'label' => __('Tab Content', 'framework'),
// 				'desc' => __('Add the tab content.', 'framework'),
// 			)

// 		),
// 		'shortcode' => '[tab] {{content}} [/tab]',
// 		'clone_button' => __('+ Add Tab', 'framework')
// 	),
// 	'shortcode' => '[tabs tabs1="Tab Title"] {{child_shortcode}} [/tabs]',
// 	'popup_title' => __('Insert Tab Content Shortcode', 'framework'),
// );

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$accio_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[accio_tabs] {{child_shortcode}}  [/accio_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),

    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[accio_tab title="{{title}}"] {{content}} [/accio_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);

// Progress shortcode config
$accio_shortcodes['progress'] = array(
	'params' => array(
		'filledcolor' => array(
			'std' => '#hex color',
			'type' => 'text',
			'label' => __('Filled color', 'framework'),
			'desc' => __('Enter the filled color', 'framework'),
		),
		'unfilledcolor' => array(
			'std' => '#hex color',
			'type' => 'text',
			'label' => __('Unfilled color', 'framework'),
			'desc' => __('Enter the unfilled color', 'framework'),
		),
		'content' => array(
			'std' => 'Your text!',
			'type' => 'text',
			'label' => __('Text', 'framework'),
			'desc' => __('Enter the text', 'framework'),
		),
		'value' => array(
			'std' => '30',
			'type' => 'text',
			'label' => __('Value', 'framework'),
			'desc' => __('Enter the value', 'framework'),
		)

	),
	'shortcode' => '[progress filledcolor="{{filledcolor}}" unfilledcolor="{{unfilledcolor}}" value="{{value}}"]{{content}}[/progress]',
	'popup_title' => __('Insert Progress Bar Shortcode', 'framework')
);


// Slider shortcode config
$accio_shortcodes['slider'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '[slider] {{child_shortcode}} [/slider]',
	'popup_title' => __('Insert Slider Shortcode', 'framework'),
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Slide Image', 'framework'),
				'desc' => __('Enter the url of the image.', 'framework'),
			)

		),
		'shortcode' => '[slide]{{content}}[/slide]',
		'clone_button' => __('+ Add New Slide', 'framework')
	)
);


?>
