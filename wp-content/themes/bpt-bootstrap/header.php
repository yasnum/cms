<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bpt-bootstrap
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Header -->
<header id="home" class="header">

    <!-- Navigation -->
    <nav id="navigation" class="navbar affix">

        <!-- Company Information -->
        <div class="information hidden-sm hidden-xs">
            <div class="container">
                <div class="row">

                    <!-- Feedback -->
                    <div class="col-md-7">
                        <?php if(get_theme_mod( 'h_skype')!=''){?>
                        <a href="skype:<?php echo esc_attr(get_theme_mod( 'h_skype', 'Skype' )); ?>?voicemail"><span class="icon social_skype"></span> <?php echo esc_html(get_theme_mod( 'h_skype', 'Skype' )); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod( 'h_email')!=''){?>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod( 'h_email', 'Email' )); ?>"><span class="icon icon_mail_alt"></span> <?php echo esc_html(get_theme_mod( 'h_email', 'Email' )); ?></a>
                        <?php }?>
                        <?php if(get_theme_mod( 'h_mob')!=''){?>
                        <a href="tel:<?php echo esc_attr(get_theme_mod( 'h_mob', 'Phone Number' )); ?>"><span class="icon icon_phone"></span> <?php echo esc_html(get_theme_mod( 'h_mob', 'Phone Number' )); ?></a>
                        <?php }?>
                    </div>
                    <!-- /Feedback -->

                    <!-- Social -->
                    <div class="col-md-5">
                        <ul class="social">
                        <?php if(get_theme_mod( 'fb_link')!=''){?>
                            <li><a href="<?php echo esc_url(get_theme_mod('fb_link', 'default'));?>" class="fa fa-fw fa-facebook" target="_blank"></a></li>
                            <?php }?>
                        <?php if(get_theme_mod( 'tw_link')!=''){?>
                            <li><a href="<?php echo esc_url(get_theme_mod('tw_link', 'default'));?>" class="fa fa-fw fa-twitter" target="_blank"></a></li>
                            <?php }?>
                        <?php if(get_theme_mod( 'google_plus')!=''){?>
                            <li><a href="<?php echo esc_url(get_theme_mod('google_plus', 'default'));?>" class="fa fa-fw fa-google-plus" target="_blank"></a></li>
                            <?php }?>
                        <?php if(get_theme_mod( 'dribbble')!=''){?>
                            <li><a href="<?php echo esc_url(get_theme_mod('dribbble', 'default'));?>" class="fa fa-fw fa-dribbble" target="_blank"></a></li>
                            <?php }?>
                        <?php if(get_theme_mod( 'pinterest')!=''){?>
                            <li><a href="<?php echo esc_url(get_theme_mod('pinterest', 'default'));?>" class="fa fa-fw fa-pinterest" target="_blank"></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <!-- /Social -->

                </div>
            </div>
        </div>
        <!-- /Company Information -->

        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <!-- Navigation Header -->
                    <div class="navbar-header">

                        <!-- Toggle Button -->
                        <button type="button"
                                class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#main-menu"
                                aria-expanded="false"
                                aria-controls="main-menu">

                            <span class="sr-only"><?php esc_html_e('Toggle Navigation', 'bpt-bootstrap'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>
                        <!-- /Toggle Button -->
                        <!-- Brand -->
                            <?php
                            if (has_custom_logo()) {
                                 the_custom_logo();
                            } else { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand"> 
                                    <h1 class='logo_text'><?php bloginfo( 'name' ) ?></h1>
                                    <?php
                                    $description = get_bloginfo( 'description' );
                                    if ( $description ) {
                                        echo  '<p class="site-description">' . esc_html( $description ) . '</p>' ;
                                    }
                                echo "</a>";
                            }
                            ?>
                       
                        <!-- /Brand -->

                    </div>
                    <!-- /Navigation Header -->

                    <!-- Navigation -->
                    <div id="main-menu" class="navbar-collapse collapse">
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'menu-1',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => '',
                                'container_id'      => 'bs-example-navbar-collapse-1',
                                'menu_class'        => 'nav navbar-nav navbar-right',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker())
                            );
                        ?>
                    </div>
                    <!-- /Navigation -->

                </div>
            </div>

        </div>
    </nav>
    <!-- /Navigation -->
</header>
<!-- /Header -->

<?php
if (is_front_page()) {
    if ( is_active_sidebar( 'sidebar-home-slider' ) ) {
        dynamic_sidebar( 'sidebar-home-slider' );
    }
}
?>