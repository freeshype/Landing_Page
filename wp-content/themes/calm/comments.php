<?php if ( comments_open() ) : ?>

<aside class="post-aside">

	<div class="comments-container" id="comments">

		<h3><?php
	printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'calm' ),
		number_format_i18n( get_comments_number() ));
?></h3>

		<ul class="comment-list">

			<?php wp_list_comments("callback=calm_comments");  ?>

		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'calm' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'calm' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'calm' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<div id="respond"></div>

	</div>

	<div class="comment-form-cont comment-respond">

		<?php

		$comment_args = array(
			'comment_notes_before' => false,
			'comment_notes_after' => false,
			'id_submit' => 'submit',
			'comment_field' =>  '<p class="comment-form-comment"><label>' . __( 'Comment', 'calm' ) . '</label><textarea id="comment" name="comment" aria-required="true" cols="30" rows="10">' .
	    '</textarea></p>',
		);

	 comment_form($comment_args);

	 ?>

	</div>

</aside>

<?php endif; ?>
