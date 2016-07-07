<?php
/**
 * The template for displaying posts in the Status post format.
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
		$status_style = rwmb_meta('accio_status_style', 'type=select');
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
		$color = rwmb_meta('accio_status_bg', 'type=color');
		$opacity = rwmb_meta('accio_status_bg_opacity', 'type=slider');
		$opacity = $opacity / 100;

		?>

		<?php if($status_style == 'value1') : ?>

		<div class="post-thumb">
			<div class="entry-status-twitter"><?php the_content(); ?></div>
		</div>

		<?php elseif($status_style == 'value2') : ?>

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
					</div>
				</div>
			</div>
		</div>

		<?php endif; ?>

	</div>

<!-- End .hentry -->
</article>
