<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to pixels_comment which is
 * located in the functions.php file.
 */
?>
<?php
	// You can start editing here -- including this comment!
?>
<section id="commentlist-wrap">
	<a name="comments"></a>	

<?php if ( have_comments() ) : ?>		
	<h4 class="comm-head"> <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> on &quot;<?php the_title();?>&quot;</h4>
	<ol class="commentlist">
		<?php
			/* Loop through and list the comments. Tell wp_list_comments()
			 * to use pixels_comment() to format the comments.
			 * If you want to overload this in a child theme then you can
			 * define pixels_comment() and that will be used instead.
			 * See pixels_comment() in twentyten/functions.php for more.
			 */
			wp_list_comments( array( 'callback' => 'pixels_comment' ) );
		?>
	</ol>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
         <!-- If comments are open, but there are no comments. -->

        <?php else : // if comments are closed output text on posts only ?>
		<?php if (is_single()) { ?>
		<p class="nocomments"><?php _e('Comments are closed.') ?></p>
	<?php } endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>
</section><!-- /commentlist-wrap -->

<?php if ( comments_open() ) : ?>
	<h4 class="comm-head">Add A Comment</h4>
	<section id="comment-form-wrap" class="clearfix">
	<?php
		$new_fields =  array( // just to move the * inside of label for labels inside inputs 
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name <span class="required">*</span>' ) . '</label> ' .
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email <span class="required">*</span>' ) . '</label> ' .
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
						'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);
		$commentargs = array(
			'fields' => apply_filters( 'comment_form_default_fields', $new_fields ),
			'title_reply'=>'',
			'comment_notes_before' => '<p class="comment-notes">Join the discussion. Do not worry, your email address will not be published.</p>',
			'comment_notes_after' => ''
		);
		comment_form($commentargs);
	?>
	</section><!-- /comment-form-wrap -->
<?php endif; // ending if open ?>