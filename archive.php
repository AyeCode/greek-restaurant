<?php
get_header(); ?>

    <header id="kt-page-header-simple" class="text-center">

        <h1 class="kt-post-entry-title kt-category-title">
            <?php if (is_year()):
                echo __('Archive for: ', 'greek-restaurant') . get_the_time('Y');
            elseif (is_month()):
                echo __('Archive for ', 'greek-restaurant') . get_the_time('F, Y');
            elseif (is_day()):
                echo __('Archive for ', 'greek-restaurant') . get_the_time('F jS, Y');
            endif;
            ?>

            <?php if ($paged > 1):
                echo
                    '<small>' . __('   Page:
', 'greek-restaurant') . $paged
                    . '</small>'; endif; ?>
        </h1><!-- .entry-title -->
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <section id="kt-primary">

                    <div id="kt-content" class="clearfix">

                        <?php get_template_part('framework/templates/content-archive'); ?>

                    </div>

                </section>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <aside id="kt-sidebar" style="margin-top:50px">
                    <?php if (!dynamic_sidebar('sidebar')): ?>
                        <div class="pre-widget">

                        </div>
                    <?php endif; ?>
                </aside>
            </div>

        </div>
    </div>
    <!-- primary-page content ends here -->
<?php
get_footer();