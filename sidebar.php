<?php
/**
 * Sidebar Template
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<div class="sidebar-widgets">
    <?php dynamic_sidebar('sidebar-1'); ?>
</div>

<?php if (!is_active_sidebar('sidebar-1')) : ?>
    <!-- Default sidebar content if no widgets are active -->
    <div class="default-sidebar">
        <!-- Search Widget -->
        <div class="widget widget-search mb-4">
            <h3 class="widget-title">Search</h3>
            <div class="widget-content">
                <?php get_search_form(); ?>
            </div>
        </div>
        
        <!-- Recent Posts Widget -->
        <div class="widget widget-recent-posts mb-4">
            <h3 class="widget-title">Recent Posts</h3>
            <div class="widget-content">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                
                if ($recent_posts) :
                ?>
                    <ul class="recent-posts-list">
                        <?php foreach ($recent_posts as $post) : ?>
                            <li class="recent-post-item">
                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                    <?php echo esc_html($post['post_title']); ?>
                                </a>
                                <small class="post-date text-muted d-block">
                                    <?php echo get_the_date('', $post['ID']); ?>
                                </small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No recent posts found.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Categories Widget -->
        <?php
        $categories = get_categories(array(
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => 10,
            'hide_empty' => true
        ));
        
        if ($categories) :
        ?>
            <div class="widget widget-categories mb-4">
                <h3 class="widget-title">Categories</h3>
                <div class="widget-content">
                    <ul class="categories-list">
                        <?php foreach ($categories as $category) : ?>
                            <li class="category-item">
                                <a href="<?php echo get_category_link($category->term_id); ?>">
                                    <?php echo esc_html($category->name); ?>
                                    <span class="post-count">(<?php echo $category->count; ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Services Widget -->
        <?php
        $services = get_posts(array(
            'post_type' => 'service',
            'posts_per_page' => 5,
            'post_status' => 'publish'
        ));
        
        if ($services) :
        ?>
            <div class="widget widget-services mb-4">
                <h3 class="widget-title">Our Services</h3>
                <div class="widget-content">
                    <ul class="services-list">
                        <?php foreach ($services as $service) : ?>
                            <li class="service-item">
                                <a href="<?php echo get_permalink($service->ID); ?>">
                                    <i class="fas fa-cog me-2"></i>
                                    <?php echo esc_html($service->post_title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="widget-footer mt-3">
                        <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/services')); ?>" class="btn btn-outline-primary btn-sm">
                            View All Services
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Contact Widget -->
        <div class="widget widget-contact mb-4">
            <h3 class="widget-title">Get In Touch</h3>
            <div class="widget-content">
                <p>Ready to start your project? Contact us today for a free consultation.</p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-envelope me-2"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>