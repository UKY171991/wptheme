<?php get_header(); ?>

<?php
// Check if we're on a taxonomy archive page
$queried_object = get_queried_object();
$is_category = is_tax('service_category');
$category_icon = '';
$category_description = '';

if ($is_category) {
    $term_id = $queried_object->term_id;
    $term_meta = get_term_meta($term_id, 'service_category_icon', true);
    if ($term_meta) {
        $category_icon = $term_meta;
    } else {
        // Get icon from our predefined list in functions.php
        $service_categories = get_service_categories_with_icons();
        foreach ($service_categories as $cat) {
            if (strtolower($cat['title']) === strtolower($queried_object->name)) {
                $category_icon = $cat['icon'];
                break;
            }
        }
    }
    $category_description = term_description($term_id, 'service_category');
}
?>

<!-- Services Archive Banner Section -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-content">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a> 
                <span class="breadcrumb-separator">→</span> 
                <?php if ($is_category) : ?>
                    <a href="<?php echo get_post_type_archive_link('services'); ?>">Services</a>
                    <span class="breadcrumb-separator">→</span> 
                    <span><?php echo $queried_object->name; ?></span>
                <?php else : ?>
                    <span>Services</span>
                <?php endif; ?>
            </div>
            
            <?php if ($is_category && $category_icon) : ?>
                <div class="category-icon" style="font-size: 4rem; margin-bottom: 1rem;"><?php echo $category_icon; ?></div>
            <?php endif; ?>
            
            <h1 class="banner-title">
                <?php if ($is_category) : ?>
                    <?php echo $queried_object->name; ?>
                <?php else : ?>
                    Our Services
                <?php endif; ?>
            </h1>
            
            <p class="banner-subtitle">
                <?php if ($is_category && $category_description) : ?>
                    <?php echo wp_strip_all_tags($category_description); ?>
                <?php elseif ($is_category) : ?>
                    Professional <?php echo strtolower($queried_object->name); ?> services delivered with excellence
                <?php else : ?>
                    Comprehensive home and property services tailored to your needs
                <?php endif; ?>
            </p>
        </div>
    </div>
</section>

