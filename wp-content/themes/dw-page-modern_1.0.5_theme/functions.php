<?php
require_once get_template_directory(). '/inc/framework.php';

add_action('wp_head','dw_page_modern_bgfix');
function dw_page_modern_bgfix() {
	global $is_IE;
	if($is_IE) : ?>
	<style type="text/css">
	.error404.ie8,
	body[class*="landing"].ie8,
	.ie8 #home {
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/header-bg.jpg', sizingMethod='scale');
		-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/header-bg.jpg',sizingMethod='scale')";
	}

	.ie8 .section.portfolio {
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/portfolio-bg.jpg', sizingMethod='scale');
		-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/portfolio-bg.jpg',sizingMethod='scale')";
	}
	</style>
	<?php endif; ?>
<?php } ?>
