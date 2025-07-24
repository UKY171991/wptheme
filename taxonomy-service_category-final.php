<?php get_header(); ?>

<main id="main" class="site-main">

<?php
// Get current taxonomy term
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_name = $queried_object->name;
$term_description = $queried_object->description;
$term_slug = $queried_object->slug;

// Count services in this category
$category_services = new WP_Query(array(
    'post_type' => 'services',
    'tax_query' => array(
        array(
            'taxonomy' => 'service_category',
            'field'    => 'term_id',
            'terms'    => $term_id,
        ),
    ),
    'posts_per_page' => -1,
    'fields' => 'ids'
));
$services_count = $category_services->found_posts;
wp_reset_postdata();

// Get category icon 
$category_icon = '🎓'; // Default coaching icon
$icon_map = array(
    'home-cleaning' => '🧹', 'home-maintenance' => '🧰', 'personal-errands' => '🛍️',
    'pet-services' => '🐶', 'family-support' => '👶', 'creative-digital' => '🎨',
    'coaching-consulting' => '🎓', 'office-admin' => '💼', 'selling-flipping' => '📦',
    'coaching' => '🎓', 'consulting' => '🎓'
);
$category_icon = isset($icon_map[$term_slug]) ? $icon_map[$term_slug] : '🎓';
?>

<!-- Universal Banner Section -->
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <div class="badge">
                <span class="badge-icon"><?php echo $category_icon; ?></span>
                <span class="badge-text">SERVICE CATEGORY</span>
            </div>
            <h1 class="banner-title"><?php echo esc_html($term_name); ?></h1>
            <p class="banner-description">
                <?php echo !empty($term_description) ? wp_kses_post($term_description) : 'Professional services in ' . esc_html($term_name) . ' category'; ?>
            </p>
            <div class="banner-buttons">
                <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-primary">Browse All Services</a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Get Quote</a>
            </div>
            <div class="banner-stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $services_count; ?></span>
                    <span class="stat-label">Available Services</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Content Section -->
<div class="universal-page-content">
    <div class="container">
        <section class="content-section">
            <h2>Services in <?php echo esc_html($term_name); ?> Category</h2>
            
            <?php if (have_posts()) : ?>
                <div class="services-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="service-card">
                            <div class="service-card-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="service-excerpt">
                                        <?php 
                                        if (has_excerpt()) {
                                            echo wp_trim_words(get_the_excerpt(), 20);
                                        } else {
                                            echo wp_trim_words(get_the_content(), 20);
                                        }
                                        ?>
                                    </div>
                                    
                                    <?php 
                                    $price = get_post_meta(get_the_ID(), '_service_price', true);
                                    if ($price) : ?>
                                        <div class="service-price"><?php echo esc_html($price); ?></div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'services-pro'),
                    'next_text' => __('Next →', 'services-pro'),
                ));
                ?>
                
            <?php else : ?>
                <div class="no-services">
                    <h3>No services found in this category</h3>
                    <p>Category: <?php echo esc_html($term_name); ?> (Slug: <?php echo esc_html($term_slug); ?>)</p>
                    <p>We're constantly adding new services. Check back soon or contact us for custom solutions.</p>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Contact Us</a>
                    <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-secondary">All Services</a>
                </div>
            <?php endif; ?>
        </section>
    </div>
</div>

</main>

<?php get_footer(); ?>
