<?php
/**
 * Template Name: Enhanced Pricing Page
 * Professional pricing page with advanced features
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-primary: #2563eb;
            --color-primary-dark: #1d4ed8;
            --color-accent: #f59e0b;
            --color-accent-dark: #d97706;
            --color-gray-50: #f9fafb;
            --color-gray-100: #f3f4f6;
            --color-gray-200: #e5e7eb;
            --color-gray-600: #4b5563;
            --color-gray-700: #374151;
            --color-gray-800: #1f2937;
            --color-success: #10b981;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        .text-primary-dark { color: var(--color-primary-dark) !important; }
        .text-accent { color: var(--color-accent) !important; }
        .bg-accent { background-color: var(--color-accent) !important; }
        .btn-accent { 
            background-color: var(--color-accent); 
            border-color: var(--color-accent);
            color: white;
        }
        .btn-accent:hover {
            background-color: var(--color-accent-dark);
            border-color: var(--color-accent-dark);
            color: white;
        }
        .btn-rounded { border-radius: 50px; }
        .section { padding: 4rem 0; }
        .py-6 { padding-top: 4rem !important; padding-bottom: 4rem !important; }
        
        /* Pricing Card Styles */
        .pricing-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            border: 2px solid transparent;
            height: 100%;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        
        .pricing-card.featured {
            border-color: var(--color-accent);
            transform: scale(1.02);
        }
        
        .popular-badge {
            background: var(--color-accent);
            color: white;
            text-align: center;
            padding: 0.5rem;
            border-radius: 20px 20px 0 0;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .price-display {
            margin: 1.5rem 0;
        }
        
        .currency {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-gray-600);
        }
        
        .price {
            font-size: 3rem;
            font-weight: 800;
            color: var(--color-primary-dark);
        }
        
        .period {
            font-size: 1rem;
            color: var(--color-gray-600);
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .feature-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--color-gray-100);
        }
        
        .feature-list li:last-child {
            border-bottom: none;
        }
        
        .pricing-footer {
            margin-top: auto;
        }
        
        /* Billing Toggle */
        .billing-toggle {
            display: inline-flex;
            align-items: center;
            padding: 1rem 1.5rem;
            background: white;
            border-radius: 50px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        /* Comparison Table */
        .comparison-table-wrapper {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .comparison-table thead th {
            background: var(--color-primary-dark);
            color: white;
            padding: 1.5rem 1rem;
        }
        
        .comparison-table .featured-plan {
            background: var(--color-accent) !important;
        }
        
        .comparison-table tbody td {
            padding: 1rem;
            border-color: var(--color-gray-200);
        }
        
        /* FAQ Styles */
        .pricing-faq .accordion-item {
            border: none;
            margin-bottom: 1rem;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .pricing-faq .accordion-button {
            background: white;
            border: none;
            font-weight: 600;
            color: var(--color-gray-800);
            padding: 1.5rem;
        }
        
        .pricing-faq .accordion-button:not(.collapsed) {
            background: var(--color-primary-dark);
            color: white;
        }
        
        /* Header Styles */
        .site-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
        }
        
        .site-branding {
            display: flex;
            align-items: center;
        }
        
        .site-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--color-primary-dark);
            text-decoration: none;
            margin: 0;
        }
        
        .site-title:hover {
            color: var(--color-accent);
        }
        
        .main-navigation {
            display: flex;
            align-items: center;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 2rem;
        }
        
        .nav-menu a {
            color: var(--color-gray-700);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-menu a:hover {
            color: var(--color-accent);
        }
        
        .header-cta {
            margin-left: 2rem;
        }
        
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--color-gray-700);
        }
        
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .header-cta {
                margin-left: 1rem;
            }
            
            .header-container {
                position: relative;
            }
        }
        
        /* Breadcrumb Styles */
        .breadcrumb-section {
            border-bottom: 1px solid var(--color-gray-200);
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
        }
        
        .breadcrumb-item a {
            color: var(--color-gray-600);
            text-decoration: none;
        }
        
        .breadcrumb-item a:hover {
            color: var(--color-accent);
        }
        
        .breadcrumb-item.active {
            color: var(--color-primary-dark);
        }
        
        /* CTA Section */
        .bg-primary-dark {
            background-color: var(--color-primary-dark) !important;
        }
    </style>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Standard Header -->
<header class="site-header">
    <div class="container">
        <div class="header-container">
            <!-- Site Branding -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                    <?php echo get_bloginfo('name') ?: 'BluePrint Folder'; ?>
                </a>
            </div>

            <!-- Main Navigation -->
            <nav class="main-navigation">
                <ul class="nav-menu">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">Portfolio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/pricing')); ?>" style="color: var(--color-accent);">Pricing</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                </ul>
                
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
                
                <!-- Header CTA -->
                <div class="header-cta">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent btn-rounded px-4 py-2">
                        <i class="fas fa-phone me-2"></i>Get Quote
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<main id="main" class="site-main pricing-enhanced">
    
    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section bg-light py-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-decoration-none">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                </ol>
            </nav>
        </div>
    </section>
    
    <!-- Enhanced Pricing Plans Section -->
    <section id="pricing-plans" class="section py-6" style="padding-top: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h1 class="display-5 fw-bold text-primary-dark mb-4">Choose Your Plan</h1>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Mobile Menu Toggle
function toggleMobileMenu() {
    const navMenu = document.querySelector('.nav-menu');
    const toggle = document.querySelector('.mobile-menu-toggle i');
    
    if (navMenu.style.display === 'flex') {
        navMenu.style.display = 'none';
        toggle.className = 'fas fa-bars';
    } else {
        navMenu.style.display = 'flex';
        navMenu.style.flexDirection = 'column';
        navMenu.style.position = 'absolute';
        navMenu.style.top = '100%';
        navMenu.style.left = '0';
        navMenu.style.right = '0';
        navMenu.style.background = 'white';
        navMenu.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
        navMenu.style.padding = '1rem';
        navMenu.style.gap = '1rem';
        toggle.className = 'fas fa-times';
    }
}

// Billing Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const billingToggle = document.getElementById('billingToggle');
    
    if (billingToggle) {
        billingToggle.addEventListener('change', function() {
            const monthlyPrices = document.querySelectorAll('.monthly-price');
            const annualPrices = document.querySelectorAll('.annual-price');
            const monthlyPeriods = document.querySelectorAll('.monthly-period');
            const annualPeriods = document.querySelectorAll('.annual-period');
            
            if (this.checked) {
                // Show annual pricing
                monthlyPrices.forEach(price => price.classList.add('d-none'));
                annualPrices.forEach(price => price.classList.remove('d-none'));
                monthlyPeriods.forEach(period => period.classList.add('d-none'));
                annualPeriods.forEach(period => period.classList.remove('d-none'));
            } else {
                // Show monthly pricing
                monthlyPrices.forEach(price => price.classList.remove('d-none'));
                annualPrices.forEach(price => price.classList.add('d-none'));
                monthlyPeriods.forEach(period => period.classList.remove('d-none'));
                annualPeriods.forEach(period => period.classList.add('d-none'));
            }
        });
    }
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
