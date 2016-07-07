<?php
if( !defined('DW_PAGE_PATH') ){
    define('DW_PAGE_PATH', get_template_directory() .'/' );
}
if( !defined('DW_PAGE_URI') ){
    define('DW_PAGE_URI', get_template_directory_uri() . '/' );
}

/*---------------------------------------------------------------------------*/
/* Files Include
/*---------------------------------------------------------------------------*/
require_once DW_PAGE_PATH . 'inc/clients.php';
require_once DW_PAGE_PATH . 'inc/projects.php';
require_once DW_PAGE_PATH . 'inc/shortcodes.php';
require_once DW_PAGE_PATH . 'inc/testimonials.php';
require_once DW_PAGE_PATH . 'inc/nav-menus-hook.php';
require_once DW_PAGE_PATH . 'inc/users.php';
require_once DW_PAGE_PATH . 'inc/browsers.php';
require_once DW_PAGE_PATH . 'inc/customizer/customizer.php';
require_once DW_PAGE_PATH . 'inc/buddypress/bp-custom.php';

if ( ! isset( $content_width ) ) $content_width = 940;
add_action('after_setup_theme', 'dw_page_setup');
function dw_page_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support( 'automatic-feed-links' );
    register_nav_menu( 'primary', __( 'Primary Menu', 'dw-page' ) );
    register_nav_menu( 'secondary', __( 'Extra Menu', 'dw-page' ) );

}
add_filter('show_admin_bar', '__return_false');

/*---------------------------------------------------------------------------*/
/*  Site Title
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_site_title_filter') ){
    add_filter('wp_title','dw_page_site_title_filter');

    function dw_page_site_title_filter($title){
        global $page, $paged;

        $site_title = $title;

        $site_title .=  preg_replace('/\&lt;[^(\&gt;)]*(&gt;)/i','',get_bloginfo( 'name' ) ) ;

        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
          $site_title .= " | $site_description";

        if ( $paged >= 2 || $page >= 2 )
          $site_title .= ' | ' . sprintf( __( 'Page %s', 'dw-page' ), max( $paged, $page ) );

        return $site_title;
    }
}
/*---------------------------------------------------------------------------*/
/*  Admin Script
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_admin_enqueue_scripts') ) :
add_action('admin_enqueue_scripts','dw_page_admin_enqueue_scripts');
function dw_page_admin_enqueue_scripts(){
    wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
    wp_enqueue_style('admin-style', DW_PAGE_URI.'inc/assets/admin/css/admin-style.css');
    wp_enqueue_script('admin-script', DW_PAGE_URI.'inc/assets/admin/js/admin-javascript.js');

    $terms = get_terms("project-category");
    if ($terms) {
        $term_project =  array();
        foreach ($terms as $term) {
            $term_project[$term->slug] = $term->name;
        }
    }

    $cates = get_terms("category");
    if ($cates) {
        $term_cate =  array();
        foreach ($cates as $cate) {
            $term_cate[$cate->slug] = $cate->name;
        }
    }

    $users = get_users();
    if ($users) {
        $user_array = array();
        foreach ($users as $user) {
            $user_array[$user->ID] = $user->user_login;
        }
    }

    wp_localize_script('admin-script', 'dw_page_script', array(
        'site_url' => site_url(),
        'admin_url' =>  admin_url(),
        'page_uri' =>  get_template_directory_uri(),
        'term_project' => $term_project,
        'term_cate' => $term_cate,
        'users' => $user_array

    ) );

    wp_enqueue_style('thickbox');

}
endif;

/*---------------------------------------------------------------------------*/
/*  Site Script & Style
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_enqueue_scripts') ) :
add_action('wp_enqueue_scripts','dw_page_enqueue_scripts');
function dw_page_enqueue_scripts(){
    wp_enqueue_script('dw_bootstrap', DW_PAGE_URI .'inc/assets/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('dw-page-grayscale', DW_PAGE_URI . 'inc/assets/js/jquery.grayscale.js');
    wp_enqueue_script('dw-page-select-theme', DW_PAGE_URI . 'inc/assets/js/small-tooltip.js');
    wp_enqueue_script('dw_page_script', DW_PAGE_URI.'inc/assets/js/script.js', array('jquery','dw-page-grayscale'));

    if ( class_exists( 'BuddyPress' ) ) {
        wp_enqueue_style('buddypress-style', DW_PAGE_URI.'inc/assets/css/buddypress-custom.css?ver=9122013');
        wp_enqueue_script('buddypress-script', DW_PAGE_URI .'inc/assets/js/buddypress-custom.js', array('jquery'));
    }

    if( is_mobile() || is_tablet_but_ipad() ) {
        wp_enqueue_script('modal_on_mobile', DW_PAGE_URI.'inc/assets/js/modal_on_mobile.js', array('jquery'));
    } else {
        wp_enqueue_script('modal_on_desktop', DW_PAGE_URI.'inc/assets/js/modal_on_desktop.js', array('jquery'));
        wp_localize_script('modal_on_desktop', 'dw_page_script',
            array(
                'ajax_url'  =>  admin_url('admin-ajax.php')
            )
        );
    }
}
endif;


/*---------------------------------------------------------------------------*/
/* IE HTML5 enable
/*---------------------------------------------------------------------------*/
if(!function_exists('dw_page_ie_require')) :
add_action('wp_head', 'dw_page_ie_require');

