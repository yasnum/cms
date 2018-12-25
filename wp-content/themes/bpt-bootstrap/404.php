<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bpt-bootstrap
 */

get_header(); ?>

<section class="section-page-header">
    <div class="container">
        <div class="row">
            <!-- Breadcrumbs -->
            <div class="col-md-6 pull-right text-right">
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
            <div class="full-wh full-wh-404">

                <div class="text-center page-404">

                    <h1 class="bounceIn wow" data-wow-duration="1.5s"><?php esc_html_e( 'Oooops!', 'bpt-bootstrap' ); ?></h1>
                    <h2><?php esc_html_e( '404 Not Found', 'bpt-bootstrap' ); ?></h2>
                    <h3><?php esc_html_e( 'We\'re sorry, there\'s nothing in here :-(', 'bpt-bootstrap' ); ?></h3>

                    <div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-theme"><?php esc_html_e( 'Back to home', 'bpt-bootstrap' ); ?></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
<!-- /Main -->

<?php
get_footer();
