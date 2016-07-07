<?php

add_action( 'admin_init', 'accio_register_meta_boxes' );
function accio_register_meta_boxes()
{
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;
    $prefix = 'accio_';
    $meta_boxes = array();

/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for pages
/*-----------------------------------------------------------------------------------*/

    $meta_boxes[] = array(
        'title'    => __('Page Settings', 'framework'),
        'pages'    => array('page'),
        'fields' => array(
            array(
                'name' => __('Page Heading', 'framework'),
                'desc' => __('Enter a heading for this page.', 'framework'),
                'id'   => $prefix . 'page_heading',
                'type' => 'textarea',
            )
        )
    );


/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for blog posts
/*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Gallery Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => __('Gallery Style', 'framework'),
                'desc' => __('Select the gallery style.', 'framework'),
                'id'   => $prefix . 'gallery_style',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Slider', 'framework' ),
                    'value2' => __( 'Grid', 'framework' ),
                ),
                'std'         => 'Slider'
            ),
            array(
                'name' => __('Select Images', 'framework'),
                'desc' => __('Select the images from the media library or upload your new ones.', 'framework'),
                'id'   => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_gallery_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Quote Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Quote Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => __('The Quote', 'framework'),
                'desc' => __('Write your quote in this field.', 'framework'),
                'id'   => $prefix . 'quote_text',
                'type' => 'textarea',
                'rows' => 5
            ),
            array(
                'name' => __('The Author', 'framework'),
                'desc' => __('Enter the name of the author of this quote.', 'framework'),
                'id'   => $prefix . 'quote_author',
                'type' => 'text'
            ),
            array(
                'name' => __('Background Color', 'framework'),
                'desc' => __('Choose the background color for this quote.', 'framework'),
                'id'   => $prefix . 'quote_bg',
                'type' => 'color'
            ),
            array(
                'name' => __('Background Opacity', 'framework'),
                'desc' => __('Choose the opacity of the background color.', 'framework'),
                'id'   => $prefix . 'quote_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => __('Divider', 'framework'),
                'desc' => __('Divider.', 'framework'),
                'id'   => $prefix . 'quote_divider',
                'type' => 'divider'
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_quote_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Link Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Link Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => __('The URL', 'framework'),
                'desc' => __('Insert the URL you wish to link to.', 'framework'),
                'id'   => $prefix . 'the_link',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Background Color', 'framework'),
                'desc' => __('Choose the background color for this link.', 'framework'),
                'id'   => $prefix . 'link_bg',
                'type' => 'color',
                'std'  => '#d5d85f'
            ),
            array(
                'name' => __('Background Opacity', 'framework'),
                'desc' => __('Choose the opacity of the background color.', 'framework'),
                'id'   => $prefix . 'link_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => __('Divider', 'framework'),
                'desc' => __('Divider.', 'framework'),
                'id'   => $prefix . 'link_divider',
                'type' => 'divider'
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_link_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Image Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Image Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => __('Enable Lightbox', 'framework'),
                'desc' => __('Check this to enable the lightbox.', 'framework'),
                'id'   => $prefix . 'enable_lightbox',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
            array(
                'name' => __('Enter URL', 'framework'),
                'desc' => __('Insert the url for the image.', 'framework'),
                'id'   => $prefix . 'the_image_url',
                'type' => 'text',
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_image_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Audio Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Audio Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => __( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'framework' ),
            'id'   => 'audio_head'
            ),
            array(
                'name' => __('MP3 File URL', 'framework'),
                'desc' => __('The URL to the .mp3 audio file.', 'framework'),
                'id'   => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => __('OGA File URL', 'framework'),
                'desc' => __('The URL to the .oga, .ogg audio file.', 'framework'),
                'id'   => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => __('Divider', 'framework'),
                'desc' => __('divider.', 'framework'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => __('SoundCloud', 'framework'),
                'desc' => __('Enter the url of the soundcloud audio.', 'framework'),
                'id'   => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => __('Color', 'framework'),
                'desc' => __('Choose the color.', 'framework'),
                'id'   => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            ),
            array(
                'name' => __('Divider', 'framework'),
                'desc' => __('divider.', 'framework'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_audio_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Status Post Format */

    $meta_boxes[] = array(
        'title'    => __('Status Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => __('Style', 'framework'),
                'desc' => __('Select status style.', 'framework'),
                'id'   => $prefix . 'status_style',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Normal', 'framework' ),
                    'value2' => __( 'Background', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Static'
            ),
            array(
                'name' => __('Background Color', 'framework'),
                'desc' => __('Choose the background color for this status.', 'framework'),
                'id'   => $prefix . 'status_bg',
                'type' => 'color',
                'std'  => '#d5d85f'
            ),
            array(
                'name' => __('Background Opacity', 'framework'),
                'desc' => __('Choose the opacity of the background color.', 'framework'),
                'id'   => $prefix . 'status_bg_opacity',
                'type' => 'text',
                'std' => 80
            )
        )
    );

    /* Video Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => __('Video Settings', 'framework'),
        'pages'    => array('post'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => __( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'framework' ),
            'id'   => 'video_head'
            ),
            array(
                'name' => __('M4V File URL', 'framework'),
                'desc' => __('The URL to the .m4v video file.', 'framework'),
                'id'   => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => __('OGV File URL', 'framework'),
                'desc' => __('The URL to the .ogv video file.', 'framework'),
                'id'   => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => __('WEBM File URL', 'framework'),
                'desc' => __('The URL to the .webm video file.', 'framework'),
                'id'   => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => __('Embeded Code', 'framework'),
                'desc' => __('Select the preview image for this video.', 'framework'),
                'id'   => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            ),
            array(
                'name' => __('Divider', 'framework'),
                'desc' => __('divider.', 'framework'),
                'id'   => $prefix . 'video_divider',
                'type' => 'divider'
            ),
            array(
                'name' => __('Show Meta Information', 'framework'),
                'desc' => __('Check this to show metadata.', 'framework'),
                'id'   => $prefix . 'show_video_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => __( 'Yes', 'framework' ),
                    'value2' => __( 'No', 'framework' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );



    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}

function accio_admin_scripts() {
    wp_register_script('accio_custom_admin', get_template_directory_uri() . '/js/jquery.custom.admin.js');
    wp_enqueue_script('accio_custom_admin');
}

function accio_admin_styles() {
    wp_register_style('accio_options_css', get_template_directory_uri() . '/admin/admin-style.css');
    wp_register_style('accio_options_grey_css', get_template_directory_uri() . '/admin/admin-style-grey.css');
    wp_enqueue_style('accio_options_css');
    wp_enqueue_style('accio_options_grey_css');
}

add_action('admin_print_scripts', 'accio_admin_scripts');
add_action('admin_print_styles', 'accio_admin_styles');

?>
