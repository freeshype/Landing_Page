<?php
/**
 * @package Gadget
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()) : ?>

    	<div class="post-thumb">
    		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog'); ?></a>
    	</div>

	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="posted-on">
				<?php the_time('F jS, Y') ?>
			</div>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gadget' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'gadget' ), __( '1 Comment', 'gadget' ), __( '% Comments', 'gadget' ) );
			echo '</span>';
		}

	 	?>

	 	<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
	 	<span class="posted-by"><?php printf(__('Posted by:', 'gadget')); ?>  <span><?php the_author_link(); ?></span></span>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
