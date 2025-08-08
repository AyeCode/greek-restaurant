<?php
get_header(); ?>

    <header id="kt-page-header-simple"   class="text-center">


    <h1 class="kt-post-entry-title kt-search-title">
        <?php echo esc_html( wp_sprintf( __( 'Search results for the term: %s', 'greek-restaurant' ), get_search_query( false ) ) ); ?>
        <?php if($paged > 1):
            echo
                '<small>'.__('   Page:
').$paged
                .'</small>'; endif; ?>
    </h1><!-- .entry-title -->
    </header>

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <section id="kt-primary">

                <div id="kt-content" class="clearfix">

                    <?php get_template_part('framework/templates/content-search'); ?>

                </div>

            </section>
            <?php do_action( 'after_main_content' ); ?>
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
    <!-- primary-page content ends here -->
</div>
<?php
get_footer();