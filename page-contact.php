<?php
/**
 * Template Name: Contact Page
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- Hero Section -->
            <section class="contact-hero">
                <div class="hero-content">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <p class="page-description"><?php the_excerpt(); ?></p>
                </div>
            </section>

            <!-- Contact Information -->
            <section class="contact-info">
                <div class="contact-grid">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Address', 'service-blueprint'); ?></h3>
                        <p>
                            <?php 
                            $address = get_theme_mod('service_blueprint_contact_address', '123 Business St, Suite 100<br>City, State 12345');
                            echo wp_kses_post($address);
                            ?>
                        </p>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Phone', 'service-blueprint'); ?></h3>
                        <p>
                            <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', get_theme_mod('service_blueprint_contact_phone', '+1 (555) 123-4567'))); ?>">
                                <?php echo esc_html(get_theme_mod('service_blueprint_contact_phone', '+1 (555) 123-4567')); ?>
                            </a>
                        </p>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Email', 'service-blueprint'); ?></h3>
                        <p>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('service_blueprint_contact_email', get_option('admin_email'))); ?>">
                                <?php echo esc_html(get_theme_mod('service_blueprint_contact_email', get_option('admin_email'))); ?>
                            </a>
                        </p>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Business Hours', 'service-blueprint'); ?></h3>
                        <p>
                            <?php 
                            $hours = get_theme_mod('service_blueprint_business_hours', 'Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed');
                            echo wp_kses_post($hours);
                            ?>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Contact Form -->
            <section class="contact-form-section">
                <div class="form-container">
                    <h2><?php esc_html_e('Get In Touch', 'service-blueprint'); ?></h2>
                    <p><?php esc_html_e('Ready to start your project? Send us a message and we\'ll get back to you as soon as possible.', 'service-blueprint'); ?></p>

                    <form class="contact-form" id="contact-form" method="post" action="">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name"><?php esc_html_e('Full Name', 'service-blueprint'); ?> <span class="required">*</span></label>
                                <input type="text" id="contact_name" name="contact_name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email"><?php esc_html_e('Email Address', 'service-blueprint'); ?> <span class="required">*</span></label>
                                <input type="email" id="contact_email" name="contact_email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_phone"><?php esc_html_e('Phone Number', 'service-blueprint'); ?></label>
                                <input type="tel" id="contact_phone" name="contact_phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_company"><?php esc_html_e('Company', 'service-blueprint'); ?></label>
                                <input type="text" id="contact_company" name="contact_company">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_service"><?php esc_html_e('Service of Interest', 'service-blueprint'); ?></label>
                            <select id="contact_service" name="contact_service">
                                <option value=""><?php esc_html_e('Select a service...', 'service-blueprint'); ?></option>
                                <?php
                                $service_categories = get_terms(array(
                                    'taxonomy' => 'service_category',
                                    'hide_empty' => false,
                                ));
                                
                                if ($service_categories) :
                                    foreach ($service_categories as $category) :
                                ?>
                                    <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_budget"><?php esc_html_e('Project Budget', 'service-blueprint'); ?></label>
                            <select id="contact_budget" name="contact_budget">
                                <option value=""><?php esc_html_e('Select budget range...', 'service-blueprint'); ?></option>
                                <option value="under-5k"><?php esc_html_e('Under $5,000', 'service-blueprint'); ?></option>
                                <option value="5k-10k"><?php esc_html_e('$5,000 - $10,000', 'service-blueprint'); ?></option>
                                <option value="10k-25k"><?php esc_html_e('$10,000 - $25,000', 'service-blueprint'); ?></option>
                                <option value="25k-50k"><?php esc_html_e('$25,000 - $50,000', 'service-blueprint'); ?></option>
                                <option value="50k-plus"><?php esc_html_e('$50,000+', 'service-blueprint'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_message"><?php esc_html_e('Message', 'service-blueprint'); ?> <span class="required">*</span></label>
                            <textarea id="contact_message" name="contact_message" rows="6" required placeholder="<?php esc_attr_e('Tell us about your project...', 'service-blueprint'); ?>"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="submit-btn">
                                <span class="btn-text"><?php esc_html_e('Send Message', 'service-blueprint'); ?></span>
                                <span class="btn-loading" style="display: none;"><?php esc_html_e('Sending...', 'service-blueprint'); ?></span>
                            </button>
                        </div>
                    </form>

                    <div id="form-messages"></div>
                </div>
            </section>

            <!-- Page Content -->
            <section class="page-content">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </section>

        <?php endwhile; ?>
    </div>
</main>

<style>
.contact-hero {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 12px;
    margin-bottom: 60px;
}

.page-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.page-description {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.contact-info {
    margin-bottom: 80px;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.contact-item {
    text-align: center;
    padding: 40px 30px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.contact-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.contact-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 1.8rem;
}

.contact-item h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 15px;
}

.contact-item p {
    color: #6b7280;
    line-height: 1.6;
}

.contact-item a {
    color: #2563eb;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-item a:hover {
    color: #1d4ed8;
}

.contact-form-section {
    background: #f9fafb;
    padding: 80px 0;
    border-radius: 12px;
    margin-bottom: 60px;
}

.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-form-section h2 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 15px;
}

.contact-form-section p {
    text-align: center;
    color: #6b7280;
    margin-bottom: 40px;
    font-size: 1.1rem;
}

.contact-form {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    font-weight: 500;
    color: #374151;
    margin-bottom: 8px;
}

.required {
    color: #ef4444;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-family: inherit;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.submit-btn {
    width: 100%;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 6px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
}

.submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

#form-messages {
    margin-top: 20px;
    padding: 15px;
    border-radius: 6px;
    display: none;
}

#form-messages.success {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

#form-messages.error {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.page-content {
    margin-top: 60px;
}

.entry-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
    color: #374151;
    line-height: 1.8;
}

@media (max-width: 768px) {
    .contact-hero {
        padding: 40px 15px;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .contact-item {
        padding: 30px 20px;
    }
    
    .contact-form-section {
        padding: 60px 0;
    }
    
    .contact-form {
        padding: 30px 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .contact-form-section h2 {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const messages = document.getElementById('form-messages');
    const submitBtn = form.querySelector('.submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
        
        // Hide previous messages
        messages.style.display = 'none';
        messages.className = '';
        
        // Collect form data
        const formData = new FormData(form);
        formData.append('action', 'handle_contact_form');
        
        // Submit form
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Reset button state
            submitBtn.disabled = false;
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            
            // Show message
            messages.style.display = 'block';
            
            if (data.success) {
                messages.className = 'success';
                messages.textContent = data.data;
                form.reset();
            } else {
                messages.className = 'error';
                messages.textContent = data.data || 'An error occurred. Please try again.';
            }
        })
        .catch(error => {
            // Reset button state
            submitBtn.disabled = false;
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            
            // Show error message
            messages.style.display = 'block';
            messages.className = 'error';
            messages.textContent = 'An error occurred. Please try again.';
        });
    });
});
</script>

<?php get_footer(); ?>
