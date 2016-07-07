<?php get_header(); ?>

<!-- MAIN CONTENT -->

<section class="page-content animated bounceIn fast">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('post') ?>>

				<?php $format = post_format_icon();

					if (!$format == false) :

				?>

					<div class="post-format"><i class="icon-<?php echo post_format_icon(); ?>"></i></div>

				<?php endif; ?>

				<?php if (has_post_thumbnail()) : ?>

					<div class="post-thumb">

						<?php the_post_thumbnail('blog'); ?>

					</div>

				<?php endif; ?>


				<div class="post-content">

					<div class="post-title">

						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					</div>

					<?php the_excerpt(); ?>

					<a href="<?php the_permalink(); ?>" class="button read-more">Read More</a>

					<div class="post-meta">

						<span class="info">Posted on <?php echo get_the_date('F jS, Y'); ?> by <?php the_author_link(); ?></span>

						<span class="comments"><i class="icon-bubble"></i><?php comments_popup_link( '0 Comments', '1 Comment', '% Comments'); ?></span>

					</div>

				</div>

			</article>

		<?php endwhile; ?>

		<div class="page-inner">

			<div class="posts-nav">

				<?php

					if ( get_previous_posts_link() ) {

						previous_posts_link( __( '<', 'calm' ) );

					}

					$big = 999999999;

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_next'    => false,
						'type' => 'list'
					) );

					if ( get_next_posts_link() ) {

						next_posts_link( __( '>', 'calm' ) );

					}

				?>
			</div>

		</div>

	<?php else : ?>

		<div class="page-inner">

			<h6>No results found. Please search for something else.</h6>

		</div>

	<?php endif; ?>

</section>

<?php get_footer(); ?>
