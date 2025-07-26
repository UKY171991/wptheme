<?php
/**
 * Archive template for Services
 * Displays all services with filtering
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); ?>

<!-- Page Header -->
<section class="page-header services-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title">Our Services</h1>
            <p class="page-subtitle">Professional solutions for every business need</p>
            
            <div class="services-stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo wp_count_posts('service')->publish; ?>+</span>
                    <span class="stat-label">Services Available</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Happy Clients</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Filter & Grid -->
<section class="services-archive-section section">
    <div class="container">
        <!-- Category Filter -->
        <div class="services-filter-wrapper">
            <div class="filter-header">
                <h2>Browse by Category</h2>
            </div>
            
            <div class="services-filter">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th-large" aria-hidden="true"></i>
                    All Services
                </button>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => false,
                ));
                
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $icon = get_term_meta($category->term_id, 'category_icon', true) ?: 'fas fa-cog';
                        echo '<button class="filter-btn" data-filter="' . esc_attr($category->slug) . '">';
                        echo '<i class="' . esc_attr($icon) . '" aria-hidden="true"></i>';
                        echo esc_html($category->name);
                        echo '<span class="count">(' . $category->count . ')</span>';
                        echo '</button>';
                    }
                }
                ?>
            </div>
        </div>
        
        <!-- Services Grid -->
        <div class="services-grid-wrapper">
            <div class="services-grid">
                <?php
                if (have_posts()):
                    while (have_posts()): the_post();
                        $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        $features = get_post_meta(get_the_ID(), '_service_features', true);
                        
                        // Get service categories for filtering
                        $service_categories = get_the_terms(get_the_ID(), 'service_category');
                        $category_classes = '';
                        $category_names = array();
                        
                        if ($service_categories && !is_wp_error($service_categories)) {
                            $category_slugs = array_map(function($cat) { return $cat->slug; }, $service_categories);
                            $category_classes = implode(' ', $category_slugs);
                            $category_names = array_map(function($cat) { return $cat->name; }, $service_categories);
                        }
                        ?>
                        <article class="service-card" data-category="<?php echo esc_attr($category_classes); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="service-image">
                                    <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>">
                                        <?php the_post_thumbnail('service-card', array('loading' => 'lazy')); ?>
                                    </a>
                                    
                                    <?php if (!empty($category_names)): ?>
                                        <div class="service-categories">
                                            <?php foreach (array_slice($category_names, 0, 2) as $cat_name): ?>
                                                <span class="category-tag"><?php echo esc_html($cat_name); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-content">
                                <?php if ($icon): ?>
                                    <div class="service-icon">
                                        <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <h3 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="service-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <?php if ($features): ?>
                                    <div class="service-features-preview">
                                        <?php
                                        $features_array = explode("\n", $features);
                                        $preview_features = array_slice($features_array, 0, 3);
                                        ?>
                                        <ul class="features-list">
                                            <?php foreach ($preview_features as $feature): ?>
                                                <li><i class="fas fa-check" aria-hidden="true"></i> <?php echo esc_html(trim($feature)); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php if (count($features_array) > 3): ?>
                                            <span class="more-features">+<?php echo count($features_array) - 3; ?> more features</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-meta">
                                    <?php if ($price_range): ?>
                                        <div class="service-price">
                                            <i class="fas fa-tag" aria-hidden="true"></i>
                                            <span><?php echo esc_html($price_range); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($duration): ?>
                                        <div class="service-duration">
                                            <i class="fas fa-clock" aria-hidden="true"></i>
                                            <span><?php echo esc_html($duration); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="service-actions">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                        Learn More
                                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-outline btn-sm">
                                        Get Quote
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                else:
                    ?>
                    <div class="no-services-found">
                        <div class="no-results-content">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <h3>No Services Found</h3>
                            <p>We're constantly adding new services. Please check back soon or contact us for custom solutions.</p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                                Contact Us
                            </a>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if (have_posts()): ?>
                <div class="pagination-wrapper">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                        'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                        'class' => 'pagination'
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Service Categories Overview -->
<section class="categories-overview-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Explore Service Categories</h2>
            <p class="section-subtitle">Find the perfect service category for your needs</p>
        </div>
        
        <div class="categories-grid">
            <?php
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $category_icon = get_term_meta($category->term_id, 'category_icon', true) ?: 'fas fa-cog';
                    ?>
                    <div class="category-overview-card">
                        <div class="category-icon">
                            <i class="<?php echo esc_attr($category_icon); ?>" aria-hidden="true"></i>
                        </div>
                        
                        <h3 class="category-title">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                        </h3>
                        
                        <?php if ($category->description): ?>
                            <p class="category-description"><?php echo esc_html($category->description); ?></p>
                        <?php endif; ?>
                        
                        <div class="category-meta">
                            <span class="services-count"><?php echo $category->count; ?> Services</span>
                        </div>
                        
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-outline btn-sm">
                            View Category
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="services-cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Need a Custom Solution?</h2>
            <p class="cta-subtitle">Can't find exactly what you're looking for? We create custom solutions tailored to your specific business needs.</p>
            
            <div class="cta-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    Request Custom Quote
                </a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    Call for Consultation
                </a>
            </div>
            
            <div class="cta-features">
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>Free Consultation</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>Custom Solutions</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>Expert Team</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Services archive specific JavaScript
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Enhanced services filter functionality
        $('.filter-btn').on('click', function() {
            const filter = $(this).data('filter');
            const $cards = $('.service-card');
            
            // Update active button
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');
            
            // Show loading state
            $('.services-grid').addClass('filtering');
            
            setTimeout(function() {
                // Filter services
                if (filter === 'all') {
                    $cards.fadeIn(300);
                } else {
                    $cards.each(function() {
                        const categories = $(this).data('category');
                        if (categories && categories.includes(filter)) {
                            $(this).fadeIn(300);
                        } else {
                            $(this).fadeOut(300);
                        }
                    });
                }
                
                $('.services-grid').removeClass('filtering');
            }, 200);
        });
    });
})(jQuery);
</script>

<?php get_footer('rebuilt'); ?>
