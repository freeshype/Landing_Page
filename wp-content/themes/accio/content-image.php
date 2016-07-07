<?php
/**
 * The template for displaying posts in the Image post format.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>

		<div class="post-thumb">

			<?php
			$image_link = rwmb_meta('accio_the_image_url', 'type=text');
			$enable_lightbox = rwmb_meta('accio_enable_lightbox', 'type=select');
			?>

			<?php if($image_link) : ?>
			<?php if($enable_lightbox == 'value1') : ?>
			<a class="lightbox" href="<?php echo $image_link; ?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php elseif($enable_lightbox == 'value2') : ?>
			<a href="<?php echo $image_link; ?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php endif; ?>
			<?php else : ?>
			<?php if(is_single()) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php endif; endif; ?>

		</div>

		<?php endif; ?>

		<?php $show_image_meta = rwmb_meta('accio_show_image_meta', 'type=select'); ?>

		<?php if($show_image_meta == 'value1') : ?>

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
