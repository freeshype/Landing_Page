<?php
/**
 * @package Gadget
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()) : ?>

    	<div class="post-thumb">
    		<?php the_post_thumbnail('blog'); ?>
    	</div>

	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="posted-on">
			<?php the_time('F jS, Y') ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gadget' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gadget_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
