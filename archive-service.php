<?php
/**
 * Services Archive Template
 * Displays all services with category filtering
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<div class="services-archive-page">
    <!-- Page Header -->
    <section class="page-header services-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title">
                    <?php esc_html_e('Our Services', 'blueprint-folder'); ?>
                </h1>
                <p class="page-subtitle">
                    <?php esc_html_e('Professional solutions tailored to your business needs', 'blueprint-folder'); ?>
                </p>
                
                <!-- Breadcrumb -->
                <?php blueprint_folder_breadcrumb(); ?>
            </div>
        </div>
    </section>

    <!-- Service Categories Filter -->
    <section class="services-filter">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">
                    <?php esc_html_e('All Services', 'blueprint-folder'); ?>
                </button>
                <?php
                $service_categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC',
                ));
                
                if (!empty($service_categories) && !is_wp_error($service_categories)) :
                    foreach ($service_categories as $category) :
                ?>
                        <button class="filter-btn" data-filter="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                            <span class="count">(<?php echo esc_html($category->count); ?>)</span>
                        </button>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-grid">
        <div class="container">
            <div class="services-container">
                <?php
                $services_query = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order title',
                    'order' => 'ASC',
                ));
                
                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post();
                        // Get service categories for filtering
                        $service_cats = get_the_terms(get_the_ID(), 'service_category');
                        $category_classes = 'all';
                        if (!empty($service_cats) && !is_wp_error($service_cats)) {
                            $cat_slugs = array_map(function($cat) { return $cat->slug; }, $service_cats);
                            $category_classes .= ' ' . implode(' ', $cat_slugs);
                        }
                ?>
                        <article class="service-card" data-categories="<?php echo esc_attr($category_classes); ?>">
                            <div class="service-card-inner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf(__('View %s service details', 'blueprint-folder'), get_the_title())); ?>">
                                            <?php the_post_thumbnail('service-card', array('alt' => get_the_title())); ?>
                                        </a>
                                        <div class="service-overlay">
                                            <a href="<?php the_permalink(); ?>" class="service-link">
                                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-content">
                                    <header class="service-header">
                                        <?php if (!empty($service_cats) && !is_wp_error($service_cats)) : ?>
                                            <div class="service-categories">
                                                <?php foreach ($service_cats as $category) : ?>
                                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-link">
                                                        <?php echo esc_html($category->name); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <h2 class="service-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                    </header>
                                    
                                    <div class="service-excerpt">
                                        <?php
                                        if (has_excerpt()) {
                                            the_excerpt();
                                        } else {
                                            echo '<p>' . wp_trim_words(get_the_content(), 25, '...') . '</p>';
                                        }
                                        ?>
                                    </div>
                                    
                                    <footer class="service-footer">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                            <?php esc_html_e('Learn More', 'blueprint-folder'); ?>
                                            <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="no-services">
                        <div class="no-services-content">
                            <i class="fas fa-tools" aria-hidden="true"></i>
                            <h3><?php esc_html_e('No Services Found', 'blueprint-folder'); ?></h3>
                            <p><?php esc_html_e('We are currently updating our services. Please check back soon!', 'blueprint-folder'); ?></p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                                <?php esc_html_e('Contact Us', 'blueprint-folder'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="services-cta">
        <div class="container">
            <div class="cta-content">
                <h2><?php esc_html_e('Ready to Get Started?', 'blueprint-folder'); ?></h2>
                <p><?php esc_html_e('Contact us today to discuss how our services can help your business grow.', 'blueprint-folder'); ?></p>
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <?php esc_html_e('Get a Quote', 'blueprint-folder'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-outline btn-lg">
                        <?php esc_html_e('Learn About Us', 'blueprint-folder'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Services Archive Styles */
.services-archive-page {
    min-height: 100vh;
}

.services-header {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    color: white;
    padding: 4rem 0 2rem;
    text-align: center;
}

