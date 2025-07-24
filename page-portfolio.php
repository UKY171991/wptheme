<?php
/*
Template Name: Portfolio Page
*/
get_header(); ?>

<div class="portfolio-page">
    <!-- Hero Section -->
    <section class="portfolio-hero" style="background: linear-gradient(rgba(11, 17, 51, 0.8), rgba(11, 17, 51, 0.9)), url('data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1200 400\' fill=\'%23ff5f00\'><circle cx=\'200\' cy=\'100\' r=\'20\' opacity=\'0.2\'/><circle cx=\'400\' cy=\'200\' r=\'15\' opacity=\'0.15\'/><circle cx=\'800\' cy=\'150\' r=\'25\' opacity=\'0.1\'/><circle cx=\'1000\' cy=\'250\' r=\'18\' opacity=\'0.25\'/></svg>'); padding: 4rem 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; font-weight: 700;">Our Portfolio</h1>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">Showcasing our finest work across different service categories</p>
        </div>
    </section>

    <!-- Portfolio Filter -->
    <section class="portfolio-filter" style="padding: 3rem 0; background: white;">
        <div class="container">
            <div class="filter-buttons" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-bottom: 2rem;">
                <button class="filter-btn active" data-filter="all" style="padding: 0.75rem 1.5rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">All Projects</button>
                <button class="filter-btn" data-filter="cleaning" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Cleaning</button>
                <button class="filter-btn" data-filter="home-repair" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Home Repair</button>
                <button class="filter-btn" data-filter="landscaping" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Landscaping</button>
                <button class="filter-btn" data-filter="renovation" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Renovation</button>
            </div>

            <div class="sort-options" style="display: flex; justify-content: center; margin-bottom: 3rem;">
                <div style="display: flex; gap: 1rem; background: #f8f9fa; padding: 0.5rem; border-radius: 30px;">
                    <button class="sort-btn active" data-sort="latest" style="padding: 0.5rem 1rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease;">Latest</button>
                    <button class="sort-btn" data-sort="oldest" style="padding: 0.5rem 1rem; background: transparent; color: #666; border: none; border-radius: 30px; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease;">Oldest</button>
                    <button class="sort-btn" data-sort="popular" style="padding: 0.5rem 1rem; background: transparent; color: #666; border: none; border-radius: 30px; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease;">Most Popular</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="portfolio-grid" style="padding: 0 0 5rem; background: white;">
        <div class="container">
            <div class="portfolio-items" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
                <!-- Portfolio Item 1 -->
                <div class="portfolio-item" data-category="cleaning" data-date="2023-06-15" data-popularity="85" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning1.jpg" alt="Luxury Home Deep Cleaning" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-1" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Cleaning</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Luxury Home Deep Cleaning</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">A complete deep cleaning transformation of a 5,000 sq ft luxury home, including specialized treatment for high-end surfaces and materials.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> June 15, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 2 -->
                <div class="portfolio-item" data-category="home-repair" data-date="2023-05-20" data-popularity="92" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/repair1.jpg" alt="Complete Kitchen Plumbing Renovation" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-2" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Home Repair</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Kitchen Plumbing Renovation</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Complete replacement of outdated kitchen plumbing with modern fixtures, including installation of a high-efficiency dishwasher and sink.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> May 20, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 3 -->
                <div class="portfolio-item" data-category="landscaping" data-date="2023-04-10" data-popularity="78" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/landscaping1.jpg" alt="Backyard Transformation" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-3" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Landscaping</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Backyard Transformation</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Complete redesign of a neglected backyard into a beautiful outdoor living space with custom patio, garden beds, and water feature.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> April 10, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(4.5)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 4 -->
                <div class="portfolio-item" data-category="renovation" data-date="2023-03-05" data-popularity="95" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/renovation1.jpg" alt="Master Bathroom Remodel" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-4" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Renovation</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Master Bathroom Remodel</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">A complete renovation of an outdated master bathroom into a modern spa-like retreat with custom tilework, walk-in shower, and luxury fixtures.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> March 5, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 5 -->
                <div class="portfolio-item" data-category="cleaning" data-date="2023-02-18" data-popularity="82" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning2.jpg" alt="Commercial Office Cleaning" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-5" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Cleaning</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Commercial Office Cleaning</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Complete cleaning and sanitization of a 15,000 sq ft office space, including carpet cleaning, window washing, and HVAC duct cleaning.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> February 18, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(4.7)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 6 -->
                <div class="portfolio-item" data-category="home-repair" data-date="2023-01-25" data-popularity="88" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/repair2.jpg" alt="Roof Repair and Replacement" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-6" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Home Repair</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Roof Repair and Replacement</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Complete roof replacement with high-quality shingles after storm damage, including repair of underlying structural elements and improved ventilation.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> January 25, 2023</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 7 -->
                <div class="portfolio-item" data-category="landscaping" data-date="2022-12-10" data-popularity="75" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/landscaping2.jpg" alt="Drought-Resistant Landscape Design" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-7" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Landscaping</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Drought-Resistant Landscape</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Creation of a beautiful, sustainable landscape using native, drought-resistant plants and efficient irrigation to reduce water usage by 70%.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> December 10, 2022</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(4.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 8 -->
                <div class="portfolio-item" data-category="renovation" data-date="2022-11-15" data-popularity="90" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/renovation2.jpg" alt="Basement Conversion" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-8" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Renovation</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Basement Conversion</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Transformation of an unfinished basement into a functional entertainment space with home theater, wet bar, and guest bedroom with bathroom.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> November 15, 2022</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(5.0)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Item 9 -->
                <div class="portfolio-item" data-category="cleaning" data-date="2022-10-05" data-popularity="80" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1); background: white; transition: all 0.3s ease;">
                    <div class="portfolio-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning3.jpg" alt="Post-Construction Cleaning" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 95, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
                            <a href="#portfolio-modal-9" class="view-project" style="color: white; font-size: 1rem; font-weight: 600; padding: 0.75rem 1.5rem; border: 2px solid white; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">View Project</a>
                        </div>
                        <div class="category-badge" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Cleaning</div>
                    </div>
                    <div class="portfolio-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Post-Construction Cleaning</h3>
                        <p style="color: #666; margin-bottom: 1.5rem; line-height: 1.7;">Thorough cleaning of a newly constructed home, removing construction dust and debris, and preparing the property for the owners to move in.</p>
                        <div class="portfolio-meta" style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #999; font-size: 0.9rem;"><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i> October 5, 2022</span>
                            <div class="rating" style="color: #ff5f00;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span style="color: #999; margin-left: 0.5rem;">(4.5)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Detail Modals -->
    <div class="portfolio-modals">
        <!-- Modal 1 -->
        <div id="portfolio-modal-1" class="portfolio-modal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.8); z-index: 1000; overflow-y: auto; padding: 2rem;">
            <div class="modal-content" style="max-width: 1000px; margin: 2rem auto; background: white; border-radius: 15px; overflow: hidden; position: relative;">
                <button class="close-modal" style="position: absolute; top: 1rem; right: 1rem; background: #ff5f00; color: white; width: 40px; height: 40px; border-radius: 50%; border: none; font-size: 1.2rem; cursor: pointer; z-index: 10;">&times;</button>
                
                <div class="modal-images" style="position: relative;">
                    <div class="modal-image-main" style="height: 500px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning1.jpg" alt="Luxury Home Deep Cleaning" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="modal-image-thumbnails" style="display: flex; gap: 0.5rem; padding: 1rem; background: #f8f9fa;">
                        <div class="thumbnail active" style="width: 80px; height: 60px; border-radius: 5px; overflow: hidden; cursor: pointer; border: 2px solid #ff5f00;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning1.jpg" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="thumbnail" style="width: 80px; height: 60px; border-radius: 5px; overflow: hidden; cursor: pointer; border: 2px solid transparent;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning1-2.jpg" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="thumbnail" style="width: 80px; height: 60px; border-radius: 5px; overflow: hidden; cursor: pointer; border: 2px solid transparent;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio/cleaning1-3.jpg" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
                
                <div class="modal-details" style="padding: 2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2 style="font-size: 2rem; color: #333;">Luxury Home Deep Cleaning</h2>
                        <div class="category-badge" style="background: #ff5f00; color: white; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600;">Cleaning</div>
                    </div>
                    
                    <div class="project-meta" style="display: flex; flex-wrap: wrap; gap: 2rem; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid #eee;">
                        <div class="meta-item">
                            <h4 style="font-size: 1rem; color: #999; margin-bottom: 0.5rem;">Project Date</h4>
                            <p style="font-size: 1.1rem; color: #333;">June 15, 2023</p>
                        </div>
                        <div class="meta-item">
                            <h4 style="font-size: 1rem; color: #999; margin-bottom: 0.5rem;">Client</h4>
                            <p style="font-size: 1.1rem; color: #333;">Thompson Family</p>
                        </div>
                        <div class="meta-item">
                            <h4 style="font-size: 1rem; color: #999; margin-bottom: 0.5rem;">Project Size</h4>
                            <p style="font-size: 1.1rem; color: #333;">5,000 sq ft</p>
                        </div>
                        <div class="meta-item">
                            <h4 style="font-size: 1rem; color: #999; margin-bottom: 0.5rem;">Service Type</h4>
                            <p style="font-size: 1.1rem; color: #333;">Deep Cleaning</p>
                        </div>
                    </div>
                    
                    <div class="project-description">
                        <h3 style="font-size: 1.5rem; color: #333; margin-bottom: 1rem;">Project Description</h3>
                        <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">This project involved a comprehensive deep cleaning of a 5,000 square foot luxury home in an exclusive neighborhood. The home features high-end finishes including marble floors, custom woodwork, and designer fixtures that required specialized cleaning techniques and products.</p>
                        
                        <h3 style="font-size: 1.5rem; color: #333; margin-bottom: 1rem;">Scope of Work</h3>
                        <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                            <li>Deep cleaning of all living spaces, including detailed work in kitchen and bathrooms</li>
                            <li>Specialized cleaning of marble, granite, and other natural stone surfaces</li>
                            <li>Professional carpet cleaning and stain removal</li>
                            <li>Interior and exterior window cleaning</li>
                            <li>Chandelier and high fixture cleaning</li>
                            <li>Detailed cleaning of custom cabinetry and woodwork</li>
                            <li>Air vent and HVAC cleaning</li>
                        </ul>
                        
                        <h3 style="font-size: 1.5rem; color: #333; margin-bottom: 1rem;">Results</h3>
                        <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">The project was completed in two days with a team of four cleaning specialists. The home was transformed with all surfaces restored to like-new condition. Special attention was given to problem areas identified by the homeowner, including hard water stains in the master bathroom and wine stains on the dining room carpet.</p>
                        <p style="color: #666; line-height: 1.8; margin-bottom: 2rem;">The clients were so satisfied with the results that they signed up for a monthly maintenance cleaning service to preserve the pristine condition of their home.</p>
                        
                        <div class="testimonial" style="background: #f8f9fa; padding: 2rem; border-radius: 10px; margin-bottom: 2rem;">
                            <div class="rating" style="color: #ff5f00; margin-bottom: 1rem;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p style="font-style: italic; color: #666; line-height: 1.8; margin-bottom: 1rem;">"The cleaning team exceeded all our expectations. Our home has never looked this good, even when we first moved in. The attention to detail was impressive, and they were able to remove stains we thought were permanent. Highly recommend their services!"</p>
                            <p style="font-weight: 600; color: #333;">— Sarah Thompson, Homeowner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional modals for other portfolio items would go here -->
    </div>

    <!-- CTA Section -->
    <section class="portfolio-cta" style="padding: 5rem 0; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Ready to Start Your Project?</h2>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">Whether you need a deep cleaning, home repair, landscaping, or a complete renovation, our team of experts is ready to deliver exceptional results.</p>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="cta-btn" style="display: inline-block; background: white; color: #ff5f00; padding: 1rem 2.5rem; font-weight: 600; border-radius: 50px; text-decoration: none; transition: all 0.3s ease;">View Our Services</a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn secondary" style="display: inline-block; background: transparent; color: white; padding: 1rem 2.5rem; font-weight: 600; border-radius: 50px; text-decoration: none; border: 2px solid white; transition: all 0.3s ease;">Request a Quote</a>
            </div>
        </div>
    </section>
