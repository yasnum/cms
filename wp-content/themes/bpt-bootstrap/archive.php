<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bpt-bootstrap
 */

get_header(); ?>

<section class="section-page-header">
    <div class="container">
        <div class="row">
			<?php if ( have_posts() ){?>
            <!-- Page Title -->
            <div class="col-md-6">
                <?php
                    /* translators: %s: search query. */
                    the_archive_title( '<h1 class="title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </div>
            <!-- /Page Title -->
			<?php }?>
            <!-- Breadcrumbs -->
            <div class="col-md-6">
                <?php if(function_exists( 'bptbootstrap_breadcrumb') ){bptbootstrap_breadcrumb();} ?>
            </div>
            <!-- /Breadcrumbs -->

        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- Main -->
<main class="main-container">
    <div class="container">
        <div class="row">
            <!-- Blog Content -->
            <div class="col-md-9">
                <!-- Posts List -->
                <div class="posts-list">
                <?php if ( have_posts() ){
                    /* Start the Loop */
                    while ( have_posts() ){the_post();
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content');
                    }
                    
                    the_posts_pagination();

                }else{
                    get_template_part( 'template-parts/content', 'none' );
                }?>
                </div>
                <!-- /Posts List -->
            </div>
            <!-- /Blog Content -->

            <!-- Blog Sidebar -->
            <div class="col-md-3">
                <?php get_sidebar();?>
            </div>
            <!-- /Blog Sidebar -->

        </div>
    </div>
</main>
<!-- /Main -->

<?php
get_footer();
