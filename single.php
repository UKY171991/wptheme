<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Post Banner -->
        <?php echo services_pro_get_banner_section(get_the_title(), get_the_excerpt()); ?>
                                    <i class="fas fa-calendar me-2"></i>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock me-2"></i>
                                    <span><?php echo reading_time(); ?> min read</span>
                                </div>
                                <?php if (comments_open() || get_comments_number()) : ?>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-comments me-2"></i>
                                        <span><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Post Content -->
        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('fade-in-up'); ?>>
                            
                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="mb-5">
                                    <figure class="text-center">
                                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow-sm')); ?>
                                        <?php if (get_the_post_thumbnail_caption()) : ?>
                                            <figcaption class="mt-2 text-muted fst-italic">
                                                <?php echo get_the_post_thumbnail_caption(); ?>
                                            </figcaption>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            <?php endif; ?>

                            <!-- Post Content -->
                            <div class="post-content">
                                <?php
                                the_content(sprintf(
                                    wp_kses(
                                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'services-pro'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    wp_kses_post(get_the_title())
                                ));

                                wp_link_pages(array(
                                    'before' => '<div class="page-links d-flex flex-wrap gap-2 mt-4"><span class="me-2">' . esc_html__('Pages:', 'services-pro') . '</span>',
                                    'after'  => '</div>',
                                    'link_before' => '<span class="btn btn-sm btn-outline-accent">',
                                    'link_after'  => '</span>',
                                ));
                                ?>
                            </div>

                            <!-- Post Tags -->
                            <?php
                            $tags = get_the_tags();
                            if ($tags) : ?>
                                <div class="post-tags mt-5 pt-4 border-top">
                                    <h6 class="mb-3"><i class="fas fa-tags text-accent me-2"></i>Tags:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        <?php foreach ($tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                                               class="badge bg-light text-dark text-decoration-none">
                                                <?php echo esc_html($tag->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Author Bio -->
                            <div class="author-bio mt-5 pt-4 border-top">
                                <div class="d-flex align-items-start">
                                    <div class="me-3">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-circle')); ?>
                                    </div>
                                    <div>
                                        <h6 class="mb-2">About <?php the_author(); ?></h6>
                                        <p class="text-muted mb-0">
                                            <?php 
                                            $author_bio = get_the_author_meta('description');
                                            if ($author_bio) {
                                                echo esc_html($author_bio);
                                            } else {
                                                echo 'Professional content writer and home services expert.';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Post Navigation -->
                        <nav class="post-navigation mt-5 pt-4 border-top" aria-label="Posts">
                            <div class="nav-links d-flex justify-content-between">
                                <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>
                                
                                <?php if ($prev_post) : ?>
                                    <div class="nav-previous">
                                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-chevron-left me-2"></i>
                                                <div>
                                                    <small class="text-muted d-block">Previous Post</small>
                                                    <strong><?php echo esc_html($prev_post->post_title); ?></strong>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($next_post) : ?>
                                    <div class="nav-next text-end">
                                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <small class="text-muted d-block">Next Post</small>
                                                    <strong><?php echo esc_html($next_post->post_title); ?></strong>
                                                </div>
                                                <i class="fas fa-chevron-right ms-2"></i>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </nav>

                        <!-- Comments -->
                        <?php
                        if (comments_open() || get_comments_number()) :
                            ?>
                            <div class="comments-section mt-5 pt-4 border-top">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php
get_footer();

// Helper function for reading time
function reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time;
}
?>
