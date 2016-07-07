<?php
/*
 * Template Name: Portfolio
 */
?>


<?php get_header(); ?>

<section class="page-content animated fadeInUpBig fast port">

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (calm_get_data('port-header')) : ?>

		<div class="page-inner">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

		</div>

	<?php endif; ?>

	<div class="portfolio">

		<?php if (calm_get_data('port-header')) : ?>

			<?php $customPostTaxonomies = get_object_taxonomies('portfolio');

			if (count($customPostTaxonomies) > 0) :

				$catCount = wp_count_terms('port-cat');

				if ($catCount > 0) : ?>

					<div class="port-filter">

						<ul class="filter">

							<li class="current" data-filter="*">All</li>

						    <?php foreach ($customPostTaxonomies as $tax) {

							     $args = array(
						         	  'orderby' => 'name',
							          'show_count' => 0,
						        	  'taxonomy' => 'port-cat',
						        	  'title_li' => '',
						        	  'echo' =>	false
						        	);

							    echo wp_list_categories($args); } ?>

						</ul>

					</div>

				<?php endif; ?>

			<?php endif; ?>

		<?php endif; ?>

			<div class="portfolio-cont">

				<?php

				$port_query = new WP_Query(array(
					'post_type' => 'portfolio',
					'posts_per_page' => '-1',
					'orderby' => 'date',
					'order' => 'ASC')
				);

				if ($port_query->have_posts()) :

					while ($port_query->have_posts()) : $port_query->the_post();

						$meta_data = get_post_meta( get_the_ID() );

						$terms = get_the_terms($post->ID, 'port-cat');

						if ($terms) : $cat = array();

							foreach ($terms as $term) {
								$cat[] = $term->name;
							}

						endif;

						$cat = array_map('strtolower', (array) $cat);
						$list_cats = join( " ", $cat );
						$terms = get_the_term_list( $post->ID, 'port-cat', '', ',  ', '' );
						$terms = strip_tags( $terms );

						?>

						<div class="item <?php echo $list_cats . ' ' . calm_get_data('port_columns'); ?>">

							<div class="img-container">

								<a href="<?php the_permalink(); ?>">

									<?php the_post_thumbnail(); ?>

									<div class="item-info">

										<span class="title"><?php the_title(); ?></span>

										<span class="cats"><?php echo $terms; ?></span>

									</div>

								</a>

							</div>

						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>

	</div>

<?php endwhile; ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
