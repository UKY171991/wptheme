<?php
/**
 * Simple Index Template for Testing
 * 
 * @package ServiceBlueprint
 */

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_bloginfo('name'); ?> - Service Blueprint Theme</title>
    <?php wp_head(); ?>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .header { background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .header-content { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; }
        .logo { font-size: 1.5rem; font-weight: 700; color: #2563eb; text-decoration: none; }
        .nav-menu { list-style: none; display: flex; gap: 2rem; }
        .nav-menu a { text-decoration: none; color: #374151; font-weight: 500; }
        .nav-menu a:hover { color: #2563eb; }
        .hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 80px 0; text-align: center; }
        .hero h1 { font-size: 3rem; margin-bottom: 1rem; }
        .hero p { font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; }
        .hero .btn { display: inline-block; background: white; color: #2563eb; padding: 15px 30px; text-decoration: none; border-radius: 25px; font-weight: 600; }
        .content { padding: 60px 0; }
        .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin: 40px 0; }
        .service-card { background: white; border-radius: 8px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; text-align: center; }
        .service-card h3 { color: #1f2937; margin-bottom: 15px; }
        .service-card p { color: #6b7280; margin-bottom: 20px; }
        .service-card a { color: #2563eb; text-decoration: none; font-weight: 500; }
        .footer { background: #1f2937; color: white; padding: 40px 0; text-align: center; }
    </style>
</head>
<body <?php body_class(); ?>>

    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <?php bloginfo('name'); ?>
                </a>
                
                <?php if (has_nav_menu('primary')) : ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav-menu'
                    )); ?>
                <?php else : ?>
                    <ul class="nav-menu">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo get_post_type_archive_link('service'); ?>">Services</a></li>
                        <li><a href="<?php echo home_url('/about/'); ?>">About</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1><?php echo esc_html(get_theme_mod('service_blueprint_hero_title', 'Transform Your Business with Expert Services')); ?></h1>
                <p><?php echo esc_html(get_theme_mod('service_blueprint_hero_subtitle', 'We provide comprehensive digital solutions to help your business grow and succeed.')); ?></p>
                <a href="<?php echo esc_url(get_theme_mod('service_blueprint_hero_button_url', get_post_type_archive_link('service'))); ?>" class="btn">
                    <?php echo esc_html(get_theme_mod('service_blueprint_hero_button_text', 'Explore Services')); ?>
                </a>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 20px; color: #1f2937;">Our Services</h2>
                
                <div class="services-grid">
                    <?php
                    // Get service categories
                    $service_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => false,
                        'number' => 6
                    ));
                    
                    if ($service_categories && !is_wp_error($service_categories)) :
                        foreach ($service_categories as $category) :
                    ?>
                        <div class="service-card">
                            <h3><?php echo esc_html($category->name); ?></h3>
                            <p><?php echo esc_html($category->description); ?></p>
                            <a href="<?php echo get_term_link($category); ?>">Learn More →</a>
                        </div>
                    <?php
                        endforeach;
                    else :
                        // Fallback content if no categories
                        $fallback_services = array(
                            'Web Development' => 'Custom websites and web applications',
                            'Digital Marketing' => 'SEO, social media, and online advertising',
                            'Graphic Design' => 'Logo design and branding solutions',
                            'Business Consulting' => 'Strategic planning and optimization',
                            'Mobile Apps' => 'iOS and Android development',
                            'Cloud Solutions' => 'Cloud migration and DevOps'
                        );
                        
                        foreach ($fallback_services as $title => $description) :
                    ?>
                        <div class="service-card">
                            <h3><?php echo esc_html($title); ?></h3>
                            <p><?php echo esc_html($description); ?></p>
                            <a href="#">Learn More →</a>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                
                <div style="text-align: center; margin-top: 40px;">
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" style="display: inline-block; background: #2563eb; color: white; padding: 15px 30px; text-decoration: none; border-radius: 25px; font-weight: 600;">
                        View All Services
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p style="margin-top: 10px; opacity: 0.8;">Service Blueprint Theme - Professional Services Website</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
