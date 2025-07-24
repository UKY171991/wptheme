<?php
/**
 * Single Service Template
 * 
 * @package ServiceBlueprint
 */

get_header();

while (have_posts()) : the_post();
    $service_categories = get_the_terms(get_the_ID(), 'service_category');
    $service_price = get_post_meta(get_the_ID(), 'service_price', true);
    $service_duration = get_post_meta(get_the_ID(), 'service_duration', true);
    $service_features = get_post_meta(get_the_ID(), 'service_features', true);
    $contact_form_shortcode = get_post_meta(get_the_ID(), 'contact_form_shortcode', true);
?>

<!-- Service Header Banner -->
<section class="service-header">
    <?php if (has_post_thumbnail()) : ?>
        <div class="service-banner" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'service-banner')); ?>');">
            <div class="service-banner-overlay"></div>
            <div class="service-banner-content">
                <div class="container">
                    <!-- Breadcrumb -->
                    <nav class="breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'service-blueprint'); ?>">
                        <ol class="breadcrumb-list">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'service-blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>"><?php esc_html_e('Services', 'service-blueprint'); ?></a></li>
                            <?php if ($service_categories && !is_wp_error($service_categories)) : ?>
                                <li><a href="<?php echo esc_url(get_term_link($service_categories[0])); ?>"><?php echo esc_html($service_categories[0]->name); ?></a></li>
                            <?php endif; ?>
                            <li aria-current="page"><?php the_title(); ?></li>
                        </ol>
                    </nav>
                    
                    <div class="service-intro">
                        <h1 class="service-title"><?php the_title(); ?></h1>
                        
                        <?php if (has_excerpt()) : ?>
                            <p class="service-excerpt"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                        
                        <div class="service-quick-info">
                            <?php if ($service_price) : ?>
                                <span class="service-price">
                                    <span class="price-label"><?php esc_html_e('From', 'service-blueprint'); ?></span>
                                    <span class="price-amount"><?php echo esc_html($service_price); ?></span>
                                </span>
                            <?php endif; ?>
                            
                            <?php if ($service_duration) : ?>
                                <span class="service-duration">
                                    <span class="duration-icon">⏱</span>
                                    <?php echo esc_html($service_duration); ?>
                                </span>
                            <?php endif; ?>
                            
                            <?php if ($service_categories && !is_wp_error($service_categories)) : ?>
                                <div class="service-categories">
                                    <?php foreach ($service_categories as $category) : 
                                        $icon = get_term_meta($category->term_id, 'category_icon', true);
                                    ?>
                                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-tag">
                                            <?php if ($icon) : ?>
                                                <span class="category-icon"><?php echo esc_html($icon); ?></span>
                                            <?php endif; ?>
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-actions">
                            <a href="#contact-form" class="btn btn-primary btn-large">
                                <?php esc_html_e('Get Quote', 'service-blueprint'); ?>
                            </a>
                            <button class="btn btn-secondary btn-large" id="share-service">
                                <span class="share-icon">📤</span>
                                <?php esc_html_e('Share', 'service-blueprint'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="service-header-simple">
            <div class="container">
                <nav class="breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'service-blueprint'); ?>">
                    <ol class="breadcrumb-list">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'service-blueprint'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>"><?php esc_html_e('Services', 'service-blueprint'); ?></a></li>
                        <?php if ($service_categories && !is_wp_error($service_categories)) : ?>
                            <li><a href="<?php echo esc_url(get_term_link($service_categories[0])); ?>"><?php echo esc_html($service_categories[0]->name); ?></a></li>
                        <?php endif; ?>
                        <li aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>
                <h1 class="service-title"><?php the_title(); ?></h1>
            </div>
        </div>
    <?php endif; ?>
</section>

<!-- Service Content -->
<article id="post-<?php the_ID(); ?>" <?php post_class('service-content-area'); ?>>
    <div class="container">
        <div class="service-layout">
            
            <!-- Main Content -->
            <main class="service-main" role="main">
                
                <!-- Service Description -->
                <section class="service-description" role="region" aria-labelledby="description-title">
                    <h2 id="description-title" class="content-section-title"><?php esc_html_e('Service Details', 'service-blueprint'); ?></h2>
                    
                    <div class="service-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if ($service_features) : ?>
                        <div class="service-features">
                            <h3><?php esc_html_e('What\'s Included', 'service-blueprint'); ?></h3>
                            <div class="features-list">
                                <?php 
                                $features = explode("\n", $service_features);
                                foreach ($features as $feature) :
                                    if (trim($feature)) :
                                ?>
                                    <div class="feature-item">
                                        <span class="feature-icon">✓</span>
                                        <span class="feature-text"><?php echo esc_html(trim($feature)); ?></span>
                                    </div>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
                
                <!-- Process Steps -->
                <?php 
                $process_steps = get_post_meta(get_the_ID(), 'process_steps', true);
                if ($process_steps) :
                ?>
                <section class="service-process" role="region" aria-labelledby="process-title">
                    <h2 id="process-title" class="content-section-title"><?php esc_html_e('Our Process', 'service-blueprint'); ?></h2>
                    
                    <div class="process-steps">
                        <?php 
                        $steps = explode("\n", $process_steps);
                        $step_number = 1;
                        foreach ($steps as $step) :
                            if (trim($step)) :
                        ?>
                            <div class="process-step">
                                <div class="step-number"><?php echo $step_number; ?></div>
                                <div class="step-content">
                                    <p><?php echo esc_html(trim($step)); ?></p>
                                </div>
                            </div>
                        <?php 
                            $step_number++;
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </section>
                <?php endif; ?>
                
                <!-- FAQ Section -->
                <?php 
                $faq_items = get_post_meta(get_the_ID(), 'faq_items', true);
                if ($faq_items) :
                ?>
                <section class="service-faq" role="region" aria-labelledby="faq-title">
                    <h2 id="faq-title" class="content-section-title"><?php esc_html_e('Frequently Asked Questions', 'service-blueprint'); ?></h2>
                    
                    <div class="faq-accordion">
                        <?php 
                        $faqs = json_decode($faq_items, true);
                        if ($faqs) :
                            foreach ($faqs as $index => $faq) :
                        ?>
                            <div class="faq-item">
                                <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-<?php echo $index; ?>">
                                    <span><?php echo esc_html($faq['question']); ?></span>
                                    <span class="faq-icon">+</span>
                                </button>
                                <div id="faq-answer-<?php echo $index; ?>" class="faq-answer">
                                    <p><?php echo esc_html($faq['answer']); ?></p>
                                </div>
                            </div>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </div>
                </section>
                <?php endif; ?>
                
                <!-- Contact Form -->
                <section id="contact-form" class="service-contact" role="region" aria-labelledby="contact-title">
                    <h2 id="contact-title" class="content-section-title"><?php esc_html_e('Request a Quote', 'service-blueprint'); ?></h2>
                    
                    <?php if ($contact_form_shortcode) : ?>
                        <div class="contact-form-container">
                            <?php echo do_shortcode($contact_form_shortcode); ?>
                        </div>
                    <?php else : ?>
                        <!-- Default contact form -->
                        <form class="service-contact-form" method="post" action="#" id="service-quote-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="client-name"><?php esc_html_e('Your Name', 'service-blueprint'); ?> <span class="required">*</span></label>
                                    <input type="text" id="client-name" name="client_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="client-email"><?php esc_html_e('Email Address', 'service-blueprint'); ?> <span class="required">*</span></label>
                                    <input type="email" id="client-email" name="client_email" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="client-phone"><?php esc_html_e('Phone Number', 'service-blueprint'); ?></label>
                                    <input type="tel" id="client-phone" name="client_phone">
                                </div>
                                <div class="form-group">
                                    <label for="service-date"><?php esc_html_e('Preferred Date', 'service-blueprint'); ?></label>
                                    <input type="date" id="service-date" name="service_date">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="service-message"><?php esc_html_e('Project Details', 'service-blueprint'); ?> <span class="required">*</span></label>
                                <textarea id="service-message" name="service_message" rows="5" required placeholder="<?php esc_attr_e('Please describe your project requirements...', 'service-blueprint'); ?>"></textarea>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="newsletter_signup">
                                    <span class="checkbox-checkmark"></span>
                                    <?php esc_html_e('I would like to receive updates about new services and offers', 'service-blueprint'); ?>
                                </label>
                            </div>
                            
                            <input type="hidden" name="service_id" value="<?php echo esc_attr(get_the_ID()); ?>">
                            <input type="hidden" name="service_title" value="<?php echo esc_attr(get_the_title()); ?>">
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-large submit-btn">
                                    <?php esc_html_e('Request Quote', 'service-blueprint'); ?>
                                </button>
                                <p class="form-note"><?php esc_html_e('We\'ll get back to you within 24 hours.', 'service-blueprint'); ?></p>
                            </div>
                        </form>
                    <?php endif; ?>
                </section>
                
            </main>
            
            <!-- Sidebar -->
            <aside class="service-sidebar" role="complementary">
                
                <!-- Service Summary Card -->
                <div class="sidebar-card service-summary">
                    <h3><?php esc_html_e('Service Summary', 'service-blueprint'); ?></h3>
                    
                    <div class="summary-item">
                        <span class="summary-label"><?php esc_html_e('Service', 'service-blueprint'); ?></span>
                        <span class="summary-value"><?php the_title(); ?></span>
                    </div>
                    
                    <?php if ($service_price) : ?>
                        <div class="summary-item">
                            <span class="summary-label"><?php esc_html_e('Starting Price', 'service-blueprint'); ?></span>
                            <span class="summary-value price"><?php echo esc_html($service_price); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($service_duration) : ?>
                        <div class="summary-item">
                            <span class="summary-label"><?php esc_html_e('Duration', 'service-blueprint'); ?></span>
                            <span class="summary-value"><?php echo esc_html($service_duration); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="summary-actions">
                        <a href="#contact-form" class="btn btn-primary btn-block">
                            <?php esc_html_e('Get Quote', 'service-blueprint'); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '(555) 123-4567')); ?>" class="btn btn-secondary btn-block">
                            <span class="phone-icon">📞</span>
                            <?php esc_html_e('Call Now', 'service-blueprint'); ?>
                        </a>
                    </div>
                </div>
                
                <!-- Related Services -->
                <?php 
                $related_services = get_related_services(get_the_ID(), 4);
                if ($related_services->have_posts()) :
                ?>
                <div class="sidebar-card related-services">
                    <h3><?php esc_html_e('Related Services', 'service-blueprint'); ?></h3>
                    
                    <div class="related-services-list">
                        <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                            <article class="related-service-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="related-service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="related-service-content">
                                    <h4 class="related-service-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    
                                    <?php if (get_post_meta(get_the_ID(), 'service_price', true)) : ?>
                                        <span class="related-service-price">
                                            <?php esc_html_e('From ', 'service-blueprint'); ?>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'service_price', true)); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Contact Info -->
                <div class="sidebar-card contact-info">
                    <h3><?php esc_html_e('Contact Information', 'service-blueprint'); ?></h3>
                    
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <div class="contact-details">
                            <span class="contact-label"><?php esc_html_e('Phone', 'service-blueprint'); ?></span>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '(555) 123-4567')); ?>">
                                <?php echo esc_html(get_theme_mod('contact_phone', '(555) 123-4567')); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <div class="contact-details">
                            <span class="contact-label"><?php esc_html_e('Email', 'service-blueprint'); ?></span>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@example.com')); ?>">
                                <?php echo esc_html(get_theme_mod('contact_email', 'info@example.com')); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <span class="contact-icon">⏰</span>
                        <div class="contact-details">
                            <span class="contact-label"><?php esc_html_e('Business Hours', 'service-blueprint'); ?></span>
                            <span><?php echo esc_html(get_theme_mod('business_hours', 'Mon-Fri: 9AM-6PM')); ?></span>
                        </div>
                    </div>
                </div>
                
            </aside>
            
        </div>
    </div>
