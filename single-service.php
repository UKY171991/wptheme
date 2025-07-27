<?php
/**
 * Template for displaying single Service posts
 */

get_header(); ?>
<?php while (have_posts()) : the_post();
    // Get service data
    $terms = get_the_terms(get_the_ID(), 'service_category');
    $price = get_post_meta(get_the_ID(), '_service_price', true);
    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
    
    // Setup banner variables
    $badge_icon = '🛠️';
    $badge_text = $terms && !is_wp_error($terms) ? esc_html($terms[0]->name) : 'Professional Service';
    $title = get_the_title();
    $highlight = '';
    $description = has_excerpt() ? get_the_excerpt() : 'Professional service tailored to your needs with quality and reliability you can trust.';
    
    // Setup buttons
    $buttons = array(
        array(
            'text' => 'Get Started',
            'url' => esc_url(get_permalink(get_page_by_path('contact'))) . '?service=' . urlencode(get_the_title()),
            'type' => 'btn-primary',
            'icon' => '✉️'
        ),
        array(
            'text' => 'View Services',
            'url' => esc_url(get_post_type_archive_link('service')),
            'type' => 'btn-outline',
            'icon' => '👁️'
        )
    );
    
    // Setup stats
    $stats = array();
    if ($price) {
        $stats[] = array(
            'number' => esc_html($price),
            'label' => 'Starting Price'
        );
    }
    if ($duration) {
        $stats[] = array(
            'number' => esc_html($duration),
            'label' => 'Timeline'
        );
    }
    
    // Include banner
    include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Breadcrumb Section -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <?php blueprint_folder_breadcrumb(); ?>
    </div>
</section>
<!-- Service Details Section -->
<section id="service-details" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-content">
                    <!-- Featured Image if available -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-featured-image mb-5">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow w-100')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Service Content -->
                    <div class="service-description">
                        <?php the_content(); ?>
                    </div>

                    <!-- Service Features -->
                    <?php
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    if ($features) : ?>
                        <div class="service-features mt-5 p-4 bg-light rounded">
                            <h3 class="h4 mb-4">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                What's Included
                            </h3>
                            <div class="row g-3">
                                <?php
                                $features_array = explode("\n", $features);
                                foreach ($features_array as $feature) :
                                    if (trim($feature)) : ?>
                                        <div class="col-md-6">
                                            <div class="feature-item d-flex align-items-start">
                                                <i class="fas fa-check text-success me-3 mt-1"></i>
                                                <span><?php echo esc_html(trim($feature)); ?></span>
                                            </div>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Service Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <!-- Service Info Card -->
                    <?php 
                    $terms = get_the_terms(get_the_ID(), 'service_category');
                    $price = get_post_meta(get_the_ID(), '_service_price', true);
                    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                    ?>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Service Information</h5>
                        </div>
                        <div class="card-body">
                            <?php if ($terms && !is_wp_error($terms)) : ?>
                                <div class="service-meta-item mb-3">
                                    <strong class="text-muted d-block">Category</strong>
                                    <span class="badge bg-primary"><?php echo esc_html($terms[0]->name); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($price) : ?>
                                <div class="service-meta-item mb-3">
                                    <strong class="text-muted d-block">Starting Price</strong>
                                    <span class="h5 text-primary mb-0"><?php echo esc_html($price); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duration) : ?>
                                <div class="service-meta-item mb-3">
                                    <strong class="text-muted d-block">Timeline</strong>
                                    <span class="text-dark"><?php echo esc_html($duration); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ready to Get Started?</h5>
                            <p class="card-text">Contact us today to discuss your project needs and get a personalized quote.</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" 
                               class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-envelope me-2"></i>
                                Get Free Quote
                            </a>
                            <a href="tel:+1234567890" class="btn btn-outline-primary w-100">
                                <i class="fas fa-phone me-2"></i>
                                Call Now
                            </a>
                        </div>
                    </div>

                    <!-- Related Services -->
                    <?php
                    $related_services = new WP_Query(array(
                        'post_type' => 'service',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    ));
                    
                    if ($related_services->have_posts()) : ?>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Related Services</h5>
                            </div>
                            <div class="card-body p-0">
                                <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                                    <div class="border-bottom p-3">
                                        <h6 class="mb-1">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                <?php the_title(); ?>
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-0">
                                            <?php echo wp_trim_words(get_the_excerpt(), 10); ?>
                                        </p>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Service Categories Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">
                <i class="fas fa-layer-group me-3" style="color: #3498db;"></i>
                Explore More Services
            </h2>
            <p class="text-muted lead">Discover our complete range of professional services organized by category</p>
        </div>
        
        <div class="categories-grid">
            <div class="row g-4">
                <!-- All Services Card -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-card h-100">
                        <a href="<?php echo get_post_type_archive_link('service'); ?>" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body p-4 text-center">
                                    <div class="category-icon mb-3">
                                        <i class="fas fa-th-large" style="font-size: 2.5rem; color: #3498db;"></i>
                                    </div>
                                    <h3 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">
                                        All Services
                                    </h3>
                                    <p class="text-muted small mb-3">
                                        View our complete service portfolio
                                    </p>
                                    <span class="badge bg-primary">
                                        <?php echo wp_count_posts('service')->publish; ?> Services
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
                // Get all service categories
                $service_categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'number' => 7 // Limit to 7 to fit nicely with "All Services" card
                ));

                if ($service_categories && !is_wp_error($service_categories)) :
                    foreach ($service_categories as $category) :
                        // Default icons for different categories
                        $category_icons = array(
                            'cleaning' => 'fas fa-broom',
                            'maintenance' => 'fas fa-tools',
                            'consulting' => 'fas fa-lightbulb',
                            'office' => 'fas fa-briefcase',
                            'admin' => 'fas fa-clipboard-list',
                            'coaching' => 'fas fa-user-graduate'
                        );

                        $icon = 'fas fa-tag'; // default
                        foreach ($category_icons as $key => $icon_class) {
                            if (strpos(strtolower($category->slug), $key) !== false) {
                                $icon = $icon_class;
                                break;
                            }
                        }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="category-card h-100">
                                <a href="<?php echo get_term_link($category); ?>" class="text-decoration-none">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body p-4 text-center">
                                            <div class="category-icon mb-3">
                                                <i class="<?php echo esc_attr($icon); ?>" style="font-size: 2.5rem; color: #3498db;"></i>
                                            </div>
                                            <h3 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">
                                                <?php echo esc_html($category->name); ?>
                                            </h3>
                                            <?php if ($category->description) : ?>
                                                <p class="text-muted small mb-3">
                                                    <?php echo esc_html(wp_trim_words($category->description, 12)); ?>
                                                </p>
                                            <?php else : ?>
                                                <p class="text-muted small mb-3">
                                                    Professional <?php echo strtolower($category->name); ?> services
                                                </p>
                                            <?php endif; ?>
                                            <span class="badge bg-primary">
                                                <?php echo $category->count; ?> Service<?php echo $category->count != 1 ? 's' : ''; ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-list me-2"></i>
                View All Services
            </a>
        </div>
    </div>
