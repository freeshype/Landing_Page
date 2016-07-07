<?php
/**
 * Calm Header
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php wp_title(''); ?><?php if (wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Merriweather:300,400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
	<style type="text/css" media="screen">

		a, .page-content ul li a:hover, .page-content ol li a:hover, section.page-content .post.single .post-content ul.tags li a, section.page-content .page.single .post-content ul.tags li a, section.page-content .post .post-title h2 a:hover, section.page-content .page .post-title h2 a:hover, section.page-content .post .author span.name a:hover, section.page-content .page .author span.name a:hover, section.page-content aside.post-aside .comments-container ul.comment-list li .comment a.comment-reply-link, .posts-nav a:hover, .portfolio .port-filter ul.filter li:hover, .portfolio .portfolio-cont .item .img-container span.cats, aside.side-bar .widget ul li a:hover, #commentform input#submit, #commentform textarea#submit {
			color: <?php echo calm_get_data('accent') ?>;
		}

		header ul.social li a, section.page-content .post .post-format i, section.page-content .page .post-format i, section.page-content aside.post-aside .comments-container ul.comment-list li.bypostauthor .comment .vcard span.is-author, .posts-nav a, .posts-nav ul li a, .page-links a span, .sidebar-toggle i, aside.side-bar .widget input:focus, #commentform input:focus, #commentform textarea:focus, .button, .dot1, .dot2 {
			background-color: <?php echo calm_get_data('accent') ?>;
		}

		<?php echo calm_get_data('custom_css'); ?>

	</style>
</head>

<body <?php body_class(); ?>>

	<div id="pre-loader">
		<div class="spinner">
	    <div class="dot1"></div>
	    <div class="dot2"></div>
	  </div>
	</div>

	<div class="wrapper">

		<!-- HEADER/MENU -->

		<header id="site-header">

			<?php if ( is_active_sidebar( 'sidebar-widgets' ) ) : ?>

				<div class="sidebar-toggle">
					<i class="icon-new-tab"></i>
					<span class="sidebar-popup"><?php echo calm_get_data('sidebar_toggle_text'); ?></span>
				</div>

			<?php endif; ?>

			<div class="logo animated flipInX">

				<?php

				if (function_exists('calm_get_data')) {

				if (calm_get_data('logo')) { ?>
	        	<a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>" rel="home"><img src="<?php echo calm_get_data('logo'); ?>" alt="<?php echo get_bloginfo('name') ?>" /></a>
	      <?php } else { ?>
	         <h2><a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>" rel="home"><?php echo get_bloginfo('name'); ?></a></h2>
	      <?php } } else { ?>
	         <h2><a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>" rel="home"><?php echo get_bloginfo('name'); ?></a></h2>
	      <?php } ?>

      </div>

			<nav>
				<?php wp_nav_menu(array(
            'theme_location'	=> 'main_menu',
            'menu'					=> 'Main',
            'container'			=> false,
            'menu_class'		=> 'main-nav animated flipInX delay1'
          )); ?>
			</nav>

			<?php if (calm_get_data('footer_social')) : ?>
				<ul class="social animated flipInX delay2">
					<?php if (calm_get_data('footer_fb')) : ?>
						<li><a href="<?php echo calm_get_data('footer_fb'); ?>"><i class="icon-facebook"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_twitter')) : ?>
						<li><a href="<?php echo calm_get_data('footer_twitter'); ?>"><i class="icon-twitter"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_pinterest')) : ?>
						<li><a href="<?php echo calm_get_data('footer_pinterest'); ?>"><i class="icon-pinterest"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_instagram')) : ?>
						<li><a href="<?php echo calm_get_data('footer_instagram'); ?>"><i class="icon-instagram"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_plus')) : ?>
						<li><a href="<?php echo calm_get_data('footer_plus'); ?>"><i class="icon-google-plus"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_feed')) : ?>
						<li><a href="<?php echo calm_get_data('footer_feed'); ?>"><i class="icon-feed-2"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_youtube')) : ?>
						<li><a href="<?php echo calm_get_data('footer_youtube'); ?>"><i class="icon-youtube"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_vimeo')) : ?>
						<li><a href="<?php echo calm_get_data('footer_vimeo'); ?>"><i class="icon-vimeo"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_flickr')) : ?>
						<li><a href="<?php echo calm_get_data('footer_flickr'); ?>"><i class="icon-flickr-2"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_dribbble')) : ?>
						<li><a href="<?php echo calm_get_data('footer_dribbble'); ?>"><i class="icon-dribbble"></i></a></li>
					<?php endif ;?>
					<?php if (calm_get_data('footer_blogger')) : ?>
						<li><a href="<?php echo calm_get_data('footer_blogger'); ?>"><i class="icon-blogger"></i></a></li>
					<?php endif ;?>
				</ul>
			<?php endif; ?>

			<?php if (calm_get_data('copyright')) : ?>
				<span class="copy animated flipInX delay3"><?php echo calm_get_data('copyright'); ?></span>
			<?php endif; ?>

		</header>
