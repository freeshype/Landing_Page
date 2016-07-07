<?php
header("Content-type: text/css");

if(file_exists('../../../../wp-load.php')) :
	include '../../../../wp-load.php';
else:
	include '../../../../../wp-load.php';
endif;

ob_flush();
?>

<?php

$options = get_option('accio_custom_settings');

$options['text_color'] == '' ? $body_text_color = '#4c4d51' : $body_text_color = $options['text_color'];

$options['google_font'] == '' ? $body_google_font = '"Lato"' : $body_google_font = $options['google_font'];

$options['system_font'] == '' ? $body_system_font = '"Helvetica", Arial, sans-serif' : $body_system_font = $options['system_font'];

$options['font_size'] == '' ? $font_size = '16px' : $font_size = $options['font_size'];

$options['font_weight'] == '' ? $font_weight = '400' : $font_weight = $options['font_weight'];

$options['font_line_height'] == '' ? $line_height = '28' : $line_height = $options['font_line_height'];

$options['heading_google_font'] == '' ? $heading_google_font = '"Lato", Arial, sans-serif' : $heading_google_font = $options['heading_google_font'];

$options['heading_system_font'] == '' ? $heading_system_font = '"Helvetica", Arial, sans-serif' : $heading_system_font = $options['heading_system_font'];

$options['accent_primary'] == '' ? $accent_primary = '#F37A5C' : $accent_primary = $options['accent_primary'];

$options['accent_secondary'] == '' ? $accent_secondary = '#D66F55' : $accent_secondary = $options['accent_secondary'];

$options['accent_media'] == '' ? $accent_media = '#4DA2DB' : $accent_media = $options['accent_media'];

$options['border_color'] == '' ? $border_color = '#e9e9e9' : $border_color = $options['border_color'];

$options['content_bg_color'] == '' ? $content_bg = '#f2f2f2' : $content_bg = $options['content_bg_color'];

$options['enable_border'] == '' ? $enable_border = 'Yes' : $enable_border = $options['enable_border'];

$options['border_style'] == '' ? $border_style = 'Border' : $border_style = $options['border_style'];

?>


<?php if(get_option('accio_blog_layout') == "layout-2cl") : ?>

#blog #main {
float: right !important;
}

#blog #aside {
float: left !important;
}

<?php endif; ?>

<?php if(get_option('accio_page_layout') == "layout-2cl") : ?>

#page #main {
float: right !important;
}

#page #aside {
float: left !important;
}

<?php endif; ?>

<?php if(get_option('accio_animation') == 'true') : ?>

header #logo {
    animation: fadeintextright 1s;
    -webkit-animation: fadeintextright 1s;
    -moz-animation: fadeintextright 1s;
}

#main,
#aside,
.intro-box-inner {
	animation: fadeintext 1s;
	-webkit-animation: fadeintext 1s;
	-moz-animation: fadeintext 1s;
}

<?php endif; ?>

a {
	color: <?php echo $body_text_color; ?>;
}

body {
	<?php if($body_system_font == 'None') : ?>
	font-family: <?php echo $body_google_font; ?>,Helvetica,Arial,sans-serif;
	<?php else : ?>
	font-family: <?php echo $body_system_font; ?>;
	<?php endif; ?>
	font-size: <?php echo $font_size; ?>;
	font-weight: <?php echo $font_weight; ?>;
	line-height: <?php echo $line_height.'px'; ?>;
	color: <?php echo $body_text_color; ?>;
	background: <?php echo $content_bg; ?>;
}

h1,
h2,
h3,
h4,
h5,
h6 {
	<?php if($heading_system_font == 'None') : ?>
	font-family: <?php echo $heading_google_font; ?>,Helvetica,Arial,sans-serif;
	<?php else : ?>
	font-family: <?php echo $heading_system_font; ?>;
	<?php endif; ?>
}


.color,
#logo a:hover,
a:hover,
#footer-credits a:hover,
.color-text,
footer .widget a,
.about-author .title a,
.entry-content a,
form label.error,
.entry-title a:hover,
.accio_blog_widget .widget-entry-title:hover,
.archive-lists ul li a:hover {
	color: <?php echo $accent_primary; ?>;
}

.entry-content a:hover,
footer .widget a:hover {
	color: <?php echo $body_text_color; ?>;
}

.flexslider .flex-direction-nav a:hover,
#back-to-top:hover,
.highlight-text,
.more-link:hover,
.button-main.active,
.flickr_badge_image,
a.button-main,
a.button-main.toggle:hover,
.byuser .author-tag,
.bypostauthor .author-tag,
.accent,
input[type="submit"],
button[type="submit"],
a.share-button.active,
.post-navigation a,
.pagination .prev-post a,
.pagination .next-post a,
.next-page a,
.prev-page a {
	background: <?php echo $accent_primary; ?>;
}

.jp-play-bar,
.jp-volume-bar-value,
body .mejs-controls div.mejs-time-rail .mejs-time-current,
body .mejs-video .mejs-controls div.mejs-volume-slider .mejs-volume-handle,
body .mejs-controls div.mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
	background: <?php echo $accent_media; ?>;
}

.post-navigation a,
.prev-page a,
.next-page a,
.pagination .prev-post a,
.pagination .next-post a,
a.button-main,
a.button-main.toggle:hover,
input[type="submit"],
button[type="submit"],
a.share-button.active {
	border-bottom-color: <?php echo $accent_secondary; ?>;
}

header,
footer,
article.hentry,
.widget,
.author-bio,
#respond,
#comments,
.intro-box-inner,
.comments-disabled {
	<?php if($border_style == 'Box Shadow') : ?>
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
	border: none;
	<?php elseif($border_style == 'Border') : ?>
	<?php if($enable_border == 'Yes') : ?>
	border-color: <?php echo $border_color; ?>;
	<?php elseif($enable_border =='No') : ?>
	border: none;
	<?php endif; endif; ?>
}

.accent {
	border-color: <?php echo $accent_primary ?>;
}

.color {
	background: <?php echo $accent_primary ?>;
}

/* Custom CSS */
<?php if(get_option('accio_custom_css')) : ?>
<?php echo html_entity_decode(get_option('accio_custom_css')); ?>
<?php endif; ?>
