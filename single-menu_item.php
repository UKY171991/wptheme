<?php
/**
 * Template for displaying single menu item
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="hero-section bg-primary-dark text-white py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white-50">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(get_post_type_archive_link('menu_item')); ?>" class="text-white-50">Menu</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page"><?php the_title(); ?></li>
                            </ol>
                        </nav>
                        <h1 class="display-4 fw-bold mb-3"><?php the_title(); ?></h1>
                        <?php
                        $price = get_post_meta(get_the_ID(), 'menu_item_price', true);
                        if ($price) :
                        ?>
                            <div class="price-display mb-3">
                                <span class="h2 text-accent fw-bold">$<?php echo esc_html($price); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if (has_excerpt()) : ?>
                            <p class="lead text-white-75"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid rounded shadow')); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Menu Item Content -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="menu-item-content">
                            <?php the_content(); ?>
                            
                            <?php
                            // Custom fields for menu item details
                            $ingredients = get_post_meta(get_the_ID(), 'ingredients', true);
                            $allergens = get_post_meta(get_the_ID(), 'allergens', true);
                            $dietary_info = get_post_meta(get_the_ID(), 'dietary_info', true);
                            $calories = get_post_meta(get_the_ID(), 'calories', true);
                            $prep_time = get_post_meta(get_the_ID(), 'prep_time', true);
                            
                            if ($ingredients || $allergens || $dietary_info || $calories || $prep_time) :
                            ?>
                                <div class="menu-item-details bg-light p-4 rounded mt-4">
                                    <h3 class="h5 mb-3">Item Details</h3>
                                    <div class="row">
                                        <?php if ($ingredients) : ?>
                                            <div class="col-md-6 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-list me-2"></i>Ingredients</h6>
                                                <p class="mb-0 small"><?php echo esc_html($ingredients); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($calories) : ?>
                                            <div class="col-md-3 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-fire me-2"></i>Calories</h6>
                                                <p class="mb-0"><?php echo esc_html($calories); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($prep_time) : ?>
                                            <div class="col-md-3 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-clock me-2"></i>Prep Time</h6>
                                                <p class="mb-0"><?php echo esc_html($prep_time); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($allergens) : ?>
                                            <div class="col-12 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-exclamation-triangle me-2"></i>Allergens</h6>
                                                <p class="mb-0 small text-warning"><?php echo esc_html($allergens); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if ($dietary_info) : ?>
                                        <div class="dietary-badges mt-3">
                                            <h6 class="text-accent mb-2">Dietary Information:</h6>
                                            <?php
                                            $dietary_labels = explode(',', $dietary_info);
                                            foreach ($dietary_labels as $label) :
                                                $label = trim($label);
                                                $icon = '';
                                                $class = 'bg-secondary';
                                                
                                                switch (strtolower($label)) {
                                                    case 'vegetarian':
                                                        $icon = 'leaf';
                                                        $class = 'bg-success';
                                                        break;
                                                    case 'vegan':
                                                        $icon = 'seedling';
                                                        $class = 'bg-success';
                                                        break;
                                                    case 'gluten-free':
                                                        $icon = 'wheat';
                                                        $class = 'bg-warning';
                                                        break;
                                                    case 'spicy':
                                                        $icon = 'fire';
                                                        $class = 'bg-danger';
                                                        break;
                                                    case 'low-carb':
                                                        $icon = 'carrot';
                                                        $class = 'bg-info';
                                                        break;
                                                }
                                            ?>
                                                <span class="badge <?php echo esc_attr($class); ?> text-white me-2 mb-1">
                                                    <?php if ($icon) : ?>
                                                        <i class="fas fa-<?php echo esc_attr($icon); ?> me-1"></i>
                                                    <?php endif; ?>
                                                    <?php echo esc_html($label); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="menu-item-sidebar">
                            <!-- Menu Categories -->
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'menu_category');
                            if ($categories && !is_wp_error($categories)) :
                            ?>
                                <div class="sidebar-widget mb-4">
                                    <h4 class="widget-title h6 mb-3">Category</h4>
                                    <div class="categories-list">
                                        <?php foreach ($categories as $category) : ?>
                                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="badge bg-accent text-white me-1 mb-1 text-decoration-none">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Order CTA -->
                            <div class="sidebar-widget bg-accent text-white p-4 rounded mb-4">
                                <h4 class="h5 mb-3">Want to Order This?</h4>
                                <p class="mb-3">Contact us to place your order or ask about this item.</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-sm w-100 mb-2">
                                    <i class="fas fa-utensils me-2"></i>Order Now
                                </a>
                                <a href="tel:+1234567890" class="btn btn-outline-light btn-sm w-100">
                                    <i class="fas fa-phone me-2"></i>Call to Order
                                </a>
                            </div>
                            
                            <!-- Quick Info -->
                            <div class="sidebar-widget bg-light p-3 rounded">
                                <h5 class="h6 mb-3">Quick Info</h5>
                                <ul class="list-unstyled small mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-clock text-accent me-2"></i>
                                        Available daily during business hours
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-utensils text-accent me-2"></i>
                                        Made fresh to order
                                    </li>
                                    <li class="mb-0">
                                        <i class="fas fa-heart text-accent me-2"></i>
                                        Customer favorite
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Menu Items -->
        <?php
        $related_items = new WP_Query(array(
            'post_type' => 'menu_item',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'rand'
        ));
        
        if ($related_items->have_posts()) :
        ?>
            <section class="section bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 class="section-title">You Might Also Like</h2>
                            <p class="text-muted">Other popular items from our menu</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php while ($related_items->have_posts()) : $related_items->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="card menu-item-card h-100 shadow-sm border-0">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-img-top position-relative overflow-hidden">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                            <?php
                                            $price = get_post_meta(get_the_ID(), 'menu_item_price', true);
                                            if ($price) :
                                            ?>
                                                <div class="price-badge position-absolute top-0 end-0 bg-accent text-white px-2 py-1 m-2 rounded">
                                                    $<?php echo esc_html($price); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body p-4">
                                        <h5 class="card-title">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-accent btn-sm">
                                            View Details <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php
        endif;
        wp_reset_postdata();
        ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