</article>

<?php endwhile; ?>

<!-- Service sharing modal -->
<div id="share-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3><?php esc_html_e('Share This Service', 'service-blueprint'); ?></h3>
            <button class="modal-close" aria-label="<?php esc_attr_e('Close modal', 'service-blueprint'); ?>">&times;</button>
        </div>
        <div class="modal-body">
            <div class="share-options">
                <a href="#" class="share-option" data-platform="facebook">
                    <span class="share-icon">📘</span>
                    <span>Facebook</span>
                </a>
                <a href="#" class="share-option" data-platform="twitter">
                    <span class="share-icon">🐦</span>
                    <span>Twitter</span>
                </a>
                <a href="#" class="share-option" data-platform="linkedin">
                    <span class="share-icon">💼</span>
                    <span>LinkedIn</span>
                </a>
                <a href="#" class="share-option" data-platform="email">
                    <span class="share-icon">✉️</span>
                    <span>Email</span>
                </a>
            </div>
            <div class="share-link">
                <label for="share-url"><?php esc_html_e('Copy Link', 'service-blueprint'); ?></label>
                <div class="copy-link-container">
                    <input type="text" id="share-url" value="<?php echo esc_url(get_permalink()); ?>" readonly>
                    <button class="copy-btn" data-clipboard-target="#share-url">
                        <?php esc_html_e('Copy', 'service-blueprint'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Single service page styles */
.service-banner {
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 500px;
    display: flex;
    align-items: center;
    color: white;
}

.service-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.8), rgba(79, 70, 229, 0.7));
    z-index: 1;
}

