<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bpt-bootstrap
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<!-- Additional -->
<div class="row information">

	<div class="col-sm-12">
		<div class="tags">
			<?php
				$posttags = get_the_tags();
				if ($posttags) {
				  foreach($posttags as $tag) {
				    echo '<a class="tag" href="'.esc_url(get_tag_link($tag->term_id)).'">'.esc_html($tag->name).'</a>'; 
				  }
				}
			?>
		</div>
	</div>
</div>
<!-- /Additional -->

<div class="widget">

<h4 class="title"><?php esc_html_e('Recent Comments', 'bpt-bootstrap'); ?></h4>

<?php if ( have_comments() ){?>

<p class="text">
	<?php 
	the_comments_navigation();
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ){?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bpt-bootstrap' ); ?></p>
	<?php }?>
</p>
<ul class="comments">
<?php
	wp_list_comments( array(
		'callback' => 'bptbootstrap_comments'
	) );
?>
</ul>

<?php }?>

	<div class="send-comment"><?php comment_form();?></div>

</div>