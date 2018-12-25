<?php
if ( ! function_exists( 'bptbootstrap_comments' ) ){
	function bptbootstrap_comments( $comment, $args, $depth ) {
		global $post;
		$author_id = $post->post_author;

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments. ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'bpt-bootstrap' ); ?></span> <?php comment_author_link(); ?></div>
		<?php
			break;
			default :
			// Proceed with normal comments. ?>
		<li id="li-comment-<?php comment_ID(); ?>">
				<div class="media" id="comment-<?php comment_ID(); ?>" >
				    <div class="media-left">
						<div class="image">
							<?php echo get_avatar( $comment, 60 ); ?>
						</div>
					</div>

				    <div class="media-body">
						<h4 class="author"><?php comment_author_link(); ?></h4>
						<span class="date"><?php echo comment_time().' '.get_comment_date();?></span>

						<div class="text">
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'bpt-bootstrap' ); ?></p>
							<?php endif; ?>
					        <?php comment_text(); ?>
					        <?php comment_reply_link( array_merge( $args, array(
								'reply_text' => __( '<i class="fa fa-reply" aria-hidden="true"></i>reply', 'bpt-bootstrap' ),
								'depth'      => $depth,
								'max_depth'	 => $args['max_depth'] )
							) ); ?>
						</div>
				    </div>
				</div><!-- #comment-## -->
		<?php
			break;
		endswitch; // End comment_type check.
	}
}

// Add placeholder for Name and Email
if ( ! function_exists( 'bptbootstrap_modify_comment_form_fields' ) ){
	function bptbootstrap_modify_comment_form_fields($fields){
		$req = get_option('require_name_email');
		$commenter = wp_get_current_commenter();
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields['author'] = '<div class="row"><div class="form-group col-md-6">' . '<input id="author" class="form-control" placeholder="'.esc_attr__('Your Name', 'bpt-bootstrap').'" name="author" type="text" value="'.esc_attr($commenter['comment_author'], 'bpt-bootstrap').'" size="30"'.$aria_req . '></div>';
	    $fields['email'] = '<div class="form-group col-md-6">' . '<input id="email" class="form-control" placeholder="'.esc_attr__('*your-real-email@example.com', 'bpt-bootstrap').'" name="email" type="text" value="'.esc_attr($commenter['comment_author_email'], 'bpt-bootstrap').'" size="30"' . $aria_req . '></div></div>';
		$fields['url'] = '';
		
	    return $fields;
	}
	add_filter('comment_form_default_fields','bptbootstrap_modify_comment_form_fields');
}

// Unset default input field from comment form
if ( ! function_exists( 'bptbootstrap_crunchify_move_comment_form_below' ) ){
	function bptbootstrap_crunchify_move_comment_form_below( $fields ) { 
	    $comment_field = $fields['comment']; 
	    unset( $fields['comment'] ); 
	    $fields['comment'] = $comment_field; 
	    return $fields; 
	}
	add_filter( 'comment_form_fields', 'bptbootstrap_crunchify_move_comment_form_below' );
}
if ( ! function_exists( 'bptbootstrap_wpsites_modify_comment_form_text_area' ) ){
	function bptbootstrap_wpsites_modify_comment_form_text_area($arg) {
	    $arg['comment_field'] = '<div class="row"><div class="form-group col-md-12"><textarea class="form-control" id="comment" placeholder="'.esc_attr( '*Please type your message here...', 'bpt-bootstrap'  ) .'" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div>';
	    return $arg;
	}
	add_filter('comment_form_defaults', 'bptbootstrap_wpsites_modify_comment_form_text_area');
}

/**
* Remove the original comment button
*/
if ( ! function_exists( 'bptbootstrap_comment_form_submit_button' ) ){
	function bptbootstrap_enpty_btn($button){
		return $button ='';
	}
	add_filter('bptbootstrap_comment_form_submit_button', 'bptbootstrap_enpty_btn');

	function bptbootstrap_comment_form_submit_button($button) {
		$button =
		'<div class="row"><div class="form-group col-md-12"><button type="submit" class="btn btn-theme" id="[args:id_submit]"><i class="fa fa-plus"></i> '.esc_html__( 'Add Comment:', 'bpt-bootstrap' ).'</button></div></div>';
		return $button;
	}
	add_filter('bptbootstrap_comment_form_submit_button', 'bptbootstrap_comment_form_submit_button');
}