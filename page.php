<?php 
// Check if this is a special page that needs custom template
global $post;
if ($post) {
    $page_slug = $post->post_name;
    
    // Try to load custom template
    $custom_templates = array(
        'services' => 'page-services.php',
        'pricing' => 'page-pricing.php',
        'contact' => 'page-contact.php',
        'about' => 'page-about.php'
    );
    
    if (isset($custom_templates[$page_slug])) {
        $custom_template = get_template_directory() . '/' . $custom_templates[$page_slug];
        if (file_exists($custom_template)) {
            include($custom_template);
            return;
        }
    }
}

get_header(); ?>

<div class="content-section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <h1 class="section-title"><?php the_title(); ?></h1>
            
            <?php while (have_posts()) : the_post(); ?>
                <div class="page-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-thumbnail mb-4">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    // Get the content
                    $content = get_the_content();
                    if (!empty($content)) {
                        the_content();
                    } else {
                        // Show default content based on page
                        global $post;
                        $page_slug = $post->post_name;
                        
                        switch ($page_slug) {
                            case 'services':
                                echo '<p>Welcome to our Services page. We offer comprehensive party rental services.</p>';
                                break;
                            case 'pricing':
                                echo '<p>Check out our competitive pricing packages for all event sizes.</p>';
                                break;
                            case 'contact':
                                echo '<p>Get in touch with us to plan your perfect event.</p>';
                                break;
                            case 'about':
                                echo '<p>Learn more about our party rental business.</p>';
                                break;
                            default:
                                echo '<p>Welcome to ' . get_the_title() . '</p>';
                        }
                    }
                    ?>
                </div>
            <?php endwhile; ?>
            
        <?php else : ?>
            <h1>Page not found</h1>
            <p>Sorry, the page you are looking for could not be found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
