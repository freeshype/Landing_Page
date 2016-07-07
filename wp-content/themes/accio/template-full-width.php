<?php
/**
 * Template Name: Full Width
 *
 * The Template for displaying full width pages.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

get_header(); ?>

<!-- Start Page -->
<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<!-- Start Main -->
			<div id="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="hentry-box">

						<div class="entry-wrap">

							<div class="entry-header">

								<div class="entry-info">

									<?php $heading_value = rwmb_meta('accio_page_heading', 'type=text'); ?>

									<?php if($heading_value) : ?>

									<h2 class="entry-title page-title"><?php echo $heading_value; ?></h2>

									<?php else : ?>

									<h2 class="entry-title page-title"><?php the_title(); ?></h2>

									<?php endif; ?>

								</div>

							</div>

							<div class="entry-content">

								<?php the_content(); ?>

							</div>

						</div>

					</div>

				</article>

				<?php endwhile; ?>

				<?php else : ?>

				<?php get_template_part('content', 'none'); ?>

				<?php endif; ?>

			<!-- End Main -->
			</div>

		</div>

	<!-- End Content -->
	</div>

<!-- End Page -->
</section>

<?php get_footer(); ?>
