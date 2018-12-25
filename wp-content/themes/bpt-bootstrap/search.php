<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bpt-bootstrap
 */

get_header(); ?>

<!-- Section: Page Header -->
<section class="section-page-header">
    <div class="container">
        <div class="row">
			
            <!-- Page Title -->
            <div class="col-md-6">
                <?php if ( have_posts() ){?>
                <h1 class="title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'bpt-bootstrap' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
                <?php }else{?>
                    <h1 class="title"><?php esc_html_e( 'Nothing Found', 'bpt-bootstrap' ); ?></h1>
                <?php }?>
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
			<?php
				if ( have_posts() ){
					/* Start the Loop */
					while ( have_posts() ){the_post();

						/**
						* Run the loop for the search to output the results.
						* If you want to overload this in a child theme then include a file
						* called content-search.php and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'search' );
					}
                    
                    the_posts_pagination();

				}else{
					get_template_part( 'template-parts/content', 'none' );
				}
			?>

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
<!-- /main -->

<?php
get_footer();
