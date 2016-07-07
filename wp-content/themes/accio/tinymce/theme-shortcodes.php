<?php

/*---------------------------------------------------------------------------*/
/* Remove Extra P tags
/*---------------------------------------------------------------------------*/

function shortcodes_format($content) {
	$block = join("|",array("row", "column", "button", "alert", "youtube", "vimeo", "tooltip", "highlight", "toggle", "accordions", "accordion", "progress", "slider", "slide", "social", "accio_tabs", "accio_tab"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'shortcodes_format');
add_filter('widget_text', 'shortcodes_format');

/*---------------------------------------------------------------------------*/
/* Rows
/*---------------------------------------------------------------------------*/

function accio_row($atts, $content = null) {
	$row = '<div class="row-fluid">' . do_shortcode( $content ) . '</div>';
	return $row;
}

add_shortcode('row', 'accio_row');

/*---------------------------------------------------------------------------*/
/* Columns
/*---------------------------------------------------------------------------*/

function accio_column( $atts, $content = "" ) {
	extract(shortcode_atts(array(
		'width' => "",
		'offset' => ""
	),$atts ));

	$column = '<div class="'.$width.' '.$offset.'">'.do_shortcode($content).'</div>';

	return $column;
}

add_shortcode( 'column', 'accio_column' );


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

function accio_button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '',
		'color' => '',
		'url' => '',
		'target' => ''
	), $atts));

	$output = '<a href="'.$url.'" class="button-'.$size.' '.$color.' button-main" target="'.$target.'">' .do_shortcode($content). '</a>';

	return $output;
}
add_shortcode('button', 'accio_button_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

function accio_alert($atts, $content = null)  {
	extract(shortcode_atts(array(
			'color' => ''
		), $atts));

	$output = '<div class="alert '.$color.'"><p>'.do_shortcode($content).'</p><div class="cross">&times;</div></div>';

	return $output;
}
add_shortcode('alert', 'accio_alert');

/*-----------------------------------------------------------------------------------*/
/*	Youtube
/*-----------------------------------------------------------------------------------*/

function accio_youtube($atts)  {
	extract(shortcode_atts(array(
			'id' => '',
			'width' => '600',
			'height' => '360'
		), $atts));
	$output = '<div class="media-element"><iframe title="YouTube video player" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe></div>';
	return $output;
}

add_shortcode('youtube', 'accio_youtube');

/*-----------------------------------------------------------------------------------*/
/*	Vimeo
/*-----------------------------------------------------------------------------------*/

function accio_vimeo($atts)  {
	extract(shortcode_atts(array(
			'id' => '',
			'width' => '600',
			'height' => '360'
		), $atts));
	$output = '<div class="media-element"><iframe src="http://player.vimeo.com/video/' . $id . '" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe></div>';
	return $output;
}

add_shortcode('vimeo', 'accio_vimeo');

/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/

function accio_tooltip($atts, $content = null)  {
	extract(shortcode_atts(array(
			'link' => '',
			'title' => ''
		), $atts));
	$output = '<a href="' . $link . '" data-toggle="tooltip" data-original-title="' . $title . '" data-placement="top">' . do_shortcode($content) . '</a>';
	return $output;
}
add_shortcode('tooltip', 'accio_tooltip');

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/

function accio_highlight($atts, $content = null)  {
	extract(shortcode_atts(array(
			'color' => ''
		), $atts));
	$output = '<span class="highlight-text">' . do_shortcode($content) . '</span>';
	return $output;
}
add_shortcode('highlight', 'accio_highlight');

/*-----------------------------------------------------------------------------------*/
/*	Toggle
/*-----------------------------------------------------------------------------------*/

function accio_toggles($atts, $content = null) {
   $out = '';
   $out .= '<div class="toggle-group">';
   $out .= do_shortcode($content);
   $out .= '</div>';
   return $out;
}

add_shortcode('toggles', 'accio_toggles');

function accio_toggle($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => ''
		), $atts));
	$out = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode($content) . '</div></div>';
	return $out;
}

add_shortcode('toggle', 'accio_toggle');

/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/

function accio_accordions($atts, $content = null) {
   $out = '';
   $out .= '<div class="toggle-group accordion">';
   $out .= do_shortcode($content);
   $out .= '</div>';
   return $out;
}

add_shortcode('accordions', 'accio_accordions');

function accio_accordion($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => ''
		), $atts));
	$out = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode($content) . '</div></div>';
	return $out;
}

add_shortcode('accordion', 'accio_accordion');

/*-----------------------------------------------------------------------------------*/
/*	Progress
/*-----------------------------------------------------------------------------------*/

