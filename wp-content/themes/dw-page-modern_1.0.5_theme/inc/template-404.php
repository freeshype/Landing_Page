<?php
/**
 * Template Name: 404
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php wp_title( '|', true, 'right' )?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(''); ?>/inc/assets/css/template.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(''); ?>/inc/assets/css/template-responsive.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(''); ?>/inc/assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class('error404'); ?> data-spy="scroll" data-offset="61" data-target=".nav-collapse">
    <nav id="nav" class="navbar navbar-fixed-top <?php echo get_option('_dw_page_navbar_class'); ?>">
        <div class="navbar-inner">
            <div class="container">
                <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <a href="<?php echo site_url(); ?>" class="brand"><?php echo html_entity_decode( get_bloginfo('name') ); ?></a>

                <?php dw_page_generate_menu(); ?>
            </div>
        </div>
    </nav>

	<div id="main">
	  	<header id="page404" class="section header style-1">
	        <div class="container">
	            <h1>404</h1>
	            <h2>Opps! Something went wrong...</h2>
	            <span>Page not found. Please continue to our <a href="<?php echo get_bloginfo('siteurl');  ?>">Home page</a></span>
	        </div>
	    </header>
	</div>

 <?php get_footer(); ?>
