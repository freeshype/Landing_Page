<?php get_header(); ?>

<!-- MAIN CONTENT -->

<section class="page-content animated fadeInUpBig fast">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('post single') ?>>

			<?php if (has_post_thumbnail()) : ?>

				<div class="post-thumb">

					<?php the_post_thumbnail('blog'); ?>

				</div>

			<?php endif; ?>


			<div class="post-content">

				<div class="post-title">

					<h2><?php the_title(); ?></h2>

				</div>

				<div class="post-cats">

					Posted In: <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'calm' ) ); ?>

				</div>

				<?php the_content(); ?>

				<?php

				wp_link_pages( array(

						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'calm' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',

					) );

				?>

				<?php the_tags('<ul class="tags"><li>','</li>, <li>','</li></ul>'); ?>

				<div class="post-meta">

					<div class="author">

						<span class="posted">Posted on <?php echo get_the_date('F jS, Y'); ?> by</span>

						<span class="name"><?php the_author_link(); ?></span>

					</div>

				</div>

				<div class="post-nav">

					<?php previous_post_link('%link', 'Next >>'); ?>

					<?php next_post_link('%link', '<< Previous'); ?>

				</div>

				<div class="clearfix"></div>

			</div>

		</article>

		<?php comments_template(); ?>

	<?php endwhile; ?>

</section>

<?php get_footer(); ?>
