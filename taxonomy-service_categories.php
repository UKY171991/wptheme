<?php
/**
 * Service Categories Taxonomy Template
 * Displays services within a specific category
 */

get_header();

$current_term = get_queried_object();
?>

<main id="main" class="site-main" role="main">
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title"><?php echo esc_html($current_term->name); ?></h1>
                <p class="page-subtitle"><?php echo esc_html($current_term->description ?: 'Explore our ' . strtolower($current_term->name) . ' offerings'); ?></p>
                
                <!-- Breadcrumb -->
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span class="separator" aria-hidden="true">›</span>
                    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>">Services</a>
                    <span class="separator" aria-hidden="true">›</span>
                    <span class="current" aria-current="page"><?php echo esc_html($current_term->name); ?></span>
                </nav>
            </div>
            
            <!-- Category Stats -->
            <div class="hero-stats">
                <?php
                $category_count = $current_term->count;
                $all_categories = get_terms(array('taxonomy' => 'service_categories', 'hide_empty' => false));
                $total_categories = count($all_categories);
                ?>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($category_count); ?></div>
                    <div class="stat-label">Services in Category</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html($total_categories); ?></div>
                    <div class="stat-label">Total Categories</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Category Navigation -->
    <section class="category-navigation section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Other Categories</h2>
                <p class="section-subtitle">Explore our full range of service categories</p>
            </div>
            
            <div class="categories-grid">
                <div class="category-item">
                    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" 
                       class="category-link">
                        <span class="category-icon">🎯</span>
                        <h3>All Services</h3>
                        <span class="service-count">View all</span>
                    </a>
                </div>
                
                <?php 
                $other_categories = get_terms(array(
                    'taxonomy' => 'service_categories',
                    'hide_empty' => false,
                    'exclude' => array($current_term->term_id),
                    'number' => 5
                ));
                
                if (!empty($other_categories) && !is_wp_error($other_categories)): 
                    foreach ($other_categories as $category): 
                ?>
                    <div class="category-item">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-link">
                            <span class="category-icon">
                                <?php
                                $icons = array(
                                    'home-services' => '🏠',
                                    'business-services' => '💼',
                                    'personal-services' => '👤',
                                    'technical-services' => '⚙️',
                                    'creative-services' => '🎨',
                                );
                                echo isset($icons[$category->slug]) ? $icons[$category->slug] : '🔧';
                                ?>
                            </span>
                            <h3><?php echo esc_html($category->name); ?></h3>
                            <span class="service-count"><?php echo esc_html($category->count); ?> services</span>
                        </a>
                    </div>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>
        </div>
    </section>

    <!-- Services in Category -->
    <section class="services-listing section">
        <div class="container">
            <?php if (have_posts()): ?>
                <div class="service-header">
                    <h2 class="section-title">Services in <?php echo esc_html($current_term->name); ?></h2>
                    <div class="services-count">
                        <span class="service-count">
                            <?php echo $wp_query->found_posts; ?> services found
                        </span>
                    </div>
                </div>
                
                <div class="services-grid" role="list">
                    <?php while (have_posts()): the_post(); 
                        $starting_price = get_post_meta(get_the_ID(), '_service_starting_price', true);
                        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        $availability = get_post_meta(get_the_ID(), '_service_availability', true);
                    ?>
                        <article class="service-card" role="listitem">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="service-image">
                                    <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>">
                                        <?php the_post_thumbnail('service-thumb', array('loading' => 'lazy')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-content">
                                <div class="service-category">
                                    <span class="category-tag current-category">
                                        <?php echo esc_html($current_term->name); ?>
                                    </span>
                                </div>
                                
                                <h3 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="service-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <div class="service-meta">
                                    <?php if ($starting_price): ?>
                                        <div class="service-price">
                                            <span class="label">Starting at:</span>
                                            <span class="price"><?php echo esc_html($starting_price); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($duration): ?>
                                        <div class="service-duration">
                                            <span class="label">Duration:</span>
                                            <span class="duration"><?php echo esc_html($duration); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="service-actions">
                                    <a href="<?php the_permalink(); ?>" 
                                       class="btn btn-primary btn-sm">
                                        Learn More
                                    </a>
                                    <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>&category=<?php echo urlencode($current_term->name); ?>" 
                                       class="btn btn-outline btn-sm">
                                        Get Quote
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'screen_reader_text' => $current_term->name . ' services navigation',
                    ));
                    ?>
                </div>
                
            <?php else: ?>
                <div class="no-services-found">
                    <div class="no-results-content">
                        <h2>No Services Found in This Category</h2>
                        <p>We're working on adding more services to the <?php echo esc_html($current_term->name); ?> category. Please check back soon!</p>
                        <div class="no-results-actions">
                            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" 
                               class="btn btn-primary">
                                View All Services
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>?category=<?php echo urlencode($current_term->name); ?>" 
                               class="btn btn-outline">
                                Request Service in This Category
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Category-specific Features -->
    <section class="category-features section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Why Choose Our <?php echo esc_html($current_term->name); ?>?</h2>
                <p class="section-subtitle">Benefits specific to this service category</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <h3>Specialized Expertise</h3>
                    <p>Our service providers are specifically trained and experienced in <?php echo esc_html(strtolower($current_term->name)); ?>.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <h3>Quick Response</h3>
                    <p>Fast turnaround times and efficient service delivery for all <?php echo esc_html(strtolower($current_term->name)); ?>.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <h3>Quality Guaranteed</h3>
                    <p>100% satisfaction guarantee on all services within the <?php echo esc_html(strtolower($current_term->name)); ?> category.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3>Competitive Pricing</h3>
                    <p>Fair and transparent pricing for all <?php echo esc_html(strtolower($current_term->name)); ?> services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started with <?php echo esc_html($current_term->name); ?>?</h2>
                <p>Connect with trusted professionals in the <?php echo esc_html(strtolower($current_term->name)); ?> category today.</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>?category=<?php echo urlencode($current_term->name); ?>" 
                       class="btn btn-primary btn-lg">
                        Get Quote for <?php echo esc_html($current_term->name); ?>
                    </a>
                    <a href="tel:+1234567890" class="btn btn-secondary btn-lg">
                        Call Us Now
                    </a>
                </div>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Free Consultation</span>
                    </div>
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Category Specialists</span>
                    </div>
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Satisfaction Guaranteed</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
