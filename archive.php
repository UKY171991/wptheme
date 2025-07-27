<?php
/**
 * Archive Template
 * Used for category, tag, and other archive pages
 */

get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (have_posts()) : ?>
                <div class="archive-posts">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-post mb-5'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail mb-3">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="post-header mb-3">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="post-meta">
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
                                </header>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <div class="post-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                        Read More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    
                    <div class="pagination-wrapper">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-arrow-left me-2"></i>Previous',
                            'next_text' => 'Next<i class="fas fa-arrow-right ms-2"></i>',
                        ));
                        ?>
                    </div>
                </div>
                
            <?php else : ?>
                <div class="no-posts">
                    <h2>Nothing Found</h2>
                    <p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="col-lg-4">
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>