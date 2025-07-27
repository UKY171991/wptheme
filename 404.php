<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<!-- 404 Error Page -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-404-content">
                    <!-- Large 404 Number -->
                    <div class="error-number mb-4">
                        <h1 class="display-1 text-primary fw-bold">404</h1>
                    </div>
                    
                    <!-- Error Message -->
                    <h2 class="mb-4">Oops! Page Not Found</h2>
                    <p class="lead mb-4">
                        The page you're looking for doesn't exist or has been moved. 
                        Don't worry, it happens to the best of us!
                    </p>
                    
                    <!-- Search Form -->
                    <div class="error-search mb-5">
                        <h5 class="mb-3">Try searching for what you need:</h5>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="error-actions mb-5">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-home me-2"></i>
                            Go Home
                        </a>
                        <a href="javascript:history.back()" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Helpful Links -->
<section class="section bg-light-gray">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h3>Looking for something specific?</h3>
                <p class="lead">Here are some popular pages that might help:</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Services Link -->
            <div class="col-lg-3 col-md-6">
                <div class="help-card text-center h-100">
                    <div class="help-icon mb-3">
                        <i class="fas fa-cogs fa-3x text-primary"></i>
                    </div>
                    <h5>Our Services</h5>
                    <p class="mb-4">Discover what we can do for your business</p>
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-primary">
                        View Services
                    </a>
                </div>
            </div>
            
            <!-- About Link -->
            <div class="col-lg-3 col-md-6">
                <div class="help-card text-center h-100">
                    <div class="help-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h5>About Us</h5>
                    <p class="mb-4">Learn more about our company and team</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn btn-outline-primary">
                        About Us
                    </a>
                </div>
            </div>
            
            <!-- Blog Link -->
            <div class="col-lg-3 col-md-6">
                <div class="help-card text-center h-100">
                    <div class="help-icon mb-3">
                        <i class="fas fa-blog fa-3x text-primary"></i>
                    </div>
                    <h5>Blog</h5>
                    <p class="mb-4">Read our latest insights and updates</p>
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline-primary">
                        Read Blog
                    </a>
                </div>
            </div>
            
            <!-- Contact Link -->
            <div class="col-lg-3 col-md-6">
                <div class="help-card text-center h-100">
                    <div class="help-icon mb-3">
                        <i class="fas fa-envelope fa-3x text-primary"></i>
                    </div>
                    <h5>Contact</h5>
                    <p class="mb-4">Get in touch with our team</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-primary">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Content -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- Recent Posts -->
            <div class="col-lg-6">
                <h4 class="mb-4">Recent Blog Posts</h4>
                <?php
                $recent_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($recent_posts->have_posts()) : ?>
                    <div class="recent-posts">
                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <div class="recent-post mb-3 pb-3 border-bottom">
                                <h6 class="mb-1">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h6>
                                <small class="text-muted d-block mb-2"><?php echo get_the_date(); ?></small>
                                <p class="small mb-0"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>No recent posts available.</p>
                <?php endif; ?>
            </div>
            
            <!-- Recent Services -->
            <div class="col-lg-6">
                <h4 class="mb-4">Popular Services</h4>
                <?php
                $recent_services = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($recent_services->have_posts()) : ?>
                    <div class="recent-services">
                        <?php while ($recent_services->have_posts()) : $recent_services->the_post(); ?>
                            <div class="recent-service mb-3 pb-3 border-bottom">
                                <h6 class="mb-1">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h6>
                                <?php
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                if ($price) : ?>
                                    <small class="text-primary d-block mb-2"><?php echo esc_html($price); ?></small>
                                <?php endif; ?>
                                <p class="small mb-0"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>No services available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="section bg-primary">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h3 class="text-white mb-4">Still Can't Find What You're Looking For?</h3>
                <p class="text-white-50 mb-4 lead">
                    Our team is here to help! Contact us and we'll assist you in finding exactly what you need.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>
                        Contact Support
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-home me-2"></i>
                        Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