<div class="services-archive" style="padding: 4rem 0 5rem; background: #f8f9fa;">
    <div class="container">
        
        <header class="archive-header" style="text-align: center; margin-bottom: 4rem;">
            <?php if ($is_category && $category_icon) : ?>
            <div style="margin-bottom: 1.5rem;">
                <span style="font-size: 5rem; display: inline-block; background: rgba(255,95,0,0.1); width: 120px; height: 120px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin: 0 auto;"><?php echo $category_icon; ?></span>
            </div>
            <?php endif; ?>
            
            <h1 class="archive-title" style="font-size: 3.5rem; margin-bottom: 1.5rem; color: #333; position: relative; display: inline-block;">
                <?php 
                if ($is_category) {
                    echo esc_html($queried_object->name); 
                } else {
                    echo 'All Services';
                }
                ?>
                <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: linear-gradient(to right, #ff5f00, #ff8c00);"></span>
            </h1>
            
            <p class="archive-description" style="font-size: 1.2rem; color: #666; line-height: 1.6; max-width: 800px; margin: 1.5rem auto 0;">
                <?php 
                if ($is_category && !empty($category_description)) {
                    echo $category_description;
                } elseif ($is_category) {
                    echo 'Explore our professional ' . esc_html($queried_object->name) . ' designed to meet your specific needs.';
                } else {
                    echo 'Browse our complete range of professional services tailored to your needs.';
                }
                ?>
            </p>
        </header>
        
        <?php if ($is_category) : ?>
        <!-- Category Overview Section -->
        <section class="category-overview" style="margin-bottom: 4rem; background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
                <div class="category-content">
                    <h2 style="font-size: 2rem; margin-bottom: 1.5rem; color: #333; position: relative; display: inline-block;">
                        About <?php echo esc_html($queried_object->name); ?>
                        <span style="position: absolute; bottom: -8px; left: 0; width: 50px; height: 3px; background: #ff5f00;"></span>
                    </h2>
                    
                    <div style="font-size: 1.1rem; color: #666; line-height: 1.8; margin-bottom: 2rem;">
                        <?php
                        // Generate category-specific content based on name if no description
                        if (empty($category_description)) {
                            switch (strtolower($queried_object->name)) {
                                case 'home & cleaning services':
                                    echo '<p>Our professional home cleaning services deliver spotless results every time. Whether you need regular cleaning, deep cleaning, or specialized services, our trained professionals use premium products and proven techniques to make your home shine.</p>';
                                    break;
                                case 'home & property maintenance':
                                    echo '<p>Keep your property in top condition with our comprehensive maintenance services. From routine upkeep to emergency repairs, our skilled technicians provide reliable solutions for all your home and property needs.</p>';
                                    break;
                                case 'personal errands & concierge':
                                    echo '<p>Let us handle your to-do list with our convenient errand and concierge services. Save time and reduce stress by delegating tasks to our professional team, allowing you to focus on what matters most.</p>';
                                    break;
                                case 'pet & animal services':
                                    echo '<p>Your pets deserve the best care possible. Our loving and attentive pet services ensure your furry, feathered, or scaled family members receive excellent care, whether you\'re at work, traveling, or need regular assistance.</p>';
                                    break;
                                case 'child & family support':
                                    echo '<p>Supporting families is our passion. Our comprehensive family services provide reliable assistance for childcare, elder care, and family management to help your household run smoothly during busy times.</p>';
                                    break;
                                case 'creative & digital services':
                                    echo '<p>Bring your creative vision to life with our professional digital services. From content creation to design work, our talented team delivers high-quality results that help you stand out in the digital landscape.</p>';
                                    break;
                                case 'coaching & consulting':
                                    echo '<p>Achieve your personal and professional goals with our expert coaching and consulting services. Our experienced specialists provide personalized guidance to help you overcome challenges and reach new heights.</p>';
                                    break;
                                case 'office & admin services':
                                    echo '<p>Streamline your business operations with our efficient administrative support. Our detail-oriented professionals handle paperwork, organization, and administrative tasks so you can focus on growing your business.</p>';
                                    break;
                                case 'selling, flipping & setup':
                                    echo '<p>Maximize the value of your items with our specialized selling and flipping services. Whether you\'re downsizing, upgrading, or starting fresh, we help you navigate the process with ease and optimal results.</p>';
                                    break;
                                default:
                                    echo '<p>Our professional ' . esc_html($queried_object->name) . ' are designed to exceed your expectations with quality, reliability, and attention to detail. Trust our experienced team to deliver exceptional results every time.</p>';
                            }
                        }
                        ?>
                    </div>
                    
                    <div class="category-benefits" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                        <?php
                        // Generate benefits based on category
                        $benefits = array(
                            'Professional staff',
                            'Quality guaranteed',
                            'Competitive pricing',
                            'Flexible scheduling',
                            'Satisfaction guarantee',
                            'Fast response times'
                        );
                        
                        foreach ($benefits as $benefit) :
                        ?>
                        <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                            <span style="color: #ff5f00; margin-right: 0.5rem; font-size: 1.2rem;">✓</span>
                            <span><?php echo esc_html($benefit); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <a href="#contact" class="cta-button" style="display: inline-block;">Request a Free Quote</a>
                </div>
                
                <div class="category-image" style="position: relative;">
                    <?php
                    // Get a relevant image based on the category or use a default
                    $image_url = 'https://placehold.co/600x400/f8f9fa/333333?text=' . urlencode($queried_object->name);
                    ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($queried_object->name); ?>" style="width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                    <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: rgba(255,95,0,0.1); border-radius: 50%; z-index: -1;"></div>
                    <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,95,0,0.05); border-radius: 50%; z-index: -1;"></div>
                </div>
            </div>
        </section>
        
        <div class="category-services-heading" style="text-align: center; margin-bottom: 3rem;">
            <h2 style="font-size: 2.2rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                Our <?php echo esc_html($queried_object->name); ?>
                <span style="position: absolute; bottom: -8px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background: #ff5f00;"></span>
            </h2>
            <p style="color: #666; max-width: 700px; margin: 1rem auto 0;">Browse our selection of services in this category</p>
        </div>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="service-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; position: relative;">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-image" style="position: relative; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-thumbnail', array('style' => 'width: 100%; height: 250px; object-fit: cover; transition: transform 0.5s ease;')); ?>
                                    <div class="image-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%);"></div>
                                </a>
                                
                                <?php 
                                $terms = get_the_terms(get_the_ID(), 'service_category');
                                if ($terms && !is_wp_error($terms)) :
                                ?>
                                    <div class="service-category-tag" style="position: absolute; top: 15px; right: 15px; z-index: 10;">
                                        <span style="background: rgba(255,95,0,0.9); padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.8rem; color: white; font-weight: 500; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                            <?php echo esc_html($terms[0]->name); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content" style="padding: 2rem;">
                            <h2 class="service-title" style="margin-bottom: 1rem; font-size: 1.4rem; position: relative; padding-bottom: 0.8rem;">
                                <a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none;">
                                    <?php the_title(); ?>
                                </a>
                                <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: #ff5f00;"></span>
                            </h2>
                            
                            <div class="service-excerpt" style="color: #666; margin-bottom: 1.8rem; line-height: 1.6;">
                                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                            </div>
                            
                            <div class="service-meta" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.8rem; border-top: 1px solid #f0f0f0; padding-top: 1.2rem;">
                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                if ($price) :
                                ?>
                                    <div class="service-price" style="font-weight: bold; color: #ff5f00; font-size: 1.1rem;">
                                        <?php echo esc_html($price); ?>
                                    </div>
                                <?php else: ?>
                                    <div class="service-price" style="font-weight: bold; color: #ff5f00; font-size: 0.9rem;">
                                        Custom Pricing
                                    </div>
                                <?php endif; ?>
                                
                                <?php 
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                if ($duration) :
                                ?>
                                    <div class="service-duration" style="font-size: 0.9rem; color: #666; display: flex; align-items: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 0.3rem;">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                        </svg>
                                        <?php echo esc_html($duration); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="service-features" style="margin-bottom: 1.8rem;">
                                <?php 
                                $features = get_post_meta(get_the_ID(), '_service_features', true);
                                if ($features) : 
                                    $features_array = explode("\n", $features);
                                    $features_to_display = array_slice($features_array, 0, 3); // Show only first 3 features
                                ?>
                                    <ul style="list-style: none; padding: 0; margin: 0;">
                                        <?php foreach ($features_to_display as $feature) : 
                                            if (trim($feature)) :
                                        ?>
                                            <li style="margin-bottom: 0.5rem; display: flex; align-items: center;">
                                                <span style="color: #ff5f00; margin-right: 0.5rem;">✓</span>
                                                <span style="color: #555; font-size: 0.95rem;"><?php echo esc_html(trim($feature)); ?></span>
                                            </li>
                                        <?php 
                                            endif;
                                        endforeach; 
                                        
                                        if (count($features_array) > 3) : // If there are more than 3 features
                                        ?>
                                            <li style="margin-top: 0.3rem;">
                                                <a href="<?php the_permalink(); ?>" style="color: #666; font-size: 0.9rem; text-decoration: none; border-bottom: 1px dotted #666;">
                                                    +<?php echo count($features_array) - 3; ?> more features
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            
                            <div class="service-actions" style="display: flex; gap: 1rem;">
                                <a href="<?php the_permalink(); ?>" class="btn" style="flex: 1; text-align: center; background: #f8f9fa; border: 2px solid #f0f0f0; transition: all 0.3s ease; font-weight: 500;">
                                    View Details
                                </a>
                                <a href="#contact" class="btn btn-secondary" style="flex: 1; text-align: center; background: #ff5f00; color: white; border: none; transition: all 0.3s ease; font-weight: 500;">
                                    Get Quote
                                </a>
                            </div>
                        </div>
                        <div class="service-hover-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 2px solid #ff5f00; border-radius: 15px; opacity: 0; transition: opacity 0.3s ease; pointer-events: none;"></div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-services" style="text-align: center; padding: 4rem 0; background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <div style="font-size: 4rem; margin-bottom: 1rem; color: #ddd;">🔍</div>
                <h2 style="margin-bottom: 1rem; color: #333;">No services found</h2>
                <p style="color: #666; margin-bottom: 2rem;">We're currently updating our service listings in this category. Please check back soon!</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn" style="background: #ff5f00; color: white; border: none; padding: 0.8rem 2rem; font-weight: 500; border-radius: 50px;">Return to Homepage</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- FAQ Section for Categories -->
