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
                    <div class="col-12 col-lg-10 col-xl-8">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('fade-in-up bg-white rounded-3 shadow-sm p-4 p-lg-5'); ?>>
                            
                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="mb-4 mb-lg-5 text-center">
                                    <figure>
                                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded-3 shadow-sm w-100')); ?>
                                        <?php if (get_the_post_thumbnail_caption()) : ?>
                                            <figcaption class="mt-3 text-muted fst-italic small">
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
                                    'before' => '<div class="page-links d-flex flex-wrap gap-2 mt-4 justify-content-center justify-content-lg-start"><span class="me-2 align-self-center">' . esc_html__('Pages:', 'services-pro') . '</span>',
                                    'after'  => '</div>',
                                    'link_before' => '<span class="btn btn-sm btn-outline-accent">',
                                    'link_after'  => '</span>',
                                ));
                                ?>
                            </div>

                            <!-- Page Meta -->
                            <?php if (is_user_logged_in()) : ?>
                                <div class="page-meta mt-4 mt-lg-5 pt-3 pt-lg-4 border-top">
                                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-2">
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>Last updated: <?php echo get_the_modified_date(); ?>
                                        </small>
                                        <?php edit_post_link('<i class="fas fa-edit me-1"></i>Edit Page', '<small class="btn btn-sm btn-outline-secondary">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </article>

                        <!-- Comments -->
                        <?php
                        if (comments_open() || get_comments_number()) :
                            ?>
                            <div class="comments-section mt-4 mt-lg-5 bg-white rounded-3 shadow-sm p-4 p-lg-5">
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
