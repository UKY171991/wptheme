<?php
/**
 * Template Functions
 * Reusable functions for theme templates
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get page banner section with dynamic background
 */
function services_pro_get_banner_section($title = '', $subtitle = '', $use_featured_image = true) {
    if (empty($title)) {
        if (is_home() || is_front_page()) {
            $title = get_bloginfo('name');
        } elseif (is_archive()) {
            $title = get_the_archive_title();
        } elseif (is_search()) {
            $title = 'Search Results';
        } elseif (is_404()) {
            $title = 'Page Not Found';
        } else {
            $title = get_the_title();
        }
    }
    
    // Get background image
    $background_image = '';
    $background_style = '';
    
    if ($use_featured_image && has_post_thumbnail()) {
        $background_image = get_the_post_thumbnail_url(get_the_ID(), 'hero-image');
    } elseif (is_archive() && function_exists('get_field')) {
        $background_image = get_field('archive_banner_image', 'option');
    } elseif (function_exists('get_field')) {
        $background_image = get_field('default_banner_image', 'option');
    }
    
    if ($background_image) {
        $background_style = 'background-image: linear-gradient(rgba(11, 17, 51, 0.7), rgba(11, 17, 51, 0.7)), url(' . esc_url($background_image) . '); background-size: cover; background-position: center;';
    }
    
    $breadcrumbs = services_pro_get_breadcrumbs();
    
    ob_start();
    ?>
    <section class="page-banner bg-primary-dark text-white position-relative py-5" style="<?php echo esc_attr($background_style); ?>">
        <div class="container">
            <div class="row align-items-center min-vh-30">
                <div class="col-lg-8">
                    <?php if ($breadcrumbs): ?>
                        <nav aria-label="breadcrumb" class="mb-4">
                            <?php echo $breadcrumbs; ?>
                        </nav>
                    <?php endif; ?>
                    
                    <div class="fade-in-up">
                        <h1 class="display-4 fw-bold mb-3 text-white">
                            <?php echo esc_html($title); ?>
                        </h1>
                        
                        <?php if ($subtitle): ?>
                            <p class="lead text-light mb-0"><?php echo esc_html($subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Get page hero section
 */
function services_pro_get_hero_section($title = '', $subtitle = '', $background_class = 'bg-primary-dark') {
    if (empty($title)) {
        $title = get_the_title();
    }
    
    $breadcrumbs = services_pro_get_breadcrumbs();
    
    ob_start();
    ?>
    <section class="section <?php echo esc_attr($background_class); ?> text-white position-relative">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row align-items-center min-vh-60">
                <div class="col-lg-8">
                    <?php if ($breadcrumbs): ?>
                        <nav aria-label="breadcrumb" class="mb-4">
                            <?php echo $breadcrumbs; ?>
                        </nav>
                    <?php endif; ?>
                    
                    <div class="fade-in-up">
                        <h1 class="display-3 fw-bold mb-4 text-white">
                            <?php echo esc_html($title); ?>
                        </h1>
                        
                        <?php if ($subtitle): ?>
                            <p class="lead text-light mb-5"><?php echo esc_html($subtitle); ?></p>
                        <?php endif; ?>
                        
                        <div class="d-flex flex-wrap gap-3">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-phone me-2"></i>Get Started
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                                <i class="fas fa-list me-2"></i>Our Services
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="text-center">
                        <div class="rounded-circle bg-light p-5 mx-auto" style="width: 300px; height: 300px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-home text-primary-dark" style="font-size: 8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Get breadcrumbs
 */
function services_pro_get_breadcrumbs() {
    if (is_front_page()) {
        return '';
    }
    
    ob_start();
    ?>
    <ol class="breadcrumb bg-transparent p-0 m-0">
        <li class="breadcrumb-item">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                <i class="fas fa-home me-1"></i>Home
            </a>
        </li>
        
        <?php if (is_category() || is_single()): ?>
            <?php if (is_single()): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="text-white text-decoration-none">
                        Blog
                    </a>
                </li>
            <?php endif; ?>
            <?php $categories = get_the_category(); ?>
            <?php if (!empty($categories)): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="text-white text-decoration-none">
                        <?php echo esc_html($categories[0]->name); ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php elseif (is_page()): ?>
            <?php $parent_id = wp_get_post_parent_id(get_the_ID()); ?>
            <?php if ($parent_id): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url(get_permalink($parent_id)); ?>" class="text-white text-decoration-none">
                        <?php echo esc_html(get_the_title($parent_id)); ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php elseif (is_archive()): ?>
            <?php if (is_post_type_archive()): ?>
                <?php $post_type = get_post_type_object(get_post_type()); ?>
                <?php if ($post_type): ?>
                    <li class="breadcrumb-item text-accent" aria-current="page">
                        <?php echo esc_html($post_type->labels->name); ?>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        
        <?php if (is_single() || is_page()): ?>
            <li class="breadcrumb-item active text-accent" aria-current="page">
                <?php echo esc_html(get_the_title()); ?>
            </li>
        <?php elseif (is_category()): ?>
            <li class="breadcrumb-item active text-accent" aria-current="page">
                <?php echo esc_html(single_cat_title('', false)); ?>
            </li>
        <?php elseif (is_tag()): ?>
            <li class="breadcrumb-item active text-accent" aria-current="page">
                <?php echo esc_html(single_tag_title('', false)); ?>
            </li>
        <?php elseif (is_search()): ?>
            <li class="breadcrumb-item active text-accent" aria-current="page">
                Search Results
            </li>
        <?php elseif (is_404()): ?>
            <li class="breadcrumb-item active text-accent" aria-current="page">
                404 Error
            </li>
        <?php endif; ?>
    </ol>
    <?php
    return ob_get_clean();
}

/**
 * Get CTA section
 */
function services_pro_get_cta_section($title = '', $subtitle = '', $button_text = 'Get Started', $button_url = '') {
    if (empty($title)) {
        $title = 'Ready to Get Started?';
    }
    
    if (empty($subtitle)) {
        $subtitle = 'Contact us today for a free consultation and see how we can help you.';
    }
    
    if (empty($button_url)) {
        $button_url = get_permalink(get_page_by_path('contact'));
    }
    
    ob_start();
    ?>
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4"><?php echo esc_html($title); ?></h2>
                    <p class="lead mb-4"><?php echo esc_html($subtitle); ?></p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url($button_url); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-phone me-2"></i><?php echo esc_html($button_text); ?>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-list me-2"></i>View Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Get section heading
 */
function services_pro_get_section_heading($title, $subtitle = '', $center = true) {
    $class = $center ? 'section-heading text-center mb-5' : 'section-heading mb-5';
    
    ob_start();
    ?>
    <div class="<?php echo esc_attr($class); ?>">
        <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        <?php if ($subtitle): ?>
            <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Get stats/numbers section
 */
function services_pro_get_stats_section($stats = array()) {
    if (empty($stats)) {
        $stats = array(
            array('number' => '15,000+', 'label' => 'Happy Customers'),
            array('number' => '20+', 'label' => 'Years Experience'),
            array('number' => '99%', 'label' => 'Client Satisfaction'),
            array('number' => '24/7', 'label' => 'Support Available'),
        );
    }
    
    ob_start();
    ?>
    <div class="row g-4 text-center">
        <?php foreach ($stats as $stat): ?>
            <div class="col-6 col-md-3">
                <div class="h1 fw-bold text-accent mb-1"><?php echo esc_html($stat['number']); ?></div>
                <small class="text-muted"><?php echo esc_html($stat['label']); ?></small>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Clean output buffering
 */
function services_pro_clean_output() {
    if (ob_get_length()) {
        ob_end_clean();
    }
}

/**
 * Display menu items from CPT with categories
 */
function services_pro_display_menu_items($posts_per_page = -1) {
    // Get all menu categories
    $categories = get_terms(array(
        'taxonomy' => 'menu_category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (empty($categories) || is_wp_error($categories)) {
        // If no categories, show all menu items
        services_pro_display_menu_items_without_categories($posts_per_page);
        return;
    }
    
    ob_start();
    ?>
    <div class="menu-items-display">
        <?php foreach ($categories as $category): ?>
            <div class="menu-category-section mb-5">
                <h3 class="h4 text-accent mb-4 border-bottom pb-2">
                    <i class="fas fa-utensils me-2"></i><?php echo esc_html($category->name); ?>
                </h3>
                
                <?php if ($category->description): ?>
                    <p class="text-muted mb-4"><?php echo esc_html($category->description); ?></p>
                <?php endif; ?>
                
                <div class="row g-4">
                    <?php
                    $menu_items = new WP_Query(array(
                        'post_type' => 'menu_item',
                        'posts_per_page' => $posts_per_page,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'menu_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ),
                        ),
                        'meta_key' => 'menu_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC'
                    ));
                    
                    if ($menu_items->have_posts()):
                        while ($menu_items->have_posts()): $menu_items->the_post();
                            $price = get_post_meta(get_the_ID(), 'price', true);
                            $description = get_the_excerpt() ? get_the_excerpt() : get_the_content();
                            ?>
                            <div class="col-lg-6">
                                <div class="menu-item-card h-100 p-4 bg-light rounded border">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h4 class="h5 mb-0 text-primary-dark"><?php the_title(); ?></h4>
                                        <?php if ($price): ?>
                                            <span class="badge bg-accent text-white fs-6">$<?php echo esc_html($price); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if ($description): ?>
                                        <p class="text-muted mb-3"><?php echo wp_trim_words($description, 20); ?></p>
                                    <?php endif; ?>
                                    
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="menu-item-image mt-3">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'max-width: 80px; height: auto;')); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <div class="col-12">
                            <p class="text-muted">No menu items found in this category.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    echo ob_get_clean();
}

/**
 * Display menu items without categories
 */
function services_pro_display_menu_items_without_categories($posts_per_page = -1) {
    $menu_items = new WP_Query(array(
        'post_type' => 'menu_item',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'meta_key' => 'menu_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    ));
    
    if (!$menu_items->have_posts()) {
        echo '<p class="text-muted">No menu items found.</p>';
        return;
    }
    
    ob_start();
    ?>
    <div class="row g-4">
        <?php while ($menu_items->have_posts()): $menu_items->the_post();
            $price = get_post_meta(get_the_ID(), 'price', true);
            $description = get_the_excerpt() ? get_the_excerpt() : get_the_content();
            ?>
            <div class="col-lg-6">
                <div class="menu-item-card h-100 p-4 bg-light rounded border">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="h5 mb-0 text-primary-dark"><?php the_title(); ?></h3>
                        <?php if ($price): ?>
                            <span class="badge bg-accent text-white fs-6">$<?php echo esc_html($price); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($description): ?>
                        <p class="text-muted mb-3"><?php echo wp_trim_words($description, 20); ?></p>
                    <?php endif; ?>
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="menu-item-image mt-3">
                            <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'max-width: 80px; height: auto;')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    echo ob_get_clean();
}

/**
 * Display services with categories
 */
function services_pro_display_services($posts_per_page = -1) {
    $services = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
    
    if (!$services->have_posts()) {
        echo '<p class="text-muted">No services found.</p>';
        return;
    }
    
    ob_start();
    ?>
    <div class="row g-4">
        <?php while ($services->have_posts()): $services->the_post(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 bg-white rounded shadow-sm border">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="service-image mb-3">
                            <?php the_post_thumbnail('service-thumbnail', array('class' => 'rounded w-100')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="h5 mb-3 text-primary-dark"><?php the_title(); ?></h3>
                    
                    <p class="text-muted mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-accent btn-sm">
                        Learn More <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    echo ob_get_clean();
}

/**
 * Display FAQs with categories
 */
function services_pro_display_faqs($posts_per_page = -1) {
    // Get all FAQ categories
    $categories = get_terms(array(
        'taxonomy' => 'faq_category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (empty($categories) || is_wp_error($categories)) {
        // If no categories, show all FAQs
        services_pro_display_faqs_without_categories($posts_per_page);
        return;
    }
    
    ob_start();
    ?>
    <div class="faq-display">
        <?php foreach ($categories as $category): ?>
            <div class="faq-category-section mb-5">
                <h3 class="h4 text-accent mb-4 border-bottom pb-2">
                    <i class="fas fa-question-circle me-2"></i><?php echo esc_html($category->name); ?>
                </h3>
                
                <div class="accordion" id="faq-category-<?php echo $category->term_id; ?>">
                    <?php
                    $faqs = new WP_Query(array(
                        'post_type' => 'faq',
                        'posts_per_page' => $posts_per_page,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'faq_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ),
                        ),
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));
                    
                    if ($faqs->have_posts()):
                        $faq_count = 0;
                        while ($faqs->have_posts()): $faqs->the_post();
                            $faq_count++;
                            $accordion_id = 'faq-' . $category->term_id . '-' . $faq_count;
                            ?>
                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordion_id; ?>" aria-expanded="false">
                                        <?php the_title(); ?>
                                    </button>
                                </h4>
                                <div id="<?php echo $accordion_id; ?>" class="accordion-collapse collapse" data-bs-parent="#faq-category-<?php echo $category->term_id; ?>">
                                    <div class="accordion-body">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    echo ob_get_clean();
}

/**
 * Display FAQs without categories
 */
function services_pro_display_faqs_without_categories($posts_per_page = -1) {
    $faqs = new WP_Query(array(
        'post_type' => 'faq',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
    
    if (!$faqs->have_posts()) {
        echo '<p class="text-muted">No FAQs found.</p>';
        return;
    }
    
    ob_start();
    ?>
    <div class="accordion" id="faq-accordion">
        <?php 
        $faq_count = 0;
        while ($faqs->have_posts()): $faqs->the_post();
            $faq_count++;
            $accordion_id = 'faq-item-' . $faq_count;
            ?>
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordion_id; ?>" aria-expanded="false">
                        <?php the_title(); ?>
                    </button>
                </h3>
                <div id="<?php echo $accordion_id; ?>" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                    <div class="accordion-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php
    echo ob_get_clean();
}
