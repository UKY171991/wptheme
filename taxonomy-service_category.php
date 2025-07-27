<?php
/**
 * Service Category Archive Template
 * Displays services filtered by category
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<div class="service-category-archive">
    
    <!-- Category Header -->
    <section class="page-header category-header">
        <div class="container">
            <div class="page-header-content">
                
                <!-- Breadcrumb -->
                <?php blueprint_folder_breadcrumb(); ?>
                
                <h1 class="page-title">
                    <?php single_term_title(); ?>
                </h1>
                
                <?php if (term_description()) : ?>
                    <div class="category-description">
                        <?php echo term_description(); ?>
                    </div>
                <?php else : ?>
                    <p class="page-subtitle">
                        <?php printf(esc_html__('Explore our %s services', 'blueprint-folder'), strtolower(single_term_title('', false))); ?>
                    </p>
                <?php endif; ?>
                
                <!-- Category Meta -->
                <div class="category-meta">
                    <?php
                    $term = get_queried_object();
                    $count = $term->count;
                    printf(
                        _n(
                            '%d service available',
                            '%d services available',
                            $count,
                            'blueprint-folder'
                        ),
                        $count
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-grid">
        <div class="container">
            
            <!-- Category Navigation -->
            <div class="category-navigation">
                <div class="category-nav-wrapper">
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="category-nav-item">
                        <?php esc_html_e('All Services', 'blueprint-folder'); ?>
                    </a>
                    
                    <?php
                    $all_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'order' => 'ASC',
                    ));
                    
                    $current_term = get_queried_object();
                    
                    if (!empty($all_categories) && !is_wp_error($all_categories)) :
                        foreach ($all_categories as $category) :
                            $is_current = ($category->term_id === $current_term->term_id);
                            $class = $is_current ? 'category-nav-item current' : 'category-nav-item';
                    ?>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="<?php echo esc_attr($class); ?>">
                                <?php echo esc_html($category->name); ?>
                                <span class="count">(<?php echo esc_html($category->count); ?>)</span>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
            
            <!-- Services Container -->
            <div class="services-container">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="service-card">
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
                    <?php endwhile; ?>
                    
                <?php else : ?>
                    <div class="no-services">
                        <div class="no-services-content">
                            <i class="fas fa-tools" aria-hidden="true"></i>
                            <h3><?php esc_html_e('No Services Found', 'blueprint-folder'); ?></h3>
                            <p><?php esc_html_e('There are currently no services in this category. Please check back soon!', 'blueprint-folder'); ?></p>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary">
                                <?php esc_html_e('View All Services', 'blueprint-folder'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>
$term_name = $queried_object->name;
$term_description = $queried_object->description;
$term_slug = $queried_object->slug;

// Count services in this category
$services_count = 0;
if (have_posts()) {
    global $wp_query;
    $services_count = $wp_query->found_posts;
}
?>

<main id="main" class="site-main">
    <?php
    // Page Banner with category name
    echo services_pro_get_banner_section(
        esc_html($term_name),
        !empty($term_description) ? esc_html($term_description) : 'Professional services in ' . esc_html($term_name) . ' category'
    );
    ?>

    <!-- Services in Category Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()): ?>
                <?php echo services_pro_get_section_heading(
                    'Available Services',
                    'Professional ' . esc_html($term_name) . ' services (' . $services_count . ' found)'
                ); ?>
                
                <div class="row g-4">
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
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
                    <p class="text-muted mb-4">No services are currently available in the "<?php echo esc_html($term_name); ?>" category.</p>
                    <p class="text-muted mb-4">We're constantly adding new services. Check back soon or contact us for custom solutions.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                            <i class="fas fa-phone me-2"></i>Contact Us
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-accent">
                            <i class="fas fa-list me-2"></i>All Services
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section bg-accent text-white">
        <div class="container text-center">
            <h2 class="h3 mb-3">Need Help with <?php echo esc_html($term_name); ?>?</h2>
            <p class="mb-4">Contact us for personalized solutions and professional service.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>Get Custom Quote
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
