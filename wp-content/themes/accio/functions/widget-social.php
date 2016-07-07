<?php

/*---------------------------------------------------------------*/
/* Widget that displays a list with social icons
/*----------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'load_accio_social_widget' );

// Register widget
function load_accio_social_widget() {
	register_widget('accio_SOCIAL_widget');
}

// Widget class
class accio_social_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

function accio_SOCIAL_widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'accio_social_widget',
		'description' => __('Displays a list of social icons.', 'framework')
	);

	// Widget control settings
	$control_ops = array(
		'id_base' => 'accio_social_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'accio_social_widget', __('Accio: Social Links', 'framework'), $widget_ops, $control_ops );

}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form($instance) {
	$defaults = array(
		'title' => __('Connect with us', 'framework'),
		'social_twitter' => 'https://twitter.com/envato',
		'social_facebook' => 'https://www.facebook.com/envato',
		'social_linkedin' => '',
		'social_pinterest' => '',
		'social_delicious' => '',
		'social_paypal' => '',
		'social_gplus' => '',
		'social_stumbleupon' => '',
		'social_foursquare' => '',
		'social_path' => '',
		'social_flickr' => '',
		'social_tumblr' => '',
		'social_dribbble' => '',
		'social_spotify' => '',
		'social_instagram' => '',
		'social_behance' => '',
		'social_github' => '',
		'social_fivehundredpx' => '',
		'social_grooveshark' => '',
		'social_forrst' => '',
		'social_digg' => '',
		'social_reddit' => '',
		'social_rss' => '',
		'social_skype' => '',
		'social_youtube' => '',
		'social_vimeo' => '',
		'social_myspace' => '',
		'social_amazon' => '',
		'social_ebay' => '',
		'social_lastfm' => '',
		'social_soundcloud' => '',
		'social_posterous' => '',
		'social_picasa' => '',
		'social_wordpress' => '',
		'social_win8' => '',
		'social_evernote' => '',
		'description' => __('Connect with us on our social networks.', 'framework')
	);

	$instance = wp_parse_args((array) $instance, $defaults); ?>

	<p class="description"><?php _e('Enter your social media urls.', 'framework'); ?></p>

	<!-- The Title -->
	<p>
		<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>

	<!-- The Description -->
	<p>
		<label for="<?php echo $this->get_field_id('description') ?>"><?php _e('Description:', 'framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" value="<?php echo $instance['description']; ?>" />
	</p>

	<!-- Facebook -->
	<p>
		<label for="<?php echo $this->get_field_id('social_facebook') ?>">Facebook:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_facebook'); ?>" name="<?php echo $this->get_field_name('social_facebook'); ?>" value="<?php echo $instance['social_facebook']; ?>" />
	</p>

	<!-- Twitter -->
	<p>
		<label for="<?php echo $this->get_field_id('social_twitter') ?>">Twitter:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_twitter'); ?>" name="<?php echo $this->get_field_name('social_twitter'); ?>" value="<?php echo $instance['social_twitter']; ?>" />
	</p>

	<!-- Google+ -->
	<p>
		<label for="<?php echo $this->get_field_id('social_gplus') ?>">Google+:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_gplus'); ?>" name="<?php echo $this->get_field_name('social_gplus'); ?>" value="<?php echo $instance['social_gplus']; ?>" />
	</p>


	<!-- Dribbble -->
	<p>
		<label for="<?php echo $this->get_field_id('social_dribbble') ?>">Dribbble:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_dribbble'); ?>" name="<?php echo $this->get_field_name('social_dribbble'); ?>" value="<?php echo $instance['social_dribbble']; ?>" />
	</p>

	<!-- Flickr -->
	<p>
		<label for="<?php echo $this->get_field_id('social_flickr') ?>">Flickr:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_flickr'); ?>" name="<?php echo $this->get_field_name('social_flickr'); ?>" value="<?php echo $instance['social_flickr']; ?>" />
	</p>

	<!-- LinkedIn -->
	<p>
		<label for="<?php echo $this->get_field_id('social_linkedin') ?>">LinkedIn:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_linkedin'); ?>" name="<?php echo $this->get_field_name('social_linkedin'); ?>" value="<?php echo $instance['social_linkedin']; ?>" />
	</p>

	<!-- Pinterest -->
	<p>
		<label for="<?php echo $this->get_field_id('social_pinterest') ?>">Pinterest:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_pinterest'); ?>" name="<?php echo $this->get_field_name('social_pinterest'); ?>" value="<?php echo $instance['social_pinterest']; ?>" />
	</p>

	<!-- Skype -->
	<p>
		<label for="<?php echo $this->get_field_id('social_skype') ?>">Skype:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_skype'); ?>" name="<?php echo $this->get_field_name('social_skype'); ?>" value="<?php echo $instance['social_skype']; ?>" />
	</p>

	<!-- YouTube -->
	<p>
		<label for="<?php echo $this->get_field_id('social_youtube') ?>">YouTube:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_youtube'); ?>" name="<?php echo $this->get_field_name('social_youtube'); ?>" value="<?php echo $instance['social_youtube']; ?>" />
	</p>

	<!-- vimeo -->
	<p>
		<label for="<?php echo $this->get_field_id('social_vimeo') ?>">vimeo:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_vimeo'); ?>" name="<?php echo $this->get_field_name('social_vimeo'); ?>" value="<?php echo $instance['social_vimeo']; ?>" />
	</p>

	<!-- Instagram -->
	<p>
		<label for="<?php echo $this->get_field_id('social_instagram') ?>">Instagram:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_instagram'); ?>" name="<?php echo $this->get_field_name('social_instagram'); ?>" value="<?php echo $instance['social_instagram']; ?>" />
	</p>

	<!-- tumblr -->
	<p>
		<label for="<?php echo $this->get_field_id('social_tumblr') ?>">tumblr:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_tumblr'); ?>" name="<?php echo $this->get_field_name('social_tumblr'); ?>" value="<?php echo $instance['social_tumblr']; ?>" />
	</p>

	<!-- github -->
	<p>
		<label for="<?php echo $this->get_field_id('social_github') ?>">github:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_github'); ?>" name="<?php echo $this->get_field_name('social_github'); ?>" value="<?php echo $instance['social_github']; ?>" />
	</p>

	<!-- foursquare -->
	<p>
		<label for="<?php echo $this->get_field_id('social_foursquare') ?>">foursquare:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_foursquare'); ?>" name="<?php echo $this->get_field_name('social_foursquare'); ?>" value="<?php echo $instance['social_foursquare']; ?>" />
	</p>

	<!-- delicious -->
	<p>
		<label for="<?php echo $this->get_field_id('social_delicious') ?>">delicious:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_delicious'); ?>" name="<?php echo $this->get_field_name('social_delicious'); ?>" value="<?php echo $instance['social_delicious']; ?>" />
	</p>

	<!-- paypal -->
	<p>
		<label for="<?php echo $this->get_field_id('social_paypal') ?>">paypal:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_paypal'); ?>" name="<?php echo $this->get_field_name('social_paypal'); ?>" value="<?php echo $instance['social_paypal']; ?>" />
	</p>

	<!-- stumbleupon -->
	<p>
		<label for="<?php echo $this->get_field_id('social_stumbleupon') ?>">stumbleupon:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_stumbleupon'); ?>" name="<?php echo $this->get_field_name('social_stumbleupon'); ?>" value="<?php echo $instance['social_stumbleupon']; ?>" />
	</p>

	<!-- path -->
	<p>
		<label for="<?php echo $this->get_field_id('social_path') ?>">path:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_path'); ?>" name="<?php echo $this->get_field_name('social_path'); ?>" value="<?php echo $instance['social_path']; ?>" />
	</p>

	<!-- spotify -->
	<p>
		<label for="<?php echo $this->get_field_id('social_spotify') ?>">spotify:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_spotify'); ?>" name="<?php echo $this->get_field_name('social_spotify'); ?>" value="<?php echo $instance['social_spotify']; ?>" />
	</p>

	<!-- behance -->
	<p>
		<label for="<?php echo $this->get_field_id('social_behance') ?>">behance:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_behance'); ?>" name="<?php echo $this->get_field_name('social_behance'); ?>" value="<?php echo $instance['social_behance']; ?>" />
	</p>

	<!-- fivehundredpx -->
	<p>
		<label for="<?php echo $this->get_field_id('social_fivehundredpx') ?>">fivehundredpx:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_fivehundredpx'); ?>" name="<?php echo $this->get_field_name('social_fivehundredpx'); ?>" value="<?php echo $instance['social_fivehundredpx']; ?>" />
	</p>

	<!-- grooveshark -->
	<p>
		<label for="<?php echo $this->get_field_id('social_grooveshark') ?>">grooveshark:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_grooveshark'); ?>" name="<?php echo $this->get_field_name('social_grooveshark'); ?>" value="<?php echo $instance['social_grooveshark']; ?>" />
	</p>

	<!-- forrst -->
	<p>
		<label for="<?php echo $this->get_field_id('social_forrst') ?>">forrst:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_forrst'); ?>" name="<?php echo $this->get_field_name('social_forrst'); ?>" value="<?php echo $instance['social_forrst']; ?>" />
	</p>

	<!-- digg -->
	<p>
		<label for="<?php echo $this->get_field_id('social_digg') ?>">digg:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_digg'); ?>" name="<?php echo $this->get_field_name('social_digg'); ?>" value="<?php echo $instance['social_digg']; ?>" />
	</p>

	<!-- reddit -->
	<p>
		<label for="<?php echo $this->get_field_id('social_reddit') ?>">reddit:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_reddit'); ?>" name="<?php echo $this->get_field_name('social_reddit'); ?>" value="<?php echo $instance['social_reddit']; ?>" />
	</p>

	<!-- rss -->
	<p>
		<label for="<?php echo $this->get_field_id('social_rss') ?>">rss:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_rss'); ?>" name="<?php echo $this->get_field_name('social_rss'); ?>" value="<?php echo $instance['social_rss']; ?>" />
	</p>

	<!-- myspace -->
	<p>
		<label for="<?php echo $this->get_field_id('social_myspace') ?>">myspace:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_myspace'); ?>" name="<?php echo $this->get_field_name('social_myspace'); ?>" value="<?php echo $instance['social_myspace']; ?>" />
	</p>

	<!-- amazon -->
	<p>
		<label for="<?php echo $this->get_field_id('social_amazon') ?>">amazon:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_amazon'); ?>" name="<?php echo $this->get_field_name('social_amazon'); ?>" value="<?php echo $instance['social_amazon']; ?>" />
	</p>

	<!-- ebay -->
	<p>
		<label for="<?php echo $this->get_field_id('social_ebay') ?>">ebay:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_ebay'); ?>" name="<?php echo $this->get_field_name('social_ebay'); ?>" value="<?php echo $instance['social_ebay']; ?>" />
	</p>

	<!-- lastfm -->
	<p>
		<label for="<?php echo $this->get_field_id('social_lastfm') ?>">lastfm:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_lastfm'); ?>" name="<?php echo $this->get_field_name('social_lastfm'); ?>" value="<?php echo $instance['social_lastfm']; ?>" />
	</p>

	<!-- soundcloud -->
	<p>
		<label for="<?php echo $this->get_field_id('social_soundcloud') ?>">soundcloud:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_soundcloud'); ?>" name="<?php echo $this->get_field_name('social_soundcloud'); ?>" value="<?php echo $instance['social_soundcloud']; ?>" />
	</p>

	<!-- posterous -->
	<p>
		<label for="<?php echo $this->get_field_id('social_posterous') ?>">posterous:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_posterous'); ?>" name="<?php echo $this->get_field_name('social_posterous'); ?>" value="<?php echo $instance['social_posterous']; ?>" />
	</p>

	<!-- picasa -->
	<p>
		<label for="<?php echo $this->get_field_id('social_picasa') ?>">picasa:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_picasa'); ?>" name="<?php echo $this->get_field_name('social_picasa'); ?>" value="<?php echo $instance['social_picasa']; ?>" />
	</p>

	<!-- wordpress -->
	<p>
		<label for="<?php echo $this->get_field_id('social_wordpress') ?>">wordpress:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_wordpress'); ?>" name="<?php echo $this->get_field_name('social_wordpress'); ?>" value="<?php echo $instance['social_wordpress']; ?>" />
	</p>

	<!-- win8 -->
	<p>
		<label for="<?php echo $this->get_field_id('social_win8') ?>">windows:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_win8'); ?>" name="<?php echo $this->get_field_name('social_win8'); ?>" value="<?php echo $instance['social_win8']; ?>" />
	</p>

	<!-- evernote -->
	<p>
		<label for="<?php echo $this->get_field_id('social_evernote') ?>">evernote:</label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('social_evernote'); ?>" name="<?php echo $this->get_field_name('social_evernote'); ?>" value="<?php echo $instance['social_evernote']; ?>" />
	</p>

	<?php
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

function update($new_instance, $old_instance) {
	$instance = $old_instance;

	// The Title
	$instance['title'] = strip_tags($new_instance['title']);

	// The Description
	$instance['description'] = $new_instance['description'];

	// The Social Links
	$instance['social_facebook'] = $new_instance['social_facebook'];
	$instance['social_twitter'] = $new_instance['social_twitter'];
	$instance['social_gplus'] = $new_instance['social_gplus'];
	$instance['social_dribbble'] = $new_instance['social_dribbble'];
	$instance['social_flickr'] = $new_instance['social_flickr'];
	$instance['social_linkedin'] = $new_instance['social_linkedin'];
	$instance['social_pinterest'] = $new_instance['social_pinterest'];
	$instance['social_skype'] = $new_instance['social_skype'];
	$instance['social_youtube'] = $new_instance['social_youtube'];
	$instance['social_instagram'] = $new_instance['social_instagram'];
	$instance['social_tumblr'] = $new_instance['social_tumblr'];
	$instance['social_github'] = $new_instance['social_github'];
	$instance['social_foursquare'] = $new_instance['social_foursquare'];
	$instance['social_delicious'] = $new_instance['social_delicious'];
	$instance['social_paypal'] = $new_instance['social_paypal'];
	$instance['social_stumbleupon'] = $new_instance['social_stumbleupon'];
	$instance['social_path'] = $new_instance['social_path'];
	$instance['social_spotify'] = $new_instance['social_spotify'];
	$instance['social_behance'] = $new_instance['social_behance'];
	$instance['social_fivehundredpx'] = $new_instance['social_fivehundredpx'];
	$instance['social_grooveshark'] = $new_instance['social_grooveshark'];
	$instance['social_forrst'] = $new_instance['social_forrst'];
	$instance['social_digg'] = $new_instance['social_digg'];
	$instance['social_reddit'] = $new_instance['social_reddit'];
	$instance['social_rss'] = $new_instance['social_rss'];
	$instance['social_vimeo'] = $new_instance['social_vimeo'];
	$instance['social_myspace'] = $new_instance['social_myspace'];
	$instance['social_amazon'] = $new_instance['social_amazon'];
	$instance['social_ebay'] = $new_instance['social_ebay'];
	$instance['social_lastfm'] = $new_instance['social_lastfm'];
	$instance['social_soundcloud'] = $new_instance['social_soundcloud'];
	$instance['social_posterous'] = $new_instance['social_posterous'];
	$instance['social_picasa'] = $new_instance['social_picasa'];
	$instance['social_wordpress'] = $new_instance['social_wordpress'];
	$instance['social_win8'] = $new_instance['social_win8'];
	$instance['social_evernote'] = $new_instance['social_evernote'];

	return $instance;
}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

 function widget($args, $instance) {
	extract($args);

	// Get the title and prepare it for display
	$title = apply_filters('widget_title', $instance['title']);

	// Get the description
	$description = $instance['description'];

	// Get the social links
	$social_facebook = $instance['social_facebook'];
	$social_twitter = $instance['social_twitter'];
	$social_gplus = $instance['social_gplus'];
	$social_dribbble = $instance['social_dribbble'];
	$social_flickr = $instance['social_flickr'];
	$social_linkedin = $instance['social_linkedin'];
	$social_pinterest = $instance['social_pinterest'];
	$social_skype = $instance['social_skype'];
	$social_youtube = $instance['social_youtube'];
	$social_instagram = $instance['social_instagram'];
	$social_tumblr = $instance['social_tumblr'];
	$social_github = $instance['social_github'];
	$social_foursquare = $instance['social_foursquare'];
	$social_delicious = $instance['social_delicious'];
	$social_paypal = $instance['social_paypal'];
	$social_stumbleupon = $instance['social_stumbleupon'];
	$social_path = $instance['social_path'];
	$social_spotify = $instance['social_spotify'];
	$social_behance = $instance['social_behance'];
	$social_fivehundredpx = $instance['social_fivehundredpx'];
	$social_grooveshark = $instance['social_grooveshark'];
	$social_forrst = $instance['social_forrst'];
	$social_digg = $instance['social_digg'];
	$social_reddit = $instance['social_reddit'];
	$social_rss = $instance['social_rss'];
	$social_vimeo = $instance['social_vimeo'];
	$social_myspace = $instance['social_myspace'];
	$social_amazon = $instance['social_amazon'];
	$social_ebay = $instance['social_ebay'];
	$social_lastfm = $instance['social_lastfm'];
	$social_soundcloud = $instance['social_soundcloud'];
	$social_posterous = $instance['social_posterous'];
	$social_picasa = $instance['social_picasa'];
	$social_wordpress = $instance['social_wordpress'];
	$social_win8 = $instance['social_win8'];
	$social_evernote = $instance['social_evernote'];

	echo $before_widget;

	if ($title) {
		echo $before_title . $title . $after_title;
	}

	echo '<div class="social_widget_wrapper"><div class="social-bar clearfix">';

	if ($social_facebook) : ?>
		<a class="ac-social-icon ac-social-icon-facebook-1" href="<?php echo $social_facebook; ?>"></a>
	<?php endif;

	if ($social_twitter) : ?>
		<a class="ac-social-icon ac-social-icon-twitter" href="<?php echo $social_twitter; ?>"></a>
	<?php endif;

	if ($social_linkedin) : ?>
		<a class="ac-social-icon ac-social-icon-linkedin" href="<?php echo $social_linkedin; ?>"></a>
	<?php endif;

	if ($social_pinterest) : ?>
		<a class="ac-social-icon ac-social-icon-pinterest" href="<?php echo $social_pinterest; ?>"></a>
	<?php endif;

	if ($social_delicious) : ?>
		<a class="ac-social-icon ac-social-icon-delicious" href="<?php echo $social_delicious; ?>"></a>
	<?php endif;

	if ($social_paypal) : ?>
		<a class="ac-social-icon ac-social-icon-paypal" href="<?php echo $social_paypal; ?>"></a>
	<?php endif;

	if ($social_gplus) : ?>
		<a class="ac-social-icon ac-social-icon-gplus" href="<?php echo $social_gplus; ?>"></a>
	<?php endif;

	if ($social_stumbleupon) : ?>
		<a class="ac-social-icon ac-social-icon-stumbleupon" href="<?php echo $social_stumbleupon; ?>"></a>
	<?php endif;

	if ($social_foursquare) : ?>
		<a class="ac-social-icon ac-social-icon-foursquare-2" href="<?php echo $social_foursquare; ?>"></a>
	<?php endif;

	if ($social_path) : ?>
		<a class="ac-social-icon ac-social-icon-path" href="<?php echo $social_path; ?>"></a>
	<?php endif;

	if ($social_flickr) : ?>
		<a class="ac-social-icon ac-social-icon-flickr" href="<?php echo $social_flickr; ?>"></a>
	<?php endif;

	if ($social_tumblr) : ?>
		<a class="ac-social-icon ac-social-icon-tumblr" href="<?php echo $social_tumblr; ?>"></a>
	<?php endif;

	if ($social_dribbble) : ?>
		<a class="ac-social-icon ac-social-icon-dribbble" href="<?php echo $social_dribbble; ?>"></a>
	<?php endif;

	if ($social_spotify) : ?>
		<a class="ac-social-icon ac-social-icon-spotify" href="<?php echo $social_spotify; ?>"></a>
	<?php endif;

	if ($social_instagram) : ?>
		<a class="ac-social-icon ac-social-icon-instagram" href="<?php echo $social_instagram; ?>"></a>
	<?php endif;

	if ($social_behance) : ?>
		<a class="ac-social-icon ac-social-icon-behance" href="<?php echo $social_behance; ?>"></a>
	<?php endif;

	if ($social_github) : ?>
		<a class="ac-social-icon ac-social-icon-github-1" href="<?php echo $social_github; ?>"></a>
	<?php endif;

	if ($social_fivehundredpx) : ?>
		<a class="ac-social-icon ac-social-icon-fivehundredpx" href="<?php echo $social_fivehundredpx; ?>"></a>
	<?php endif;

	if ($social_grooveshark) : ?>
		<a class="ac-social-icon ac-social-icon-grooveshark" href="<?php echo $social_grooveshark; ?>"></a>
	<?php endif;

	if ($social_forrst) : ?>
		<a class="ac-social-icon ac-social-icon-forrst" href="<?php echo $social_forrst; ?>"></a>
	<?php endif;

	if ($social_digg) : ?>
		<a class="ac-social-icon ac-social-icon-digg" href="<?php echo $social_digg; ?>"></a>
	<?php endif;

	if ($social_reddit) : ?>
		<a class="ac-social-icon ac-social-icon-reddit" href="<?php echo $social_reddit; ?>"></a>
	<?php endif;

	if ($social_rss) : ?>
		<a class="ac-social-icon ac-social-icon-rss-1" href="<?php echo $social_rss; ?>"></a>
	<?php endif;

	if ($social_skype) : ?>
		<a class="ac-social-icon ac-social-icon-skype" href="<?php echo $social_skype; ?>"></a>
	<?php endif;

	if ($social_youtube) : ?>
		<a class="ac-social-icon ac-social-icon-youtube" href="<?php echo $social_youtube; ?>"></a>
	<?php endif;

	if ($social_vimeo) : ?>
		<a class="ac-social-icon ac-social-icon-vimeo" href="<?php echo $social_vimeo; ?>"></a>
	<?php endif;

	if ($social_myspace) : ?>
		<a class="ac-social-icon ac-social-icon-myspace" href="<?php echo $social_myspace; ?>"></a>
	<?php endif;

	if ($social_amazon) : ?>
		<a class="ac-social-icon ac-social-icon-amazon" href="<?php echo $social_amazon; ?>"></a>
	<?php endif;

	if ($social_ebay) : ?>
		<a class="ac-social-icon ac-social-icon-ebay" href="<?php echo $social_ebay; ?>"></a>
	<?php endif;

	if ($social_lastfm) : ?>
		<a class="ac-social-icon ac-social-icon-lastfm-1" href="<?php echo $social_lastfm; ?>"></a>
	<?php endif;

	if ($social_soundcloud) : ?>
		<a class="ac-social-icon ac-social-icon-soundcloud" href="<?php echo $social_soundcloud; ?>"></a>
	<?php endif;

	if ($social_posterous) : ?>
		<a class="ac-social-icon ac-social-icon-posterous" href="<?php echo $social_posterous; ?>"></a>
	<?php endif;

	if ($social_picasa) : ?>
		<a class="ac-social-icon ac-social-icon-picasa" href="<?php echo $social_picasa; ?>"></a>
	<?php endif;

	if ($social_wordpress) : ?>
		<a class="ac-social-icon ac-social-icon-wordpress" href="<?php echo $social_wordpress; ?>"></a>
	<?php endif;

	if ($social_win8) : ?>
		<a class="ac-social-icon ac-social-icon-win8" href="<?php echo $social_win8; ?>"></a>
	<?php endif;

	if ($social_evernote) : ?>
		<a class="ac-social-icon ac-social-icon-evernote" href="<?php echo $social_evernote; ?>"></a>
	<?php endif;

	echo '</div></div>';

	if ($description) {
		echo '<div class="social-widget-desc"><p>' . $description . '</p></div>';
	}

	echo $after_widget;
}

}

?>
