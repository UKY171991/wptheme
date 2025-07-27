<?php
/**
 * Professional Banner Section Template
 * Displays on all pages except front page (which has its own hero)
 */

// Exit early if this is the front page (it has its own hero section)
if (is_front_page()) {
    return;
}

// Exit early if this is a page template that has its own hero section
$page_template = get_page_template_slug();
if (in_array($page_template, array(
    'page-portfolio.php', 
    'page-services.php', 
    'page-about.php',
    'page-testimonials.php',
    'page-team.php',
    'page-pricing.php',
    'page-home.php',
    'page-careers.php'
))) {
    return;
}

// Get current page information
$page_title = '';
$page_subtitle = '';
$page_description = '';
$banner_class = 'page-banner';

if (false) { // This condition will never be true now
    $page_title = get_theme_mod('hero_title', 'Professional Services That Drive Results');
    $page_subtitle = get_theme_mod('hero_subtitle', 'Excellence in Every Project');
    $page_description = get_theme_mod('hero_description', 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.');
    $banner_class = 'hero-banner';
} elseif (is_page()) {
    $page_title = get_the_title();
    $page_subtitle = get_post_meta(get_the_ID(), 'page_subtitle', true) ?: 'Professional Solutions';
    $page_description = get_post_meta(get_the_ID(), 'page_description', true) ?: get_the_excerpt();
    if (empty($page_description)) {
        $page_description = 'Discover our comprehensive range of professional services designed to help your business succeed.';
}
} elseif (is_single()) {
    if (get_post_type() === 'service') {
        $page_title = get_the_title();
        $page_subtitle = 'Professional Service';
        $page_description = get_the_excerpt() ?: 'Learn more about this professional service and how it can benefit your business.';
} else {
        $page_title = get_the_title();
        $page_subtitle = 'Blog Post';
        $page_description = get_the_excerpt() ?: 'Read our latest insights and industry updates.';
}
} elseif (is_archive()) {
    if (is_post_type_archive('service')) {
        $page_title = 'Our Services';
        $page_subtitle = 'Professional Solutions';
        $page_description = 'Explore our comprehensive range of professional services designed to help your business grow and succeed.';
} elseif (is_category()) {
        $page_title = single_cat_title('', false);
        $page_subtitle = 'Category Archive';
        $page_description = category_description() ?: 'Browse posts in this category.';
} elseif (is_tag()) {
        $page_title = single_tag_title('', false);
        $page_subtitle = 'Tag Archive';
        $page_description = tag_description() ?: 'Posts tagged with this topic.';
} else {
        $page_title = 'Archive';
        $page_subtitle = 'Browse Content';
        $page_description = 'Explore our content archive.';
}
} elseif (is_search()) {
    $page_title = 'Search Results';
    $page_subtitle = 'Search: ' . get_search_query();
    $page_description = 'Find what you\'re looking for in our comprehensive content library.';
} elseif (is_404()) {
    $page_title = 'Page Not Found';
    $page_subtitle = '404 Error';
    $page_description = 'The page you\'re looking for doesn\'t exist. Let us help you find what you need.';
} else {
    $page_title = 'Welcome';
    $page_subtitle = 'Professional Services';
    $page_description = 'Discover our professional services and solutions.';
}

// Get breadcrumb data
$breadcrumbs = array();
if (!is_front_page()) {
    $breadcrumbs[] = array('title' => 'Home', 'url' => home_url('/'));

    if (is_page()) {
        // Add parent pages to breadcrumb
        $post = get_post();
        if ($post->post_parent) {
            $parent_pages = array();
            $parent_id = $post->post_parent;
            while ($parent_id) {
                $parent = get_post($parent_id);
                $parent_pages[] = array('title' => $parent->post_title, 'url' => get_permalink($parent->ID));
                $parent_id = $parent->post_parent;
}
            $breadcrumbs = array_merge($breadcrumbs, array_reverse($parent_pages));
}
        $breadcrumbs[] = array('title' => get_the_title(), 'url' => '');
} elseif (is_single()) {
        if (get_post_type() === 'service') {
            $breadcrumbs[] = array('title' => 'Services', 'url' => get_post_type_archive_link('service'));
} else {
            $breadcrumbs[] = array('title' => 'Blog', 'url' => get_permalink(get_option('page_for_posts')));
}
        $breadcrumbs[] = array('title' => get_the_title(), 'url' => '');
} elseif (is_archive()) {
        $breadcrumbs[] = array('title' => $page_title, 'url' => '');
}
}?>
<section class="<?php echo esc_attr($banner_class);?>" role="banner">
    <div class="banner-background">
        <div class="banner-overlay"></div>
        <div class="banner-pattern"></div>
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <!-- Breadcrumbs -->
                <?php if (!empty($breadcrumbs) && !is_front_page()) :?>
                    <nav class="banner-breadcrumb" aria-label="Breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <?php foreach ($breadcrumbs as $index => $crumb) :?>
                                <li class="breadcrumb-item<?php echo empty($crumb['url']) ? ' active' : '';?>">
                                    <?php if (!empty($crumb['url'])) :?>
                                        <a href="<?php echo esc_url($crumb['url']);?>"><?php echo esc_html($crumb['title']);?></a>
                                    <?php else :?>
                                        <?php echo esc_html($crumb['title']);?>
                                    <?php endif;?>
                                </li>
                            <?php endforeach;?>
                        </ol>
                    </nav>
                <?php endif;?>
                <!-- Banner Content -->
                <div class="banner-content">
                    <?php if ($page_subtitle && !is_front_page()) :?>
                        <div class="banner-subtitle">
                            <span class="subtitle-text"><?php echo esc_html($page_subtitle);?></span>
                        </div>
                    <?php endif;?>
                    <h1 class="banner-title">
                        <?php echo esc_html($page_title);?>
                    </h1>
                    <?php if ($page_description) :?>
                        <div class="banner-description">
                            <p><?php echo esc_html($page_description);?></p>
                        </div>
                    <?php endif;?>
                    <!-- CTA Buttons (only on front page and service pages) -->
                    <?php if (is_front_page() || is_page_template('page-services.php') || is_post_type_archive('service')) :?>
                        <div class="banner-actions">
                            <a href="<?php echo esc_url(blueprint_folder_get_header_cta_url());?>"
                               class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-rocket me-2"></i>
                                Get Started Today
                            </a>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/services'));?>"
                               class="btn btn-outline-light btn-lg">
                                <i class="fas fa-eye me-2"></i>
                                View Our Services
                            </a>
                        </div>
                    <?php elseif (is_page('contact')) :?>
                        <div class="banner-actions">
                            <a href="#contact-form" class="btn btn-primary btn-lg">
                                <i class="fas fa-envelope me-2"></i>
                                Send Message
                            </a>
                        </div>
                    <?php endif;?>
                </div>
                <!-- Banner Stats (only on front page) -->
                <?php if (is_front_page()) :?>
                    <div class="banner-stats">
                        <div class="row text-center">
                            <div class="col-md-3 col-6">
                                <div class="stat-item">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Projects Completed</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item">
                                    <div class="stat-number">100%</div>
                                    <div class="stat-label">Client Satisfaction</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item">
                                    <div class="stat-number">24/7</div>
                                    <div class="stat-label">Support Available</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item">
                                    <div class="stat-number">5+</div>
                                    <div class="stat-label">Years Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <a href="#main-content" class="scroll-down" aria-label="Scroll to main content">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>
