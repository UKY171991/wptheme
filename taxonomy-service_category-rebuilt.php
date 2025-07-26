<?php
/**
 * Service Category Archive Template
 * Category-specific service listings with filtering
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); 

$current_term = get_queried_object();
$term_description = term_description();
?>

<!-- Category Header -->
<section class="category-header section">
    <div class="container">
        <div class="category-header-content">
            <!-- Breadcrumbs -->
            <nav class="breadcrumbs" aria-label="Breadcrumb">
                <ol class="breadcrumb-list">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>">Services</a></li>
                    <li aria-current="page"><?php echo esc_html($current_term->name); ?></li>
                </ol>
            </nav>
            
            <div class="category-info">
                <h1 class="category-title"><?php echo esc_html($current_term->name); ?> Services</h1>
                
                <?php if ($term_description): ?>
                    <div class="category-description">
                        <?php echo $term_description; ?>
                    </div>
                <?php endif; ?>
                
                <div class="category-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo $current_term->count; ?></span>
                        <span class="stat-label">Services Available</span>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Support Available</span>
                    </div>
                    
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Satisfaction Guarantee</span>
                    </div>
                </div>
                
                <div class="category-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>?category=<?php echo urlencode($current_term->name); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        Get Quote for <?php echo esc_html($current_term->name); ?>
                    </a>
                    <a href="#services-grid" class="btn btn-outline btn-lg">
                        <i class="fas fa-list" aria-hidden="true"></i>
                        Browse Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Content -->
<section class="category-content section" id="services-grid">
    <div class="container">
        <!-- Filter and Sort Controls -->
        <div class="services-controls">
            <div class="controls-left">
                <h2 class="services-count">
                    <span id="services-count-number"><?php echo $current_term->count; ?></span> 
                    <?php echo esc_html($current_term->name); ?> Service<?php echo $current_term->count !== 1 ? 's' : ''; ?>
                </h2>
            </div>
            
            <div class="controls-right">
                <!-- Sort Options -->
                <div class="sort-controls">
                    <label for="services-sort" class="sort-label">Sort by:</label>
                    <select id="services-sort" class="sort-select">
                        <option value="menu_order">Default Order</option>
                        <option value="title_asc">Name (A-Z)</option>
                        <option value="title_desc">Name (Z-A)</option>
                        <option value="date_desc">Newest First</option>
                        <option value="date_asc">Oldest First</option>
                    </select>
                </div>
                
                <!-- View Options -->
                <div class="view-controls">
                    <button class="view-btn active" data-view="grid" title="Grid View">
                        <i class="fas fa-th" aria-hidden="true"></i>
                    </button>
                    <button class="view-btn" data-view="list" title="List View">
                        <i class="fas fa-list" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Services Grid -->
        <div class="services-grid" id="services-container">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post();
                    $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                    ?>
                    
                    <article class="service-card" data-service-id="<?php echo get_the_ID(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="service-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-card', array('loading' => 'lazy')); ?>
                                </a>
                                
                                <?php if ($price_range): ?>
                                    <div class="price-badge">
                                        <?php echo esc_html($price_range); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <div class="service-header">
                                <?php if ($icon): ?>
                                    <div class="service-icon">
                                        <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <h3 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            </div>
                            
                            <div class="service-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            
                            <?php if ($features): ?>
                                <div class="service-features-preview">
                                    <?php
                                    $features_array = array_slice(explode("\n", $features), 0, 3);
                                    foreach ($features_array as $feature):
                                        if (trim($feature)):
                                            ?>
                                            <div class="feature-item">
                                                <i class="fas fa-check" aria-hidden="true"></i>
                                                <span><?php echo esc_html(trim($feature)); ?></span>
                                            </div>
                                            <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-meta">
                                <?php if ($duration): ?>
                                    <div class="meta-item">
                                        <i class="fas fa-clock" aria-hidden="true"></i>
                                        <span><?php echo esc_html($duration); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="meta-item">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <span>Professional Service</span>
                                </div>
                            </div>
                            
                            <div class="service-actions">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                    Learn More
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-outline">
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
                    <div class="no-services-content">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <h3>No Services Found</h3>
                        <p>Sorry, we couldn't find any services in the <?php echo esc_html($current_term->name); ?> category.</p>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary">
                            View All Services
                        </a>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($wp_query->max_num_pages > 1): ?>
            <div class="services-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    'type' => 'list',
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Other Categories -->
<section class="other-categories-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Other Service Categories</h2>
            <p class="section-subtitle">Explore our full range of professional services</p>
        </div>
        
        <div class="categories-grid">
            <?php
            $all_categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => true,
                'exclude' => array($current_term->term_id),
                'number' => 6
            ));
            
            if ($all_categories && !is_wp_error($all_categories)):
                foreach ($all_categories as $category):
                    // Get a representative service from this category for the image
                    $category_services = get_posts(array(
                        'post_type' => 'service',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ),
                        ),
                    ));
                    ?>
                    <div class="category-card">
                        <?php if (!empty($category_services) && has_post_thumbnail($category_services[0]->ID)): ?>
                            <div class="category-image">
                                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                    <?php echo get_the_post_thumbnail($category_services[0]->ID, 'service-card', array('loading' => 'lazy')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="category-content">
                            <h3 class="category-name">
                                <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                            </h3>
                            
                            <?php if ($category->description): ?>
                                <div class="category-description">
                                    <?php echo wp_trim_words($category->description, 15); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="category-stats">
                                <span class="services-count"><?php echo $category->count; ?> Service<?php echo $category->count !== 1 ? 's' : ''; ?></span>
                            </div>
                            
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-outline btn-sm">
                                Explore Category
                            </a>
                        </div>
                    </div>
                    <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <div class="section-footer">
            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Category CTA -->
<section class="category-cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Need Help with <?php echo esc_html($current_term->name); ?>?</h2>
            <p class="cta-subtitle">Our expert team specializes in <?php echo strtolower($current_term->name); ?> services and is ready to help you achieve your goals.</p>
            
            <div class="cta-features">
                <div class="cta-feature">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>Expert Team</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-clock" aria-hidden="true"></i>
                    <span>Fast Response</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                    <span>Quality Guarantee</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                    <span>Fair Pricing</span>
                </div>
            </div>
            
            <div class="cta-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>?category=<?php echo urlencode($current_term->name); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    Get Free Consultation
                </a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    Call Now
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer('rebuilt'); ?>
