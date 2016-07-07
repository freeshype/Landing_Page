<?php

/*---------------------------------------------------------------*/
/* Widget that displays your flickr photostream
/*----------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'accio_flickr_widgets' );

// Register widget
function accio_flickr_widgets() {
	register_widget( 'accio_FLICKR_Widget' );
}

// Widget class
class accio_flickr_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

function accio_FLICKR_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'accio_flickr_widget',
		'description' => __('A widget that displays your Flickr photos.', 'accio_framework')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'accio_flickr_widget'
	);

	// Create the widget
	$this->WP_Widget( 'accio_flickr_widget', __('Accio: Flickr Photostream', 'accio_framework'), $widget_ops, $control_ops );

}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$flickrID = $instance['flickrID'];
	$postcount = $instance['postcount'];
	$type = $instance['type'];
	$display = $instance['display'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}

	// Display Flickr Photos
	 ?>

	<div id="flickr_badge_wrapper" class="clearfix">

		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>

	</div>

	<?php

	// After widget (defined by theme functions file)
	echo $after_widget;

}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );

	// No need to strip tags
	$instance['postcount'] = $new_instance['postcount'];
	$instance['type'] = $new_instance['type'];
	$instance['display'] = $new_instance['display'];

	return $instance;
}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'My Photostream',
		'flickrID' => '',
		'postcount' => '8',
		'type' => 'user',
		'display' => 'latest',
	);

	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p class="description"><?php _e('Enter your flickr ID, use idgettr to get your id.', 'framework'); ?></p>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'accio_framework') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<!-- Flickr ID: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'accio_framework') ?> (<a href="<?php echo esc_url('http://idgettr.com/'); ?>">idgettr</a>)</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
	</p>

	<!-- Postcount: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:', 'accio_framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
			<option <?php if ( '4' == $instance['postcount'] ) echo 'selected="selected"'; ?>>4</option>
			<option <?php if ( '8' == $instance['postcount'] ) echo 'selected="selected"'; ?>>8</option>
		</select>
	</p>

	<!-- Type: Select Box -->
	<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'accio_framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
		</select>
	</p>

	<!-- Display: Select Box -->
	<p>
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'accio_framework') ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
			<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
			<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
		</select>
	</p>

	<?php
	}
}
?>
