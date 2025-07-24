<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>

<main id="main" class="site-main">

<?php
// Universal Banner Configuration
$badge_icon = '🛠️';
$badge_text = 'Professional Home Services';
$title = 'Our Services';
$highlight = 'Quality & Reliability';
$description = 'Comprehensive home services designed to make your life easier. From cleaning to maintenance, we provide professional, reliable solutions you can trust.';
$buttons = [
    [
        'text' => 'Browse Services',
        'url' => '#services-grid',
        'type' => 'btn-primary',
        'icon' => '→'
    ],
    [
        'text' => 'Get Quote',
        'url' => get_permalink(get_page_by_path('contact')),
        'type' => 'btn-secondary',
        'icon' => '📞'
    ]
];

include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Services Grid Section -->
<section id="services-grid" class="services-section">
    <div class="container">
        <div class="services-grid">
            <?php
            $service_categories = get_service_categories();
            $count = 0;
            foreach ($service_categories as $category_name => $category) {
                if ($count >= 6) break; // Show only 6 main categories
                ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php 
                        $icons = ['🧹', '🔧', '🛍️', '🐶', '👶', '🎨'];
                        echo $icons[$count % count($icons)]; 
                        ?>
                    </div>
                    <h3><?php echo esc_html($category['name']); ?></h3>
                    <p><?php echo esc_html($category['description']); ?></p>
                    <ul class="service-list">
                        <?php 
                        $services = array_slice(array_keys($category['services'] ?? []), 0, 4);
                        foreach ($services as $service_name) {
                            echo '<li>' . esc_html($service_name) . '</li>';
                        }
                        ?>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-cta">Get Quote →</a>
                </div>
                <?php
                $count++;
            }
            ?>
        </div>
    </div>
</section>

</main>

