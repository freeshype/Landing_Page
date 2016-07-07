<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<?php $embed = rwmb_meta('accio_video_embed', 'type=textarea'); ?>

		<?php if($embed!='') : ?>

		<div class="post-thumb">

			<div class="media-element"><?php echo $embed; ?></div>

		</div>

		<?php else : ?>

		<?php

		$m4v = rwmb_meta('accio_video_m4v', 'type=text');
		$ogv = rwmb_meta('accio_video_ogv', 'type=text');
		$webm = rwmb_meta('accio_video_webm', 'type=text');
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
		$accio_wp_video = '[video poster="'.$image_url[0].'" mp4="'.$m4v.'"  webm="'.$webm.'"]';

		?>

	    <div class="post-thumb"><?php echo do_shortcode($accio_wp_video); ?></div>

		<?php endif; ?>

		<?php $show_video_meta = rwmb_meta('accio_show_video_meta', 'type=select');

		if($show_video_meta == 'value1') : ?>

		<div class="entry-wrap">

			<div class="entry-header">

				<div class="entry-info">

					<?php if(is_single()) : ?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php else : ?>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
					<?php endif; ?>

					<?php get_template_part('content', 'meta'); ?>

				</div>

			</div>

			<div class="entry-content">
				<?php the_content(__('Read More', 'framework')); ?>
				<?php wp_link_pages( array( 'before' => '<div class="post-pagination"><em class="page-links-title">' . __( 'Pages:', 'framework' ) . '</em>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div>

			<?php if(is_single()) : get_template_part('content', 'entry-footer'); endif; ?>

		</div>

		<?php endif; ?>

	</div>

<!-- End .hentry -->
</article>
