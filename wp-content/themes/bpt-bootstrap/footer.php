<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bpt-bootstrap
 */

?>
<!-- Footer -->
<footer class="footer section-small">
    <div class="container">
        <div class="row">
            <?php
            if ( is_active_sidebar( 'sidebar-2' ) ) {
                dynamic_sidebar( 'sidebar-2' );
            }
            ?>

            <!-- Copyright -->
            <div class="clearfix"></div>
            <hr>
            <p class="copyright">
                <a href="<?php echo esc_url( __('https://wordpress.org/', 'bpt-bootstrap')); ?>"><?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Proudly powered by %s', 'bpt-bootstrap' ), 'WordPress' );
                ?></a>
                <span class="sep"> | </span>
                 <?php printf(  /* translators: %s: wp-bootstrap */ esc_html__('Theme: %1$s by %2$s.', 'bpt-bootstrap'), 'bpt-bootstrap', '<a href="'.esc_url( __('http://www.buyprotheme.com', 'bpt-bootstrap')).'" target="_blank">'.esc_html__('BuyProTheme', 'bpt-bootstrap').'</a>' ); ?>
        </p>
            <!-- /Copyright -->
        </div>
    </div>
</footer>
<!-- /Footer -->

<!-- Scroll To Top -->
<div id="scroll-to-top" class="scroll-to-top">
    <i class="icon fa fa-angle-up"></i>
</div>
<!-- /Scroll To Top -->

<?php wp_footer(); ?>
</body>
</html>