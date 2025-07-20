<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Blueprint
 */

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            if (have_posts()) :
                ?>
                <header class="page-header mb-4">
                    <?php
                    if (is_home() && !is_front_page()) :
                        ?>
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                        <?php
                    elseif (is_search()) :
                        ?>
                        <h1 class="page-title">
                            <?php
                            printf(
                                /* translators: %s: search query. */
                                esc_html__('Search Results for: %s', 'blueprint'),
                                '<span>' . get_search_query() . '</span>'
                            );
                            ?>
                        </h1>
                        <?php
                    elseif (is_archive()) :
                        ?>
                        <h1 class="page-title"><?php the_archive_title(); ?></h1>
                        <?php
                        the_archive_description('<div class="archive-description">', '</div>');
                    endif;
                    ?>
                </header>
                
                <div class="posts-container">
                    <?php
                    // Start the Loop.
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-item mb-5'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail mb-3">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('blueprint-featured', array('class' => 'img-fluid rounded')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <header class="post-header">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="post-meta text-muted mb-3">
                                    <span class="posted-on">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </span>
                                    
                                    <span class="byline ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <?php
                                        printf(
                                            /* translators: %s: post author. */
                                            esc_html__('by %s', 'blueprint'),
                                            '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
                                        );
                                        ?>
                                    </span>
                                    
                                    <?php if (has_category()) : ?>
                                        <span class="cat-links ms-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                            </svg>
                                            <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="post-content">
                                <?php
                                if (is_search() || is_archive()) {
                                    the_excerpt();
                                } else {
                                    the_content(
                                        sprintf(
                                            wp_kses(
                                                /* translators: %s: Name of current post. Only visible to screen readers */
                                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blueprint'),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            wp_kses_post(get_the_title())
                                        )
                                    );

                                    wp_link_pages(array(
                                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'blueprint'),
                                        'after'  => '</div>',
                                    ));
                                }
                                ?>
                            </div>

                            <footer class="post-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                    <?php esc_html_e('Read More', 'blueprint'); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-1">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </footer>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>

                <?php
                // Pagination
                the_posts_navigation(array(
                    'mid_size'  => 2,
                    'prev_text' => sprintf(
                        '%s <span class="nav-prev-text">%s</span>',
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15,18 9,12 15,6"></polyline></svg>',
                        __('Older posts', 'blueprint')
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s</span> %s',
                        __('Newer posts', 'blueprint'),
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9,18 15,12 9,6"></polyline></svg>'
                    ),
                ));

            else :
                ?>
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Nothing here', 'blueprint'); ?></h1>
                    </header>

                    <div class="page-content">
                        <?php
                        if (is_home() && current_user_can('publish_posts')) :
                            ?>
                            <p>
                                <?php
                                printf(
                                    wp_kses(
                                        /* translators: 1: link to WP admin new post page. */
                                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'blueprint'),
                                        array(
                                            'a' => array(
                                                'href' => array(),
                                            ),
                                        )
                                    ),
                                    esc_url(admin_url('post-new.php'))
                                );
                                ?>
                            </p>
                            <?php
                        elseif (is_search()) :
                            ?>
                            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blueprint'); ?></p>
                            <?php
                            get_search_form();
                        else :
                            ?>
                            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blueprint'); ?></p>
                            <?php
                            get_search_form();
                        endif;
                        ?>
                    </div>
                </section>
                <?php
            endif;
            ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
