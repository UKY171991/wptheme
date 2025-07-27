<?php
/**
 * Single Service Template
 * Displays individual service details
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-service'); ?>>
        
        <!-- Service Header -->
        <header class="service-hero">
            <div class="service-hero-bg">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('hero-banner', array('alt' => get_the_title())); ?>
                <?php endif; ?>
                <div class="service-hero-overlay"></div>
            </div>
            
            <div class="container">
                <div class="service-hero-content">
                    <!-- Breadcrumb -->
                    <?php blueprint_folder_breadcrumb(); ?>
                    
                    <!-- Service Categories -->
                    <?php 
                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                    if (!empty($service_categories) && !is_wp_error($service_categories)) : 
                    ?>
                        <div class="service-categories">
                            <?php foreach ($service_categories as $category) : ?>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <h1 class="service-title"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <div class="service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php esc_html_e('Get Quote', 'blueprint-folder'); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <?php esc_html_e('Call Now', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Service Content -->
        <section class="service-content-section">
            <div class="container">
                <div class="service-layout">
                    
                    <!-- Main Content -->
                    <div class="service-main-content">
                        <div class="service-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <aside class="service-sidebar">
                        
                        <!-- Service Info Card -->
                        <div class="service-info-card">
                            <h3><?php esc_html_e('Service Information', 'blueprint-folder'); ?></h3>
                            
                            <!-- Contact CTA -->
                            <div class="service-contact">
                                <h4><?php esc_html_e('Ready to Get Started?', 'blueprint-folder'); ?></h4>
                                <p><?php esc_html_e('Contact us today for a free consultation.', 'blueprint-folder'); ?></p>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-block">
                                    <?php esc_html_e('Get Free Quote', 'blueprint-folder'); ?>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Related Services -->
                        <?php if (!empty($service_categories) && !is_wp_error($service_categories)) : ?>
                            <div class="related-services">
                                <h3><?php esc_html_e('Related Services', 'blueprint-folder'); ?></h3>
                                
                                <?php
                                $related_services = get_posts(array(
                                    'post_type' => 'service',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'service_category',
                                            'field' => 'term_id',
                                            'terms' => wp_list_pluck($service_categories, 'term_id'),
                                        ),
                                    ),
                                ));
                                
                                if (!empty($related_services)) :
                                ?>
                                    <div class="related-services-list">
                                        <?php foreach ($related_services as $related_service) : ?>
                                            <div class="related-service-item">
                                                <a href="<?php echo esc_url(get_permalink($related_service->ID)); ?>" class="related-service-link">
                                                    <div class="related-service-content">
                                                        <h4><?php echo esc_html($related_service->post_title); ?></h4>
                                                        <p><?php echo wp_trim_words(get_post_field('post_excerpt', $related_service->ID) ?: get_post_field('post_content', $related_service->ID), 15, '...'); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                    </aside>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="service-cta-section">
            <div class="container">
                <div class="service-cta-content">
                    <h2><?php esc_html_e('Ready to Transform Your Business?', 'blueprint-folder'); ?></h2>
                    <p><?php esc_html_e('Let\'s discuss how our expert team can help you achieve your goals with this service.', 'blueprint-folder'); ?></p>
                    
                    <div class="cta-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-rocket" aria-hidden="true"></i>
                            <?php esc_html_e('Start Your Project', 'blueprint-folder'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline btn-lg">
                            <?php esc_html_e('View All Services', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </article>

<?php endwhile; ?>

<?php get_footer(); ?>
