<?php

/*-----------------------------------------------------------------------------------*/
/*	140x140 Ad Widget
/*-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'load_accio_ad_widget' );

// Register widget
function load_accio_ad_widget() {
	register_widget('accio_AD_widget');
}

// Widget class
class accio_ad_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

function accio_AD_widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'accio_ad_widget',
		'description' => __('Displays a list of four 140x140 ad blocks.', 'accio_framework')
	);

	// Widget control settings
	$control_ops = array(
		'id_base' => 'accio_ad_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'accio_ad_widget', __('Accio: Ad Widget', 'accio_framework'), $widget_ops, $control_ops );

}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form($instance) {
	$defaults = array(
		'title' => __('Ads', 'accio_framework'),
		'ad_img_1' => get_template_directory_uri().'/images/ad_140.jpg',
		'ad_link_1' => '#',
		'ad_img_2' => get_template_directory_uri().'/images/ad_140.jpg',
		'ad_link_2' => '#',
		'ad_img_3' => '',
		'ad_link_3' => '#',
		'ad_img_4' => '',
		'ad_link_4' => '#'
	);

	$instance = wp_parse_args((array) $instance, $defaults);

	?>

	<p class="description"><?php _e('Enter the ad links and url of the images here.', 'framework'); ?></p>

	<!-- The Title -->
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>

	<!-- Ad 1 Image -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_img_1'); ?>"><?php _e('Ad 1 image URL:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_img_1'); ?>" name="<?php echo $this->get_field_name('ad_img_1'); ?>" value="<?php echo $instance['ad_img_1']; ?>" />
	</p>

	<!-- Ad 1 Link -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_link_1'); ?>"><?php _e('Ad 1 link:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_link_1'); ?>" name="<?php echo $this->get_field_name('ad_link_1'); ?>" value="<?php echo $instance['ad_link_1']; ?>" />
	</p>

	<!-- Ad 2 Image -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_img_2'); ?>"><?php _e('Ad 2 image URL:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_img_2'); ?>" name="<?php echo $this->get_field_name('ad_img_2'); ?>" value="<?php echo $instance['ad_img_2']; ?>" />
	</p>

	<!-- Ad 2 Link -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_link_2'); ?>"><?php _e('Ad 2 link:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_link_2'); ?>" name="<?php echo $this->get_field_name('ad_link_2'); ?>" value="<?php echo $instance['ad_link_2']; ?>" />
	</p>

	<!-- Ad 3 Image -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_img_3'); ?>"><?php _e('Ad 3 image URL:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_img_3'); ?>" name="<?php echo $this->get_field_name('ad_img_3'); ?>" value="<?php echo $instance['ad_img_3']; ?>" />
	</p>

	<!-- Ad 3 Link -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_link_3'); ?>"><?php _e('Ad 3 link:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_link_3'); ?>" name="<?php echo $this->get_field_name('ad_link_3'); ?>" value="<?php echo $instance['ad_link_3']; ?>" />
	</p>

	<!-- Ad 4 Image -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_img_4'); ?>"><?php _e('Ad 4 image URL:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_img_4'); ?>" name="<?php echo $this->get_field_name('ad_img_4'); ?>" value="<?php echo $instance['ad_img_4']; ?>" />
	</p>

	<!-- Ad 4 Link -->
	<p>
		<label for="<?php echo $this->get_field_id('ad_link_4'); ?>"><?php _e('Ad 4 link:', 'accio_framework'); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('ad_link_4'); ?>" name="<?php echo $this->get_field_name('ad_link_4'); ?>" value="<?php echo $instance['ad_link_4']; ?>" />
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

	// The Ad Images
	$instance['ad_img_1'] = $new_instance['ad_img_1'];
	$instance['ad_img_2'] = $new_instance['ad_img_2'];
	$instance['ad_img_3'] = $new_instance['ad_img_3'];
	$instance['ad_img_4'] = $new_instance['ad_img_4'];

	// The Ad Links
	$instance['ad_link_1'] = $new_instance['ad_link_1'];
	$instance['ad_link_2'] = $new_instance['ad_link_2'];
	$instance['ad_link_3'] = $new_instance['ad_link_3'];
	$instance['ad_link_4'] = $new_instance['ad_link_4'];

	return $instance;
}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

function widget($args, $instance) {
	extract($args);

	// Get the title and prepare it for display
	$title = apply_filters('widget_title', $instance['title']);

	// Get the ad images
	$ad_img_1 = $instance['ad_img_1'];
	$ad_img_2 = $instance['ad_img_2'];
	$ad_img_3 = $instance['ad_img_3'];
	$ad_img_4 = $instance['ad_img_4'];

	// Get the ad links
	$ad_link_1 = $instance['ad_link_1'];
	$ad_link_2 = $instance['ad_link_2'];
	$ad_link_3 = $instance['ad_link_3'];
	$ad_link_4 = $instance['ad_link_4'];

	echo $before_widget;

	if ($title) {
		echo $before_title . $title . $after_title;
	}

	echo '<ul class="ad-140 clearfix">';

	if ($ad_img_1) : ?>

		<div class="ad-block">
			<a href="<?php echo $ad_link_1; ?>"><img src="<?php echo $ad_img_1; ?>" alt="Ad 140" /></a>
		</div>

	<?php endif;

	if ($ad_img_2) : ?>

		<div class="ad-block">
			<a href="<?php echo $ad_link_2; ?>"><img src="<?php echo $ad_img_2; ?>" alt="Ad 140" /></a>
		</div>

	<?php endif;

	if ($ad_img_3) : ?>

		<div class="ad-block">
			<a href="<?php echo $ad_link_3; ?>"><img src="<?php echo $ad_img_3; ?>" alt="Ad 140" /></a>
		</div>

	<?php endif;

	if ($ad_img_4) : ?>

		<div class="ad-block">
			<a href="<?php echo $ad_link_4; ?>"><img src="<?php echo $ad_img_4; ?>" alt="Ad 140" /></a>
		</div>

	<?php endif;

	echo '</ul>';
	echo $after_widget;
}

}

?>
