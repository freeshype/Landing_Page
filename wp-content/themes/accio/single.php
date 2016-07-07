<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

get_header(); ?>

<section id="blog">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="span8">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', get_post_format()); ?>

					<?php if(get_option('accio_author_box') == "true") : ?>

					<div class="author-bio clearfix">
						<div class="author-image">
							<?php echo get_avatar(get_the_author_meta('email'), '96'); ?>
						</div>
						<div class="author-bio-content">
							<h5><?php the_author_posts_link(); ?></h5>
							<p><?php the_author_meta("description"); ?></p>
						</div>
					</div>

					<?php endif; ?>

					<?php endwhile; ?>

					<?php comments_template('', true); ?>

					<div class="single-page-nav clearfix">
						<div class="post-navigation clearfix">
							<div class="post-next"><?php previous_post_link('%link', '<i class="icon-chevron-right"></i>'); ?></div>
							<div class="post-prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
						</div>
					</div>

					<?php else : ?>

					<?php get_template_part('content', 'none'); ?>

					<?php endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	<!-- END #content -->
	</div>

</section>

<?php get_footer(); ?>