.service-banner-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 80px 0;
}

.service-header-simple {
    background: #f9fafb;
    padding: 40px 0;
}

.service-title {
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.service-excerpt {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 30px;
    opacity: 0.9;
}

.service-quick-info {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
    align-items: center;
}

.service-price {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px 20px;
    border-radius: 25px;
    backdrop-filter: blur(10px);
}

.price-label {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-right: 5px;
}

.price-amount {
    font-size: 1.2rem;
    font-weight: 600;
}

.service-duration {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    padding: 10px 20px;
    border-radius: 25px;
    backdrop-filter: blur(10px);
}

.service-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.service-category-tag {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.9);
    color: #374151;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.service-category-tag:hover {
    background: white;
    text-decoration: none;
}

.service-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-large {
    padding: 15px 30px;
    font-size: 1.1rem;
    font-weight: 600;
}

.btn-block {
    width: 100%;
    text-align: center;
}

.service-content-area {
    padding: 80px 0;
}

.service-layout {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 50px;
    align-items: start;
}

.content-section-title {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 30px;
    color: #1f2937;
    border-bottom: 3px solid #2563eb;
    padding-bottom: 10px;
}

.service-content {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 40px;
}

.service-features {
    background: #f9fafb;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 40px;
}

.service-features h3 {
    font-size: 1.3rem;
    margin-bottom: 20px;
    color: #1f2937;
}

