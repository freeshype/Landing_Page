<?php
/**
 * The Template for displaying search results.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
get_header();
?>

<?php get_option('accio_blog_layout') == 'layout-1cl' ? $layout_class = 'blog-full' : $layout_class = 'span8'; ?>

<?php if (have_posts()) : ?>

<!-- Start Intro Box -->
<div class="intro-box">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="intro-box-inner"><span><i class="icon-search"></i></span><?php _e('Search results for:', 'framework'); ?> <?php echo get_search_query(); ?></div>
			</div>
		</div>
	</div>
</div>
<!-- End Intro Box -->

<section id="blog">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="<?php echo $layout_class; ?>">

					<?php while (have_posts()) : the_post(); ?>

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

					<?php endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

</section>

<?php else : ?>

<!-- Start Intro Box -->
<div class="intro-box">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="intro-box-inner"><span><i class="icon-search"></i></span><?php _e('No results found for:', 'framework'); ?> <?php echo get_search_query(); ?></div>
			</div>
		</div>
	</div>
</div>
<!-- End Intro Box -->

<!-- Start Content -->
<div id="content">

	<section id="blog">

		<div class="container">

			<div class="row">

				<div id="main" class="<?php echo $layout_class; ?>">

					<?php get_template_part('content', 'none'); ?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	</section>

<!-- End Content -->
</div>

<?php endif; ?>

<?php get_footer(); ?>
