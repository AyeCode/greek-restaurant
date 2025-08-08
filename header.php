<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php if (get_theme_mod('greek_favicon_upload', '') != ''): ?>
        <link rel="icon"
              href="<?php if (get_theme_mod('greek_favicon_upload', '') != ''): echo esc_url
              (get_theme_mod('greek_favicon_upload', '')); endif; ?> "
              type="image/x-icon">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site-loader"></div>
<header id="masthead" class="site-header clearfix">
    <!-- header area -->
    <div id="kt-header-area">
        <div class="container">
            <div class="row" id="kt-logo-area">

                <div class="col-md-12">
                    <div id="kt-logo-container">
                        <?php echo greek_restaurant_get_logo2(); ?>
                    </div>
                </div>
            </div>
            <!-- #kt-logo-area ends here -->
        </div>

        <nav role="navigation" class="clearfix"
             id="kt-main-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $greek_restaurant_walker = new Greek_Menu_With_Description();
                        $greek_restaurant_menu_args = array(
                            'theme_location' => 'main',
                            'fallback_cb' => 'greek_restaurant_fallback_menu',
                            'container' => false,
                            'menu_id' => 'kt-navigation',
                            'echo' => true,
                            'walker' => $greek_restaurant_walker);
                        wp_nav_menu($greek_restaurant_menu_args);
                        ?>
                    </div>
                </div>

            </div>

        </nav>

    </div>

    <?php
    if (greek_restaurant_get_header_image() != false && is_front_page() ): ?>

        <div id="greek_restaurant_header_area">
            <?php echo greek_restaurant_get_header_image(); ?>
        </div>

    <?php endif; ?>
    <!-- header image ends here -->

</header>
<!-- Header ends -->