function dw_page_ie_require(){ ?>
<!--[if lt IE 10]>
<script src="<?php echo DW_PAGE_URI; ?>inc/assets/js/html5shiv-printshiv.js"></script>
<script src="<?php echo DW_PAGE_URI; ?>inc/assets/js/jquery.placeholder.min.js"></script>
<script type="text/javascript">
    jQuery(function(){
        jQuery('input, textarea').placeholder();
    })
</script>
<![endif]-->
<?php
}
endif;

/*---------------------------------------------------------------------------*/
/*  Display One Page
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_display') ) :
function dw_page_display(){
    get_header();
    echo '<div id="main">';
    $menu_items = dw_page_get_menu_items();
    //Valid $menu object
    if( !$menu_items || is_wp_error($menu_items) )  return false;
    //List all page from menu

    foreach ($menu_items as $key => $item) {
        $item_meta = get_post_meta($item->ID);

        if( $page_id = $item_meta['_menu_item_object_id'][0] ){
            $args['page_id']    = $page_id;
            $args['id']         = $item->ID;
            $args['title']      = $item->title;
            $args['attr_title'] = $item->attr_title;
            $args['classes']      = $item->classes;

            dw_page_display_section($args);
        }
    }
    echo '</div>';
    get_footer();
}
endif;

/*---------------------------------------------------------------------------*/
/*  Display Section
/*---------------------------------------------------------------------------*/
if ( !function_exists('dw_page_display_section') ) :
function dw_page_display_section($args){
    extract(wp_parse_args($args, array(
            'page_id'   =>  0,
            'title'     =>  '',
            'attr_title'    =>  '',
            'id'    =>  '',
            'classes' =>  array(),
        )));
    $page = get_page($page_id);
    $classes = implode(' ', $classes);
?>
<section id="<?php echo sanitize_title($title); ?>" class="section <?php echo $classes ?>">
    <div class="container">
        <?php if(!empty($page->post_title) || !empty($page->post_excerpt) ){ ?>
        <!-- Section title -->
        <div class="section-title">
            <?php if( !empty($page->post_title) ){ ?>
            <h1><?php echo $page->post_title; ?></h1>
            <?php } ?>
            <?php if( !empty($page->post_excerpt) ){ ?>
            <p><?php echo $page->post_excerpt;  ?></p>
            <?php } ?>
        </div>
        <?php } ?>

        <div class="section-content row-fluid">
        <?php echo apply_filters('the_content', $page->post_content); ?>
        </div>
    </div>
</section>
<?php
}
endif;

