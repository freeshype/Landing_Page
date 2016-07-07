<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");

		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");

		//Testing
		$of_options_select 	= array("one","two","three","four","five");
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		(
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			),
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();

		if ( is_dir($alt_stylesheet_path) )
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) )
		    {
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false )
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();

		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) {
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }
		    }
		}


		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/

		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center");

		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Main Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload your logo here.",
						"id" 		=> "logo",
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Sidebar Toggle Text",
						"desc" 		=> "Enter the text to go at the bottom of the footer (copyright, etc. Type '&amp;copy;' without the quotes, for the copyright symbol.)",
						"id" 		=> "sidebar_toggle_text",
						"std" 		=> "Sidebar Toggle",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "Enter the text to go at the bottom of the footer (copyright, etc. Type '&amp;copy;' without the quotes, for the copyright symbol.)",
						"id" 		=> "copyright",
						"std" 		=> "",
						"type" 		=> "text"
				);



$of_options[] = array( 	"name" 		=> "Portfolio",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Portfolio Header/Filter Switch",
						"desc" 		=> "Toggle this to switch between a portfolio with or without a header and filter. Without the portfolio takes up the entire section for a different effect.",
						"id" 		=> "port-header",
						"std" 		=> 1,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> "Portfolio Columns",
						"desc" 		=> "Choose the number of portfolio items to display in each row.",
						"id" 		=> "port_columns",
						"type" 		=> "select",
						"options" 	=> array(
							'col2'	=> '2',
							'col3' => '3',
							'col4'	=> '4'
							)
				);




$of_options[] = array( 	"name" 		=> "Social Media",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Footer Social Media Links",
						"desc" 		=> "",
						"id" 		=> "footer_social",
						"std" 		=> 0,
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> "Facebook URL",
						"desc" 		=> "",
						"id" 		=> "footer_fb",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Twitter URL",
						"desc" 		=> "",
						"id" 		=> "footer_twitter",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Pinterest URL",
						"desc" 		=> "",
						"id" 		=> "footer_pinterest",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Instagram URL",
						"desc" 		=> "",
						"id" 		=> "footer_instagram",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Google Plus URL",
						"desc" 		=> "",
						"id" 		=> "footer_plus",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "RSS Feed URL",
						"desc" 		=> "",
						"id" 		=> "footer_feed",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Youtube URL",
						"desc" 		=> "",
						"id" 		=> "footer_youtube",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Vimeo URL",
						"desc" 		=> "",
						"id" 		=> "footer_vimeo",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Flickr URL",
						"desc" 		=> "",
						"id" 		=> "footer_flickr",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Dribbble URL",
						"desc" 		=> "",
						"id" 		=> "footer_dribbble",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Blogger URL",
						"desc" 		=> "",
						"id" 		=> "footer_blogger",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Style Options",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Theme Color Accent (default #E74B43)",
						"desc" 		=> "Color selected.",
						"id" 		=> "accent",
						"std" 		=> "#E74B43",
						"type" 		=> "color"
				);


	}//End function: of_options()
}//End chack if function exists: of_options()
?>
