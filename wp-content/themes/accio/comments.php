<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) : ?>
	<div class="comments-disabled"><span><i class="icon-lock"></i></span><p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'framework'); ?></p></div>
<?php return; endif;


// Display the comments + Pings


	if ( have_comments() ) : // if there are comments ?>

    <div id="comments" class="clearfix">

	    <h4 id="comments-number"><?php comments_number(__('No Comments', 'framework'), __('One Comment', 'framework'), __('% Comments', 'framework')); ?></h4>

	    <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>

		<ol class="commentlist">
	    <?php
			wp_list_comments( array(
				'type'        => 'comment',
				'style'       => 'ul',
				'callback' => 'accio_comment'
			) );
			?>
	    </ol>

	    <?php endif; ?>

	    <!-- this is pings -->

	    <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>

		<h4 id="pings"><?php _e('Trackbacks for this post', 'framework') ?></h3>

		<ol class="pinglist">
	    <?php wp_list_comments('type=pings&callback=accio_list_pings'); ?>
	    </ol>

	    <?php endif; /* end of pings */ ?>

	    <!-- START .comments-navigation- -->

		<div class="comments-navigation clearfix">
			<div class="alignleft"><?php previous_comments_link(__('&larr; Previous', 'framework')); ?></div>
			<div class="alignright"><?php next_comments_link(__('Next &rarr;', 'framework')); ?></div>
		</div>

		<!-- END .comments-navigation -->

	</div>

	<?php // Deals with no comments or closed comments

	if ('closed' == $post->comment_status) : // if the post has comments but comments are now closed ?>

	<div class="comments-disabled"><span><i class="icon-ban-circle"></i></span><p class="nocomments"><?php _e('Comments are now closed for this article.', 'framework'); ?></p></div>

	<?php endif; ?>

	<?php else :  ?>

    <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>

    <div class="comments-disabled"><span><i class="icon-exclamation-sign"></i></span><p class="nocomments"><?php _e('No Comments so far.', 'framework'); ?></p></div>

    <?php else : // if comments are closed ?>

	<?php if (is_single()) : ?>
		<div class="comments-disabled"><span><i class="icon-ban-circle"></i></span><p class="nocomments"><?php _e('Comments are closed.', 'framework'); ?></p></div>
	<?php endif; ?>

    <?php endif; ?>

<?php endif;



// Comment Form

	if ( comments_open() ) :

		$fields = array(
			'comment-field' => '<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" aria-required="true"></textarea></p>',
			'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'framework' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'framework' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'comment_notes_before' => '<p class="comment-notes light-font">'. get_option('accio_respond_desc').'</p>',
		    'comment_notes_after' => '',
		    'title_reply' => __('Leave a Reply', 'framework'),
		    'title_reply_to' => __('Leave a Reply to %s', 'framework'),
		    'cancel_reply_link' => __('Cancel Reply', 'framework'),
		    'label_submit' => __('Post Comment', 'framework')
		);

		comment_form($fields);

	endif; // If registration required and not logged in ?>



