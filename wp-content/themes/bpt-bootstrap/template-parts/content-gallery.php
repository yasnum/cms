<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package bpt-bootstrap
*/
?>

<!-- Single Post With Image -->
<article class="blog-post" id="post-<?php the_ID(); ?>">
<?php
if ( get_post_gallery() ) {
	echo '<div class="entry-gallery project-carousel owl-carousel owl-theme">';
	$gallery = get_post_gallery( get_the_ID(), false );
	/* Loop through all the image and output them one by one */
	?>
	<!-- Post Image -->
	<?php if ( has_post_thumbnail() ) {?>
		<div class="item">
			<a href="<?php the_post_thumbnail_url('large'); ?>" class="image-popup">
				<div class="gallery-image">
					<img src="<?php the_post_thumbnail_url('large'); ?>">
				</div>
			</a>
		</div>
	<?php } ?>
	<!-- /Post Image -->
	<?php
	foreach( $gallery['src'] as $src ){?>
		<div class="item">
			<a href="<?php echo esc_url($src);?>" class="image-popup">
				<div class="gallery-image">
					<img src="<?php echo esc_url($src);?>">
				</div>
			</a>
		</div>
	<?php
	}
	echo '</div>';
};
?>
	<!-- Post Title -->
	<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>
	<!-- /Post Title -->

	<!-- /Post Title -->
	<?php if ( 'post' === get_post_type() ){?>
		<!-- Post Metadata -->
		<ul class="list-inline meta">
			<li><?php bptbootstrap_posted_on(); ?></li>
		</ul>
	<!-- /Post Metadata -->
	<?php }?>
	<!-- /Post Metadata -->

	<!-- Post Content -->
	<div class="content">
		<?php
		if ( is_single() || ! get_post_gallery() ) {
			
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
<!-- /Single Post With Image -->