<?php if (is_tax('service_category')) : ?>
<section class="service-category-faq" style="padding: 5rem 0; background: #f9fafb;">
    <div class="container">
        <header style="text-align: center; margin-bottom: 3rem;">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                Frequently Asked Questions
                <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background: linear-gradient(to right, #ff5f00, #ff8c00);"></span>
            </h2>
            <p style="color: #666; max-width: 700px; margin: 1rem auto 0; font-size: 1.1rem;">
                Find answers to common questions about our <?php echo esc_html($queried_object->name); ?>
            </p>
        </header>
        
        <div class="faq-container" style="max-width: 900px; margin: 0 auto; background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <?php
            // Generate FAQs based on category
            $faqs = array();
            
            switch (strtolower($queried_object->name)) {
                case 'home & cleaning services':
                    $faqs = array(
                        array(
                            'question' => 'How often should I schedule cleaning services?',
                            'answer' => 'The frequency depends on your specific needs. Many clients prefer weekly or bi-weekly service, while others opt for monthly deep cleanings. We can help you determine the optimal schedule based on your home size, number of occupants, and lifestyle.'
                        ),
                        array(
                            'question' => 'Do I need to provide cleaning supplies?',
                            'answer' => 'No, our professional cleaners bring all necessary cleaning supplies and equipment. However, if you prefer specific products due to allergies or preferences, we are happy to use your supplies instead.'
                        ),
                        array(
                            'question' => 'How are your cleaning staff vetted?',
                            'answer' => 'All our cleaning professionals undergo thorough background checks, reference verification, and extensive training before joining our team. We only hire experienced, reliable individuals who meet our high standards for quality and professionalism.'
                        ),
                        array(
                            'question' => 'What is included in your standard cleaning service?',
                            'answer' => 'Our standard cleaning includes dusting, vacuuming, mopping, bathroom sanitizing, kitchen cleaning, and general tidying. Deep cleaning services include additional tasks like inside appliance cleaning, baseboards, ceiling fans, and more detailed attention throughout your home.'
                        )
                    );
                    break;
                    
                case 'home & property maintenance':
                    $faqs = array(
                        array(
                            'question' => 'Do you handle emergency maintenance issues?',
                            'answer' => 'Yes, we offer emergency maintenance services with priority response times for issues like plumbing leaks, electrical problems, and other urgent repairs that could cause damage to your property.'
                        ),
                        array(
                            'question' => 'Are your maintenance technicians licensed?',
                            'answer' => 'Yes, our technicians are fully licensed, insured, and certified in their respective specialties. We maintain all necessary qualifications to ensure work is done correctly and up to code.'
                        ),
                        array(
                            'question' => 'Can you help with seasonal maintenance tasks?',
                            'answer' => 'Absolutely! We offer seasonal maintenance packages for spring, summer, fall, and winter to keep your property in optimal condition year-round. These include tasks like gutter cleaning, HVAC servicing, weatherproofing, and more.'
                        ),
                        array(
                            'question' => 'Do you provide maintenance plans for regular upkeep?',
                            'answer' => 'Yes, we offer customizable maintenance plans that schedule regular inspections and preventative care for your property. These plans help you avoid costly emergency repairs and maintain your property value.'
                        )
                    );
                    break;
                    
                // Add more category-specific FAQs as needed
                default:
                    $faqs = array(
                        array(
                            'question' => 'How do I request a quote for your services?',
                            'answer' => 'You can request a quote by filling out our contact form, calling our customer service line, or emailing us. We will respond within 24 hours to discuss your specific needs and provide pricing information.'
                        ),
                        array(
                            'question' => 'What areas do you service?',
                            'answer' => 'We currently service the greater metropolitan area and surrounding suburbs within a 30-mile radius. Contact us to confirm we cover your specific location.'
                        ),
                        array(
                            'question' => 'How are your service providers selected and trained?',
                            'answer' => 'All our service providers undergo thorough background checks, skills assessment, and comprehensive training. We only work with experienced professionals who meet our high standards for quality and reliability.'
                        ),
                        array(
                            'question' => 'Do you offer any guarantees on your services?',
                            'answer' => 'Yes, we stand behind our work with a 100% satisfaction guarantee. If you are not completely satisfied with our service, we will return to address any issues at no additional cost.'
                        )
                    );
            }
            
            // Display the FAQs
            foreach ($faqs as $index => $faq) :
            ?>
                <div class="faq-item" style="margin-bottom: 1.5rem; border-bottom: 1px solid #f0f0f0; padding-bottom: 1.5rem; <?php echo ($index === count($faqs) - 1) ? 'border-bottom: none; margin-bottom: 0; padding-bottom: 0;' : ''; ?>">
                    <h3 style="margin-bottom: 1rem; color: #333; font-size: 1.2rem; font-weight: 600;">
                        Q: <?php echo esc_html($faq['question']); ?>
                    </h3>
                    <div style="color: #666; line-height: 1.7; font-size: 1rem;">
                        <p><?php echo esc_html($faq['answer']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <div style="margin-top: 2.5rem; text-align: center; background: #f9fafb; padding: 1.5rem; border-radius: 10px;">
                <p style="margin-bottom: 1rem; color: #666;">
                    Have more questions about our <?php echo esc_html($queried_object->name); ?>?
                </p>
                <a href="#contact" class="btn btn-secondary" style="background: #ff5f00; color: white; border: none; padding: 0.8rem 2rem; font-weight: 500; display: inline-block; border-radius: 50px;">
                    Contact Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Categories Section -->
<?php if (is_tax('service_category')) : 
    $current_term_id = get_queried_object_id();
    $other_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
        'exclude' => array($current_term_id),
        'number' => 3
    ));
    
    if (!empty($other_categories) && !is_wp_error($other_categories)) :
