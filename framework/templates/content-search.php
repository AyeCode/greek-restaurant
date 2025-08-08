<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">

    <main class="kt-entry-content kt-search-list clearfix">

        <?php if (have_posts()):while (have_posts()):the_post(); ?>

            <div class="col-md-6 matchHeight">
                <div class="kt-blog-post">
                    <?php if (has_post_thumbnail()): ?>

                        <div class="kt-blog-post-image">

                            <a href="<?php the_permalink(); ?>"
                               title="<?php the_title_attribute(); ?>">
                                <figure>
                                    <?php
                                    the_post_thumbnail('blog-image', array('class' => 'img-responsive kt-featured-img', 'alt' => get_the_title()));
                                    ?>
                                </figure>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="kt-blog-list-body">

                        <h2 class="h1">
                            <a class="kt-article-title" href="<?php
                            the_permalink(); ?>"
                               title="<?php the_title_attribute(); ?>"> <?php
                                the_title();
                                ?>
                            </a>
                        </h2>

                        <div class="kt-post-meta blog-list-meta clearfix">
                            <p class="meta-comments">
                                <i class="fa fa-comment"></i> <a href="<?php
                                the_permalink(); ?>#comments"><?php
                                    echo
                                    comments_number(__('No comments',
                                        'greek-restaurant'), __('1 Comment', 'greek-restaurant'), __('% Comments',
                                        'greek-restaurant')); ?></a>


                                <i class="fa fa-tags"></i> <?php echo get_the_category_list(',', ''); ?>

                            </p>

                            <p class="meta-author">
                                <?php _e('Posted by ', 'greek-restaurant') . the_author(); ?>
                                | <?php echo get_the_date(get_option
                                ('date_format')); ?>
                            </p>

                        </div>
                        <a class="blog-list-read-more" href="<?php the_permalink(); ?>"
                           title="<?php
                           the_title_attribute();
                           ?>"><?php _e('READ MORE', 'greek-restaurant'); ?></a>
                    </div>

                </div>
            </div>

            <!--kt-blog-post ends here -->
        <?php endwhile;
        else: echo 'No posts';
        endif;

        ?>
    </main>


    <div class="clearfix"></div>
    <div id="kt-pagination">

        <?php
        if (function_exists('greek_restaurant_custom_pagination')) {
            greek_restaurant_custom_pagination("", "", $paged);
        }
        ?>

    </div>

</section>
