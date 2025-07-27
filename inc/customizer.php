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
    
    // Header Settings Section
    $wp_customize->add_section('blueprint_folder_header', array(
        'title' => __('Header Settings', 'blueprint-folder'),
        'priority' => 25,
        'description' => __('Customize the header appearance and functionality.', 'blueprint-folder'),
    ));
    
    // Header CTA Text
    $wp_customize->add_setting('header_cta_text', array(
        'default' => 'Get Quote',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('header_cta_text', array(
        'label' => __('Header CTA Button Text', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'text',
        'description' => __('Text for the call-to-action button in the header.', 'blueprint-folder'),
    ));
    
    // Header CTA URL
    $wp_customize->add_setting('header_cta_url', array(
        'default' => home_url('/contact'),
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('header_cta_url', array(
        'label' => __('Header CTA Button URL', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'url',
        'description' => __('URL for the call-to-action button in the header.', 'blueprint-folder'),
    ));
    
    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('company_phone', array(
        'label' => __('Company Phone Number', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'tel',
        'description' => __('Phone number displayed in the header.', 'blueprint-folder'),
    ));
    
    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default' => 'info@blueprintfolder.com',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('company_email', array(
        'label' => __('Company Email', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'email',
        'description' => __('Email address displayed in the mobile menu.', 'blueprint-folder'),
    ));
    
    // Social Media Links
    $social_networks = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube'
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("social_{$network}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh',
        ));
        
        $wp_customize->add_control("social_{$network}", array(
            'label' => sprintf(__('%s URL', 'blueprint-folder'), $label),
            'section' => 'blueprint_folder_header',
            'type' => 'url',
            'description' => sprintf(__('URL for your %s profile.', 'blueprint-folder'), $label),
        ));
    }
    
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
        'label' => __('Business Address', 'services-pro'),
        'section' => 'services_pro_contact',
        'type' => 'textarea',
    ));
    
    // Social Media Section
    $wp_customize->add_section('services_pro_social', array(
        'title' => __('Social Media', 'services-pro'),
        'priority' => 45,
    ));
    
    // Facebook URL
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook URL', 'services-pro'),
        'section' => 'services_pro_social',
        'type' => 'url',
    ));
    
    // Instagram URL
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'services-pro'),
        'section' => 'services_pro_social',
        'type' => 'url',
    ));
    
    // Twitter URL
    $wp_customize->add_setting('social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter URL', 'services-pro'),
        'section' => 'services_pro_social',
        'type' => 'url',
    ));
    
    // LinkedIn URL
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_linkedin', array(
        'label' => __('LinkedIn URL', 'services-pro'),
        'section' => 'services_pro_social',
        'type' => 'url',
    ));
    
    // Performance Section
    $wp_customize->add_section('services_pro_performance', array(
        'title' => __('Performance Settings', 'services-pro'),
        'priority' => 50,
    ));
    
    // Enable lazy loading
    $wp_customize->add_setting('enable_lazy_loading', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('enable_lazy_loading', array(
        'label' => __('Enable Lazy Loading for Images', 'services-pro'),
        'section' => 'services_pro_performance',
        'type' => 'checkbox',
    ));
    
    // Enable image optimization
    $wp_customize->add_setting('enable_image_optimization', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('enable_image_optimization', array(
        'label' => __('Enable Image Optimization', 'services-pro'),
        'section' => 'services_pro_performance',
        'type' => 'checkbox',
    ));
    
    // Accessibility Section
    $wp_customize->add_section('services_pro_accessibility', array(
        'title' => __('Accessibility', 'services-pro'),
        'priority' => 55,
    ));
    
    // High contrast mode
    $wp_customize->add_setting('enable_high_contrast', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('enable_high_contrast', array(
        'label' => __('Enable High Contrast Mode', 'services-pro'),
        'section' => 'services_pro_accessibility',
        'type' => 'checkbox',
    ));
    
    // Skip links
    $wp_customize->add_setting('enable_skip_links', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('enable_skip_links', array(
        'label' => __('Enable Skip Links for Screen Readers', 'services-pro'),
        'section' => 'services_pro_accessibility',
        'type' => 'checkbox',
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
    
    // Header Section
    $wp_customize->add_section('header_options', array(
        'title'    => __('Header Options', 'services-pro'),
        'priority' => 25,
    ));

    // Header Phone Number
    $wp_customize->add_setting('header_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_phone', array(
        'label'    => __('Header Phone Number', 'services-pro'),
        'section'  => 'header_options',
        'type'     => 'text',
        'description' => __('Phone number to display in header', 'services-pro'),
    ));

    // Header CTA Text
    $wp_customize->add_setting('header_cta_text', array(
        'default'           => 'Get Quote',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_cta_text', array(
        'label'    => __('Header CTA Text', 'services-pro'),
        'section'  => 'header_options',
        'type'     => 'text',
        'description' => __('Text for the call-to-action button', 'services-pro'),
    ));

    // Header CTA URL
    $wp_customize->add_setting('header_cta_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('header_cta_url', array(
        'label'    => __('Header CTA URL', 'services-pro'),
        'section'  => 'header_options',
        'type'     => 'url',
        'description' => __('URL for the call-to-action button', 'services-pro'),
    ));

    // Show Header Search
    $wp_customize->add_setting('show_header_search', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_header_search', array(
        'label'    => __('Show Header Search', 'services-pro'),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'description' => __('Display search toggle in header', 'services-pro'),
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
