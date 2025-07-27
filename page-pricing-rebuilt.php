<?php
/**
 * Pricing Page Template
 * Displays dynamic pricing plans
 * Template Name: Pricing Page
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<div class="pricing-page">
    
    <!-- Page Header -->
    <section class="page-header pricing-header">
        <div class="container">
            <div class="page-header-content">
                
                <!-- Breadcrumb -->
                <?php blueprint_folder_breadcrumb(); ?>
                
                <h1 class="page-title">
                    <?php echo get_theme_mod('pricing_page_title', __('Our Pricing', 'blueprint-folder')); ?>
                </h1>
                
                <p class="page-subtitle">
                    <?php echo get_theme_mod('pricing_page_subtitle', __('Transparent pricing for professional services that deliver real results', 'blueprint-folder')); ?>
                </p>
                
                <!-- Trust Badges -->
                <div class="trust-badges">
                    <div class="badge-item">
                        <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        <span><?php esc_html_e('100% Satisfaction Guarantee', 'blueprint-folder'); ?></span>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <span><?php esc_html_e('24/7 Support', 'blueprint-folder'); ?></span>
                    </div>
                    <div class="badge-item">
                        <i class="fas fa-award" aria-hidden="true"></i>
                        <span><?php esc_html_e('Industry Leading', 'blueprint-folder'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="pricing-plans">
        <div class="container">
            
            <!-- Pricing Cards -->
            <div class="pricing-cards">
                <?php
                // Get pricing plans from custom post type
                $pricing_plans = new WP_Query(array(
                    'post_type' => 'pricing_plan',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ));
                
                if ($pricing_plans->have_posts()) :
                    $plan_count = 0;
                    while ($pricing_plans->have_posts()) : $pricing_plans->the_post();
                        $plan_count++;
                        
                        // Get plan meta data
                        $price_monthly = get_post_meta(get_the_ID(), 'price_monthly', true);
                        $features = get_post_meta(get_the_ID(), 'plan_features', true);
                        $is_popular = get_post_meta(get_the_ID(), 'is_popular', true);
                        $cta_text = get_post_meta(get_the_ID(), 'cta_text', true) ?: __('Get Started', 'blueprint-folder');
                        $cta_url = get_post_meta(get_the_ID(), 'cta_url', true) ?: home_url('/contact');
                        
                        $card_class = 'pricing-card';
                        if ($is_popular) {
                            $card_class .= ' popular';
                        }
                        if ($plan_count === 2) {
                            $card_class .= ' featured';
                        }
                ?>
                        <div class="<?php echo esc_attr($card_class); ?>">
                            
                            <?php if ($is_popular) : ?>
                                <div class="popular-badge">
                                    <?php esc_html_e('Most Popular', 'blueprint-folder'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="plan-header">
                                <h3 class="plan-name"><?php the_title(); ?></h3>
                                
                                <?php if ($price_monthly) : ?>
                                    <div class="plan-price">
                                        <span class="price">
                                            <span class="currency">$</span>
                                            <span class="amount"><?php echo esc_html($price_monthly); ?></span>
                                            <span class="period">/month</span>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (has_excerpt()) : ?>
                                    <p class="plan-description"><?php the_excerpt(); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="plan-features">
                                <?php if (!empty($features)) : ?>
                                    <ul class="features-list">
                                        <?php 
                                        $features_array = explode("\n", $features);
                                        foreach ($features_array as $feature) :
                                            $feature = trim($feature);
                                            if (!empty($feature)) :
                                        ?>
                                                <li class="feature-item">
                                                    <i class="fas fa-check" aria-hidden="true"></i>
                                                    <?php echo esc_html($feature); ?>
                                                </li>
                                        <?php 
                                            endif;
                                        endforeach; 
                                        ?>
                                    </ul>
                                <?php else : ?>
                                    <div class="plan-content">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="plan-footer">
                                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-plan">
                                    <?php echo esc_html($cta_text); ?>
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback pricing plans
                    include(get_template_directory() . '/template-parts/pricing-fallback.php');
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="pricing-cta">
        <div class="container">
            <div class="cta-content">
                <h2><?php esc_html_e('Ready to Get Started?', 'blueprint-folder'); ?></h2>
                <p><?php esc_html_e('Choose the plan that\'s right for you and start growing your business today.', 'blueprint-folder'); ?></p>
                
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-rocket" aria-hidden="true"></i>
                        <?php esc_html_e('Start Free Consultation', 'blueprint-folder'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <?php esc_html_e('Call Sales Team', 'blueprint-folder'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
