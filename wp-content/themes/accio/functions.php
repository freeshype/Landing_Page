<?php
/**
 * Accio functions and definitions
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

/**
* Set Max Content Width (use in conjuction with ".entry-content img" css)
*/

if ( ! isset( $content_width ) ) {
	$content_width = 758;
}

if( !function_exists( 'accio_content_width' ) ) {
    function accio_content_width() {
        if( is_page_template( 'template-full-width.php' ) || is_attachment() ) {
            global $content_width;
            $content_width = 1058;
        }
    }
}
add_action( 'template_redirect', 'accio_content_width' );

/**
* Sets up theme defaults and registers the various WordPress features
*/

function accio_theme_setup() {

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menu('primary_menu', __('Primary Menu', 'framework'));

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'framework', get_template_directory() . '/languages' );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	$formats = array('gallery', 'link', 'image', 'quote', 'video', 'audio', 'aside', 'chat', 'status');
	add_post_type_support( 'post', 'post-formats' );


	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_image_size( 'thumbnail-archive', 60, 60, true ); // Widget Recent Post Thumbnail

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', $formats );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

}

add_action( 'after_setup_theme', 'accio_theme_setup' );

/**
* Register Sidebars
*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => __('Main Sidebar', 'framework'),
		'description'   => __( 'Appears on posts in the sidebar.', 'framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Page Sidebar', 'framework'),
		'description'   => __( 'Appears on pages in the sidebar.', 'framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Footer One', 'framework'),
		'description'   => __( 'Appears in the first column in the footer section of the site.', 'accio' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Footer Two', 'framework'),
		'description'   => __( 'Appears in the second column in the footer section of the site.', 'accio' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Footer Three', 'framework'),
		'description'   => __( 'Appears in the third column in the footer section of the site.', 'accio' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}


/**
* Register and load common JS
*/

function accio_enqueue_scripts() {

	// Register our scripts
	wp_register_script('accio_custom', get_template_directory_uri().'/js/jquery.custom.js', array('jquery'), false, false);
	wp_register_script('easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery'), false, true);
	wp_register_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), false, true);
	wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, true);
	wp_register_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), false, true);
	wp_register_script('imagesloaded', get_template_directory_uri().'/js/jquery.imagesloaded.min.js', array('jquery'), false, true);
	wp_register_script('magnific', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'), false, true);
	wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr.js', false, false, true);
	wp_register_script('prettify', get_template_directory_uri().'/js/prettify.js', false, false, true);
	wp_register_script('selectivizr', get_template_directory_uri().'/js/selectivizr.js', false, false, false);
	wp_register_script('superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), false, true);
	wp_register_script('supersubs', get_template_directory_uri().'/js/supersubs.js', array('jquery'), false, true);
	wp_register_script('waypoint', get_template_directory_uri().'/js/jquery.waypoint.js', array('jquery'), false, true);
	wp_register_script('validation', get_template_directory_uri().'/js/jquery.validate.js', array('jquery'), false, true);


	// Enqueue Scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('accio_custom');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('easing');
	wp_enqueue_script('fitvids');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('magnific');
	wp_enqueue_script('prettify');
	wp_enqueue_script('modernizr');
	wp_enqueue_script('selectivizr');
	wp_enqueue_script('superfish');
	wp_enqueue_script('supersubs');
	wp_enqueue_script('waypoint');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('validation');

	if(is_singular() && comments_open()) {
		wp_enqueue_script('comment-reply'); // Script required for threaded comments
	}

	global $is_IE;
	if ( $is_IE ) {
		wp_enqueue_script('selectivizr');
	}


	// Register Stylesheets
	wp_register_style('fontawesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');
	wp_register_style('fontello', get_template_directory_uri().'/css/fontello/css/fontello.css');
	wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_register_style('accio_shortcode', get_template_directory_uri().'/css/shortcode.css');
	wp_register_style('magnific', get_template_directory_uri().'/css/magnific-popup.css');
	wp_register_style('custom_styles', get_template_directory_uri().'/css/custom-styles.php');

	// Enqueue Stylesheets
	wp_enqueue_style( 'default', get_stylesheet_uri(), array(), '2013-04-10' );
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('fontello');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('responsive');
	wp_enqueue_style('accio_shortcode');
	wp_enqueue_style('magnific');
	wp_enqueue_style('custom_styles');

}

add_action('wp_enqueue_scripts', 'accio_enqueue_scripts');

/**
* Add Browser Detection Body Class
*/

function accio_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) $classes[] = 'ie';
  else $classes[] = 'unknown';
  if($is_iphone) $classes[] = 'iphone';
  if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
         $classes[] = 'osx';
   } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
         $classes[] = 'linux';
   } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
         $classes[] = 'windows';
   }
  return $classes;
}

add_filter('body_class','accio_body_class');

/**
* Custom Gravatar Support
*/

function accio_custom_gravatar( $avatar_defaults ) {
    $accio_avatar = get_template_directory_uri() . '/images/gravatar.png';
    $avatar_defaults[$accio_avatar] = 'Custom Gravatar (/images/gravatar.png)';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'accio_custom_gravatar' );