<style>
        /* RESET AND BASE STYLES */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* HERO SECTION */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-btn {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
        }
        
        .hero-btn:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }
        
        /* SERVICES GRID SECTION */
        .services-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2.8rem;
            color: #333;
            margin-bottom: 15px;
        }
        
        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .service-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
        }
        
        .service-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .service-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }
        
        .service-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .service-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .service-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        /* STATISTICS SECTION */
        .stats-section {
            padding: 80px 0;
            background: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }
        
        .stat-item {
            text-align: center;
            padding: 30px 20px;
            background: #f8f9fa;
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .stat-item:hover {
            background: #667eea;
            color: white;
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stat-item:hover .stat-number {
            color: white;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #666;
            font-weight: 500;
        }
        
        .stat-item:hover .stat-label {
            color: white;
        }
        
        /* QUOTE CALCULATOR SECTION */
        .quote-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .quote-container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255,255,255,0.1);
            padding: 50px 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        
        .quote-container h3 {
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: white;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: rgba(255,255,255,0.9);
            color: #333;
            font-size: 1rem;
        }
        
        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
        
        .quote-btn {
            width: 100%;
            background: white;
            color: #667eea;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quote-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.3);
        }
        
        .quote-result {
            margin-top: 25px;
            padding: 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            text-align: center;
            display: none;
        }
        
        /* CTA SECTION */
        .cta-section {
            padding: 80px 0;
            background: #333;
            color: white;
            text-align: center;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .cta-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 18px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        /* MOBILE RESPONSIVE */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .service-card {
                height: auto;
                min-height: 300px;
                padding: 30px 20px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .quote-container {
                padding: 30px 20px;
                margin: 0 20px;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
            
            .cta-section h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
            
            .service-card {
                padding: 25px 15px;
            }
            
            .container {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Professional Services</h1>
            <p>We provide high-quality services to help your business grow and succeed. Our expert team delivers exceptional results tailored to your needs.</p>
            <a href="#services" class="hero-btn">View Our Services</a>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
            <p>Choose from our comprehensive range of professional services designed to meet your business objectives.</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3>Web Development</h3>
                <p>Custom websites and web applications built with modern technologies. Responsive design, fast loading, and optimized for search engines.</p>
                <div class="service-price">Starting at $999</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Apps</h3>
                <p>Native and cross-platform mobile applications for iOS and Android. User-friendly interface and smooth performance guaranteed.</p>
                <div class="service-price">Starting at $1,499</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Digital Marketing</h3>
                <p>Complete digital marketing solutions including SEO, social media marketing, and online advertising campaigns to boost your presence.</p>
                <div class="service-price">Starting at $599</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3>Graphic Design</h3>
                <p>Professional graphic design services including logos, branding, print materials, and digital assets that represent your brand perfectly.</p>
                <div class="service-price">Starting at $399</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Consulting</h3>
                <p>Expert business and technology consulting to help you make informed decisions and optimize your operations for maximum efficiency.</p>
                <div class="service-price">Starting at $149/hr</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Support & Maintenance</h3>
                <p>Ongoing support and maintenance services to keep your digital assets running smoothly with regular updates and monitoring.</p>
                <div class="service-price">Starting at $99/month</div>
                <a href="#quote" class="service-btn">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- STATISTICS SECTION -->
<section class="stats-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Success in Numbers</h2>
            <p>We're proud of our track record and the results we've delivered for our clients.</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Team Members</div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number">5</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- QUOTE CALCULATOR SECTION -->
<section class="quote-section" id="quote">
    <div class="container">
        <div class="quote-container">
            <h3>Get Your Quote</h3>
            <form id="quote-form">
                <div class="form-group">
                    <label for="service-type">Service Type</label>
                    <select id="service-type" name="service-type" required>
                        <option value="">Select a service</option>
                        <option value="web-development">Web Development</option>
                        <option value="mobile-apps">Mobile Apps</option>
                        <option value="digital-marketing">Digital Marketing</option>
                        <option value="graphic-design">Graphic Design</option>
                        <option value="consulting">Consulting</option>
                        <option value="support">Support & Maintenance</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="project-budget">Budget Range</label>
                    <select id="project-budget" name="project-budget" required>
                        <option value="">Select budget range</option>
                        <option value="under-1000">Under $1,000</option>
                        <option value="1000-5000">$1,000 - $5,000</option>
                        <option value="5000-10000">$5,000 - $10,000</option>
                        <option value="10000-plus">$10,000+</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="timeline">Project Timeline</label>
                    <select id="timeline" name="timeline" required>
                        <option value="">Select timeline</option>
                        <option value="urgent">ASAP (Rush job)</option>
                        <option value="1-month">1 Month</option>
                        <option value="2-3-months">2-3 Months</option>
                        <option value="3-plus-months">3+ Months</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="project-details">Project Details</label>
                    <textarea id="project-details" name="project-details" placeholder="Tell us about your project requirements..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="contact-email">Email Address</label>
                    <input type="email" id="contact-email" name="contact-email" placeholder="your@email.com" required>
                </div>
                
                <button type="submit" class="quote-btn">Calculate Quote</button>
            </form>
            
            <div class="quote-result" id="quote-result">
                <h4>Estimated Quote</h4>
                <p id="quote-amount">$0</p>
                <p>We'll send you a detailed proposal within 24 hours!</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Get Started?</h2>
        <p>Let's discuss your project and how we can help you achieve your goals.</p>
        <a href="/contact" class="cta-btn">Contact Us Today</a>
    </div>
</section>

<script>
// Quote Calculator Functionality
document.getElementById('quote-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const serviceType = document.getElementById('service-type').value;
    const budget = document.getElementById('project-budget').value;
    const timeline = document.getElementById('timeline').value;
    
    let basePrice = 0;
    
    // Base prices for different services
    switch(serviceType) {
        case 'web-development':
            basePrice = 1500;
            break;
        case 'mobile-apps':
            basePrice = 2500;
            break;
        case 'digital-marketing':
            basePrice = 800;
            break;
        case 'graphic-design':
            basePrice = 600;
            break;
        case 'consulting':
            basePrice = 200; // per hour, estimate 10 hours
            break;
        case 'support':
            basePrice = 150; // monthly
            break;
        default:
            basePrice = 1000;
    }
    
    // Adjust price based on timeline
    if (timeline === 'urgent') {
        basePrice *= 1.5; // 50% rush fee
    } else if (timeline === '1-month') {
        basePrice *= 1.2; // 20% for faster delivery
    }
    
    // Adjust based on budget range
    if (budget === 'under-1000') {
        basePrice = Math.min(basePrice, 900);
    } else if (budget === '1000-5000') {
        basePrice = Math.min(Math.max(basePrice, 1000), 5000);
    } else if (budget === '5000-10000') {
        basePrice = Math.min(Math.max(basePrice, 5000), 10000);
    }
    
    // Show result
    document.getElementById('quote-amount').textContent = '$' + basePrice.toLocaleString();
    document.getElementById('quote-result').style.display = 'block';
    
    // Smooth scroll to result
    document.getElementById('quote-result').scrollIntoView({ 
        behavior: 'smooth',
        block: 'center'
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add Font Awesome for icons
const fontAwesome = document.createElement('link');
fontAwesome.rel = 'stylesheet';
fontAwesome.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
document.head.appendChild(fontAwesome);

console.log('✅ Clean Services Page Loaded Successfully');
</script>

<?php get_footer(); ?>
</body>
</html>
