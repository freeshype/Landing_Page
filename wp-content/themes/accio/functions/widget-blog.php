<?php

/*-----------------------------------------------------------------------------------*/
/*	Widget that displays your latest posts.
/*-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'accio_blog_widgets' );

// Register widget
function accio_blog_widgets() {
	register_widget( 'accio_Blog_Widget' );
}

// Widget class
class accio_blog_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

function accio_Blog_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'accio_blog_widget',
		'description' => __('A widget that displays your latest blog posts.', 'framework')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'accio_blog_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'accio_blog_widget', __('Accio: Recent Posts', 'framework'), $widget_ops, $control_ops );

}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$number = $instance['number'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display blog widget
	?>

        <!--BEGIN .accio_blog-->
		<div class="accio_blog">

            <div id="post-widget-<?php the_ID(); ?>">

            	<ul class="clearfix">

            		<?php

					$query = new WP_Query();
					$query->query('posts_per_page='. $number);
					while ($query->have_posts()) : $query->the_post();

					$format = get_post_format();

					$format_icon = '';

					if($format == 'gallery') {
						$format_icon = 'icon-picture';
					} elseif ($format == 'image') {
						$format_icon = 'icon-camera-retro';
					} elseif ($format == 'link') {
						$format_icon = 'icon-link';
					} elseif ($format == 'quote') {
						$format_icon = 'icon-quote-left';
					} elseif ($format == 'video') {
						$format_icon = 'icon-facetime-video';
					} elseif ($format == 'audio') {
						$format_icon = 'icon-music';
					} elseif ($format == 'aside') {
						$format_icon = 'icon-file-text-alt';
					} elseif ($format == 'chat') {
						$format_icon = 'icon-comment-alt';
					} else {
						$format_icon = 'icon-file-text-alt';
					}

					?>

            		<li class="clearfix has-thumb">

            			<div class="widget-entry-thumb">

            				<?php if(has_post_thumbnail()) : ?>

            				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-archive'); ?></a>

            				<?php else : ?>

            				<a class="widget-entry-icon"><i class="<?php echo $format_icon; ?>"></i></a>

            				<?php endif; ?>

            			</div>

            			<a class="widget-entry-title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a>

            		</li>

            		<?php endwhile; wp_reset_query(); ?>

            	</ul>

            </div>

        <!--END .accio_blog-->
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
	$instance['number'] = strip_tags( $new_instance['number']);

	// No need to strip tags

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'From the Blog',
		'number' => 1
	);

	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<!-- Embed Code: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Posts Number:', 'framework') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
	</p>

	<?php
	}
}
?>
