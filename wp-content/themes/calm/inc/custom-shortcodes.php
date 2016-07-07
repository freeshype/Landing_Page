<?php

/*
 * Calm Custom Shortcodes
 */


// Button Shortcode

function button( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'link' => '',
		'button_txt' => '',
	), $atts));

	return '<a href="' . $link . '" class="button center"> ' . $button_txt . '</a>';

}

add_shortcode( 'button', 'button' );


// Shortcode buttons


add_action('admin_init', 'shortcode_button');
add_action('admin_footer', 'get_shortcodes');



 function shortcode_button()
 {
     if( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
     {
         add_filter( 'mce_external_plugins', 'add_buttons' );
         add_filter( 'mce_buttons', 'register_buttons' );
     }
 }

 function add_buttons( $plugin_array )
 {
     $plugin_array['pushortcodes'] = get_template_directory_uri() . '/admin/assets/js/shortcode-buttons.js';

     return $plugin_array;
 }

function register_buttons( $buttons )
 {
     array_push( $buttons, 'button', 'pushortcodes' );
     return $buttons;
 }

 function get_shortcodes()
 {
     global $shortcode_tags;

     echo '<script type="text/javascript">
     var shortcodes_button = new Array();';

     $count = 0;

     foreach($shortcode_tags as $tag => $code)
     {
         echo "shortcodes_button[{$count}] = '{$tag}';";
         $count++;
     }

     echo '</script>';
 }
