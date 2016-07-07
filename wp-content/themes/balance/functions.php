<?php
  // ADD THEME OPTIONS
  require_once ( get_stylesheet_directory() . '/theme-options.php' );

  // Translations can be filed in the /languages/ directory
  load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );

  $locale = get_locale();
  $locale_file = TEMPLATEPATH . "/languages/$locale.php";
  if ( is_readable($locale_file) )
      require_once($locale_file);

  // jQuery Insert From Google
  if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
  function my_jquery_enqueue() {
     wp_deregister_script('jquery');
     wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null);
     wp_enqueue_script('jquery');
  }

  // Clean up the <head>
  function removeHeadLinks() {
      remove_action('wp_head', 'rsd_link');
      remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

  // MENUS
  function your_function_name() {
  add_theme_support( 'menus' );
  }
  add_action( 'after_setup_theme', 'your_function_name' );

  // FEATURED IMAGE
  if ( function_exists( 'add_theme_support' ) )
  add_theme_support( 'post-thumbnails' );

  if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'homepage-tile', 600, 600, true );
  }

  // ALLOW SVG UPLOADS
  function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );


 ?>
