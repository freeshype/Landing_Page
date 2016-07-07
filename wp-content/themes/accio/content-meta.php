<?php
/**
 * The Template for displaying meta data.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<div class="entry-meta">
	<?php

	$format = get_post_format();

	if ( false === $format ) {
		$format = 'standard';
	}

	?>
	<span class="comment-count"><?php comments_popup_link(__('0', 'framework'), __('1', 'framework'), __('% Comments', 'framework'), '', __('Off', 'framework')); ?></span>
    <span class="published"><a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format') ); ?></a></span>
    <?php if(get_option('accio_format_icon') == "true") : ?>
    <span class="format"><a href="<?php the_permalink(); ?>"><?php printf(__('%s', 'framework'), ucwords($format)); ?></a></span>
	<?php endif; ?>
    <?php edit_post_link(__('Edit Post', 'framework'), '<span class="edit">', '</span>'); ?>

</div>

