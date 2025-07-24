<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <!-- Page Banner -->
        <?php echo services_pro_get_banner_section(get_the_title(), get_the_excerpt()); ?>

        <!-- Page Content -->
        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('fade-in-up'); ?>>
                            
                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="mb-5 text-center">
                                    <figure>
                                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow-sm')); ?>
                                        <?php if (get_the_post_thumbnail_caption()) : ?>
                                            <figcaption class="mt-2 text-muted fst-italic">
                                                <?php echo get_the_post_thumbnail_caption(); ?>
                                            </figcaption>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            <?php endif; ?>

                            <!-- Page Content -->
                            <div class="page-content">
                                <?php
                                the_content();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links d-flex flex-wrap gap-2 mt-4"><span class="me-2">' . esc_html__('Pages:', 'services-pro') . '</span>',
                                    'after'  => '</div>',
                                    'link_before' => '<span class="btn btn-sm btn-outline-accent">',
                                    'link_after'  => '</span>',
                                ));
                                ?>
                            </div>

                            <!-- Page Meta -->
                            <?php if (is_user_logged_in()) : ?>
                                <div class="page-meta mt-5 pt-4 border-top">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            Last updated: <?php echo get_the_modified_date(); ?>
                                        </small>
                                        <?php edit_post_link('Edit Page', '<small class="text-muted">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </article>

                        <!-- Comments -->
                        <?php
                        if (comments_open() || get_comments_number()) :
                            ?>
                            <div class="comments-section mt-5 pt-4 border-top">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