?>
<section class="related-categories" style="padding: 5rem 0; background: white;">
    <div class="container">
        <header style="text-align: center; margin-bottom: 3rem;">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;">Explore Other Service Categories</h2>
            <p style="color: #666; max-width: 700px; margin: 1rem auto 0; font-size: 1.1rem;">
                Discover more professional services to meet all your needs
            </p>
        </header>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <?php foreach ($other_categories as $category) : 
                $icon = '';
                $term_meta = get_term_meta($category->term_id, 'service_category_icon', true);
                if ($term_meta) {
                    $icon = $term_meta;
                } else {
                    // Get icon from our predefined list in functions.php
                    $service_categories = get_service_categories_with_icons();
                    foreach ($service_categories as $cat) {
                        if (strtolower($cat['title']) === strtolower($category->name)) {
                            $icon = $cat['icon'];
                            break;
                        }
                    }
                }
            ?>
                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card" style="text-decoration: none; background: #f8f9fa; border-radius: 15px; padding: 2.5rem; text-align: center; transition: all 0.3s ease; display: block;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;"><?php echo $icon; ?></div>
                    <h3 style="margin-bottom: 1rem; color: #333; font-size: 1.3rem;"><?php echo esc_html($category->name); ?></h3>
                    <p style="color: #666; margin-bottom: 1.5rem; font-size: 0.95rem;">
                        <?php 
                        $description = term_description($category->term_id, 'service_category');
                        if (!empty($description)) {
                            echo wp_trim_words($description, 15);
                        } else {
                            echo 'Explore our professional ' . esc_html($category->name) . ' designed to meet your specific needs.';
                        }
                        ?>
                    </p>
                    <span class="btn" style="display: inline-block; background: white; color: #ff5f00; border: 1px solid #ff5f00; font-size: 0.9rem; padding: 0.5rem 1.5rem; border-radius: 50px; transition: all 0.3s ease;">
                        View Services
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; endif; ?>
<?php endif; ?>

