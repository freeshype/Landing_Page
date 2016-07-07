<?php get_header(); ?>

<!-- MAIN CONTENT -->

<section class="page-content animated fadeInUpBig fast">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('page single') ?>>

			<?php if (has_post_thumbnail()) : ?>

				<div class="post-thumb">

					<?php the_post_thumbnail('blog'); ?>

				</div>

			<?php endif; ?>


			<div class="post-content">

				<div class="post-title">

					<h2><?php the_title(); ?></h2>

				</div>

				<?php the_content(); ?>

				<div class="clearfix"></div>

			</div>

		</article>

		<?php comments_template(); ?>

	<?php endwhile; ?>

</section>

<?php get_footer(); ?>
