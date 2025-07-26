<?php
/**
 * Template Name: Pricing Page
 * Dynamic pricing plans with admin control
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); ?>

<!-- Page Header -->
<section class="page-header pricing-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title">Pricing Plans</h1>
            <p class="page-subtitle">Choose the perfect plan for your business needs</p>
            
            <div class="pricing-features">
                <div class="feature-item">
                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                    <span>No Hidden Fees</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                    <span>30-Day Money Back</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                    <span>24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans Section -->
<section class="pricing-plans-section section">
    <div class="container">
        <div class="pricing-toggle">
            <span class="toggle-label">Monthly</span>
            <label class="toggle-switch">
                <input type="checkbox" id="pricing-toggle">
                <span class="slider"></span>
            </label>
            <span class="toggle-label">Yearly <span class="save-badge">Save 20%</span></span>
        </div>
        
        <div class="pricing-grid">
            <?php
            $pricing_query = blueprint_folder_get_pricing_plans();
            
            if ($pricing_query->have_posts()):
                while ($pricing_query->have_posts()): $pricing_query->the_post();
                    $price = get_post_meta(get_the_ID(), '_pricing_price', true);
                    $period = get_post_meta(get_the_ID(), '_pricing_period', true);
                    $features = get_post_meta(get_the_ID(), '_pricing_features', true);
                    $featured = get_post_meta(get_the_ID(), '_pricing_featured', true);
                    $button_text = get_post_meta(get_the_ID(), '_pricing_button_text', true) ?: 'Get Started';
                    $button_url = get_post_meta(get_the_ID(), '_pricing_button_url', true) ?: home_url('/contact');
                    
                    $features_array = $features ? explode("\n", $features) : array();
                    ?>
                    <div class="pricing-card <?php echo $featured ? 'featured' : ''; ?>">
                        <?php if ($featured): ?>
                            <div class="featured-badge">Most Popular</div>
                        <?php endif; ?>
                        
                        <div class="pricing-header">
                            <h3 class="plan-title"><?php the_title(); ?></h3>
                            <div class="plan-price">
                                <?php if ($price): ?>
                                    <span class="price-amount" data-monthly="<?php echo esc_attr($price); ?>" data-yearly="<?php echo esc_attr($price * 12 * 0.8); ?>">
                                        <?php echo esc_html($price); ?>
                                    </span>
                                    <span class="price-period"><?php echo esc_html($period); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="plan-description">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        
                        <div class="pricing-features">
                            <?php if (!empty($features_array)): ?>
                                <ul class="features-list">
                                    <?php foreach ($features_array as $feature): ?>
                                        <li class="feature-item">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                            <span><?php echo esc_html(trim($feature)); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        
                        <div class="pricing-footer">
                            <a href="<?php echo esc_url($button_url); ?>" class="btn <?php echo $featured ? 'btn-primary' : 'btn-outline'; ?> btn-lg">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback pricing plans if none are created
                $fallback_plans = array(
                    array(
                        'title' => 'Basic',
                        'price' => '$99',
                        'period' => '/month',
                        'description' => 'Perfect for small businesses starting out',
                        'features' => array(
                            'Up to 5 services',
                            'Basic support',
                            'Email consultation',
                            'Monthly reports'
                        ),
                        'featured' => false
                    ),
                    array(
                        'title' => 'Professional',
                        'price' => '$199',
                        'period' => '/month',
                        'description' => 'Ideal for growing businesses',
                        'features' => array(
                            'Up to 15 services',
                            'Priority support',
                            'Phone & email consultation',
                            'Bi-weekly reports',
                            'Custom solutions',
                            'Dedicated account manager'
                        ),
                        'featured' => true
                    ),
                    array(
                        'title' => 'Enterprise',
                        'price' => '$399',
                        'period' => '/month',
                        'description' => 'For large organizations with complex needs',
                        'features' => array(
                            'Unlimited services',
                            '24/7 premium support',
                            'On-site consultation',
                            'Weekly reports',
                            'Custom integrations',
                            'Dedicated team',
                            'SLA guarantee'
                        ),
                        'featured' => false
                    )
                );
                
                foreach ($fallback_plans as $plan):
                    ?>
                    <div class="pricing-card <?php echo $plan['featured'] ? 'featured' : ''; ?>">
                        <?php if ($plan['featured']): ?>
                            <div class="featured-badge">Most Popular</div>
                        <?php endif; ?>
                        
                        <div class="pricing-header">
                            <h3 class="plan-title"><?php echo esc_html($plan['title']); ?></h3>
                            <div class="plan-price">
                                <span class="price-amount"><?php echo esc_html($plan['price']); ?></span>
                                <span class="price-period"><?php echo esc_html($plan['period']); ?></span>
                            </div>
                            <div class="plan-description">
                                <?php echo esc_html($plan['description']); ?>
                            </div>
                        </div>
                        
                        <div class="pricing-features">
                            <ul class="features-list">
                                <?php foreach ($plan['features'] as $feature): ?>
                                    <li class="feature-item">
                                        <i class="fas fa-check" aria-hidden="true"></i>
                                        <span><?php echo esc_html($feature); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="pricing-footer">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>?plan=<?php echo urlencode(strtolower($plan['title'])); ?>" class="btn <?php echo $plan['featured'] ? 'btn-primary' : 'btn-outline'; ?> btn-lg">
                                Get Started
                            </a>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="pricing-faq-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Everything you need to know about our pricing</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        Can I change plans at any time?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        Do you offer custom solutions?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>Absolutely! We work with Enterprise clients to create custom solutions that fit their specific needs and requirements.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        Is there a setup fee?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>No setup fees! We believe in transparent pricing with no hidden costs. What you see is what you pay.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        What's included in support?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>All plans include email support. Professional and Enterprise plans also include phone support and dedicated account management.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        Can I cancel anytime?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>Yes, you can cancel your subscription at any time. We also offer a 30-day money-back guarantee for new customers.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">
                    <button class="faq-toggle" aria-expanded="false">
                        Do you offer discounts for annual plans?
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                </h3>
                <div class="faq-answer">
                    <p>Yes! Annual subscriptions receive a 20% discount compared to monthly billing. Use the toggle above to see annual pricing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="pricing-cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Still Have Questions?</h2>
            <p class="cta-subtitle">Our team is here to help you choose the perfect plan for your business needs.</p>
            
            <div class="cta-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    Contact Sales
                </a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    Call Us Now
                </a>
            </div>
            
            <div class="cta-guarantee">
                <i class="fas fa-shield-alt" aria-hidden="true"></i>
                <span>30-day money-back guarantee</span>
            </div>
        </div>
    </div>
</section>

<script>
// Pricing page specific JavaScript
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Pricing toggle functionality
        $('#pricing-toggle').on('change', function() {
            const isYearly = $(this).is(':checked');
            
            $('.price-amount').each(function() {
                const $this = $(this);
                const monthly = $this.data('monthly');
                const yearly = $this.data('yearly');
                
                if (monthly && yearly) {
                    $this.text(isYearly ? '$' + yearly : '$' + monthly);
                }
            });
            
            $('.price-period').text(isYearly ? '/year' : '/month');
        });
        
        // FAQ accordion functionality
        $('.faq-toggle').on('click', function() {
            const $faqItem = $(this).closest('.faq-item');
            const $answer = $faqItem.find('.faq-answer');
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            
            // Close all other FAQ items
            $('.faq-item').not($faqItem).find('.faq-answer').slideUp(300);
            $('.faq-toggle').not(this).attr('aria-expanded', 'false');
            
            // Toggle current item
            if (isExpanded) {
                $answer.slideUp(300);
                $(this).attr('aria-expanded', 'false');
            } else {
                $answer.slideDown(300);
                $(this).attr('aria-expanded', 'true');
            }
        });
    });
})(jQuery);
</script>

<?php get_footer('rebuilt'); ?>
