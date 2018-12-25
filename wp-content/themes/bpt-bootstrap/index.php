<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bpt-bootstrap
 */

get_header(); ?>

<!-- Main -->
<main class="main-container home-container">
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
                        get_template_part( 'template-parts/content', get_post_format());
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
