<?php if (greek_restaurant_has_active_footer() != false): ?>
    <footer id="kt-footer">
        <?php

        $greek_restaurant_footer_info = greek_restaurant_has_active_footer();
        $greek_restaurant_footer_class = $greek_restaurant_footer_info['class'];
        $greek_restaurant_sidebars_count = $greek_restaurant_footer_info['sidebars_count'];
        ?>
        <div class="container">
            <div class="row">
                <div id="kt-footer-area">
                    <?php for ($i = 1; $i < $greek_restaurant_sidebars_count + 1; $i++): ?>

                        <div
                            class="<?php echo $greek_restaurant_footer_class; ?> kt-footer-sidebar">
                            <?php if (!dynamic_sidebar('greek_restaurant_footer_' . $i . '_sidebar'))
                                : ?>
                                <div class="pre-widget">

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

    </footer>
<?php endif; // if which checks active footer sidebars ?>
<section id="kt-copyright">
    <div class="container">
        <div class="row">

            <?php if (has_nav_menu('footer')): ?>
                <div class="col-md-12">
                    <?php
                    $greek_restaurant_menu_args = array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_id' => 'kt-footer-navigation');
                    wp_nav_menu($greek_restaurant_menu_args);
                    ?>

                </div>
            <?php endif; ?>

            <div class="col-md-12">


                <div class="col-md-12 text-center">

                    <p>
                        <a rel="nofollow" href="<?php echo esc_url(__(
                            'http://ketchupthemes.com/greek-restaurant-theme/', 'greek-restaurant')); ?>">
                            <small><?php printf(__('Greek Restaurant Theme', 'greek-restaurant'));
                                ?></small>
                        </a>,
                        <small><?php echo __('&copy;', 'greek-restaurant') . date('Y'); ?></small>
                        <small><?php bloginfo('name'); ?></small>

                    </p>
                </div>


            </div>
        </div>
</section>
<?php wp_footer(); ?>
</body>
</html>