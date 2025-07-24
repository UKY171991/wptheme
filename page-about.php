<?php
/**
 * Template Name: About Page
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (get_the_excerpt()) : ?>
                        <p class="hero-subtitle"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="hero-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- About Content -->
        <section class="about-content">
            <div class="container">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <?php 
        $team_members = get_field('team_members'); // Assuming ACF is used
        if (!$team_members) {
            // Fallback static team data
            $team_members = array(
                array(
                    'name' => 'John Smith',
                    'position' => 'CEO & Founder',
                    'bio' => 'With over 10 years of experience in digital services, John leads our team with vision and expertise.',
                    'image' => 'https://via.placeholder.com/300x300?text=John+Smith'
                ),
                array(
                    'name' => 'Sarah Johnson',
                    'position' => 'Head of Design',
                    'bio' => 'Sarah brings creativity and innovation to every project, ensuring beautiful and functional designs.',
                    'image' => 'https://via.placeholder.com/300x300?text=Sarah+Johnson'
                ),
                array(
                    'name' => 'Mike Wilson',
                    'position' => 'Technical Director',
                    'bio' => 'Mike oversees all technical aspects of our projects, ensuring quality and performance.',
                    'image' => 'https://via.placeholder.com/300x300?text=Mike+Wilson'
                )
            );
        }
        
        if ($team_members) :
        ?>
        <section class="team-section">
            <div class="container">
                <h2 class="section-title"><?php esc_html_e('Meet Our Team', 'service-blueprint'); ?></h2>
                <div class="team-grid">
                    <?php foreach ($team_members as $member) : ?>
                        <div class="team-member">
                            <div class="member-image">
                                <img src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>">
                            </div>
                            <div class="member-info">
                                <h3 class="member-name"><?php echo esc_html($member['name']); ?></h3>
                                <p class="member-position"><?php echo esc_html($member['position']); ?></p>
                                <p class="member-bio"><?php echo esc_html($member['bio']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">150+</div>
                        <div class="stat-label"><?php esc_html_e('Projects Completed', 'service-blueprint'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label"><?php esc_html_e('Client Satisfaction', 'service-blueprint'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5+</div>
                        <div class="stat-label"><?php esc_html_e('Years Experience', 'service-blueprint'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label"><?php esc_html_e('Support Available', 'service-blueprint'); ?></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="values-section">
            <div class="container">
                <h2 class="section-title"><?php esc_html_e('Our Values', 'service-blueprint'); ?></h2>
                <div class="values-grid">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Innovation', 'service-blueprint'); ?></h3>
                        <p><?php esc_html_e('We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.', 'service-blueprint'); ?></p>
                    </div>
                    
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-users" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Collaboration', 'service-blueprint'); ?></h3>
                        <p><?php esc_html_e('We work closely with our clients as partners, ensuring transparent communication throughout.', 'service-blueprint'); ?></p>
                    </div>
                    
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-award" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Excellence', 'service-blueprint'); ?></h3>
                        <p><?php esc_html_e('We strive for perfection in every detail, delivering quality that exceeds expectations.', 'service-blueprint'); ?></p>
                    </div>
                    
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-handshake" aria-hidden="true"></i>
                        </div>
                        <h3><?php esc_html_e('Integrity', 'service-blueprint'); ?></h3>
                        <p><?php esc_html_e('We build trust through honest communication, reliable delivery, and ethical business practices.', 'service-blueprint'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="about-cta">
            <div class="container">
                <div class="cta-content">
                    <h2><?php esc_html_e('Ready to Work Together?', 'service-blueprint'); ?></h2>
                    <p><?php esc_html_e('Let\'s discuss your project and see how we can help you achieve your goals.', 'service-blueprint'); ?></p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-button">
                        <?php esc_html_e('Get Started Today', 'service-blueprint'); ?>
                    </a>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<style>
.about-hero {
    padding: 80px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    overflow: hidden;
}

.about-hero .container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.hero-content {
    animation: fadeInLeft 1s ease;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 25px;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
    line-height: 1.6;
}

.hero-image {
    animation: fadeInRight 1s ease;
    border-radius: 12px;
    overflow: hidden;
}

.hero-image img {
    width: 100%;
    height: auto;
    display: block;
}

.about-content {
    padding: 80px 0;
}

.entry-content {
    max-width: 800px;
    margin: 0 auto;
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
}

.entry-content h2,
.entry-content h3 {
    color: #1f2937;
    margin: 2rem 0 1rem;
}

.entry-content p {
    margin-bottom: 1.5rem;
}

.team-section {
    padding: 80px 0;
    background: #f9fafb;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 60px;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.team-member {
    background: white;
    border-radius: 16px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.member-image {
    width: 150px;
    height: 150px;
    margin: 0 auto 25px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #f3f4f6;
}

.member-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.member-name {
    font-size: 1.4rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 10px;
}

.member-position {
    color: #2563eb;
    font-weight: 500;
    margin-bottom: 15px;
}

.member-bio {
    color: #6b7280;
    line-height: 1.6;
}

.stats-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
    color: white;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: #60a5fa;
    margin-bottom: 10px;
    display: block;
}

.stat-label {
    font-size: 1.1rem;
    opacity: 0.9;
}

.values-section {
    padding: 80px 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.value-item {
    text-align: center;
    padding: 40px 30px;
}

.value-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: white;
    font-size: 1.8rem;
}

.value-item h3 {
    font-size: 1.4rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 15px;
}

.value-item p {
    color: #6b7280;
    line-height: 1.6;
}

.about-cta {
    padding: 80px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-button {
    display: inline-block;
    background: white;
    color: #2563eb;
    padding: 15px 40px;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Animations */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@media (max-width: 968px) {
    .about-hero .container {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .about-hero {
        padding: 60px 0;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .about-content,
    .team-section,
    .stats-section,
    .values-section,
    .about-cta {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .team-grid,
    .values-grid {
        gap: 30px;
    }
    
    .team-member {
        padding: 30px 20px;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
}
</style>

<?php get_footer(); ?>
