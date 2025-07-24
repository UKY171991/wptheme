<?php
/**
 * Template for displaying menu items archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Our Menu',
        'Discover our delicious offerings crafted with care and the finest ingredients.'
    );
    ?>Template for displaying menu items archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Hero Section
    echo services_pro_get_hero_section(
        'Our Menu',
        'Discover our delicious offerings, carefully crafted with the finest ingredients.'
    );
    ?>

    <!-- Menu Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php
                // Group menu items by category
                $menu_categories = get_terms(array(
                    'taxonomy' => 'menu_category',
                    'hide_empty' => true
                ));
                
                if ($menu_categories && !is_wp_error($menu_categories)) :
                    foreach ($menu_categories as $category) :
                        $category_items = new WP_Query(array(
                            'post_type' => 'menu_item',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu_category',
                                    'field'    => 'term_id',
                                    'terms'    => $category->term_id,
                                ),
                            ),
                        ));
                        
                        if ($category_items->have_posts()) :
                ?>
                    <div class="menu-category mb-5">
                        <div class="text-center mb-4">
                            <h2 class="h3 text-accent mb-2"><?php echo esc_html($category->name); ?></h2>
                            <?php if ($category->description) : ?>
                                <p class="text-muted"><?php echo esc_html($category->description); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="row g-4">
                            <?php while ($category_items->have_posts()) : $category_items->the_post(); ?>
                                <div class="col-lg-6">
                                    <div class="menu-item d-flex align-items-start p-3 border rounded bg-white shadow-sm">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="menu-item-image me-3 flex-shrink-0">
                                                <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'width: 80px; height: 80px; object-fit: cover;')); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="menu-item-content flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h4 class="h6 mb-0 text-dark"><?php the_title(); ?></h4>
                                                <?php
                                                $price = get_post_meta(get_the_ID(), 'menu_item_price', true);
                                                if ($price) :
                                                ?>
                                                    <span class="price fw-bold text-accent">$<?php echo esc_html($price); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <?php if (has_excerpt()) : ?>
                                                <p class="text-muted small mb-0"><?php the_excerpt(); ?></p>
                                            <?php else : ?>
                                                <p class="text-muted small mb-0"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                                            <?php endif; ?>
                                            
                                            <?php
                                            // Display dietary restrictions or special notes
                                            $dietary_info = get_post_meta(get_the_ID(), 'dietary_info', true);
                                            if ($dietary_info) :
                                            ?>
                                                <div class="dietary-info mt-2">
                                                    <?php
                                                    $dietary_labels = explode(',', $dietary_info);
                                                    foreach ($dietary_labels as $label) :
                                                        $label = trim($label);
                                                        $icon = '';
                                                        $class = 'badge-secondary';
                                                        
                                                        switch (strtolower($label)) {
                                                            case 'vegetarian':
                                                                $icon = 'leaf';
                                                                $class = 'badge-success';
                                                                break;
                                                            case 'vegan':
                                                                $icon = 'seedling';
                                                                $class = 'badge-success';
                                                                break;
                                                            case 'gluten-free':
                                                                $icon = 'wheat';
                                                                $class = 'badge-warning';
                                                                break;
                                                            case 'spicy':
                                                                $icon = 'fire';
                                                                $class = 'badge-danger';
                                                                break;
                                                        }
                                                    ?>
                                                        <span class="badge bg-light text-dark me-1">
                                                            <?php if ($icon) : ?>
                                                                <i class="fas fa-<?php echo esc_attr($icon); ?> me-1"></i>
                                                            <?php endif; ?>
                                                            <?php echo esc_html($label); ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php
                        endif;
                        wp_reset_postdata();
                    endforeach;
                else :
                    // Display all menu items without categories
                ?>
                    <div class="row g-4">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-lg-6">
                                <div class="menu-item d-flex align-items-start p-3 border rounded bg-white shadow-sm">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="menu-item-image me-3 flex-shrink-0">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'width: 80px; height: 80px; object-fit: cover;')); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="menu-item-content flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h4 class="h6 mb-0 text-dark"><?php the_title(); ?></h4>
                                            <?php
                                            $price = get_post_meta(get_the_ID(), 'menu_item_price', true);
                                            if ($price) :
                                            ?>
                                                <span class="price fw-bold text-accent">$<?php echo esc_html($price); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if (has_excerpt()) : ?>
                                            <p class="text-muted small mb-0"><?php the_excerpt(); ?></p>
                                        <?php else : ?>
                                            <p class="text-muted small mb-0"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Menu Coming Soon</h3>
                        <p class="text-muted">We're preparing something delicious for you!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contact/Order CTA -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="h3 mb-3">Ready to Order?</h2>
                    <p class="text-muted mb-4">Contact us to place your order or make a reservation.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                            <i class="fas fa-utensils me-2"></i>Order Now
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-accent">
                            <i class="fas fa-phone me-2"></i>Call to Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
