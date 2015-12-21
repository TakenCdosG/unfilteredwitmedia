<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Founder Parent
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

?>

<div class="box-comments">
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<ul>
		<?php wp_list_comments( array( 'callback' => 'founder_parent_comment' ) ); ?>
	</ul>
	
	<div class="pagination">
	<?php paginate_comments_links(); ?>
	</div>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	
	<p>Comments are closed</p>
	
	<?php endif; ?>

	<?php if ( is_user_logged_in() ) : ?>
 
   	<?php $comments_args = array(
        // change the title of send button 
        'label_submit'=>'Post Comment',
        // change the title of the reply section
        'title_reply'=>'Leave a reply',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        'comment_field' => '<textarea placeholder="Comments" name="comment" cols="45" rows="8"></textarea>'
	);

	comment_form($comments_args); ?>

	</div><!-- #comments -->

    <?php else: ?>

	<?php $comments_args = array(
        // change the title of send button 
        'label_submit'=>'Post Comment',
        // change the title of the reply section
        'title_reply'=>'Leave a reply',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        'comment_field' => '<textarea id="comment" placeholder="Comments" name="comment" cols="45" rows="8"></textarea>'
);

comment_form($comments_args); ?>

</div><!-- #comments -->

<?php endif; ?>