/**
* This is how comments are displayed
*/

function accio_comment($comment, $args, $depth) {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$isByAuthor = false;

	if($comment->comment_author_email == get_the_author_meta('email')) {
	$isByAuthor = true;
	}

	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-info clearfix">

			<?php echo get_avatar($comment,$size='60'); ?>

		</div>

		<div class="comment-content">

			<div class="comment-author vcard">
			<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('Author', 'framework') ?></span><?php } ?>
			</div>

			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'framework'), get_comment_date(),  get_comment_time()) ?></a> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link(__('&middot; Edit', 'framework'),'  ','') ?></div>

			<div class="comment-body">
				<?php comment_text(); ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'framework') ?></em>
				<?php endif; ?>
			</div>

		</div>

	</div>

	</li>

	<?php
}


/**
* Seperated Pings Styling
*/

function accio_list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?></li>
<?php }

/**
* Add Lightbox to wordpress gallery
*/

function gallery_lightbox ($content) {
	$content = preg_replace("/<a/","<a class=\"lightbox\"",$content,1);
	return $content;
}

add_filter( 'wp_get_attachment_link', 'gallery_lightbox');

/**
* Remove pages from search results
*/

function accio_remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'accio_remove_pages_from_search');


/*-----------------------------------------------------------------------------------*/
/*	Numeric Pagination Support
/*-----------------------------------------------------------------------------------*/

function accio_pagination() {

	if( is_singular() )
		return;

	global $wp_query;


	if( $wp_query->max_num_pages <= 1 )
		return;
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	if ( $paged >= 1 )
		$links[] = $paged;
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="pagination clearfix"><ul>' . "\n";
	if ( get_previous_posts_link() )
		printf( '<li class="prev-post">%s</li>' . "\n", get_previous_posts_link('<i class="icon-chevron-left"></i>') );
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="current"' : '';
		printf( '<li%s><a class="button-main default" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links ) )
			echo '<li class="dots"></li>';	}
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="current"' : '';
		printf( '<li%s><a class="button-main default"  href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="dots"></li>' . "\n";
		$class = $paged == $max ? ' class="current"' : '';
		printf( '<li%s><a class="button-main default" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	if ( get_next_posts_link() )
		printf( '<li class="next-post">%s</li>' . "\n", get_next_posts_link('<i class="icon-chevron-right"></i>') );
	echo '</ul></div>' . "\n";

}

/**
* Animation
*/

function accio_animation() {

	if (get_option('accio_animation') == "true" ) {
		$animation = 'animated';
	} else {
		$animation = '';
	}

	return $animation;
}

/**
* Layouts
*/

function accio_main_layout() {
	$main_layout = '';
	if(get_option('accio_layout') == 'layout-2cr') {
		$main_layout = 'to_left';
	} elseif(get_option('accio_layout') == 'layout-2cl') {
		$main_layout = 'to_right';
	}

	return $main_layout;
}

function blog_layout() {
	$blog_layout = '';
	if(get_option('accio_layout') == 'layout-2cr') {
		$blog_layout = 'span8 to_left';
	} elseif(get_option('accio_layout') == 'layout-2cl') {
		$blog_layout = 'span8 to_right';
	} elseif(get_option('accio_layout') == 'layout-1cl') {
		$blog_layout = 'blog-full';
	}

	return $blog_layout;
}

function accio_side_layout() {
	$side_layout = '';
	if(get_option('accio_layout') == 'layout-2cr') {
		$side_layout = 'to_right';
	} elseif(get_option('accio_layout') == 'layout-2cl') {
		$side_layout = 'to_left';
	}

	return $side_layout;
}

/**
* Remove Comment Form Defaults
*/

add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
  $defaults['comment_notes_after'] = '';
  return $defaults;
}

/**
* Include Widgets
*/

/* Add Flickr Widget ------------------------- */
include('functions/widget-flickr.php');

/* Add Video Widget -------------------------- */
include('functions/widget-video.php');

/* Add 140x140 Ad Widget --------------------- */
include('functions/widget-ad-140.php');

/* Add Facebook Likebox Widget --------------- */
include('functions/widget-facebook.php');

/* Add Social Widget ------------------------- */
include('functions/widget-social.php');

/* Add Recent Posts Widget ------------------- */
include('functions/widget-blog.php');


/**
* Filters that allow shortcodes in Text Widgets
*/

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');


/**
* Shortcodes
*/

// Add the Theme Shortcodes
include('tinymce/theme-shortcodes.php');

define('ACCIO_FILEPATH', get_template_directory());
define('ACCIO_DIRECTORY', get_template_directory_uri());

require_once (ACCIO_FILEPATH . '/tinymce/tinymce.loader.php');


/**
* Include Meta Box Framework
*/

/* Re-define meta box path and URL */
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/inc/meta-box' ) );

/* Include the meta box script */
require_once RWMB_DIR . 'meta-box.php';

/* Include the meta box definition */
include('inc/accio-metaboxes.php');

/**
* Load Theme Options & Customizer
*/

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');

include('admin/customizer/accio-customizer.php');
