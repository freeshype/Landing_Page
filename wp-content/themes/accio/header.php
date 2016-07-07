<?php
/**
 * The Template for displaying site head.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!DOCTYPE HTML>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!-- Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- Mobile Specifics -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Title -->
	<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<!-- Description -->
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php $options = get_option('accio_custom_settings'); ?>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($options['google_font']); ?>:400,400italic,700,700italic' rel='stylesheet' type='text/css' />

	<?php if($options['google_font'] != $options['heading_google_font']) : ?>

	<link href='http://fonts.googleapis.com/css?family=<?php echo urlencode($options['heading_google_font']); ?>:400,400italic,700,700italic' rel='stylesheet' type='text/css' />

	<?php endif; ?>

	<?php if(get_option('accio_favicon') != '') : ?>
	<link rel="shortcut icon" href="<?php echo get_option('accio_favicon');?>" />
	<?php endif; ?>
	<?php if(get_option('accio_iphone_icon') != '') : ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_option('accio_iphone_icon'); ?>" />
	<?php endif; ?>
	<?php if(get_option('accio_iphone_icon_retina') != '') : ?>
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_option('accio_iphone_icon_retina'); ?>" />
	<?php endif; ?>
	<?php if(get_option('accio_ipad_icon') != '') : ?>
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_option('accio_ipad_icon'); ?>" />
	<?php endif; ?>
	<?php if(get_option('accio_ipad_icon_retina') != '') : ?>
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_option('accio_ipad_icon_retina'); ?>" />
	<?php endif; ?>

	<!-- RSS & Pingbacks -->

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

</head>

<body <?php body_class('rtl'); ?>>

<?php $options['logo'] == '' ? $logo = get_template_directory_uri() . '/images/logo.png' : $logo = $options['logo']; ?>

<!-- Start Header -->
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="row">
			<div class="span3">
				<div id="logo">
					<?php if(get_option('accio_logo_text') == "false") : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo $logo; ?>" alt="<?php if(get_bloginfo('description')) { bloginfo('description'); } else { bloginfo('name'); } ?>">
					</a>
					<?php else : ?>
					<a class="logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="span9">

				<!-- Mobile Navigation Mobile Menu -->
				<a id="mobile-nav" class="menu-nav button-main" href="#menu-nav"><span class="menu-icon"></span></a>
				<!-- End Navigation Mobile Menu -->

				<!-- Start Main Menu -->
				<nav id="menu">
					<?php if (has_nav_menu('primary_menu')) { ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'container' => '' ) ); ?>
					<?php } else { ?>
					<ul>
					<?php wp_list_pages( array( 'exclude' => '', 'title_li' => '', 'sort_column' => 'menu_order, post_title' )); ?>
					</ul>
					<?php } ?>
				</nav>
				<!-- End Main Menu -->
			</div>
		</div>
	</div>
</header>
<!-- End Header -->
