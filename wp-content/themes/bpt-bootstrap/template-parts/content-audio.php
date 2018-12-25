<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package bpt-bootstrap
*/
?>

<!-- Single Post With iFrame Video -->
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<!-- Post Image -->
	<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$audio = false;
	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
	}
	if ( '' !== get_the_post_thumbnail() && ! is_single() ){ ?>
		<div class="image">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="gallery-image gallery-audio">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			</a>
		</div><!-- .post-thumbnail -->
	<?php }elseif(!empty( $audio ) && is_single()){
			foreach ( $audio as $audio_html ) {
				echo '<div class="image entry-audio">';
					echo $audio_html;
				echo '</div><!-- .entry-audio -->';
			}
		}
	?>
	<!-- /Post Image -->

	<!-- Post Title -->
	<?php
	if ( !is_singular() ){
		if ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		if ( 'post' === get_post_type() ){?>
		<ul class="list-inline meta">
			<li><?php bptbootstrap_posted_on(); ?></li>
		</ul>
	<?php 
		}
	}
	?>
	<!-- /Post Title -->

	<!-- Post Content -->
	<div class="content">
		<?php
		// If not a single post, highlight the video file.
		if ( !is_single()) {
			the_excerpt();
		}else{
			the_content(/* translators: %s: Name of current post */ sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bpt-bootstrap' ),
				get_the_title()
			) );
		};
		?>
	</div>
	<!-- /Post Content -->

	<?php if(!is_singular()){ ?>
	<!-- Read More Button -->
	<div>
		<a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-theme"><?php esc_html_e('Continue Reading', 'bpt-bootstrap'); ?> <i class="fa fa-fw fa-angle-double-right"></i></a>
	</div>
	<!-- /Read More Button -->
	<?php }?>

</article>
<!-- /Single Post With iFrame Video -->