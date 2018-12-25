<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bpt-bootstrap
 */

get_header(); ?>

<section class="section-page-header">
    <div class="container">
        <div class="row">
            <!-- Page Title -->
            <div class="col-md-6">
            <?php the_title( '<h1 class="title entry-title">', '</h1>' ); ?>
            </div>
            <!-- /Page Title -->
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

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page');

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
