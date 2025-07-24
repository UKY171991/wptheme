<?php get_header(); ?>

<!-- 404 Error Banner Section -->
<section class="page-banner error-banner" style="background: linear-gradient(135deg, rgba(231, 76, 60, 0.9), rgba(155, 89, 182, 0.8));">
    <div class="container">
        <div class="banner-content">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a> 
                <span class="breadcrumb-separator">→</span> 
                <span>404 Error</span>
            </div>
            <div style="font-size: 4rem; margin-bottom: 1rem;">🏠</div>
            <h1 class="banner-title">404 - Page Not Found</h1>
            <p class="banner-subtitle">Sorry, the page you're looking for doesn't exist. But don't worry, we're here to help with all your service needs!</p>
        </div>
    </div>
</section>

<div class="error-404" style="padding: 4rem 0; background: #f8f9fa;">
    <div class="container">
        <div class="error-content" style="max-width: 600px; margin: 0 auto; text-align: center;">
            
            <div class="error-actions" style="margin-bottom: 4rem;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-button" style="margin-right: 1rem;">Go Home</a>
                <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn">Contact Us</a>
            </div>
            
            <!-- Search form -->
            <div class="error-search" style="background: #f8f9fa; padding: 2rem; border-radius: 15px; margin-bottom: 3rem;">
                <h3 style="margin-bottom: 1rem;">Search Our Site</h3>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="max-width: 400px; margin: 0 auto;">
                    <div style="display: flex; gap: 1rem;">
                        <input type="search" name="s" placeholder="Search for services..." style="flex: 1; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                        <button type="submit" class="btn">Search</button>
                    </div>
                </form>
            </div>
            
            <!-- Popular services -->
            <div class="popular-links">
                <h3 style="margin-bottom: 2rem;">Popular Services</h3>
                <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <?php 
                    $popular_services = array(
                        array('title' => 'House Cleaning', 'icon' => '🧹', 'link' => '#services'),
                        array('title' => 'Handyman Services', 'icon' => '🧰', 'link' => '#services'),
                        array('title' => 'Pet Care', 'icon' => '🐶', 'link' => '#services'),
                        array('title' => 'Personal Errands', 'icon' => '🛍️', 'link' => '#services'),
                    );
                    
                    foreach ($popular_services as $service) :
                    ?>
                        <a href="<?php echo esc_url(home_url('/' . $service['link'])); ?>" class="service-link" style="display: block; background: white; padding: 2rem; border-radius: 15px; text-decoration: none; color: #333; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;"><?php echo $service['icon']; ?></div>
                            <h4><?php echo esc_html($service['title']); ?></h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.service-link:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}
</style>

<?php get_footer(); ?>
