<?php
/**
 * Template Name: Business Blueprint Library - Dynamic
 * Description: A service page that integrates with WordPress posts/services
 */

get_header(); ?>

<main id="main" class="site-main business-library-page">
    <!-- Hero Section -->
    <section class="business-library-hero py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50; font-family: 'Arial', sans-serif;">
                        Business Blueprint Library
                    </h1>
                    <p class="lead mb-4" style="color: #6c757d; font-size: 1.1rem;">
                        Your All-in-One Collection of Ready-to-Launch<br>
                        Digital Business Guides
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="business-library-services py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                // Define the business services data
                $business_services = array(
                    array(
                        'title' => 'Profitable Podcast',
                        'book_title' => 'Profitable<br>Podcast',
                        'subtitle' => 'Start a<br>podcast and<br>make money',
                        'description' => 'Start a podcast and make money',
                        'color' => 'blue',
                        'link' => get_permalink(get_page_by_path('profitable-podcast')) ?: '#'
                    ),
                    array(
                        'title' => 'Freelance Formula',
                        'book_title' => 'Freelance<br>Formula',
                        'subtitle' => 'Build a<br>successful<br>freelance business',
                        'description' => 'Build a successful freelance business',
                        'color' => 'pink',
                        'link' => get_permalink(get_page_by_path('freelance-formula')) ?: '#'
                    ),
                    array(
                        'title' => 'Consulting',
                        'book_title' => 'Consulting',
                        'subtitle' => 'Become a highly-<br>paid consultant',
                        'description' => 'Become a highly-paid consultant',
                        'color' => 'yellow',
                        'link' => get_permalink(get_page_by_path('consulting')) ?: '#'
                    ),
                    array(
                        'title' => 'Content Creator',
                        'book_title' => 'Property<br>Investment',
                        'subtitle' => 'Make wealth<br>through smart<br>investments',
                        'description' => 'Monetize your creativity online',
                        'color' => 'blue',
                        'link' => get_permalink(get_page_by_path('content-creator')) ?: '#'
                    ),
                    array(
                        'title' => 'Property Investment',
                        'book_title' => 'Social<br>Media<br>Agency',
                        'subtitle' => 'Success with a<br>social media<br>agency',
                        'description' => 'Build wealth through smart investments',
                        'color' => 'yellow',
                        'link' => get_permalink(get_page_by_path('property-investment')) ?: '#'
                    ),
                    array(
                        'title' => 'Course Creator',
                        'book_title' => 'Substack',
                        'subtitle' => 'Start and<br>monetize a<br>newsletter',
                        'description' => 'Create and sell online courses',
                        'color' => 'blue',
                        'link' => get_permalink(get_page_by_path('course-creator')) ?: '#'
                    ),
                    array(
                        'title' => 'Affiliate Marketing',
                        'book_title' => 'Course<br>Creator',
                        'subtitle' => 'Create and<br>sell online<br>courses',
                        'description' => 'Make passive income with referrals',
                        'color' => 'yellow',
                        'link' => get_permalink(get_page_by_path('affiliate-marketing')) ?: '#'
                    ),
                    array(
                        'title' => 'Virtual Assistant',
                        'book_title' => 'Affiliate<br>Marketing',
                        'subtitle' => 'Make passive<br>income with<br>referrals',
                        'description' => 'Launch your VA business from home',
                        'color' => 'blue',
                        'link' => get_permalink(get_page_by_path('virtual-assistant')) ?: '#'
                    ),
                    array(
                        'title' => 'Dropshipping Business',
                        'book_title' => 'Dropshipping<br>Business',
                        'subtitle' => 'Run a profitable<br>business without<br>inventory',
                        'description' => 'Run a profitable business without inventory',
                        'color' => 'pink',
                        'link' => get_permalink(get_page_by_path('dropshipping-business')) ?: '#'
                    ),
                    array(
                        'title' => 'Course Creator',
                        'book_title' => 'Course<br>Creator',
                        'subtitle' => 'Create and<br>sell online<br>courses',
                        'description' => 'Create and sell online courses',
                        'color' => 'yellow',
                        'link' => get_permalink(get_page_by_path('course-creator-advanced')) ?: '#'
                    ),
                    array(
                        'title' => 'Affiliate Marketing',
                        'book_title' => 'Affiliate<br>Marketing',
                        'subtitle' => 'Make passive<br>income with<br>referrals',
                        'description' => 'Make passive income with referrals',
                        'color' => 'blue',
                        'link' => get_permalink(get_page_by_path('affiliate-marketing-pro')) ?: '#'
                    ),
                    array(
                        'title' => 'Virtual Assistant',
                        'book_title' => 'Virtual<br>Assistant',
                        'subtitle' => 'Launch your VA<br>business from<br>home',
                        'description' => 'Launch your VA business from home',
                        'color' => 'pink',
                        'link' => get_permalink(get_page_by_path('virtual-assistant-pro')) ?: '#'
                    )
                );

                // Get gradient colors for each service type
                $color_gradients = array(
                    'blue' => 'linear-gradient(135deg, #4285f4, #1a73e8)',
                    'pink' => 'linear-gradient(135deg, #ea4335, #d33b2c)', 
                    'yellow' => 'linear-gradient(135deg, #fbbc04, #f9ab00)',
                    'green' => 'linear-gradient(135deg, #34a853, #137333)'
                );

                // Loop through each service
                foreach ($business_services as $index => $service) :
                    $gradient = $color_gradients[$service['color']];
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="business-card h-100" data-color="<?php echo esc_attr($service['color']); ?>">
                            <div class="business-book">
                                <div class="book-spine" style="background: <?php echo esc_attr($gradient); ?>;">
                                    <div class="book-title">
                                        <h3><?php echo $service['book_title']; ?></h3>
                                        <p class="book-subtitle"><?php echo $service['subtitle']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="business-info">
                                <h4 class="service-title"><?php echo esc_html($service['title']); ?></h4>
                                <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                                <a href="<?php echo esc_url($service['link']); ?>" class="btn btn-primary btn-rounded">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Additional Services Section (Optional) -->
    <?php
    // Query actual services from WordPress if you have a services post type
    $services_query = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => 8,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'featured_service',
                'value' => 'yes',
                'compare' => '='
            )
        )
    ));

    if ($services_query->have_posts()) : ?>
        <section class="additional-services py-5" style="background: #ffffff;">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-8">
                        <h2 class="h1 fw-bold mb-3" style="color: #2c3e50;">
                            Featured Services
                        </h2>
                        <p class="lead text-muted">
                            Explore our most popular and highly-rated services
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    <?php 
                    $colors = array('blue', 'pink', 'yellow', 'green');
                    $color_index = 0;
                    
                    while ($services_query->have_posts()) : 
                        $services_query->the_post();
                        $current_color = $colors[$color_index % 4];
                        $gradient = $color_gradients[$current_color];
                        $color_index++;
                    ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="business-card h-100" data-color="<?php echo esc_attr($current_color); ?>">
                                <div class="business-book">
                                    <div class="book-spine" style="background: <?php echo esc_attr($gradient); ?>;">
                                        <div class="book-title">
                                            <h3><?php echo wp_trim_words(get_the_title(), 2, ''); ?></h3>
                                            <p class="book-subtitle">
                                                <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 8, '...'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="business-info">
                                    <h4 class="service-title"><?php the_title(); ?></h4>
                                    <p class="service-description">
                                        <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 15, '...'); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-rounded">
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php 
    endif;
    wp_reset_postdata();
    ?>

    <!-- Call to Action Section -->
    <section class="business-library-cta py-5" style="background: linear-gradient(135deg, #007bff, #0056b3);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-3 text-white">
                        Ready to Start Your Business Journey?
                    </h2>
                    <p class="lead mb-4 text-white opacity-75">
                        Choose the blueprint that matches your goals and start building your successful business today.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?php echo esc_url(site_url('/contact')); ?>" class="btn btn-light btn-lg btn-rounded px-4">
                            <i class="fas fa-envelope me-2"></i>
                            Get Started Today
                        </a>
                        <a href="<?php echo esc_url(site_url('/services')); ?>" class="btn btn-outline-light btn-lg btn-rounded px-4">
                            <i class="fas fa-th-large me-2"></i>
                            View All Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="business-library-footer py-4" style="background: #2c3e50; color: white;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-2" style="font-size: 0.9rem;">
                        © <?php echo date('Y'); ?> Business Blueprint Library. All rights reserved.
                    </p>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(site_url('/privacy-policy')); ?>" class="text-white-50 me-3" style="text-decoration: none;">Privacy Policy</a>
                        <a href="<?php echo esc_url(site_url('/terms-of-use')); ?>" class="text-white-50 me-3" style="text-decoration: none;">Terms of Use</a>
                        <a href="<?php echo esc_url(site_url('/contact')); ?>" class="text-white-50" style="text-decoration: none;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
