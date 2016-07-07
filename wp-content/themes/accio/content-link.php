<?php
/**
 * The template for displaying posts in the Link post format.
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
		$link = rwmb_meta('accio_the_link', 'type=text');
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
		$color = rwmb_meta('accio_link_bg', 'type=color');
		$opacity = rwmb_meta('accio_link_bg_opacity', 'type=slider');
		$opacity = $opacity / 100;
		?>

		<div class="post-thumb">
			<div class="ql_wrapper">
				<?php if(has_post_thumbnail()) : ?>
				<div class="entry-media" style="background-image: url(<?php echo $image_url[0]; ?>); ">
				<?php else : ?>
				<div class="entry-media">
				<?php endif; ?>
					<div class="ql_overlay" style="background-color: <?php echo $color; ?>; opacity: <?php echo $opacity; ?>;"></div>
					<div class="ql_textwrap">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><a href="<?php echo $link; ?>" target="_blank" style="color: #ffffff;"><?php echo $link; ?></a></p>
					</div>
				</div>
			</div>
		</div>

		<?php $show_link_meta = rwmb_meta('accio_show_link_meta', 'type=select'); ?>

		<?php if($show_link_meta == 'value1') : ?>

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
