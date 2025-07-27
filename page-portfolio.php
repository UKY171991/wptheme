<?php
/**
 * Template Name: Portfolio Page
 */

get_header(); ?>
<main id="main" class="site-main">
    
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-broom mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Luxury Home Deep Cleaning</div>
                                </div>
                            </div>
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-tools mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Kitchen Cabinet Restoration</div>
                                </div>
                            </div>
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-seedling mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Backyard Garden Transformation</div>
                                </div>
                            </div>
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-hammer mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Bathroom Complete Renovation</div>
                                </div>
                            </div>
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-building mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Commercial Office Cleaning</div>
                                </div>
                            </div>
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
                            <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                                 style="height: 250px; background: linear-gradient(135deg, #d35400 0%, #e67e22 100%); color: white;">
                                <div class="text-center">
                                    <i class="fas fa-home mb-2" style="font-size: 3rem; opacity: 0.8;"></i>
                                    <div style="font-weight: 600; font-size: 1.1rem;">Deck Repair and Staining</div>
                                </div>
                            </div>
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

<!-- Portfolio Modals -->
<div class="modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolioModal1Label">Luxury Home Deep Cleaning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                             style="height: 300px; background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); color: white; border-radius: 10px;">
                            <div class="text-center">
                                <i class="fas fa-broom mb-3" style="font-size: 4rem; opacity: 0.8;"></i>
                                <div style="font-weight: 600; font-size: 1.2rem;">Luxury Home Deep Cleaning</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Project Details</h6>
                        <p><strong>Client:</strong> Residential Property</p>
                        <p><strong>Duration:</strong> 2 Days</p>
                        <p><strong>Date:</strong> June 2023</p>
                        <p><strong>Service:</strong> Deep Cleaning</p>
                        <hr>
                        <h6>Description</h6>
                        <p>Complete deep cleaning transformation of a 4-bedroom luxury home with attention to every detail. This project included comprehensive cleaning of all rooms, kitchen deep clean, bathroom sanitization, and carpet cleaning.</p>
                        <p>We used eco-friendly products and professional-grade equipment to ensure the highest quality results while maintaining the safety of the home environment.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-accent">Get Quote</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolioModal2Label">Kitchen Cabinet Restoration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portfolio-image-placeholder d-flex align-items-center justify-content-center" 
                             style="height: 300px; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; border-radius: 10px;">
                            <div class="text-center">
                                <i class="fas fa-tools mb-3" style="font-size: 4rem; opacity: 0.8;"></i>
                                <div style="font-weight: 600; font-size: 1.2rem;">Kitchen Cabinet Restoration</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Project Details</h6>
                        <p><strong>Client:</strong> Residential Kitchen</p>
                        <p><strong>Duration:</strong> 3 Days</p>
                        <p><strong>Date:</strong> May 2023</p>
                        <p><strong>Service:</strong> Home Repair</p>
                        <hr>
                        <h6>Description</h6>
                        <p>Complete restoration of vintage kitchen cabinets with modern hardware and professional refinishing. This project involved stripping old paint, repairing damaged wood, and applying a fresh finish.</p>
                        <p>The restoration brought new life to the kitchen while maintaining the original character and charm of the vintage cabinetry.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-accent">Get Quote</a>
            </div>
        </div>
    </div>
</div>

<!-- Similar modals for other portfolio items can be added here -->

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
        if (overlay) {
            card.addEventListener('mouseenter', function() {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
            });
            
            card.addEventListener('mouseleave', function() {
                overlay.classList.add('opacity-0');
                overlay.classList.remove('opacity-100');
            });
        }
    });
});
</script>
<?php get_footer(); ?>