</div>

<style>
.filter-btn:hover,
.filter-btn.active {
    background: #ff5f00;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.2);
}

.sort-btn:hover,
.sort-btn.active {
    background: #ff5f00;
    color: white;
}

.portfolio-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.15);
}

.portfolio-item:hover .portfolio-image img {
    transform: scale(1.05);
}

.portfolio-item:hover .portfolio-overlay {
    opacity: 1;
}

.view-project:hover {
    background: white;
    color: #ff5f00;
}

.close-modal:hover {
    background: #e55600;
    transform: rotate(90deg);
}

.thumbnail:hover,
.thumbnail.active {
    border-color: #ff5f00;
}

.cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.cta-btn.secondary:hover {
    background: white;
    color: #ff5f00;
}

@media (max-width: 768px) {
    .portfolio-hero h1 {
        font-size: 2.5rem;
    }
    
    .portfolio-items {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
    
    .filter-buttons,
    .sort-options {
        flex-direction: column;
    }
    
    .filter-btn,
    .sort-btn {
        width: 100%;
    }
    
    .modal-content {
        margin: 1rem;
    }
    
    .modal-image-main {
        height: 300px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Portfolio Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get selected filter
            const selectedFilter = this.getAttribute('data-filter');
            
            // Filter portfolio items
            portfolioItems.forEach(item => {
                if (selectedFilter === 'all' || item.getAttribute('data-category') === selectedFilter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Portfolio Sorting
    const sortButtons = document.querySelectorAll('.sort-btn');
    const portfolioGrid = document.querySelector('.portfolio-items');
    
    sortButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            sortButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get sort method
            const sortMethod = this.getAttribute('data-sort');
            const items = Array.from(portfolioItems);
            
            // Sort items
            if (sortMethod === 'latest') {
                items.sort((a, b) => {
                    return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
                });
            } else if (sortMethod === 'oldest') {
                items.sort((a, b) => {
                    return new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date'));
                });
            } else if (sortMethod === 'popular') {
                items.sort((a, b) => {
                    return b.getAttribute('data-popularity') - a.getAttribute('data-popularity');
                });
            }
            
            // Reorder items in the DOM
            items.forEach(item => {
                portfolioGrid.appendChild(item);
            });
        });
    });
    
    // Portfolio Modal
    const viewProjectLinks = document.querySelectorAll('.view-project');
    const closeModalButtons = document.querySelectorAll('.close-modal');
    const portfolioModals = document.querySelectorAll('.portfolio-modal');
    
    viewProjectLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const modalId = this.getAttribute('href');
            const modal = document.querySelector(modalId);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
        });
    });
    
    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.portfolio-modal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
        });
    });
    
    // Close modal when clicking outside of content
    portfolioModals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = 'auto'; // Restore scrolling
            }
        });
    });
    
    // Image gallery in modal
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.querySelector('.modal-image-main img');
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Update active thumbnail
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            this.classList.add('active');
            
            // Update main image
            const imgSrc = this.querySelector('img').getAttribute('src');
            mainImage.setAttribute('src', imgSrc);
        });
    });
});
</script>

<?php get_footer(); ?>
