<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Gadget
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<style type="text/css">

	a:hover, .entry-content ul li a:hover, .entry-content ol li a:hover, article .entry-header .entry-title a:hover, .site-footer .widget-wrap .widget ul li a:hover {
		color: <?php echo gadget_get_data('accent'); ?>;
	}

	blockquote, #site-navigation .site-branding .social li a:hover, #site-navigation .menu li a:hover, article.post .entry-footer .read-more, article.page .entry-footer .read-more, #comments .bypostauthor .vcard img {
		border-color: <?php echo gadget_get_data('accent'); ?>;
	}

	.posts-navigation .nav-links a, .post-navigation .nav-links a, #comments #submit, #comments .reply .comment-reply-link, .tagcloud a {
		background: <?php echo gadget_get_data('accent'); ?>;
	}

	<?php echo gadget_get_data('custom_css'); ?>

</style>
</head>

<body <?php body_class(); ?>>

<i class="fa fa-search search-toggle"></i>

<div id="search-window">
<span class="close-search">CLOSE</span>
<?php

$form = '<form method="get" action="' . esc_url(home_url('/')) . '">
<input type="text" name="s">
<span>Press Enter When Done</span>
</form>';

echo $form;

?>
</div>

<div id="header-side">
	<div id="nav-toggle">
		<ul class="hb">
	        <li class="first"></li>
	        <li class="second"></li>
	        <li class="third"></li>
	    </ul>
	</div>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		<div class="site-branding">
			<?php
	        if (gadget_get_data('menu_logo')) { ?>
	            <div class="logo-image" href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>" rel="home"><img src="<?php echo gadget_get_data('menu_logo'); ?>" alt="<?php echo get_bloginfo('name') ?>" /></div>
	        <?php } else { ?>
	            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	        <?php } ?>
			<ul class="social">
				<?php if (gadget_get_data('fb')) : ?>
                    <li><a href="<?php echo gadget_get_data('fb'); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('twitter')) : ?>
                    <li><a href="<?php echo gadget_get_data('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('pinterest')) : ?>
                    <li><a href="<?php echo gadget_get_data('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('instagram')) : ?>
                    <li><a href="<?php echo gadget_get_data('instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('plus')) : ?>
                    <li><a href="<?php echo gadget_get_data('plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('feed')) : ?>
                    <li><a href="<?php echo gadget_get_data('feed'); ?>"><i class="fa fa-rss"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('youtube')) : ?>
                    <li><a href="<?php echo gadget_get_data('youtube'); ?>"><i class="fa fa-youtube-play"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('vimeo')) : ?>
                    <li><a href="<?php echo gadget_get_data('vimeo'); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('flickr')) : ?>
                    <li><a href="<?php echo gadget_get_data('flickr'); ?>"><i class="fa fa-flickr"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('dribbble')) : ?>
                    <li><a href="<?php echo gadget_get_data('dribbble'); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php endif ;?>
                <?php if (gadget_get_data('blogger')) : ?>
                    <li><a href="<?php echo gadget_get_data('blogger'); ?>"><i class="fa fa-blogger"></i></a></li>
                <?php endif ;?>
			</ul>
		</div><!-- .site-branding -->
	</nav><!-- #site-navigation -->
</div>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
	        if (gadget_get_data('logo')) { ?>
	            <a class="logo-image" href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo('name'); ?>" rel="home"><img src="<?php echo gadget_get_data('logo'); ?>" alt="<?php echo get_bloginfo('name') ?>" /></a>
	        <?php } else { ?>
	            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	        <?php } ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
