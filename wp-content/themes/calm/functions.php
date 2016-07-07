<?php
/**
 * Calm Functions
 */


/* Required Files
=======================================================*/

// Custom Post Types
require_once ('inc/custom-post-types.php');

// Custom Shortcodes
require_once ('inc/custom-shortcodes.php');

// Custom Metaboxes
require_once ('inc/custom-meta-boxes.php');



/* Enqueue scripts and stylesheets
=======================================================*/

function calm_admin_scripts() {

	// Admin Styles
  wp_enqueue_style('custom-admin-styles', get_template_directory_uri() . '/css/admin.css');

}

add_action( 'admin_enqueue_scripts', 'calm_admin_scripts' );

function calm_scripts() {

	// Stylesheets
	wp_enqueue_style( 'calm', get_stylesheet_uri() );
	wp_enqueue_style( 'icomoon', get_template_directory_uri().'/css/ico-moon.css' ) ;
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' ) ;
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css' ) ;

	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri().'/js/jquery.nicescroll.min.js', '', '', true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', '', '', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', '', '', true );
	wp_enqueue_script( 'flex', get_template_directory_uri().'/js/jquery.flexslider-min.js', '', '', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js', '', '', true );

	wp_enqueue_script( 'comment-reply' );

}

add_action( 'wp_enqueue_scripts', 'calm_scripts' );


/*  Theme Setup and Support
=======================================================*/

function calm_theme_setup() {

	load_theme_textdomain('calm', get_template_directory() . '/languages');

	add_theme_support('automatic-feed-links');

	add_theme_support('post-thumbnails');
	// Thumbnail Sizes
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'blog', 1400, 477, true );
	}

	add_theme_support('post-formats', array('gallery', 'quote', 'video', 'link', 'audio', 'status') );

}

add_action('after_setup_theme', 'calm_theme_setup');



function calm_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 2000;
	}

	if ( ! isset( $content_width ) ) $content_width = 2000;
}

add_action( 'template_redirect', 'calm_content_width' );



function post_format_icon() {

	if (has_post_format('gallery')) {
		$icon = 'stack';
	} else if (has_post_format('quote')) {
		$icon = 'quotes-left';
	} else if (has_post_format('video')) {
		$icon = 'play';
	} else if (has_post_format('link')) {
		$icon = 'link';
	} else if (has_post_format('audio')) {
		$icon = 'headphones';
	} else if (has_post_format('status')) {
		$icon = 'twitter';
	} else {
		$icon = false;
	}

	return $icon;

}



/* Register navigation menus
=======================================================*/

register_nav_menus (
	array(
		'main_menu' => __('Main', 'calm'),
	)
);



/* Register Sidebars and Widgets
=======================================================*/

function calm_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Sidebar', 'calm' ),
		'id' => 'sidebar-widgets',
		'description' => __( 'Sidebar appears when the sidebar toggle button in the top left of the page is clicked.', 'calm' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );

	}

add_action( 'widgets_init', 'calm_widgets_init' );



/* Custom Blog/Comments Filters
=======================================================*/

function calm_excerpt_trail( $more ) {
	return '...';
}

add_filter('excerpt_more', 'calm_excerpt_trail');

function posts_link_next_class($format) {
	$format = str_replace('href=', 'class="button next" href=', $format);
	return $format;
}

add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="button prev" href=', $format);
	return $format;
}

add_filter('previous_post_link', 'posts_link_prev_class');



function calm_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	$tag = 'div';
	$add_below = 'comment';

	?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

	<?php if ($comment->comment_approved == '0') : ?>
	<div class="clearfix"></div>
	<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'calm') ?></p>
	<br />
	<?php endif; ?>

	<div class="comment">
		<div class="vcard">
			<div class="avatar-cont">
				<?php echo get_avatar( $comment, 65 ); ?>
			</div>
			<cite class="name"><?php comment_author(); ?></cite>
			<span class="is-author">Post Author</span>
			<span class="date-time"><?php comment_date('F j, Y'); ?> at <?php comment_time('g:iA'); ?></span>
		</div>
		<div class="clearfix"></div>
		<div class="content">
			<?php comment_text(); ?>
		</div>
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

<?php }


function calm_comment_form_fields($fields) {
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'calm' ) .
    	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></p>';
    $fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Email', 'calm' ) .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" /></p>';
    $fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'URL', 'calm' ) .
      '<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .
      '" /></p>';

    return $fields;
}

add_filter('comment_form_default_fields','calm_comment_form_fields');



/* Misc.
=======================================================*/

function add_slug_css_list_categories($list) {

$cats = get_categories('taxonomy=port-cat');
	foreach($cats as $cat) {
	$find = 'cat-item-' . $cat->term_id . '"';
	$replace = ' ' . $cat->slug . '" data-filter="'. $cat->slug .'"';
	$list = str_replace( $find, $replace, $list );
	$find = 'cat-item-' . $cat->term_id . ' ';
	$replace = ' ' . $cat->slug . ' ';
	$list = str_replace( $find, $replace, $list );
	}

return $list;
}

add_filter('wp_list_categories', 'add_slug_css_list_categories');

function shortcode_fix($content){
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'shortcode_fix');


/* Slightly Modified Options Framework
=======================================================*/

require_once ('admin/index.php');

if ( ! function_exists('calm_get_data') ) {
	function calm_get_data($id, $fallback = false) {
		global $smof_data;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($smof_data[$id]) && $smof_data[$id] !== '' ) ? $smof_data[$id] : $fallback;
		return $output;
	}
}