.features-list {
    display: grid;
    gap: 12px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.feature-icon {
    color: #10b981;
    font-weight: bold;
    font-size: 1.1rem;
}

.feature-text {
    flex: 1;
}

.service-process {
    margin-bottom: 40px;
}

.process-steps {
    display: grid;
    gap: 25px;
}

.process-step {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 25px;
    background: #f9fafb;
    border-radius: 12px;
    border-left: 4px solid #2563eb;
}

.step-number {
    width: 40px;
    height: 40px;
    background: #2563eb;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    flex-shrink: 0;
}

.step-content {
    flex: 1;
}

.service-faq {
    margin-bottom: 40px;
}

.faq-accordion {
    display: grid;
    gap: 15px;
}

.faq-item {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
}

.faq-question {
    width: 100%;
    background: white;
    border: none;
    padding: 20px;
    text-align: left;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 500;
    transition: background 0.3s ease;
}

.faq-question:hover {
    background: #f9fafb;
}

.faq-question[aria-expanded="true"] {
    background: #f3f4f6;
}

.faq-question[aria-expanded="true"] .faq-icon {
    transform: rotate(45deg);
}

.faq-icon {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.faq-answer {
    display: none;
    padding: 0 20px 20px;
    color: #6b7280;
    line-height: 1.6;
}

.faq-answer.open {
    display: block;
}

.service-contact {
    background: #f9fafb;
    padding: 40px;
    border-radius: 12px;
}

.service-contact-form {
    max-width: 600px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #374151;
}

.required {
    color: #ef4444;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: #2563eb;
}

.checkbox-group {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
    font-size: 0.95rem;
    line-height: 1.5;
}

.checkbox-label input[type="checkbox"] {
    width: auto;
    margin: 0;
}

.form-actions {
    text-align: center;
    margin-top: 30px;
}

.form-note {
    margin-top: 15px;
    font-size: 0.9rem;
    color: #6b7280;
}

/* Sidebar */
.sidebar-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.sidebar-card h3 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: #1f2937;
    border-bottom: 2px solid #f3f4f6;
    padding-bottom: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f3f4f6;
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-label {
    color: #6b7280;
    font-size: 0.95rem;
}

.summary-value {
    font-weight: 500;
    color: #1f2937;
}

.summary-value.price {
    color: #059669;
    font-weight: 600;
    font-size: 1.1rem;
}

.summary-actions {
    margin-top: 25px;
    display: grid;
    gap: 12px;
}

.related-services-list {
    display: grid;
    gap: 15px;
}

.related-service-item {
    display: flex;
    gap: 12px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f3f4f6;
}

.related-service-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.related-service-image {
    flex-shrink: 0;
    width: 60px;
}

.related-service-image img {
    width: 100%;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
}

.related-service-content {
    flex: 1;
}

.related-service-title {
    font-size: 0.95rem;
    font-weight: 500;
    margin-bottom: 5px;
}

.related-service-title a {
    color: #374151;
    text-decoration: none;
}

.related-service-title a:hover {
    color: #2563eb;
}

.related-service-price {
    font-size: 0.85rem;
    color: #059669;
    font-weight: 500;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f3f4f6;
}

.contact-item:last-child {
    border-bottom: none;
}

.contact-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
}

.contact-details {
    flex: 1;
}

.contact-label {
    display: block;
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 2px;
}

.contact-details a {
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
}

.contact-details a:hover {
    text-decoration: underline;
}

/* Share Modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.modal-content {
    background: white;
    border-radius: 12px;
    max-width: 500px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 25px 0;
    margin-bottom: 20px;
}

.modal-header h3 {
    margin: 0;
    color: #1f2937;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #6b7280;
    padding: 5px;
    line-height: 1;
}

.modal-close:hover {
    color: #374151;
}

.modal-body {
    padding: 0 25px 25px;
}

.share-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-bottom: 25px;
}

.share-option {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    text-decoration: none;
    color: #374151;
    transition: all 0.3s ease;
}

.share-option:hover {
    border-color: #2563eb;
    text-decoration: none;
}

.share-link {
    margin-top: 20px;
}

.share-link label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #374151;
}

.copy-link-container {
    display: flex;
    gap: 10px;
}

.copy-link-container input {
    flex: 1;
    padding: 10px 12px;
    border: 2px solid #e5e7eb;
    border-radius: 6px;
}

.copy-btn {
    padding: 10px 20px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    transition: background 0.3s ease;
}

.copy-btn:hover {
    background: #1d4ed8;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .service-layout {
        grid-template-columns: 1fr 300px;
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .service-layout {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .service-sidebar {
        order: -1;
    }
    
    .service-banner {
        min-height: 400px;
    }
    
    .service-banner-content {
        padding: 60px 0;
    }
    
    .service-quick-info {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .service-actions {
        width: 100%;
    }
    
    .service-actions .btn {
        flex: 1;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .share-options {
        grid-template-columns: 1fr;
    }
    
    .copy-link-container {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .service-actions {
        flex-direction: column;
    }
    
    .modal {
        padding: 10px;
    }
    
    .modal-header,
    .modal-body {
        padding-left: 20px;
        padding-right: 20px;
    }
}
</style>

<script>
// Single service page functionality
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const answer = this.nextElementSibling;
            
            // Close all other FAQs
            faqQuestions.forEach(q => {
                if (q !== this) {
                    q.setAttribute('aria-expanded', 'false');
                    q.nextElementSibling.classList.remove('open');
                }
            });
            
            // Toggle current FAQ
            this.setAttribute('aria-expanded', !isExpanded);
            answer.classList.toggle('open');
        });
    });
    
    // Share functionality
    const shareBtn = document.getElementById('share-service');
    const shareModal = document.getElementById('share-modal');
    const modalClose = document.querySelector('.modal-close');
    
    if (shareBtn && shareModal) {
        shareBtn.addEventListener('click', function() {
            shareModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
        
        modalClose.addEventListener('click', function() {
            shareModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        shareModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }
    
    // Share options
    const shareOptions = document.querySelectorAll('.share-option');
    shareOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.dataset.platform;
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            
            let shareUrl = '';
            
            switch(platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                    break;
                case 'email':
                    shareUrl = `mailto:?subject=${title}&body=${url}`;
                    break;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    });
    
    // Copy link functionality
    const copyBtn = document.querySelector('.copy-btn');
    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            const urlInput = document.getElementById('share-url');
            urlInput.select();
            document.execCommand('copy');
            
            this.textContent = 'Copied!';
            setTimeout(() => {
                this.textContent = 'Copy';
            }, 2000);
        });
    }
    
    // Form submission
    const contactForm = document.getElementById('service-quote-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ef4444';
                } else {
                    field.style.borderColor = '#e5e7eb';
                }
            });
            
            if (isValid) {
                // Submit form via AJAX
                const formData = new FormData(this);
                formData.append('action', 'submit_service_quote');
                
                fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.reset();
                        alert('Thank you! Your quote request has been submitted.');
                    } else {
                        alert('There was an error submitting your request. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error submitting your request. Please try again.');
                });
            }
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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
});
</script>

<?php get_footer(); ?>
