<?php
/**
 * Template Name: Enhanced Pricing Page
 * Professional pricing page with advanced features
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.1.0
 */

get_header(); ?>

<main id="main" class="site-main pricing-enhanced">
    <!-- Enhanced Hero Section with Animation -->
    <section class="section bg-primary-dark text-white position-relative overflow-hidden">
        <div class="hero-background-animation"></div>
        <div class="overlay-accent"></div>
        <div class="container position-relative">
            <div class="row align-items-center justify-content-center text-center" style="min-height: 50vh;">
                <div class="col-lg-10">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Pricing</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-4 py-3 rounded-pill mb-4 fs-6">
                            <i class="fas fa-star me-2"></i>Transparent Pricing
                        </div>
                        
                        <h1 class="display-3 fw-bold mb-4 text-gradient">
                            Choose Your Perfect
                            <span class="text-accent d-block">Service Plan</span>
                        </h1>
                        
                        <p class="lead mb-5 fs-4" style="max-width: 600px; margin: 0 auto;">Clear, honest pricing with no hidden fees. Professional services tailored to your business needs.</p>
                        
                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                            <a href="#pricing-plans" class="btn btn-accent btn-rounded btn-lg px-5 py-3">
                                <i class="fas fa-rocket me-2"></i>View All Plans
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-light btn-rounded btn-lg px-5 py-3">
                                <i class="fas fa-calculator me-2"></i>Custom Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Pricing Plans Section -->
    <section id="pricing-plans" class="section py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Choose Your Plan</h2>
                    <p class="lead text-muted">Flexible pricing options designed to grow with your business</p>
                    
                    <!-- Billing Toggle -->
                    <div class="billing-toggle mt-4">
                        <span class="me-3">Monthly</span>
                        <div class="form-check form-switch d-inline-block">
                            <input class="form-check-input" type="checkbox" id="billingToggle">
                            <label class="form-check-label" for="billingToggle"></label>
                        </div>
                        <span class="ms-3">Annual <span class="badge bg-success">Save 20%</span></span>
                    </div>
                </div>
            </div>

            <div class="row g-4 align-items-center">
                <?php
                $pricing_plans = new WP_Query(array(
                    'post_type' => 'pricing_plan',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'meta_key' => '_pricing_order',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                ));

                if ($pricing_plans->have_posts()) :
                    $plan_count = $pricing_plans->found_posts;
                    $col_class = $plan_count <= 3 ? 'col-lg-4' : 'col-lg-3';
                    
                    while ($pricing_plans->have_posts()) : $pricing_plans->the_post();
                        $price = get_post_meta(get_the_ID(), '_plan_price', true);
                        $period = get_post_meta(get_the_ID(), '_plan_period', true);
                        $features = get_post_meta(get_the_ID(), '_plan_features', true);
                        $featured = get_post_meta(get_the_ID(), '_plan_featured', true);
                        $button_text = get_post_meta(get_the_ID(), '_plan_button_text', true) ?: 'Get Started';
                        $annual_price = $price * 12 * 0.8; // 20% discount for annual
                        ?>
                        <div class="<?php echo esc_attr($col_class); ?> col-md-6">
                            <div class="pricing-card <?php echo $featured ? 'featured' : ''; ?> h-100">
                                <?php if ($featured) : ?>
                                    <div class="popular-badge">
                                        <i class="fas fa-crown me-1"></i>Most Popular
                                    </div>
                                <?php endif; ?>
                                
                                <div class="pricing-header text-center p-4">
                                    <h3 class="plan-name fw-bold mb-3"><?php the_title(); ?></h3>
                                    <div class="price-display">
                                        <span class="currency">$</span>
                                        <span class="price monthly-price"><?php echo esc_html($price); ?></span>
                                        <span class="price annual-price d-none"><?php echo esc_html(number_format($annual_price/12, 0)); ?></span>
                                        <span class="period">
                                            <span class="monthly-period">/<?php echo esc_html($period); ?></span>
                                            <span class="annual-period d-none">/month</span>
                                        </span>
                                    </div>
                                    <p class="plan-description text-muted mt-3"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
                                </div>
                                
                                <div class="pricing-features p-4">
                                    <?php if ($features) : ?>
                                        <ul class="feature-list">
                                            <?php 
                                            $feature_list = explode("\n", $features);
                                            foreach ($feature_list as $feature) :
                                                if (trim($feature)) :
                                            ?>
                                                <li><i class="fas fa-check text-success me-2"></i><?php echo esc_html(trim($feature)); ?></li>
                                            <?php 
                                                endif;
                                            endforeach; 
                                            ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="pricing-footer p-4 mt-auto">
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=<?php echo urlencode(get_the_title()); ?>" 
                                       class="btn <?php echo $featured ? 'btn-accent' : 'btn-outline-primary'; ?> btn-rounded w-100 py-3">
                                        <i class="fas fa-arrow-right me-2"></i><?php echo esc_html($button_text); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Default pricing plans if none exist
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-card h-100">
                            <div class="pricing-header text-center p-4">
                                <h3 class="plan-name fw-bold mb-3">Starter</h3>
                                <div class="price-display">
                                    <span class="currency">$</span>
                                    <span class="price">299</span>
                                    <span class="period">/month</span>
                                </div>
                                <p class="plan-description text-muted mt-3">Perfect for small businesses getting started</p>
                            </div>
                            <div class="pricing-features p-4">
                                <ul class="feature-list">
                                    <li><i class="fas fa-check text-success me-2"></i>Basic website design</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Mobile responsive</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Basic SEO setup</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Email support</li>
                                </ul>
                            </div>
                            <div class="pricing-footer p-4 mt-auto">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-primary btn-rounded w-100 py-3">
                                    <i class="fas fa-arrow-right me-2"></i>Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Enhanced Features Comparison -->
    <section class="section bg-light py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Compare All Features</h2>
                    <p class="lead text-muted">Detailed breakdown of what's included in each plan</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="comparison-table-wrapper">
                        <table class="table comparison-table">
                            <thead>
                                <tr>
                                    <th scope="col">Features</th>
                                    <th scope="col" class="text-center">Starter</th>
                                    <th scope="col" class="text-center featured-plan">Professional</th>
                                    <th scope="col" class="text-center">Enterprise</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Website Pages</strong></td>
                                    <td class="text-center">Up to 5</td>
                                    <td class="text-center">Up to 15</td>
                                    <td class="text-center">Unlimited</td>
                                </tr>
                                <tr>
                                    <td><strong>Design Revisions</strong></td>
                                    <td class="text-center">1 Round</td>
                                    <td class="text-center">3 Rounds</td>
                                    <td class="text-center">Unlimited</td>
                                </tr>
                                <tr>
                                    <td><strong>SEO Optimization</strong></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td><strong>Analytics Setup</strong></td>
                                    <td class="text-center">Basic</td>
                                    <td class="text-center">Advanced</td>
                                    <td class="text-center">Enterprise</td>
                                </tr>
                                <tr>
                                    <td><strong>Support Response</strong></td>
                                    <td class="text-center">48 hours</td>
                                    <td class="text-center">24 hours</td>
                                    <td class="text-center">4 hours</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced FAQ Section -->
    <section class="section py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Frequently Asked Questions</h2>
                    <p class="lead text-muted">Everything you need to know about our pricing</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion pricing-faq" id="pricingFAQ">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Can I change plans later?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#pricingFAQ">
                                <div class="accordion-body">
                                    Yes! You can upgrade or downgrade your plan at any time. Changes take effect immediately and billing is prorated.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Is there a setup fee?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                                <div class="accordion-body">
                                    No setup fees! Our pricing is transparent with no hidden costs. What you see is what you pay.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What payment methods do you accept?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                                <div class="accordion-body">
                                    We accept all major credit cards, PayPal, and bank transfers for annual plans.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="section bg-primary-dark text-white py-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-3">Ready to Get Started?</h2>
                    <p class="lead mb-4">Join hundreds of satisfied clients who trust us with their business needs.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-rounded btn-lg px-5 py-3">
                        <i class="fas fa-rocket me-2"></i>Start Your Project
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
