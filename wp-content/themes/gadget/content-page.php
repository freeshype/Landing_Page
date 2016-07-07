<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Gadget
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumb">
		<?php the_post_thumbnail('blog'); ?>
	</div>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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

	<?php edit_post_link( __( 'Edit', 'gadget' ), '<span class="edit-link">', '</span>' ); ?>

	<div class="clearfix"></div>
</article><!-- #post-## -->
