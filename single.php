<?php
/**
 * Single Post Template
 * Used for blog posts and other single content
 */

get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                    <header class="post-header mb-4">
                        <div class="post-meta mb-3">
                            <span class="post-date">
                                <i class="fas fa-calendar me-2"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="post-author ms-3">
                                <i class="fas fa-user me-2"></i>
                                <?php the_author(); ?>
                            </span>
                            <span class="post-category ms-3">
                                <i class="fas fa-folder me-2"></i>
                                <?php the_category(', '); ?>
                            </span>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'blueprint-folder') . '</span>',
                            'after'  => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ));
                        ?>
                    </div>
                    
                    <footer class="post-footer mt-4 pt-4 border-top">
                        <?php if (has_tag()) : ?>
                            <div class="post-tags mb-3">
                                <strong><i class="fas fa-tags me-2"></i>Tags:</strong>
                                <?php the_tags('', ', ', ''); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-navigation">
                            <?php
                            the_post_navigation(array(
                                'prev_text' => '<i class="fas fa-arrow-left me-2"></i>%title',
                                'next_text' => '%title<i class="fas fa-arrow-right ms-2"></i>',
                            ));
                            ?>
                        </div>
                    </footer>
                </article>
                
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            <?php endwhile; ?>
        </div>
        
        <div class="col-lg-4">
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>