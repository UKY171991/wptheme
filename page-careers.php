<?php
/**
 * Template Name: Careers
 */

get_header(); ?>
<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/'));?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Careers</li>
                        </ol>
                    </nav>
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-briefcase me-2"></i>Build Your Career With Us
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            Join Our Team
                            <span class="text-accent">Excellence & Innovation</span>
                        </h1>
                        <p class="lead mb-4">Build your career with a company that values excellence, integrity, and innovation. Discover opportunities to grow, learn, and make a meaningful impact.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#open-positions" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-search me-2"></i>View Open Positions
                            </a>
                            <a href="#benefits" class="btn btn-outline-light btn-rounded btn-lg">
                                <i class="fas fa-star me-2"></i>Learn About Benefits
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Join Us Section -->
    <section id="benefits" class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Why Join Our Team?',
                'Discover the benefits of building your career with us and the values that drive our success.'
            );?>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-heart fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Comprehensive Benefits</h3>
                            <p class="text-muted">Health, dental, vision insurance, retirement plans, and paid time off to support your well-being.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-graduation-cap fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Career Development</h3>
                            <p class="text-muted">Continuous learning opportunities, training programs, and clear career advancement paths.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-users fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Team Environment</h3>
                            <p class="text-muted">Collaborative, supportive workplace where every team member's contribution is valued.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-balance-scale fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Work-Life Balance</h3>
                            <p class="text-muted">Flexible schedules and policies that help you maintain a healthy work-life balance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-dollar-sign fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Competitive Pay</h3>
                            <p class="text-muted">Fair compensation packages with performance bonuses and regular salary reviews.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center card-hover">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-trophy fa-3x text-accent"></i>
                            </div>
                            <h3 class="h5 mb-3">Recognition</h3>
                            <p class="text-muted">Employee recognition programs that celebrate achievements and exceptional performance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Open Positions Section -->
    <section id="open-positions" class="section bg-white">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Open Positions',
                'Explore current opportunities to join our growing team'
            );?>
            <div class="row g-4">
                <?php
                $positions = array(
                    array(
                        'title' => 'Home Service Technician',
                        'type' => 'Full-time',
                        'location' => 'Local Area',
                        'description' => 'Experienced technician for home maintenance, repairs, and installation services. Must have strong problem-solving skills and customer service orientation.',
                        'requirements' => array('2+ years experience', 'Valid driver\'s license', 'Own tools preferred', 'Background check required')
                    ),
                    array(
                        'title' => 'Customer Service Representative',
                        'type' => 'Full-time',
                        'location' => 'Office',
                        'description' => 'Handle customer inquiries, schedule appointments, and provide exceptional customer support via phone, email, and chat.',
                        'requirements' => array('Excellent communication skills', 'Customer service experience', 'Computer proficiency', 'Multi-tasking ability')
                    ),
                    array(
                        'title' => 'Project Manager',
                        'type' => 'Full-time',
                        'location' => 'Office/Field',
                        'description' => 'Oversee large-scale projects from planning to completion, coordinate teams, and ensure quality standards are met.',
                        'requirements' => array('Project management experience', 'Leadership skills', 'Construction knowledge', 'PMP certification preferred')
                    )
                );

                foreach ($positions as $position):?>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="h5 mb-0"><?php echo esc_html($position['title']);?></h3>
                                    <span class="badge bg-accent text-white"><?php echo esc_html($position['type']);?></span>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        <?php echo esc_html($position['location']);?>
                                    </small>
                                </div>
                                <p class="text-muted mb-3"><?php echo esc_html($position['description']);?></p>
                                <div class="mb-4">
                                    <h6 class="text-accent mb-2">Requirements:</h6>
                                    <ul class="list-unstyled mb-0">
                                        <?php foreach ($position['requirements'] as $req):?>
                                            <li class="mb-1">
                                                <i class="fas fa-check text-accent me-2"></i>
                                                <small><?php echo esc_html($req);?></small>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-outline-accent btn-rounded">
                                    <i class="fas fa-paper-plane me-2"></i>Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Company Culture Section -->
    <section class="section bg-primary-dark text-white">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Culture',
                'What makes our workplace special'
            );?>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mb-4">
                        <i class="fas fa-handshake fa-4x text-accent"></i>
                    </div>
                    <h3 class="h5 mb-3 text-white">Integrity</h3>
                    <p class="text-light">We believe in doing the right thing, even when no one is watching. Honesty and transparency guide all our actions.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mb-4">
                        <i class="fas fa-rocket fa-4x text-accent"></i>
                    </div>
                    <h3 class="h5 mb-3 text-white">Innovation</h3>
                    <p class="text-light">We embrace new ideas and technologies to continuously improve our services and stay ahead of the curve.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mb-4">
                        <i class="fas fa-award fa-4x text-accent"></i>
                    </div>
                    <h3 class="h5 mb-3 text-white">Excellence</h3>
                    <p class="text-light">We strive for excellence in everything we do, from the services we provide to the way we treat our team members.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action -->
    <?php echo services_pro_get_cta_section(
        'Ready to Start Your Career Journey?',
        'Take the next step towards building a rewarding career with our team. We\'re looking for passionate individuals who share our commitment to excellence.'
    );?>
</main>
<?php get_footer(); ?>