.services-header .page-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.services-header .page-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.services-filter {
    background: #f8fafc;
    padding: 2rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.filter-tabs {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.filter-btn {
    background: white;
    border: 2px solid #e2e8f0;
    color: #64748b;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-btn:hover,
.filter-btn.active {
    background: #1e40af;
    color: white;
    border-color: #1e40af;
}

.filter-btn .count {
    background: rgba(0, 0, 0, 0.1);
    padding: 0.25rem 0.5rem;
    border-radius: 20px;
    font-size: 0.875rem;
}

.filter-btn.active .count {
    background: rgba(255, 255, 255, 0.2);
}

.services-grid {
    padding: 4rem 0;
}

.services-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    align-items: stretch;
}

.service-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
}

.service-card-inner {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.service-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4/3;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.05);
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(30, 64, 175, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service-card:hover .service-overlay {
    opacity: 1;
}

.service-link {
    background: white;
    color: #1e40af;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transform: scale(0.8);
    transition: transform 0.3s ease;
}

.service-card:hover .service-link {
    transform: scale(1);
}

.service-content {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.service-categories {
    margin-bottom: 1rem;
}

.service-category-link {
    background: #dbeafe;
    color: #1e40af;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    margin-right: 0.5rem;
    display: inline-block;
}

.service-category-link:hover {
    background: #1e40af;
    color: white;
}

.service-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.service-title a {
    color: #1f2937;
    text-decoration: none;
}

.service-title a:hover {
    color: #1e40af;
}

.service-excerpt {
    flex: 1;
    margin-bottom: 2rem;
    color: #6b7280;
    line-height: 1.6;
}

.service-footer {
    margin-top: auto;
}

.services-cta {
    background: #f1f5f9;
    padding: 4rem 0;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #1f2937;
}

.cta-content p {
    font-size: 1.25rem;
    color: #6b7280;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.no-services {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
}

.no-services-content i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 2rem;
}

.no-services-content h3 {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #374151;
}

.no-services-content p {
    color: #6b7280;
    margin-bottom: 2rem;
    font-size: 1.125rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .services-header .page-title {
        font-size: 2rem;
    }
    
    .services-container {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .filter-tabs {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 1rem;
    }
    
    .filter-btn {
        flex-shrink: 0;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
}

/* Filter Animation */
.service-card.hidden {
    display: none;
}

.service-card.show {
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Service Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const serviceCards = document.querySelectorAll('.service-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter services
            serviceCards.forEach(card => {
                const categories = card.getAttribute('data-categories');
                
                if (filter === 'all' || categories.includes(filter)) {
                    card.classList.remove('hidden');
                    card.classList.add('show');
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('show');
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'All Services',
        'Comprehensive list of our professional home services. Browse by category or explore all available services.'
    );
    ?>

    <!-- Service Categories Filter Section -->
    <section class="section-sm bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h3 class="h5 mb-3">Filter by Category</h3>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-accent btn-sm">
                        All Services
                    </a>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => true,
                    ));
                    
                    if (!empty($categories) && !is_wp_error($categories)):
                        foreach ($categories as $category):
                    ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-outline-secondary btn-sm">
                            <?php echo esc_html($category->name); ?>
                            <span class="badge bg-accent text-white ms-1"><?php echo esc_html($category->count); ?></span>
                        </a>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php echo services_pro_get_section_heading(
                    'Our Professional Services',
                    'Choose from our comprehensive range of home services'
                ); ?>
                
                <div class="row g-4">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-image">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-body p-4">
                                    <h3 class="h5 mb-3 text-primary-dark">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-primary-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <?php
                                    // Display service categories
                                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                                    if ($service_categories && !is_wp_error($service_categories)):
                                    ?>
                                        <div class="mb-2">
                                            <?php foreach ($service_categories as $cat): ?>
                                                <span class="badge bg-accent-light text-accent small me-1">
                                                    <?php echo esc_html($cat->name); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <p class="text-muted mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-accent btn-sm">
                                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                        <?php
                                        // Get service price if available
                                        $price = get_post_meta(get_the_ID(), 'service_price', true);
                                        if ($price):
                                        ?>
                                            <span class="fw-bold text-accent">From $<?php echo esc_html($price); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="mt-5">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left me-1"></i>Previous',
                        'next_text' => 'Next<i class="fas fa-chevron-right ms-1"></i>',
                        'class' => 'pagination justify-content-center'
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                <div class="text-center py-5">
                    <i class="fas fa-search text-muted mb-3" style="font-size: 3rem;"></i>
                    <h3 class="h4 mb-3">No Services Found</h3>
                    <p class="text-muted mb-4">No services are currently available.</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section bg-accent text-white">
        <div class="container text-center">
            <h2 class="h3 mb-3">Need a Custom Service?</h2>
            <p class="mb-4">Can't find what you're looking for? Contact us for custom service solutions.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>Get Custom Quote
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