function accio_progress($atts, $content = null) {

	wp_enqueue_script('waypoint');

	extract(shortcode_atts(array(
		'filledcolor' => '',
		'unfilledcolor' => '',
		'value' => '70'
	), $atts));

	if(!$filledcolor) {
		$filledcolor = '#a0ce4e';
	}

	if(!$unfilledcolor) {
		$unfilledcolor = '#e6e7e8';
	}

	$html = '';
	$html .= '<div class="progress-bar" style="background-color:'.$unfilledcolor.' !important;border-color:'.$unfilledcolor.' !important;">';
	$html .= '<div class="progress-bar-content" data-percentage="'.$value.'" style="width: ' . $value . '%;background-color:'.$filledcolor.' !important;border-color:'.$filledcolor.' !important;">';
	$html .= '</div>';
	$html .= '<span class="progress-title">' . $content . ' ' . $value . '%</span>';
	$html .= '</div>';

	return $html;
}

add_shortcode('progress', 'accio_progress');

/*---------------------------------------------------------------------------*/
/* Flexslider
/*---------------------------------------------------------------------------*/

function accio_slider($atts, $content = null) {
   $str = '';
   $str .= '<div class="flexslider">';
   $str .= '<ul class="slides">';
   $str .= do_shortcode($content);
   $str .= '</ul>';
   $str .= '</div>';
   return $str;
}

add_shortcode('slider', 'accio_slider');


function accio_slide($atts, $content = null) {
   $str = '';
   $str .= '<li><img src="'.$content.'" alt="image" /></li>';
   return $str;
}

add_shortcode('slide', 'accio_slide');

/*---------------------------------------------------------------------------*/
/* Social Links
/*---------------------------------------------------------------------------*/

function accio_social($atts, $content = null) {
  extract(shortcode_atts(array(
  'twitter' => '',
  'facebook' => '',
  'linkedin' => '',
  'pinterest' => '',
  'paypal' => '',
  'delicious' => '',
  'gplus' => '',
  'stumbleupon' => '',
  'foursquare' => '',
  'path' => '',
  'dribbble' => '',
  'tumblr' => '',
  'flickr' => '',
  'spotify' => '',
  'instagram' => '',
  'behance' => '',
  'github' => '',
  'fivehundredpx' => '',
  'grooveshark' => '',
  'forrst' => '',
  'digg' => '',
  'reddit' => '',
  'rss' => '',
  'skype' => '',
  'youtube' => '',
  'vimeo' => '',
  'myspace' => '',
  'amazon' => '',
  'ebay' => '',
  'lastfm' => '',
  'soundcloud' => '',
  'posterous' => '',
  'picasa' => '',
  'wordpress' => '',
  'windows' => '',
  'evernote' => '',
  ), $atts));

	$output = '';

	if ($twitter != ''){
		$output .= '<a href="'.$twitter.'" class="ac-social-icon ac-social-icon-twitter"></a>';
	}
	if ($facebook != ''){
		$output .= '<a href="'.$facebook.'" class="ac-social-icon ac-social-icon-facebook-1"></a>';
	}
	if ($linkedin != ''){
		$output .= '<a href="'.$linkedin.'" class="ac-social-icon ac-social-icon-linkedin"></a>';
	}
	if ($pinterest != ''){
		$output .= '<a href="'.$pinterest.'" class="ac-social-icon ac-social-icon-pinterest"></a>';
	}
	if ($delicious != ''){
		$output .= '<a href="'.$delicious.'" class="ac-social-icon ac-social-icon-delicious"></a>';
	}
	if ($paypal != ''){
		$output .= '<a href="'.$paypal.'" class="ac-social-icon ac-social-icon-paypal"></a>';
	}
	if ($gplus != ''){
		$output .= '<a href="'.$gplus.'" class="ac-social-icon ac-social-icon-gplus"></a>';
	}
	if ($stumbleupon != ''){
		$output .= '<a href="'.$stumbleupon.'" class="ac-social-icon ac-social-icon-stumbleupon"></a>';
	}
	if ($foursquare != ''){
		$output .= '<a href="'.$foursquare.'" class="ac-social-icon ac-social-icon-foursquare-2"></a>';
	}
	if ($path != ''){
		$output .= '<a href="'.$path.'" class="ac-social-icon ac-social-icon-path"></a>';
	}
	if ($flickr != ''){
		$output .= '<a href="'.$flickr.'" class="ac-social-icon ac-social-icon-flickr"></a>';
	}
	if ($tumblr != ''){
		$output .= '<a href="'.$tumblr.'" class="ac-social-icon ac-social-icon-tumblr"></a>';
	}
	if ($dribbble != ''){
		$output .= '<a href="'.$dribbble.'" class="ac-social-icon ac-social-icon-dribbble"></a>';
	}
	if ($spotify != ''){
		$output .= '<a href="'.$spotify.'" class="ac-social-icon ac-social-icon-spotify"></a>';
	}
	if ($instagram != ''){
		$output .= '<a href="'.$instagram.'" class="ac-social-icon ac-social-icon-instagram"></a>';
	}
	if ($behance != ''){
		$output .= '<a href="'.$behance.'" class="ac-social-icon ac-social-icon-behance"></a>';
	}
	if ($github != ''){
		$output .= '<a href="'.$github.'" class="ac-social-icon ac-social-icon-github-1"></a>';
	}
	if ($fivehundredpx != ''){
		$output .= '<a href="'.$fivehundredpx.'" class="ac-social-icon ac-social-icon-fivehundredpx"></a>';
	}
	if ($grooveshark != ''){
		$output .= '<a href="'.$grooveshark.'" class="ac-social-icon ac-social-icon-grooveshark"></a>';
	}
	if ($forrst != ''){
		$output .= '<a href="'.$forrst.'" class="ac-social-icon ac-social-icon-forrst"></a>';
	}
	if ($digg != ''){
		$output .= '<a href="'.$digg.'" class="ac-social-icon ac-social-icon-digg"></a>';
	}
	if ($reddit != ''){
		$output .= '<a href="'.$reddit.'" class="ac-social-icon ac-social-icon-reddit"></a>';
	}
	if ($rss != ''){
		$output .= '<a href="'.$rss.'" class="ac-social-icon ac-social-icon-rss-1"></a>';
	}
	if ($skype != ''){
		$output .= '<a href="'.$skype.'" class="ac-social-icon ac-social-icon-skype"></a>';
	}
	if ($youtube != ''){
		$output .= '<a href="'.$youtube.'" class="ac-social-icon ac-social-icon-youtube"></a>';
	}
	if ($vimeo != ''){
		$output .= '<a href="'.$vimeo.'" class="ac-social-icon ac-social-icon-vimeo"></a>';
	}
	if ($myspace != ''){
		$output .= '<a href="'.$myspace.'" class="ac-social-icon ac-social-icon-myspace"></a>';
	}
	if ($amazon != ''){
		$output .= '<a href="'.$amazon.'" class="ac-social-icon ac-social-icon-amazon"></a>';
	}
	if ($ebay != ''){
		$output .= '<a href="'.$ebay.'" class="ac-social-icon ac-social-icon-ebay"></a>';
	}
	if ($lastfm != ''){
		$output .= '<a href="'.$lastfm.'" class="ac-social-icon ac-social-icon-lastfm-1"></a>';
	}
	if ($soundcloud != ''){
		$output .= '<a href="'.$soundcloud.'" class="ac-social-icon ac-social-icon-soundcloud"></a>';
	}
	if ($posterous != ''){
		$output .= '<a href="'.$posterous.'" class="ac-social-icon ac-social-icon-posterous"></a>';
	}
	if ($picasa != ''){
		$output .= '<a href="'.$picasa.'" class="ac-social-icon ac-social-icon-picasa"></a>';
	}
	if ($wordpress != ''){
		$output .= '<a href="'.$wordpress.'" class="ac-social-icon ac-social-icon-wordpress"></a>';
	}
	if ($windows != ''){
		$output .= '<a href="'.$windows.'" class="ac-social-icon ac-social-icon-win8"></a>';
	}
	if ($evernote != ''){
		$output .= '<a href="'.$evernote.'" class="ac-social-icon ac-social-icon-evernote"></a>';
	}

  return $output;
}
add_shortcode('social', 'accio_social');




