<?php
/**
 * Service Category Archive Template
 * Displays services filtered by category
 *
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header();

// Get current term information
$current_term = get_queried_object();
$term_name = $current_term->name ?? '';
$term_description = $current_term->description ?? '';
$term_slug = $current_term->slug ?? '';
$services_count = $current_term->count ?? 0;?>
<main id="main" class="site-main">
    <!-- Banner Section -->
    <section class="page-banner bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent">
                            <li class="breadcrumb-item">
                                <a href="<?php echo home_url('/');?>" class="text-white-50">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?php echo get_post_type_archive_link('service');?>" class="text-white-50">Services</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                <?php echo esc_html($term_name);?>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-tag me-3"></i>
                        <?php echo esc_html($term_name);?>
                    </h1>
                    <?php if (!empty($term_description)) :?>
                        <p class="lead mb-4 text-white-75">
                            <?php echo esc_html($term_description);?>
                        </p>
                    <?php else :?>
                        <p class="lead mb-4 text-white-75">
                            Professional <?php echo esc_html(strtolower($term_name));?> services for your needs
                        </p>
                    <?php endif;?>
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 rounded-pill px-4 py-2">
                        <i class="fas fa-list-ul me-2"></i>
                        <span class="fw-semibold">
                            <?php echo $services_count;?> Service<?php echo $services_count != 1 ? 's' : '';?> Available
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Categories Filter -->
    <section class="section bg-light">
        <div class="container">
            <div class="service-categories-filter">
                <div class="bg-white rounded-3 p-4 shadow-sm">
                    <h3 class="h5 mb-3 text-center" style="color: #2c3e50; font-weight: 600;">
                        <i class="fas fa-filter me-2" style="color: #3498db;"></i>
                        Browse Categories
                    </h3>
                    <div class="categories-list d-flex flex-wrap justify-content-center gap-3">
                        <!-- All Services Button -->
                        <a href="<?php echo get_post_type_archive_link('service');?>"
                           class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-th-large me-2"></i>
                            All Services
                            <span class="badge bg-primary ms-2"><?php echo wp_count_posts('service')->publish;?></span>
                        </a>
                        <?php
                        // Get all service categories
                        $service_categories = get_terms(array(
                            'taxonomy' => 'service_category',
                            'hide_empty' => true,
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ));

                        if ($service_categories && !is_wp_error($service_categories)) :
                            foreach ($service_categories as $category) :
                                $is_current = ($current_term->term_id == $category->term_id);
                                $btn_class = $is_current ? 'btn btn-primary btn-sm' : 'btn btn-outline-secondary btn-sm';?>
                            <a href="<?php echo get_term_link($category);?>"
                               class="<?php echo $btn_class;?>">
                                <i class="fas fa-tag me-2"></i>
                                <?php echo esc_html($category->name);?>
                                <span class="badge <?php echo $is_current ? 'bg-white text-primary' : 'bg-secondary';?> ms-2">
                                    <?php echo $category->count;?>
                                </span>
                            </a>
                        <?php
                            endforeach;
                        endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Grid -->
    <section class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-star me-3" style="color: #3498db;"></i>
                    <?php echo esc_html($term_name);?> Services
                </h2>
                <p class="section-subtitle lead text-muted">
                    <?php echo $services_count;?> professional service<?php echo $services_count != 1 ? 's' : '';?> available in this category
                </p>
            </div>
            <?php
            // Custom query to ensure we get the services for this category
            $current_term = get_queried_object();
            $services_query = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 12,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service_category',
                        'field' => 'term_id',
                        'terms' => $current_term->term_id,
                    ),
                ),
                'orderby' => 'title',
                'order' => 'ASC'
            ));

            if ($services_query->have_posts()) :?>
                <div class="row g-4">
                    <?php while ($services_query->have_posts()) : $services_query->the_post();
                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'fas fa-home';
                        $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                        $service_featured = get_post_meta(get_the_ID(), '_service_featured', true);?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden <?php echo $service_featured ? 'featured' : '';?>">
                                <?php if (has_post_thumbnail()) :?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 200px; object-fit: cover;'));?>
                                        </a>
                                    </div>
                                <?php else :?>
                                    <div class="service-icon-header bg-light p-4 text-center">
                                        <i class="<?php echo esc_attr($service_icon);?> text-primary" style="font-size: 3rem;"></i>
                                    </div>
                                <?php endif;?>
                                <div class="card-body p-4">
                                    <h3 class="h5 mb-3">
                                        <a href="<?php the_permalink();?>" class="text-decoration-none text-dark">
                                            <?php the_title();?>
                                        </a>
                                    </h3>
                                    <p class="text-muted mb-3">
                                        <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 20);?>
                                    </p>
                                    <?php
                                    // Display service categories
                                    $categories = get_the_terms(get_the_ID(), 'service_category');
                                    if ($categories && !is_wp_error($categories)) :?>
                                        <div class="service-categories mb-3">
                                            <?php foreach ($categories as $cat) :?>
                                                <span class="badge bg-light text-dark me-1"><?php echo esc_html($cat->name);?></span>
                                            <?php endforeach;?>
                                        </div>
                                    <?php endif;?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php if ($service_price) :?>
                                            <div class="service-price">
                                                <span class="h6 text-primary mb-0"><?php echo esc_html($service_price);?></span>
                                            </div>
                                        <?php endif;?>
                                        <a href="<?php the_permalink();?>" class="btn btn-outline-primary btn-sm">
                                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
                <?php wp_reset_postdata();?>
                <!-- Pagination -->
                <?php if ($services_query->max_num_pages > 1) :?>
                    <div class="mt-5">
                        <?php
                        // Custom pagination for our custom query
                        $big = 999999999;
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $services_query->max_num_pages,
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-chevron-left me-1"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right ms-1"></i>',
                            'type' => 'list',
                            'class' => 'pagination justify-content-center'
                        ));?>
                    </div>
                <?php endif;?>
            <?php else :?>
                <div class="text-center py-5">
                    <div class="bg-light p-5 rounded-3">
                        <i class="fas fa-search text-muted mb-3" style="font-size: 3rem;"></i>
                        <h3 class="h4 mb-3">No Services Found</h3>
                        <p class="text-muted mb-4">
                            No services are currently available in the "<?php echo esc_html($term_name);?>" category.
                        </p>
                        <p class="text-muted mb-4">
                            We're constantly adding new services. Check back soon or contact us for custom solutions.
                        </p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-primary">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service'));?>" class="btn btn-outline-primary">
                                <i class="fas fa-list me-2"></i>All Services
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </section>
    <!-- Call to Action Section -->
    <section class="section bg-primary">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4" style="font-weight: 600;">
                        Need Help with <?php echo esc_html($term_name);?>?
                    </h2>
                    <p class="text-white-50 mb-4 lead">
                        Contact us today for personalized solutions and professional service tailored to your specific needs.
                    </p>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')) . '?service=' . urlencode($term_name));?>" class="btn btn-light btn-lg">
                            <i class="fas fa-envelope me-2"></i>
                            Get Free Quote
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-phone me-2"></i>
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
