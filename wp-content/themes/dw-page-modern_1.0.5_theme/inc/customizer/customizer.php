<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class DW_page_Textarea_Custom_Control extends WP_Customize_Control {

	public $type = 'textarea';

	public $statuses;

	public function __construct( $manager, $id, $args = array() ) {

	$this->statuses = array( '' => __( 'Default', 'dw-page' ) );
		parent::__construct( $manager, $id, $args );
	}
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
				<?php echo esc_textarea( $this->value() ); ?>
			</textarea>
			<?php echo $this->desc; ?>
		</label>
		<?php
	}
}

class Layout_Picker_Custom_control extends WP_Customize_Control {

	public function render_content() {

	if ( empty( $this->choices ) ) return;

	$name = '_customize-radio-' . $this->id;

	?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<table style="margin-top: 10px; text-align: center; width: 100%;">
		<tr>
		<?php foreach ( $this->choices as $value => $label ) : ?>
		<?php
			$checked = '';
			if($value == 0) $checked = 'checked';
		?>
		<td>
			<label>
				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/layout-<?php echo esc_attr( $value ); ?>.png" alt="<?php echo esc_attr( $value ); ?>" /><br />
				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); echo $checked ?> />
			</label>
		</td>
		<?php endforeach; ?>
		</tr>
	</table>
		<?php
	}
}

class Color_Picker_Custom_control extends WP_Customize_Control {

	public function render_content() {

	if ( empty( $this->choices ) ) return;

	$name = '_customize-radio-' . $this->id;

	?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<table style="margin-top: 10px; text-align: center; width: 100%;">
		<tr>
		<?php foreach ( $this->choices as $value => $label ) : ?>
		<?php
			$checked = '';
			if($value == 0) $checked = 'checked';
		?>
		<td>
			<label>
				<div style="width: 30px; height: 30px; margin: 0 auto; background: #<?php echo esc_attr( $label )?> "></div>
				<br />
				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); echo $checked ?> />
			</label>
		</td>
		<?php endforeach; ?>
		</tr>
	</table>
		<?php
	}
}

