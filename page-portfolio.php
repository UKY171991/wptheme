<?php
/**
 * Template Name: Portfolio Page
 */

get_header(); ?>
<main id="main" class="site-main">
    <!-- Portfolio Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/'));?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-briefcase me-2"></i>Our Work
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            Our Portfolio
                            <span class="text-accent d-block">Showcasing Excellence</span>
                        </h1>
                        <p class="lead mb-0">Discover our finest work across different service categories and see the quality that sets us apart.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Filter -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Filter Buttons -->
                    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
                        <button class="btn btn-accent btn-rounded active" data-filter="all">
                            <i class="fas fa-th me-1"></i>All Projects
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-filter="cleaning">
                            <i class="fas fa-broom me-1"></i>Cleaning
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-filter="repair">
                            <i class="fas fa-tools me-1"></i>Home Repair
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-filter="landscaping">
                            <i class="fas fa-seedling me-1"></i>Landscaping
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-filter="renovation">
                            <i class="fas fa-hammer me-1"></i>Renovation
                        </button>
                    </div>
                    <!-- Sort Options -->
                    <div class="d-flex justify-content-center">
                        <div class="btn-group bg-white rounded-pill p-1 shadow-sm" role="group">
                            <input type="radio" class="btn-check" name="sort" id="latest" checked>
                            <label class="btn btn-outline-accent btn-sm" for="latest">Latest</label>
                            <input type="radio" class="btn-check" name="sort" id="oldest">
                            <label class="btn btn-outline-accent btn-sm" for="oldest">Oldest</label>
                            <input type="radio" class="btn-check" name="sort" id="popular">
                            <label class="btn btn-outline-accent btn-sm" for="popular">Popular</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid -->
    <section class="section bg-white">
        <div class="container">
            <div class="row g-4" id="portfolio-grid">
                <!-- Portfolio Item 1 - Cleaning -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="cleaning" data-date="2023-06-15" data-popularity="85">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/cleaning1.jpg"
                                 alt="Luxury Home Deep Cleaning" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Cleaning</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Luxury Home Deep Cleaning</h5>
                            <p class="card-text text-muted">Complete deep cleaning transformation of a 4-bedroom luxury home with attention to every detail.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>June 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item 2 - Home Repair -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="repair" data-date="2023-05-20" data-popularity="92">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/repair1.jpg"
                                 alt="Kitchen Cabinet Restoration" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Home Repair</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Kitchen Cabinet Restoration</h5>
                            <p class="card-text text-muted">Complete restoration of vintage kitchen cabinets with modern hardware and professional refinishing.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>May 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item 3 - Landscaping -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="landscaping" data-date="2023-04-10" data-popularity="78">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/landscape1.jpg"
                                 alt="Backyard Garden Transformation" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Landscaping</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Backyard Garden Transformation</h5>
                            <p class="card-text text-muted">Complete backyard makeover with native plants, irrigation system, and outdoor living space.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>April 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item 4 - Renovation -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="renovation" data-date="2023-03-15" data-popularity="95">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/renovation1.jpg"
                                 alt="Bathroom Complete Renovation" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Renovation</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Bathroom Complete Renovation</h5>
                            <p class="card-text text-muted">Modern bathroom renovation with luxury fixtures, custom tilework, and smart storage solutions.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>March 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item 5 - Cleaning -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="cleaning" data-date="2023-02-28" data-popularity="88">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/cleaning2.jpg"
                                 alt="Commercial Office Cleaning" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Cleaning</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Commercial Office Cleaning</h5>
                            <p class="card-text text-muted">Weekly commercial cleaning service for a 10,000 sq ft office building with eco-friendly products.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>February 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item 6 - Repair -->
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="repair" data-date="2023-01-20" data-popularity="91">
                    <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/portfolio/repair2.jpg"
                                 alt="Deck Repair and Staining" class="card-img-top" style="height: 250px; object-fit: cover;">
                            <div class="portfolio-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-accent opacity-0 transition-all">
                                <a href="#" class="btn btn-light btn-rounded" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                                    <i class="fas fa-eye me-2"></i>View Project
                                </a>
                            </div>
                            <span class="position-absolute top-0 end-0 m-3 badge bg-accent">Home Repair</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Deck Repair and Staining</h5>
                            <p class="card-text text-muted">Complete deck restoration including board replacement, railing repair, and protective staining.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>January 2023
                                </small>
                                <div class="d-flex">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-briefcase text-accent mb-3" style="font-size: 3rem;"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">250+</h3>
                            <p class="text-muted mb-0">Completed Projects</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-users text-accent mb-3" style="font-size: 3rem;"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">200+</h3>
                            <p class="text-muted mb-0">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-award text-accent mb-3" style="font-size: 3rem;"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">15+</h3>
                            <p class="text-muted mb-0">Awards Won</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-calendar text-accent mb-3" style="font-size: 3rem;"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">5+</h3>
                            <p class="text-muted mb-0">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action -->
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Ready to Start Your Project?</h2>
                    <p class="lead mb-4">Let us create something amazing for you. Contact us today to discuss your project requirements.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-envelope me-2"></i>Get Quote
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services')));?>" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-tools me-2"></i>View Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Portfolio Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const sortButtons = document.querySelectorAll('[name="sort"]');
    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            // Update button states
            filterButtons.forEach(btn => btn.classList.remove('active', 'btn-accent'));
            filterButtons.forEach(btn => btn.classList.add('btn-outline-accent'));
            this.classList.add('active', 'btn-accent');
            this.classList.remove('btn-outline-accent');
            // Filter items
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
} else {
                    item.style.display = 'none';
}
});
});
});
    // Portfolio hover effects
    const portfolioCards = document.querySelectorAll('.portfolio-item .card');
    portfolioCards.forEach(card => {
        const overlay = card.querySelector('.portfolio-overlay');
        card.addEventListener('mouseenter', function() {
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');
});
        card.addEventListener('mouseleave', function() {
            overlay.classList.add('opacity-0');
            overlay.classList.remove('opacity-100');
});
});
});
</script>
<?php get_footer(); ?>
