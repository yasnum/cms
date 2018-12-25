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
	<?php if ( has_post_thumbnail() ) {?>
	<!-- Post Image -->
	<div class="image">
		<a href="<?php the_post_thumbnail_url(); ?>" class="image-popup">
			<div class="gallery-image">
				<img src="<?php the_post_thumbnail_url('large'); ?>">
			</div>
		</a>
	</div>
	<!-- /Post Image -->
	<?php }?>
	<!-- Post Title -->
	<?php
	if ( is_singular() ){
		the_title( '<h2 class="title">', '</h2>' );
	}else{
		the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}
	?>
	<!-- /Post Title -->
	<?php if ( 'post' === get_post_type() ){?>
		<!-- Post Metadata -->
		<ul class="list-inline meta">
			<li><?php bptbootstrap_posted_on(); ?></li>
		</ul>
	<!-- /Post Metadata -->
	<?php }?>
	<!-- Post Content -->
	<div class="content">
		<?php
			if( !is_singular() ){
				the_excerpt();
			}else{
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bpt-bootstrap' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
		?>

	</div>
	<!-- /Post Content -->
	<?php if(!is_singular()){ ?>
	<!-- Read More Button -->
	<div>
		<a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-theme"><?php esc_html_e('Continue Reading', 'bpt-bootstrap'); ?>  <i class="fa fa-fw fa-angle-double-right"></i></a>
	</div>
	<!-- /Read More Button -->
	<?php }?>
</article>
<!-- /Single Post With Image -->