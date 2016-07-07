<?php

/**
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 *
 * Theme Customizer
 * Created By djdesignerlab
 */

define('SHORTNAME', 'accio_');

function accio_theme_customizer($wp_customize) {

	/* ---------------- SECTION - Logo ------------------ */
	$wp_customize->add_section('accio_logo', array(
		'title' => __('Logo', 'framework'),
		'description' => __('Allows you to upload a custom logo.', 'framework'),
	));

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[logo]', array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'type' => 'option',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Upload your Logo', 'framework'),
		'section' => 'accio_logo',
		'settings' => SHORTNAME . 'custom_settings[logo]',
	)));

	/* -------------- SECTION - Text Color ------------------ */

    $wp_customize->add_section( SHORTNAME . 'text_color_section', array(
        'title' => __('Body Text Color', 'framework'),
        'description' => __('Allows you to change the text color of this theme.', 'framework'),
    ) );

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[text_color]', array(
		'default' => '#4c4d51',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
		'label' => __('Choose Your Color', 'framework'),
		'section' => SHORTNAME . 'text_color_section',
		'settings' => SHORTNAME . 'custom_settings[text_color]',
	)));

	/* -------------- SECTION - Accent Color ------------------ */

    $wp_customize->add_section( SHORTNAME . 'accent_color_section', array(
        'title' => __('Accent Color', 'framework'),
        'description' => __('Allows you to change the accent color of this theme.', 'framework'),
    ) );

    /*-------------------------------------------------------*/
	/* Setting - Primary Color ----------------------------- */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[accent_primary]', array(
		'default' => '#F37A5C',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_primary', array(
		'label' => __('Primary Color', 'framework'),
		'section' => SHORTNAME . 'accent_color_section',
		'settings' => SHORTNAME . 'custom_settings[accent_primary]',
	)));

	/*-------------------------------------------------------*/
	/* Setting - Secondary Color --------------------------- */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[accent_secondary]', array(
		'default' => '#D66F55',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_secondary', array(
		'label' => __('Secondary Color', 'framework'),
		'section' => SHORTNAME . 'accent_color_section',
		'settings' => SHORTNAME . 'custom_settings[accent_secondary]',
	)));

	/* -------------- SECTION - Media Accent Color ------------------ */

    $wp_customize->add_section( SHORTNAME . 'media_accent_color', array(
        'title' => __('Media Player Accent Color', 'framework'),
        'description' => __('Allows you to change media player color of this theme.', 'framework'),
    ) );

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[accent_media]', array(
		'default' => '#4DA2DB',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_media', array(
		'label' => __('Player Accent Color', 'framework'),
		'section' => SHORTNAME . 'media_accent_color',
		'settings' => SHORTNAME . 'custom_settings[accent_media]',
	)));



	/* -------------- SECTION - Border Color ------------------ */

    $wp_customize->add_section( SHORTNAME . 'border_color_section', array(
        'title' => __('Border Options', 'framework'),
        'description' => __('Allows you to change the border settings of this theme.', 'framework'),
    ) );

    /*-------------------------------------------------------*/
	/* Setting - Enable Border ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[enable_border]', array(
		'default' => 'Yes',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control('custom_settings[enable_border]', array(
		'label' => __('Enable Border', 'framework'),
		'section' => SHORTNAME . 'border_color_section',
		'settings' => SHORTNAME . 'custom_settings[enable_border]',
		'type' => 'select',
		'choices' => array(
				'Yes' => 'Yes',
				'No' => 'No'
			)
	));


    /*-------------------------------------------------------*/
	/* Setting - Border Color ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[border_color]', array(
		'default' => '#e9e9e9',
		'type' => 'option',
		'transport' => 'postMessage'
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'border_color', array(
		'label' => __('Border Color', 'framework'),
		'section' => SHORTNAME . 'border_color_section',
		'settings' => SHORTNAME . 'custom_settings[border_color]',
	)));

	/*-------------------------------------------------------*/
	/* Setting - Border Style ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[border_style]', array(
		'default' => 'Border',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[border_style]', array(
		'label' => __('Border Style', 'framework'),
		'section' => SHORTNAME . 'border_color_section',
		'settings' => SHORTNAME . 'custom_settings[border_style]',
		'type' => 'select',
		'choices' => array(
				'Border' => 'Border',
				'Box Shadow' => 'Box Shadow'
			)
	));


	/* -------------- SECTION - Content Background ------------------ */

    $wp_customize->add_section( SHORTNAME . 'content_bg_section', array(
        'title' => __('Content Background', 'framework'),
        'description' => __('Allows you to change background color of content area.', 'framework'),
    ));

	$wp_customize->add_setting( SHORTNAME . 'custom_settings[content_bg_color]', array(
		'default' => '#f2f2f2;',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'content_bg_color', array(
		'label' => __('Background Color', 'framework'),
		'section' => SHORTNAME . 'content_bg_section',
		'settings' => SHORTNAME . 'custom_settings[content_bg_color]',
	)));

	/* -------------- SECTION - Footer Options ------------------ */

    $wp_customize->add_section( SHORTNAME . 'footer_options', array(
        'title' => __('Footer Options', 'framework'),
        'description' => __('Allows you to change the footer settings.', 'framework'),
    ));

	/*-------------------------------------------------------*/
	/* Setting - Footer Text ------------------------------- */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[footer_text]', array(
		'default' => __('&copy; 2013 Accio. Powered by WordPress', 'framework'),
		'type' => 'option'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[footer_text]', array(
		'label' => __('Footer Text', 'framework'),
		'section' => SHORTNAME . 'footer_options',
		'settings' => SHORTNAME . 'custom_settings[footer_text]',
		'type' => 'text'
	));

	/* -------------- SECTION - Typography Options ------------------ */

    $wp_customize->add_section( SHORTNAME . 'typography_options', array(
        'title' => __('Typography Options', 'framework'),
        'description' => __('Allows you to set the typography of this theme.', 'framework'),
    ));

    /*-------------------------------------------------------*/
	/* Setting - System Fonts ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[google_font]', array(
		'default' => 'Lato',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[google_font]', array(
		'label' => __('Google Fonts', 'framework'),
		'section' => SHORTNAME . 'typography_options',
		'settings' => SHORTNAME . 'custom_settings[google_font]',
		'type' => 'select',
		'choices' => accio_google_fonts_list()
	));

	/*-------------------------------------------------------*/
	/* Setting - System Fonts ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[system_font]', array(
		'default' => 'None',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[system_font]', array(
		'label' => __('System Fonts (will replace google fonts)', 'framework'),
		'section' => SHORTNAME . 'typography_options',
		'settings' => SHORTNAME . 'custom_settings[system_font]',
		'type' => 'select',
		'choices' => accio_system_fonts_list()
	));

	/* -------------- SECTION - Heading Fonts ------------------ */

    $wp_customize->add_section( SHORTNAME . 'heading_fonts', array(
        'title' => __('Heading Fonts', 'framework'),
        'description' => __('Allows you to set the heading of this theme.', 'framework'),
    ));

    /*-------------------------------------------------------*/
	/* Setting - System Fonts ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[heading_google_font]', array(
		'default' => 'Lato',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[heading_google_font]', array(
		'label' => __('Google Fonts', 'framework'),
		'section' => SHORTNAME . 'heading_fonts',
		'settings' => SHORTNAME . 'custom_settings[heading_google_font]',
		'type' => 'select',
		'choices' => accio_google_fonts_list()
	));

	/*-------------------------------------------------------*/
	/* Setting - System Fonts ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[heading_system_font]', array(
		'default' => 'None',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[heading_system_font]', array(
		'label' => __('System Fonts (will replace google fonts)', 'framework'),
		'section' => SHORTNAME . 'heading_fonts',
		'settings' => SHORTNAME . 'custom_settings[heading_system_font]',
		'type' => 'select',
		'choices' => accio_system_fonts_list()
	));

	/*-------------------------------------------------------*/
	/* Setting - Fonts Size -------------------------------- */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[font_size]', array(
		'default' => '18px',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[font_size]', array(
		'label' => __('Font Size', 'framework'),
		'section' => SHORTNAME . 'typography_options',
		'settings' => SHORTNAME . 'custom_settings[font_size]',
		'type' => 'select',
		'choices' => array(
				'11px' => '11px',
				'12px' => '12px',
				'13px' => '13px',
				'14px' => '14px',
				'15px' => '15px',
				'16px' => '16px',
				'17px' => '17px',
				'18px' => '18px',
				'19px' => '19px',
				'20px' => '20px'
			)
	));

	/*-------------------------------------------------------*/
	/* Setting - Line Height ------------------------------- */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[font_line_height]', array(
		'default' => '32',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'font_line_height', array(
		'label' => __('Line Height', 'framework'),
		'section' => SHORTNAME . 'typography_options',
		'settings' => SHORTNAME . 'custom_settings[font_line_height]',
		'type' => 'text'
	));

	/*-------------------------------------------------------*/
	/* Setting - Fonts Weight ------------------------------ */
	/*-------------------------------------------------------*/

	$wp_customize->add_setting(SHORTNAME . 'custom_settings[font_weight]', array(
		'default' => '400',
		'type' => 'option',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(SHORTNAME . 'custom_settings[font_weight]', array(
		'label' => __('Font Weight', 'framework'),
		'section' => SHORTNAME . 'typography_options',
		'settings' => SHORTNAME . 'custom_settings[font_weight]',
		'type' => 'select',
		'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600'
			)
	));

}

add_action('customize_register', 'accio_theme_customizer');


function accio_theme_customizer_js() {
    wp_enqueue_script('accio-theme-customizer', get_template_directory_uri() . '/admin/customizer/js/accio-customizer.js', array('jquery', 'customize-preview'), '1.0.0', true);
}

add_action('customize_preview_init', 'accio_theme_customizer_js');