/*---------------------------------------------------------------------------*/
/*  Filter all menu what have post type is page
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_filter_of_page') ){
    function dw_page_filter_of_page($item){
        $item_meta = get_post_meta( $item->ID );
        if( !$item_meta['_menu_item_object_id'][0] ) return false;

        $post_type = get_post_type($item_meta['_menu_item_object_id'][0]);

        return ( $item && 'page' == $post_type );
    }
}

/*---------------------------------------------------------------------------*/
/*  Get Onepage Menu
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_get_menu') ){
    function dw_page_get_menu($location = false){
        if( !$location )
            $location = 'primary';
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $location ] ) )
            $menu = wp_get_nav_menu_object( $locations[ $location ] );

        return $menu;
    }
}

if( !function_exists('dw_page_get_menu_items') ){
    function dw_page_get_menu_items($location = false){

        $menu = dw_page_get_menu($location);

        if( !empty($menu) && !is_wp_error($menu) ){
            // Get menu items ( List of pages );
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            if( $location == 'primary' ){
                $menu_items = array_filter( $menu_items, 'dw_page_filter_of_page');
            }
            return $menu_items;
        }
        return false;
    }
}


if( !function_exists('dw_page_generate_menu') ){
    /**
     * Generate navigation on front-end for onepage
     * @return void
     */
    function dw_page_generate_menu(){
        $menu = apply_filters('dw_enable_menu', dw_page_get_menu_items() ) ;
        $i = 0;
    ?>
    <?php
        $menu_secondary = dw_page_get_menu_items('secondary');
        if( $menu_secondary ){
    ?>
    <div class="btn-group select-page">
        <button data-toggle="dropdown" class="dropdown-toggle"><span>Select page</span></button>

        <ul class="dropdown-menu">
        <?php
            foreach ($menu_secondary as $item ) {
                $item_meta = get_post_meta($item->ID);

                if( $page_id = $item_meta['_menu_item_object_id'][0] ){
                    $page = get_page($page_id);
        ?>
            <li class=""><a title="<?php echo $item->title  ?>" href="<?php echo get_page_link($page_id); ?>"><?php echo $item->title  ?></a></li>
        <?php
                }
            }
        ?>
        </ul>
    </div>
    <?php
        }
    ?>
    <?php  if( $menu && is_front_page() ){ ?>
    <div class="nav-collapse collapse">
        <ul class="nav pull-right">
<?php
        foreach ($menu as $menu_item) {
            $active = $i == 0 ? 'class="active"' : '';
            $menu_id = sanitize_title($menu_item->title);
?>
            <li <?php echo $active ?>>
                <a href="#<?php echo $menu_id ?>">
            <?php echo $menu_item->title  ?>
                </a>
            </li>
<?php
            $i++;
        }
?>
        </ul>
    </div>
<?php
        }
    }

}

/*---------------------------------------------------------------------------*/
/* ONE PAGE SETTINGS: Setting box in menu page
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_save_setting') ){
    add_action('admin_init', 'dw_page_save_setting');
    /**
     * Save selected menu for one page order
     * @return null
     */
    function dw_page_save_setting(){
        if( isset($_POST['dw-onepage-menu-save-button']) ){
            if( isset($_POST['dw-order-for-onepage']) ){
                update_option('_dw_page_onepage_menu',
                    $_POST['dw-order-for-onepage'] );
            }
            if( isset($_POST['dw-page-header-class']) ){
                update_option('_dw_page_navbar_class',
                    $_POST['dw-page-header-class']);
            }
            if( isset($_POST['dw-page-footer-class']) ){
                update_option('_dw_page_footer_class',
                    $_POST['dw-page-footer-class']);
            }
        }
    }
}

if( !function_exists('dw_page_add_post_type_support') ){
    add_action('init', 'dw_page_add_post_type_support');
    function dw_page_add_post_type_support(){
        add_post_type_support('page', 'excerpt');
    }
}


