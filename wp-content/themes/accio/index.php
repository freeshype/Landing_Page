<?php
/**
 * The Template for index.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
get_header();
?>

<?php get_option('accio_blog_layout') == 'layout-1cl' ? $layout_class = 'span8 offset2' : $layout_class = 'span8'; ?>

<!-- Start Blog -->
<section id="blog">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<!-- Start Main -->
				<div id="main" class="<?php echo $layout_class; ?>">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', get_post_format()) ?>

					<?php endwhile; ?>

					<?php

					$pagination = get_option('accio_pagination');

					if($pagination == 'numeric') : ?>

					<?php accio_pagination(); ?>

					<?php elseif($pagination == 'next-prev') : ?>

					<div class="pagination clearfix">
						<div class="next-page"><?php next_posts_link('<i class="icon-chevron-right"></i>'); ?></div>
						<div class="prev-page"><?php previous_posts_link('<i class="icon-chevron-left"></i>'); ?></div>
					</div>

					<?php endif; else : ?>

					<?php get_template_part('content', 'none'); ?>

					<?php endif; ?>

				<!-- End Main -->
				</div>

				<?php if(get_option('accio_blog_layout') != 'layout-1cl') : ?>

				<?php get_sidebar(); ?>

				<?php endif; ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

<!-- End Blog -->
</section>

<?php get_footer(); ?>
