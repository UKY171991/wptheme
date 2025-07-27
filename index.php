<?php
/**
 * Main Index Template
 * Fallback template for all content types
 */

get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (have_posts()) :?>
                <div class="posts-list">
                    <?php while (have_posts()) : the_post();?>
                        <article id="post-<?php the_ID();?>" <?php post_class('post-item mb-5');?>>
                            <?php if (has_post_thumbnail()) :?>
                                <div class="post-thumbnail mb-3">
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded'));?>
                                    </a>
                                </div>
                            <?php endif;?>
                            <div class="post-content">
                                <header class="post-header mb-3">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="post-date">
                                            <i class="fas fa-calendar me-2"></i>
                                            <?php echo get_the_date();?>
                                        </span>
                                        <?php if (get_post_type() === 'post') :?>
                                            <span class="post-author ms-3">
                                                <i class="fas fa-user me-2"></i>
                                                <?php the_author();?>
                                            </span>
                                            <span class="post-category ms-3">
                                                <i class="fas fa-folder me-2"></i>
                                                <?php the_category(', ');?>
                                            </span>
                                        <?php endif;?>
                                    </div>
                                </header>
                                <div class="post-excerpt">
                                    <?php
                                    if (has_excerpt()) {
                                        the_excerpt();
} else {
                                        echo wp_trim_words(get_the_content(), 30, '...');
}?>
                                </div>
                                <div class="post-footer">
                                    <a href="<?php the_permalink();?>" class="btn btn-primary">
                                        <?php echo (get_post_type() === 'service') ? 'Learn More' : 'Read More';?>
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;?>
                    <div class="pagination-wrapper">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-arrow-left me-2"></i>Previous',
                            'next_text' => 'Next<i class="fas fa-arrow-right ms-2"></i>',
                        ));?>
                    </div>
                </div>
            <?php else :?>
                <div class="no-posts text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h2>Nothing Found</h2>
                    <p class="lead">It seems we can't find what you're looking for. Perhaps searching can help.</p>
                    <div class="search-form-wrapper mt-4">
                        <?php get_search_form();?>
                    </div>
                    <div class="helpful-links mt-4">
                        <h4>You might be interested in:</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?php echo esc_url(home_url('/services'));?>" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-cogs me-2"></i>Our Services
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo esc_url(home_url('/about'));?>" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-info-circle me-2"></i>About Us
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo esc_url(home_url('/contact'));?>" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-envelope me-2"></i>Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
        <div class="col-lg-4">
            <aside class="sidebar">
                <?php get_sidebar();?>
            </aside>
        </div>
    </div>
</div>
<?php get_footer(); ?>
