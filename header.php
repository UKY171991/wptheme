<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Blog Details Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/blog-details-styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/responsive.css">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-container">
        <h1 class="site-title">
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </h1>
        
        <button class="menu-toggle">Menu</button>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'partypro_fallback_menu'
            ));
            ?>
        </nav>
    </div>
</header>

<?php
// Fallback menu if no menu is assigned
function partypro_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    
    // Get pages dynamically
    $services_page = get_page_by_path('services');
    if ($services_page) {
        echo '<li><a href="' . esc_url(get_permalink($services_page)) . '">Services</a></li>';
    } else {
        // Ensure 'Services' menu item is always displayed
        echo '<li><a href="#">Services (Unavailable)</a></li>';
    }
    
    $pricing_page = get_page_by_path('pricing');
    if ($pricing_page) {
        echo '<li><a href="' . esc_url(get_permalink($pricing_page)) . '">Pricing</a></li>';
    }
    
    $about_page = get_page_by_path('about');
    if ($about_page) {
        echo '<li><a href="' . esc_url(get_permalink($about_page)) . '">About</a></li>';
    }
    
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . esc_url(get_permalink($contact_page)) . '">Contact</a></li>';
    }
    
    echo '</ul>';
}
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/submenu.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu-toggle.js"></script>
