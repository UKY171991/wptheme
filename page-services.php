<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <h1 class="section-title">Our Services</h1>
        <p class="section-subtitle">Professional party rental services to make your event spectacular</p>
        
        <?php
        // Query for services
        $services_query = new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        
        if ($services_query->have_posts()) : ?>
            <div class="services-grid">
                <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="service-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-image">
                                <?php the_post_thumbnail('service-thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <h3 class="service-title"><?php the_title(); ?></h3>
                            
                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="service-meta">
                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                $capacity = get_post_meta(get_the_ID(), '_service_capacity', true);
                                ?>
                                
                                <?php if ($price) : ?>
                                    <div class="service-price">Starting from ₹<?php echo esc_html(number_format($price)); ?></div>
                                <?php endif; ?>
                                
                                <div class="service-details">
                                    <?php if ($duration) : ?>
                                        <span><i class="fas fa-clock"></i> <?php echo esc_html($duration); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ($capacity) : ?>
                                        <span><i class="fas fa-users"></i> <?php echo esc_html($capacity); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="service-actions">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
        <?php else : ?>
            <!-- Default services if no custom services are added -->
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🪑</div>
                    <div class="service-content">
                        <h3 class="service-title">Tables & Chairs</h3>
                        <div class="service-excerpt">
                            <p>Elegant tables and comfortable chairs for any event size. Perfect for weddings, parties, and corporate events.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Starting from ₹15,000</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> 8 hours</span>
                                <span><i class="fas fa-users"></i> 50+ guests</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🏕️</div>
                    <div class="service-content">
                        <h3 class="service-title">Tents & Canopies</h3>
                        <div class="service-excerpt">
                            <p>Weather-proof tents and stylish canopies. Perfect for outdoor events and garden parties.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Starting from ₹25,000</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> 12 hours</span>
                                <span><i class="fas fa-users"></i> 100+ guests</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🏰</div>
                    <div class="service-content">
                        <h3 class="service-title">Bounce Houses</h3>
                        <div class="service-excerpt">
                            <p>Safe and fun bounce houses for kids' parties. Various themes and sizes available.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Starting from ₹8,000</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> 6 hours</span>
                                <span><i class="fas fa-users"></i> Kids events</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">💡</div>
                    <div class="service-content">
                        <h3 class="service-title">Event Lighting</h3>
                        <div class="service-excerpt">
                            <p>Professional lighting solutions to create the perfect ambiance for your special day.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Starting from ₹12,000</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> 10 hours</span>
                                <span><i class="fas fa-users"></i> All events</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🎊</div>
                    <div class="service-content">
                        <h3 class="service-title">Event Decorations</h3>
                        <div class="service-excerpt">
                            <p>Beautiful centerpieces, backdrops, and themed decorations to transform any space.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Starting from ₹18,000</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> Full day</span>
                                <span><i class="fas fa-users"></i> All events</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🔧</div>
                    <div class="service-content">
                        <h3 class="service-title">Setup & Cleanup</h3>
                        <div class="service-excerpt">
                            <p>Professional setup and breakdown services. We handle everything so you can relax.</p>
                        </div>
                        <div class="service-meta">
                            <div class="service-price">Included with rentals</div>
                            <div class="service-details">
                                <span><i class="fas fa-clock"></i> As needed</span>
                                <span><i class="fas fa-users"></i> All packages</span>
                            </div>
                        </div>
                        <div class="service-actions">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; 
        wp_reset_postdata(); ?>
        
        <!-- Call to Action -->
        <div class="cta-section text-center mt-4">
            <h3>Don't See What You Need?</h3>
            <p>We offer custom solutions for unique events. Contact us to discuss your specific requirements!</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Get Custom Quote</a>
        </div>
    </div>
</div>

<style>
.service-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.service-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.service-icon {
    font-size: 3rem;
    text-align: center;
    padding: 2rem 0 1rem;
}

.service-content {
    padding: 1.5rem;
}

.service-title {
    font-size: 1.3rem;
    margin-bottom: 1rem;
    color: #333;
}

.service-excerpt p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.service-meta {
    margin-bottom: 1.5rem;
}

.service-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #667eea;
    margin-bottom: 0.5rem;
}

.service-details {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.service-details span {
    color: #666;
    font-size: 0.9rem;
}

.service-details i {
    margin-right: 0.25rem;
    color: #667eea;
}

.service-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.service-actions .btn {
    flex: 1;
    text-align: center;
    min-width: 120px;
}

.cta-section {
    background: #f8f9fa;
    padding: 3rem 2rem;
    border-radius: 15px;
    margin-top: 4rem;
}

.cta-section h3 {
    margin-bottom: 1rem;
    color: #333;
}

.cta-section p {
    color: #666;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

@media (max-width: 768px) {
    .service-actions {
        flex-direction: column;
    }
    
    .service-actions .btn {
        flex: none;
    }
}
</style>

<?php get_footer(); ?>
