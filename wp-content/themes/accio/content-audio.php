<?php
/**
 * The template for displaying posts in the Audio post format.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<?php

		$mp3 = rwmb_meta('accio_audio_mp3', 'type=text');
		$oga = rwmb_meta('accio_audio_ogg', 'type=text');
		$sc_url = rwmb_meta('accio_audio_sc', 'type=text');
		$sc_color = rwmb_meta('accio_audio_sc_color', 'type=color');
		$accio_wp_audio = '[audio mp3="'.$mp3.'"  ogg="'.$oga.'"]';

		$soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode($sc_url).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$sc_color.'"></iframe>';

		?>

		<?php if($sc_url!='') : ?>
		<div class="post-thumb"><?php echo $soundcloud_audio; ?></div>
		<?php else : ?>
		<div class="post-thumb">
			<?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
			<?php echo do_shortcode($accio_wp_audio); ?>
		</div>
		<?php endif; ?>

		<?php

		$show_audio_meta = rwmb_meta('accio_show_audio_meta', 'type=select');

		if($show_audio_meta == 'value1') : ?>

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