function dw_page_customize_register( $wp_customize ) {
	// Favicon
	$wp_customize->add_setting('dw_page_theme_options[favicon]', array(
		'default' => get_template_directory_uri().'/img/favicon.ico',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon', array(
		'label' => __('Site Favicon', 'dw-page'),
		'section' => 'title_tagline',
		'settings' => 'dw_page_theme_options[favicon]',
	)));


	// Logo
	$wp_customize->add_setting('dw_page_theme_options[logo]', array(
		'default' => get_template_directory_uri().'/img/logo.png',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Site Logo', 'dw-page'),
		'section' => 'title_tagline',
		'settings' => 'dw_page_theme_options[logo]',
	)));

	$wp_customize->add_setting('dw_page_theme_options[header_display]', array(
		'default'        => 'site_title',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'header_display', array(
		'settings' => 'dw_page_theme_options[header_display]',
		'label'   => 'Display as',
		'section' => 'title_tagline',
		'type'    => 'select',
		'choices'    => array(
			'site_title' => 'Site Title',
			'site_logo' => 'Site Logo',
		),
	));

	// Typo
	$fonts = dw_get_gfonts();
	$newarray = array();
	$newarray[] = '';
	foreach ($fonts as $index => $font) {
		foreach ($font->files as $key => $value) {
			$newarray[$font->family . ':dw:' . $value ] = $font->family . ' - ' . $key;
		}
	}

	$wp_customize->add_section('dw_page_typo', array(
		'title'    => __('Font Selector', 'dw-page'),
		'priority' => 111,
	));

	$wp_customize->add_setting('dw_page_theme_options[heading_font]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'heading_font', array(
		'settings' => 'dw_page_theme_options[heading_font]',
		'label'   => 'Select headding font',
		'section' => 'dw_page_typo',
		'type'    => 'select',
		'choices'    => $newarray
	));

	$wp_customize->add_setting('dw_page_theme_options[body_font]', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'body_font', array(
		'settings' => 'dw_page_theme_options[body_font]',
		'label'   => 'Select body font',
		'section' => 'dw_page_typo',
		'type'    => 'select',
		'choices'    => $newarray
	));


	// Social
	$wp_customize->add_section('dw_page_social_links', array(
		'title'    => __('Social Links', 'dw-page'),
		'priority' => 110,
	));

	$wp_customize->add_setting('dw_page_theme_options[facebook]', array(
		'default'        => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('facebook', array(
		'label'      => __('Facebook', 'dw-page'),
		'section'    => 'dw_page_social_links',
		'settings'   => 'dw_page_theme_options[facebook]',
	));

	$wp_customize->add_setting('dw_page_theme_options[twitter]', array(
		'default'        => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('twitter', array(
		'label'      => __('Twitter', 'dw-page'),
		'section'    => 'dw_page_social_links',
		'settings'   => 'dw_page_theme_options[twitter]',
	));

	$wp_customize->add_setting('dw_page_theme_options[google_plus]', array(
		'default'        => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('google_plus', array(
		'label'      => __('Google+', 'dw-page'),
		'section'    => 'dw_page_social_links',
		'settings'   => 'dw_page_theme_options[google_plus]',
	));

	$wp_customize->add_setting('dw_page_theme_options[youtube]', array(
		'default'        => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('youtube', array(
		'label'      => __('YouTube', 'dw-page'),
		'section'    => 'dw_page_social_links',
		'settings'   => 'dw_page_theme_options[youtube]',
	));

	$wp_customize->add_setting('dw_page_theme_options[linkedin]', array(
		'default'        => '#',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('linkedin', array(
		'label'      => __('LinkedIn', 'dw-page'),
		'section'    => 'dw_page_social_links',
		'settings'   => 'dw_page_theme_options[linkedin]',
	));


	// Custom code
	$wp_customize->add_section('dw_page_custom_code', array(
		'title'    => __('Custom Code', 'dw-page'),
		'priority' => 200,
	));

	$wp_customize->add_setting('dw_page_theme_options[header_code]', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'option',
	));

	$wp_customize->add_control( new DW_page_Textarea_Custom_Control($wp_customize, 'header_code', array(
		'label'    => __('Header Code (Meta tags, CSS, etc ...)', 'dw-page'),
		'section'  => 'dw_page_custom_code',
		'settings' => 'dw_page_theme_options[header_code]',
	)));

	$wp_customize->add_setting('dw_page_theme_options[footer_code]', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));

	$wp_customize->add_control( new DW_page_Textarea_Custom_Control($wp_customize, 'footer_code', array(
		'label'    => __('Footer Code (Analytics, etc ...)', 'dw-page'),
		'section'  => 'dw_page_custom_code',
		'settings' => 'dw_page_theme_options[footer_code]'
	)));
}
add_action( 'customize_register', 'dw_page_customize_register' );

function dw_page_get_theme_option( $option_name, $default = '' ) {
	$options = get_option( 'dw_page_theme_options' );
	if( isset($options[$option_name]) ) {
		return $options[$option_name];
	}
	return $default;
}

function dw_page_favicon() {
  $favicon = dw_page_get_theme_option( 'favicon', get_template_directory_uri().'/img/favicon.ico' );
  echo '<link rel="shortcut icon" href="'.$favicon.'">';
}
add_action('wp_head', 'dw_page_favicon');

function dw_page_logo() {
	$header_display = (dw_page_get_theme_option( 'header_display', 'site_title') == 'site_title') ? 'display-title' : 'display-logo';
	$logo = dw_page_get_theme_option( 'logo');
	if ($logo == '') {
		$logo = get_template_directory_uri().'/img/logo.png';
	}
	$tagline = get_bloginfo( 'description' );

	echo '<h1 class="site-title '.$header_display.'"><a class="brand" href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
	if ($header_display == 'display-logo') {
		echo '<img alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.$logo.'" />';
		echo '</a></h1>';
	} else {
		echo get_bloginfo( 'name' );
		echo '</a></h1>';
	}
	echo '<h2 class="site-description sr-only">'.$tagline.'</h2>';
}
add_action('dw_page_logo', 'dw_page_logo' );

function dw_page_typo_font(){
  if (dw_page_get_theme_option('heading_font') && dw_page_get_theme_option('heading_font') != '') {
    $heading_font = explode(':dw:', dw_page_get_theme_option('heading_font') );
    ?>
      <style type="text/css" id="heading_font" media="screen">
        @font-face {
          font-family: "<?php echo $heading_font[0]; ?>";
          src: url('<?php echo $heading_font[1] ?>');
        }
        h1,h2,h3,h4,h5,h6 {
          font-family: "<?php echo $heading_font[0]; ?>";
        }
      </style>
    <?php
  }
  if (dw_page_get_theme_option( 'body_font') && dw_page_get_theme_option( 'body_font') != '') {
    $body_font = explode( ':dw:', dw_page_get_theme_option( 'body_font' ));

    ?>
      <style type="text/css" id="body_font" media="screen">
        @font-face {
          font-family: "<?php echo $body_font[0]; ?>";
          src: url('<?php echo $body_font[1] ?>');
        }
        body,.entry-content,.page-content,.site-description,.entry-meta .byline, .entry-meta .cat-links {
          font-family: "<?php echo $body_font[0]; ?>";
        }
      </style>
    <?php
  }
}
add_filter('wp_head','dw_page_typo_font');

if( ! function_exists('dw_get_gfonts') ) {
  function dw_get_gfonts(){
    $fontsSeraliazed = wp_remote_fopen( get_template_directory_uri() . '/inc/customizer/gfonts_v2.txt' );
    $fontArray = unserialize( $fontsSeraliazed );
    return $fontArray->items;
  }
}

function dw_page_socials() {
  $social_links['facebook'] = dw_page_get_theme_option( 'facebook', '#' );
  $social_links['twitter'] = dw_page_get_theme_option( 'twitter', '#' );
  $social_links['google_plus'] = dw_page_get_theme_option( 'google_plus', '#' );
  $social_links['youtube'] = dw_page_get_theme_option( 'youtube', '#' );
  $social_links['linkedin'] = dw_page_get_theme_option( 'linkedin', '#' );
  ?>
  <?php if(count($social_links) > 0 ) { ?><ul class="list-inline social-inline">
    <?php if($social_links['facebook']!='') { ?><li class="social facebook"><a href="<?php echo $social_links['facebook']; ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
    <?php if($social_links['twitter']!='') { ?><li class="social twitter"><a href="<?php echo $social_links['twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
    <?php if($social_links['google_plus']!='') { ?><li class="social google_plus"><a href="<?php echo $social_links['google_plus']; ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
    <?php if($social_links['youtube']!='') { ?><li class="social youtube"><a href="<?php echo $social_links['youtube']; ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>
    <?php if($social_links['linkedin']!='') { ?><li class="social linkedin"><a href="<?php echo $social_links['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
  </ul><?php } ?>
<?php }
add_action('dw_page_socials', 'dw_page_socials' );

function dw_page_custom_header_code() {
  echo dw_page_get_theme_option( 'header_code' );
}
add_action('wp_head', 'dw_page_custom_header_code');

function dw_page_custom_footer_code() {
  echo dw_page_get_theme_option( 'footer_code' );
}
add_action('wp_footer', 'dw_page_custom_footer_code');

