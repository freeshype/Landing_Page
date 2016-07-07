<?php

// loads wordpress
require_once('get_wp.php'); // loads wordpress stuff

// gets shortcode
$shortcode = base64_decode( trim( $_GET['sc'] ) );

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/colors.php" type="text/css" media="screen" />
<style type="text/css">
html {
	margin: 0 !important;
}
body {
	padding: 20px 15px;
}
</style>
</head>
<body>
	<div class="entry-content">
		<?php echo do_shortcode( $shortcode ); ?>
	</div>
</body>
</html>
