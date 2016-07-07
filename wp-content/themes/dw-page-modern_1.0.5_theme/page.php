<?php get_header(); ?>

<div id="main">
	<div class="container">
		<div class="section">
			<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
					<header class="page-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
