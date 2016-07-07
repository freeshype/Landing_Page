<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
get_header();
?>

<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="span8">

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

					<?php comments_template('', true); ?>

					<?php else : ?>

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
