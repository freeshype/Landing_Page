<?php
/**
 * The template for displaying Categories, share box, tags.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

 ?>

<div class="clear"></div>
<div class="entry-single-footer clearfix">

	<?php if (has_tag()) : ?>

	<div class="post-tags">

		<p><?php the_tags(__('Tagged: ', 'framework'), ', '); ?></p>

	</div>

	<?php endif; ?>

	<?php if(get_option('accio_social_sharing') == 'true') : ?>

	<div class="share-box">

		<a href="#" class="button-main toggle share-button"><?php _e('Share', 'framework'); ?></a>

		<div class="social-icons">

			<?php if(get_option('accio_share_facebook') == 'true') : ?>
			<a target="_blank" class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="icon-facebook"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_twitter') == 'true') : ?>
			<a target="_blank" class="twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>"><i class="icon-twitter"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_pinterest') == 'true') : ?>
			<a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>"><i class="icon-pinterest"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_google_plus') == 'true') : ?>
			<a target="_blank" class="google-plus" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><i class="icon-google-plus"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_linkedin') == 'true') : ?>
			<a target="_blank" class="linkedin" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><i class="icon-linkedin"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_tumblr') == 'true') : ?>
			<a target="_blank" class="tumblr" href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>"><i class="icon-tumblr"></i></a>
			<?php endif; ?>

			<?php if(get_option('accio_share_email') == 'true') : ?>
			<a target="_blank" class="mail" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><i class="icon-envelope-alt"></i></a>
			<?php endif; ?>

		</div>

	</div>

	<?php endif; ?>

</div>