</section>
                <div class="quick-navigation mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="navigation-wrapper bg-white rounded-3 p-4 shadow-sm">
                                <h4 class="h6 mb-3 text-center" style="color: #2c3e50; font-weight: 600;">
                                    <i class="fas fa-compass me-2" style="color: #3498db;"></i>
                                    Quick Navigation
                                </h4>
                                <div class="nav-links d-flex flex-wrap justify-content-center gap-3">
                                    <a href="<?php echo get_post_type_archive_link('service');?>"
                                       class="nav-link-btn btn btn-outline-primary btn-sm">
                                        <i class="fas fa-list me-2"></i>All Services
                                    </a>
                                    <a href="<?php echo home_url('/contact');?>"
                                       class="nav-link-btn btn btn-outline-success btn-sm">
                                        <i class="fas fa-envelope me-2"></i>Get Quote
                                    </a>
                                    <a href="<?php echo home_url('/about');?>"
                                       class="nav-link-btn btn btn-outline-info btn-sm">
                                        <i class="fas fa-info-circle me-2"></i>About Us
                                    </a>
                                    <a href="<?php echo home_url('/portfolio');?>"
                                       class="nav-link-btn btn btn-outline-warning btn-sm">
                                        <i class="fas fa-briefcase me-2"></i>Portfolio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Section -->
<section class="section bg-primary">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Ready to Transform Your Business?</h2>
                <p class="text-white-50 mb-4 lead">
                    Let's discuss how <?php the_title();?> can help achieve your goals.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>?service=<?php echo urlencode(get_the_title());?>" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-rocket me-2"></i>
                        Start Your Project
                    </a>
                    <a href="<?php echo esc_url(get_post_type_archive_link('service'));?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>
                        View All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>