<!-- Call to Action Section -->
<section class="archive-cta" style="background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); padding: 5rem 0; color: white; text-align: center;">
    <div class="container">
        <h2 style="margin-bottom: 1.5rem; font-size: 2.5rem; color: white;">Ready to Get Started?</h2>
        <p style="margin-bottom: 2.5rem; font-size: 1.2rem; max-width: 800px; margin-left: auto; margin-right: auto; opacity: 0.9;">
            <?php if (is_tax('service_category')) : ?>
                Contact us today to discuss your <?php echo esc_html($queried_object->name); ?> needs and receive a personalized quote.
            <?php else : ?>
                Don't see exactly what you need? We offer custom solutions tailored to your specific requirements.
            <?php endif; ?>
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="#contact" class="cta-button" style="background: white; color: #ff5f00; font-weight: 600; padding: 1rem 2.5rem; border-radius: 50px; font-size: 1.1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">Get a Free Quote</a>
            <a href="tel:+18005551234" class="btn btn-secondary" style="background: rgba(255,255,255,0.2); color: white; border: 2px solid white; padding: 1rem 2.5rem; border-radius: 50px; font-size: 1.1rem;">Call Us: (800) 555-1234</a>
        </div>
    </div>
</section>

<style>
.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
}

.service-card:hover .service-hover-overlay {
    opacity: 1;
}

.service-card:hover img {
    transform: scale(1.05);
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    background: white !important;
}

.category-card:hover .btn {
    background: #ff5f00;
    color: white;
    border-color: #ff5f00;
}

.pagination .page-numbers {
    display: inline-block;
    padding: 0.75rem 1rem;
    margin: 0 0.25rem;
    background: #f8f9fa;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.pagination .page-numbers:hover,
.pagination .page-numbers.current {
    background: #ff5f00;
    color: white;
}

@media (max-width: 992px) {
    .category-overview > div {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .category-image {
        order: -1;
    }
}

@media (max-width: 768px) {
    .archive-title {
        font-size: 2.5rem !important;
    }
    
    .services-grid {
        grid-template-columns: 1fr !important;
    }
    
    .category-benefits {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
