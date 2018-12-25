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


<section class="section-page-header">
    <div class="container">
        <div class="row">
            <!-- Breadcrumbs -->
            <div class="col-md-12 pull-right">
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

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

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
