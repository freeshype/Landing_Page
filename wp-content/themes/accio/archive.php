<?php
/**
 * The Template for displaying archive page.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

get_header();

/* Get author data */
if(get_query_var('author_name')) :
$curauth = get_userdatabylogin(get_query_var('author_name'));
else :
$curauth = get_userdata(get_query_var('author'));
endif;

?>


<?php if (have_posts()) : ?>

<!-- Start Intro Box -->
<div class="intro-box">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="intro-box-inner">
					<?php /* If this is a category archive */ if (is_category()) : ?>
					<span><i class="icon-bookmark-empty"></i></span><?php _e('All posts in:', 'framework'); ?> <?php echo single_cat_title('', false); ?>
						<?php /* If this is a tag archive */ elseif( is_tag() ) : ?>
					<span><i class="icon-tag"></i></span><?php _e('All posts tagged:', 'framework'); ?> <?php echo single_tag_title('',false); ?>
						<?php /* If this is a daily archive */elseif (is_day()) : ?>
					<span><i class="icon-calendar-empty"></i></span><?php _e('Daily Archives: %s', 'framework'); ?> <?php echo get_the_date(); ?>
						 <?php /* If this is a monthly archive */ elseif (is_month()) : ?>
					<span><i class="icon-calendar-empty"></i></span><?php printf( __('Monthly Archives: %s', 'framework'), get_the_date( _x( 'F Y', 'monthly archives date format', 'framework'))); ?>
					<?php /* If this is a yearly archive */ elseif (is_year()) : ?>
					<span><i class="icon-calendar-empty"></i></span><?php printf( __('Yearly Archives: %s', 'framework'), get_the_date( _x( 'Y', 'yearly archives date format', 'framework'))); ?>
					<?php /* If this is an author archive */ elseif (is_author()) : ?>
					<span><i class="icon-user"></i></span><?php _e('All posts by:', 'framework'); ?> <?php echo $curauth->display_name; ?>
					<?php /* If this is a paged archive */ elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
					<span><i class="icon-inbox"></i></span><?php _e('Blog Archives:', 'framework'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Intro Box -->

<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="span8">

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

					<?php endif; else : ?>

					<?php get_template_part('content', 'none'); ?>

					<?php endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

</section>

<?php get_footer(); ?>
