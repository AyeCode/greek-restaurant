<?php
get_header();
?>
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <main id="kt-primary">

                    <div id="kt-content" class="clearfix">

                        <?php get_template_part('framework/templates/content-blog-page'); ?>

                    </div>

                </main>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>

        </div>
        <!-- primary-page content ends here -->
    </div>

<?php
get_footer();