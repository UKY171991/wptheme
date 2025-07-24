<?php
/**
 * Template Name: About Us
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'About Our Company',
        'For over 20 years, we\'ve been the trusted choice for homeowners who demand quality, reliability, and exceptional service.'
    );
    ?>

    <!-- Our Story Section -->
    <section id="our-story" class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Story',
                'Building trust through quality service since 2004'
            ); ?>
            
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="fade-in-up">
                        <h3 class="h4 text-accent mb-3">How We Started</h3>
                        <p class="mb-4">What began as a small family business has grown into one of the region's most trusted home service providers. Our founder, with a vision to deliver exceptional quality and reliability, started this company with just a truck and a commitment to excellence.</p>
                        
                        <h3 class="h4 text-accent mb-3">Our Mission</h3>
                        <p class="mb-4">To provide professional, reliable, and affordable home services that exceed our customers' expectations. We believe that your home deserves the best care, and we're here to deliver it with integrity and professionalism.</p>
                        
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-accent me-3 flex-shrink-0"></i>
                                    <span>Licensed & Insured</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-accent me-3 flex-shrink-0"></i>
                                    <span>100% Satisfaction Guarantee</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-accent me-3 flex-shrink-0"></i>
                                    <span>Available 7 Days a Week</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-check-circle text-accent me-3 flex-shrink-0"></i>
                                    <span>Free Estimates</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-6 order-1 order-lg-2 text-center">
                    <div class="fade-in-up">
                        <?php echo services_pro_get_stats_section(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section bg-white">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Values',
                'The principles that guide everything we do'
            ); ?>
            
            <div class="row g-4">
                <?php
                $values = array(
                    array('icon' => 'fas fa-handshake', 'title' => 'Integrity', 'description' => 'We believe in honest, transparent communication and fair pricing. Our word is our bond.'),
                    array('icon' => 'fas fa-star', 'title' => 'Excellence', 'description' => 'We strive for perfection in every task, using the best tools and techniques available.'),
                    array('icon' => 'fas fa-heart', 'title' => 'Care', 'description' => 'Your home is important to you, and it\'s important to us too. We treat it with respect.'),
                    array('icon' => 'fas fa-clock', 'title' => 'Reliability', 'description' => 'Count on us to show up on time and complete the job as promised, every time.'),
                    array('icon' => 'fas fa-graduation-cap', 'title' => 'Expertise', 'description' => 'Our team stays current with industry best practices and latest technologies.'),
                    array('icon' => 'fas fa-phone', 'title' => 'Support', 'description' => 'We\'re always here when you need us, with responsive customer service and support.'),
                );
                
                foreach ($values as $value):
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-hover h-100 border-0 text-center p-4">
                            <div class="icon-circle mx-auto mb-3">
                                <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                            </div>
                            <h3 class="h5 mb-3"><?php echo esc_html($value['title']); ?></h3>
                            <p class="mb-0"><?php echo esc_html($value['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section bg-primary-dark text-white">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Meet Our Team',
                'The professionals who make it all happen'
            ); ?>
            
            <div class="row g-4 justify-content-center">
                <?php
                $team_members = array(
                    array('name' => 'John Smith', 'position' => 'Founder & CEO', 'description' => '20+ years in home services industry with a passion for excellence and customer satisfaction.'),
                    array('name' => 'Sarah Johnson', 'position' => 'Operations Manager', 'description' => 'Ensures smooth operations and maintains our high standards of quality and customer service.'),
                    array('name' => 'Mike Davis', 'position' => 'Lead Technician', 'description' => 'Expert craftsman with extensive experience in all aspects of home maintenance and repair.'),
                );
                
                foreach ($team_members as $member):
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 text-center bg-transparent">
                            <div class="card-body p-4">
                                <div class="rounded-circle bg-accent mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user text-white" style="font-size: 3rem;"></i>
                                </div>
                                <h3 class="h5 mb-2 text-white"><?php echo esc_html($member['name']); ?></h3>
                                <p class="text-accent mb-2"><?php echo esc_html($member['position']); ?></p>
                                <p class="small text-light"><?php echo esc_html($member['description']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <?php echo services_pro_get_cta_section(
        'Ready to Experience the Difference?',
        'Join thousands of satisfied customers who trust us with their home service needs.'
    ); ?>
</main>

<?php get_footer(); ?>
