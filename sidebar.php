<?php
/**
 * The sidebar containing the main widget area
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area sticky-sidebar">
    <!-- Search Widget -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light border-0">
            <h5 class="card-title mb-0">
                <i class="fas fa-search text-accent me-2"></i>Search
            </h5>
        </div>
        <div class="card-body">
            <?php get_search_form(); ?>
        </div>
    </div>

    <!-- Recent Posts Widget -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light border-0">
            <h5 class="card-title mb-0">
                <i class="fas fa-clock text-accent me-2"></i>Recent Posts
            </h5>
        </div>
        <div class="card-body">
            <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish'
            ));

            if ($recent_posts->have_posts()) :
            ?>
                <ul class="list-unstyled mb-0">
                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                        <li class="mb-3 pb-3 border-bottom border-light">
                            <h6 class="mb-1">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                    <?php the_title(); ?>
                                </a>
                            </h6>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                <?php echo get_the_date(); ?>
                            </small>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p class="text-muted mb-0">No recent posts available.</p>
            <?php 
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light border-0">
            <h5 class="card-title mb-0">
                <i class="fas fa-folder text-accent me-2"></i>Categories
            </h5>
        </div>
        <div class="card-body">
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 10
            ));

            if ($categories) :
            ?>
                <ul class="list-unstyled mb-0">
                    <?php foreach ($categories as $category) : ?>
                        <li class="mb-2">
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               class="text-decoration-none d-flex justify-content-between align-items-center">
                                <span><?php echo esc_html($category->name); ?></span>
                                <span class="badge bg-light text-dark"><?php echo esc_html($category->count); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="text-muted mb-0">No categories available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tags Widget -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light border-0">
            <h5 class="card-title mb-0">
                <i class="fas fa-tags text-accent me-2"></i>Tags
            </h5>
        </div>
        <div class="card-body">
            <?php
            $tags = get_tags(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 20
            ));

            if ($tags) :
            ?>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($tags as $tag) : ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                           class="badge bg-light text-dark text-decoration-none">
                            <?php echo esc_html($tag->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="text-muted mb-0">No tags available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Archives Widget -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light border-0">
            <h5 class="card-title mb-0">
                <i class="fas fa-archive text-accent me-2"></i>Archives
            </h5>
        </div>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <?php wp_get_archives(array(
                    'type' => 'monthly',
                    'limit' => 12,
                    'format' => 'custom',
                    'before' => '<li class="mb-2">',
                    'after' => '</li>'
                )); ?>
            </ul>
        </div>
    </div>

    <!-- Contact CTA Widget -->
    <div class="card border-0 shadow-sm bg-accent text-white">
        <div class="card-body text-center">
            <i class="fas fa-phone-alt mb-3 icon-md"></i>
            <h5 class="card-title">Need Our Services?</h5>
            <p class="card-text mb-4">Get professional help for your home today.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
               class="btn btn-light btn-rounded w-100">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
        </div>
    </div>

    <?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->
