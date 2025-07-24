<?php
/**
 * Template Name: Menu Page
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Our Menu',
        'Discover our delicious offerings, carefully crafted with the finest ingredients and organized by category for your convenience.'
    );
    ?>

    <!-- Menu Items Section -->
    <section class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Full Menu',
                'Browse our complete selection organized by category'
            ); ?>
            
            <div class="menu-content">
                <?php services_pro_display_menu_items(); ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(
        'Ready to Order?',
        'Contact us today to place your order or make a reservation.',
        'Contact Us',
        get_permalink(get_page_by_path('contact'))
    ); ?>
</main>

<?php get_footer(); ?>
                                                case 'pizza':
                                                    $icon = 'pizza-slice';
                                                    break;
                                            }
                                            ?>
                                            <i class="fas fa-<?php echo esc_attr($icon); ?> fa-3x text-accent"></i>
                                        </div>
                                        <h3 class="h5 mb-3"><?php echo esc_html($category->name); ?></h3>
                                        <?php if ($category->description) : ?>
                                            <p class="text-muted mb-3"><?php echo esc_html($category->description); ?></p>
                                        <?php endif; ?>
                                        <div class="category-stats">
                                            <span class="badge bg-light text-dark">
                                                <?php echo esc_html($category->count); ?> Item<?php echo $category->count !== 1 ? 's' : ''; ?>
                                            </span>
                                        </div>
                                        <button class="btn btn-accent btn-sm mt-3 category-filter" data-category="<?php echo esc_attr($category->slug); ?>">
                                            View Items <i class="fas fa-arrow-right ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Menu Items Display Section -->
    <section id="menu-items" class="section">
        <div class="container">
            <?php
            // Check if we have menu items
            $all_menu_items = new WP_Query(array('post_type' => 'menu_item', 'posts_per_page' => 1));
            
            if ($all_menu_items->have_posts()) :
                wp_reset_postdata();
            ?>
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center mb-5">Complete Menu</h2>
                        
                        <!-- All Items (shown by default) -->
                        <div class="menu-category-section" data-category="all">
                            <?php services_pro_display_menu_items('', -1); ?>
                        </div>
                        
                        <!-- Items by Category (hidden by default) -->
                        <?php if ($menu_categories && !is_wp_error($menu_categories)) : ?>
                            <?php foreach ($menu_categories as $category) : ?>
                                <div class="menu-category-section" data-category="<?php echo esc_attr($category->slug); ?>" style="display: none;">
                                    <div class="category-header text-center mb-4">
                                        <h3 class="h4 text-accent"><?php echo esc_html($category->name); ?></h3>
                                        <?php if ($category->description) : ?>
                                            <p class="text-muted"><?php echo esc_html($category->description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php services_pro_display_menu_items($category->slug, -1); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <!-- No menu items found -->
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <div class="bg-light p-5 rounded">
                            <i class="fas fa-utensils fa-4x text-muted mb-4"></i>
                            <h3 class="h4 mb-3">Menu Coming Soon</h3>
                            <p class="text-muted mb-4">We're preparing something delicious for you! Our menu will be available soon.</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                                <i class="fas fa-envelope me-2"></i>Contact Us for Info
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Special Offers Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="h3 mb-3">Special Offers</h2>
                    <p class="text-muted mb-4">Don't miss out on our daily specials and seasonal offerings.</p>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="special-offer bg-white p-4 rounded shadow-sm">
                                <h4 class="h6 text-accent mb-2">Daily Special</h4>
                                <p class="mb-2">Ask about our chef's daily special featuring seasonal ingredients.</p>
                                <small class="text-muted">Available Monday - Friday</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="special-offer bg-white p-4 rounded shadow-sm">
                                <h4 class="h6 text-accent mb-2">Happy Hour</h4>
                                <p class="mb-2">Enjoy special pricing on select beverages and appetizers.</p>
                                <small class="text-muted">Weekdays 4-6 PM</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Order/Contact CTA -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="h3 mb-3">Ready to Order?</h2>
                    <p class="text-muted mb-4">Contact us to place your order, make a reservation, or ask about our catering services.</p>
                    
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-lg">
                            <i class="fas fa-utensils me-2"></i>Order Now
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-accent btn-lg">
                            <i class="fas fa-phone me-2"></i>Call to Order
                        </a>
                        <a href="mailto:info@example.com" class="btn btn-outline-accent btn-lg">
                            <i class="fas fa-envelope me-2"></i>Email Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- JavaScript for Category Filtering -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const menuSections = document.querySelectorAll('.menu-category-section');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const targetCategory = this.getAttribute('data-category');
            
            // Update active filter button
            categoryFilters.forEach(f => f.classList.remove('active'));
            document.querySelectorAll(`[data-category="${targetCategory}"]`).forEach(f => {
                if (f.classList.contains('category-filter')) {
                    f.classList.add('active');
                }
            });
            
            // Show/hide menu sections
            menuSections.forEach(section => {
                const sectionCategory = section.getAttribute('data-category');
                if (targetCategory === 'all' || sectionCategory === targetCategory) {
                    section.style.display = 'block';
                    
                    // Scroll to menu items section
                    document.getElementById('menu-items').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
