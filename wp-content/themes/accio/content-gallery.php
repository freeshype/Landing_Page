<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<div class="post-thumb">

			<?php

			$images = rwmb_meta( 'accio_gallery_image', 'type=image_advanced' );

			$accio_gallery_style = rwmb_meta('accio_gallery_style', 'type=select');

			$show_gallery_meta = rwmb_meta('accio_show_gallery_meta', 'type=select');

			?>

			<?php if($accio_gallery_style == 'value1') : ?>

			<div class="flexslider">
			<ul class="slides">

			<?php
			foreach ( $images as $image ) {
			    echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
			}
			?>

			</ul>
		    </div>

			<?php else : ?>

			<div class="entry-media">

				<div class="gallery-content clearfix">

					<ul>

					<?php

					foreach ( $images as $image ) {

					echo "<li><a href='{$image['full_url']}'><img src='{$image['full_url']}' alt='{$image['alt']}' /></a></li>";
					}

					?>

					</ul>

				</div>

			</div>

			<?php endif; ?>

		</div>

		<?php if($show_gallery_meta == 'value1') : ?>

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

<!-- END .hentry -->
</article>