/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/


function accio_tabs( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );

	STATIC $i = 0;
	$i++;

	// Extract the tab titles for use in the tab widget.
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

	$tab_titles = array();
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

	$output = '';

	if( count($tab_titles) ){
	    $output .= '<div id="accio-tabs-'. $i .'" class="accio-tabs"><div class="accio-tab-inner">';
		$output .= '<ul class="accio-nav accio-clearfix">';

		foreach( $tab_titles as $tab ){
			$output .= '<li><a href="#accio-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
		}

	    $output .= '</ul>';
	    $output .= do_shortcode( $content );
	    $output .= '</div></div>';
	} else {
		$output .= do_shortcode( $content );
	}

	return $output;
}
add_shortcode( 'accio_tabs', 'accio_tabs' );



function accio_tab( $atts, $content = null ) {
	$defaults = array( 'title' => 'Tab' );
	extract( shortcode_atts( $defaults, $atts ) );

	return '<div id="accio-tab-'. sanitize_title( $title ) .'" class="accio-tab">'. do_shortcode( $content ) .'</div>';
}
add_shortcode( 'accio_tab', 'accio_tab' );



/*-----------------------------------------------------------------------------------*/
/*	Soundcloud Shortcode
/*-----------------------------------------------------------------------------------*/

function accio_soundcloud($atts) {
	$atts = shortcode_atts(
		array(
			'url' => '',
			'width' => '100%',
			'height' => 81,
			'comments' => 'true',
			'auto_play' => 'true',
			'color' => 'ff7700',
		), $atts);

		return '<iframe width="'.$atts['width'].'" height="'.$atts['height'].'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></iframe>';
}

add_shortcode('soundcloud', 'accio_soundcloud');


?>
