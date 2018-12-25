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
<article class="blog-post" id="post-<?php the_ID(); ?>">

	<!-- /Post Title -->
	<?php if ( is_singular() ){
		the_title( '<h2 class="title">', '</h2>' );
	?>
	<!-- Post Metadata -->
	<?php if ( 'post' === get_post_type() ){?>
		<ul class="list-inline meta">
			<li><?php bptbootstrap_posted_on(); ?></li>
		</ul>
	<?php }}?>
	<!-- /Post Metadata -->	

	<!-- Post Image -->
	<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$video = false;
	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}
	if ( '' !== get_the_post_thumbnail() && ! is_single() ){ ?>
		<div class="image">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="gallery-image gallery-video">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			</a>
		</div><!-- .post-thumbnail -->
	<?php 
		}elseif(''== get_the_post_thumbnail() && !empty( $video ) && ! is_single()){
			echo '<div class="image">';
				echo $video[0];
			echo '</div>';
		}
	?>
	<!-- /Post Image -->

	<!-- Post Title -->
	<?php if ( !is_singular() ){
		the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
	<!-- /Post Title -->
	<!-- Post Metadata -->
	<?php if ( 'post' === get_post_type() ){?>
		<ul class="list-inline meta">
			<li><?php bptbootstrap_posted_on(); ?></li>
		</ul>
	<?php }}?>
	<!-- /Post Metadata -->

	<!-- Post Content -->
	<div class="content">
		<?php
		if ( !is_single()) {
			the_excerpt();
		}else{
			the_content( sprintf(
				/* translators:straing */
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