/*---------------------------------------------------------------------------*/
/* AJAX
/*---------------------------------------------------------------------------*/
if( !function_exists('dw_page_get_project') ){
    add_action('wp_ajax_dw_page_get_project', 'dw_page_get_project');
    add_action('wp_ajax_nopriv_dw_page_get_project', 'dw_page_get_project');

    function dw_page_get_project(){
        $result = new stdClass();
        $result->status = false;

        if( isset($_GET['postID']) ){
            $post = get_post($_GET['postID']);

            if( $post ){
                $result->title = $post->post_title;
                $result->content = $post->post_content;

                $post_type = get_post_type( $post );

                if ($post_type == 'project') {
                     $image = get_post_meta($post->ID, '_project_thumbnail_large', true);

                    if( !$image )
                        $image = get_post_meta($post->ID, '_project_thumbnail_medium', true);
                    if( !$image )
                        $image = get_post_meta($post->ID, '_project_thumbnail_small', true);
                    if( $image ){
                        $result->image = '<img src="'.$image.'" />';
                    }

                    $client = get_post_meta($post->ID, '_project_client', true);
                    $skill = get_post_meta($post->ID, '_project_skill', true);
                    $url = get_post_meta($post->ID, '_project_url', true);
                    $date = date('M d,Y', strtotime($post->post_date) );

                    $detail = array();

                    if( $client )
                        $detail[] = '<span class="first"><i class="icon-user"></i><strong>Client:</strong> ' . $client .'</span>';
                    if( $date )
                        $detail[] = '<span><i class="icon-calendar"></i><strong>Date:</strong> '.$date .'</span>';
                    if( $skill )
                        $detail[] = '<span class="first"><i class="icon-certificate"></i><strong>Skill:</strong> ' . $skill .'</span>';
                    if( $url )
                        $detail[] = '<span><i class="icon-share"></i><a href="'.$url.'" target="_blank">Launch Project</a>' .'</span>';

                    $result->detail = implode('', $detail);
                } else {
                    $image = get_the_post_thumbnail($post);
                    $result->image = $image;

                    $detail = array();

                    $date = date('M d,Y', strtotime($post->post_date) );
                    $author = get_userdata( $post->post_author );

                    if( $author )
                        $detail[] = '<span class="first"><i class="icon-user"></i><strong>Author:</strong> ' . $author->user_login .'</span>';

                    if( $date )
                        $detail[] = '<span><i class="icon-calendar"></i><strong>Date:</strong> '.$date .'</span>';


                    $result->detail = implode('', $detail);
                }

                $result->status = true;
            }

        }

        echo json_encode($result);
        exit(0);
    }
}

if( !function_exists('dw_page_modal_project') ){
    function dw_page_modal_project(){
?>
    <!-- Modal -->
    <div id="modal-post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-inner">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <div class="modal-body">
                <h3 class="modal-title"></h3>
                <div class="modal-image"></div>
                <div class="modal-data"></div>
                <div class="modal-content"></div>
                <div class="modal-data-button"></div>
            </div>
        </div>
    </div>
<?php
    }
    add_action('wp_footer', 'dw_page_modal_project');
}

if(!function_exists('dw_page_landing')){
    function dw_page_landing(){
        wp_enqueue_script('jquery_countdown', DW_PAGE_URI.'inc/assets/js/jquery.countdown.min.js',array('jquery'));
        wp_enqueue_script('dw_landing_script', DW_PAGE_URI.'inc/assets/js/landing.js',array('jquery'));
        add_filter('dw_enable_menu','__return_false');
    }

    add_action('landing_init', 'dw_page_landing');
}

if( !function_exists('dw_page_goTop') ){
    function dw_page_goTop(){
        if( is_home() ){
    ?>
    <a class="scroll-top" href="#" title="<?php _e( 'Scroll to top', 'dw-simplex' ); ?>"><?php _e( 'Top', 'dw-simplex' ); ?></a>
    <?php
        }
    }
    add_action('wp_footer', 'dw_page_goTop');
}

// load style for dw qa plugin
if( !function_exists('dwqa_page_scripts') ){
    function dwqa_page_scripts(){
        wp_enqueue_style( 'dw-page-qa', get_stylesheet_directory_uri() . '/dwqa-templates/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'dwqa_page_scripts' );
}

// TGM plugin activation
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
function alx_plugins() {
    $plugins = array(
        array(
            'name'              => 'DW Question & Answer',
            'slug'              => 'dw-question-answer',
        ),
        array(
            'name'              => 'Contact Form 7',
            'slug'              => 'contact-form-7',
        ),
        array(
            'name'              => 'BuddyPress',
            'slug'              => 'buddypress',
        )
    );
    tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'alx_plugins' );
