<?php
/**
 * Customizer Settings
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer settings
 */
function services_pro_customize_register($wp_customize) {
    // Theme Colors Section
    $wp_customize->add_section('services_pro_colors', array(
        'title' => __('Theme Colors', 'services-pro'),
        'priority' => 30,
    ));
    
    // Primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#0b1133',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'services-pro'),
        'section' => 'services_pro_colors',
        'settings' => 'primary_color',
    )));
    
    // Accent color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#ff5f00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Accent Color', 'services-pro'),
        'section' => 'services_pro_colors',
        'settings' => 'accent_color',
    )));
    
    // Homepage Settings
    $wp_customize->add_section('services_pro_homepage', array(
        'title' => __('Homepage Settings', 'services-pro'),
        'priority' => 35,
    ));
    
    // Hero title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Professional Home Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'services-pro'),
        'section' => 'services_pro_homepage',
        'type' => 'text',
    ));
    
    // Hero subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Quality, reliable, and affordable home services you can trust.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'services-pro'),
        'section' => 'services_pro_homepage',
        'type' => 'textarea',
    ));
    
    // Contact Information Section
    $wp_customize->add_section('services_pro_contact', array(
        'title' => __('Contact Information', 'services-pro'),
        'priority' => 40,
    ));
    
    // Phone number
    $wp_customize->add_setting('contact_phone', array(
        'default' => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'services-pro'),
        'section' => 'services_pro_contact',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@yoursite.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'services-pro'),
        'section' => 'services_pro_contact',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('contact_address', array(
        'default' => '123 Main Street, City, State 12345',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'services-pro'),
        'section' => 'services_pro_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'services_pro_customize_register');

/**
 * Output custom CSS based on customizer settings
 */
function services_pro_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#0b1133');
    $accent_color = get_theme_mod('accent_color', '#ff5f00');
    
    ?>
    <style type="text/css">
        :root {
            --primary-dark: <?php echo esc_html($primary_color); ?>;
            --accent: <?php echo esc_html($accent_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'services_pro_customizer_css');

/**
 * Sanitize checkbox
 */
function services_pro_sanitize_checkbox($input) {
    return (isset($input) && true == $input) ? true : false;
}
