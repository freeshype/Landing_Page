<?php get_header(); ?>

<!-- MAIN CONTENT -->

<?php while ( have_posts() ) : the_post(); ?>

	<?php $meta_data = get_post_meta( get_the_ID() ); // Get Meta Options ?>

	<section class="page-content animated fadeInUpBig fast port id="post-<?php the_ID(); ?>" <?php post_class() ?>">

		<div class="page-inner">

			<h1><?php the_title(); ?></h1>

			<?php if ($meta_data['portfolio-select'][0] != 'video') : ?>

				<div class="single-container">

					<?php if ($meta_data['portfolio-select'][0] != 'slider') : ?>

						<?php if (has_post_thumbnail()) : ?>

							<?php the_post_thumbnail(); ?>

						<?php endif; ?>

					<?php else : ?>

						<div class="flexslider">

							<ul class="slides">

								<?php

									$slide_dump = $meta_data['slider-img-1'][0];
									$slide_dump = rtrim($slide_dump);
									$slides = explode(" ", $slide_dump);

									foreach ($slides as $slide) {
										echo '<li><img src="'.$slide.'" alt=""></li>';
									}

								?>

							</ul>

						</div>

					<?php endif; ?>

				</div>

			<?php endif; ?>

			<div class="port-description">

				<?php the_content(); ?>

			</div>

		</div>

		<?php comments_template(); ?>

	</section>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
