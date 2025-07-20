<?php
/**
 * Template Name: Bootstrap About Page
 * 
 * A Bootstrap-based about page template
 */

get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header mb-5 text-center">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    <!-- About Section -->
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h2>Our Story</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                            <p>Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="https://via.placeholder.com/600x400" alt="About Us" class="img-fluid rounded shadow">
                        </div>
                    </div>
                    
                    <!-- Mission & Vision -->
                    <div class="row mb-5">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body p-4">
                                    <h3 class="card-title mb-3">Our Mission</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                                    <p class="card-text">Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body p-4">
                                    <h3 class="card-title mb-3">Our Vision</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                                    <p class="card-text">Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget aliquam nisl nisl eget nisl.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Section -->
                    <h2 class="text-center mb-4">Our Team</h2>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-center shadow-sm">
                                <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">John Doe</h5>
                                    <p class="card-text text-muted">CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-center shadow-sm">
                                <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">Jane Smith</h5>
                                    <p class="card-text text-muted">COO</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-center shadow-sm">
                                <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">Mike Johnson</h5>
                                    <p class="card-text text-muted">CTO</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-center shadow-sm">
                                <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member">
                                <div class="card-body">
                                    <h5 class="card-title">Sarah Williams</h5>
                                    <p class="card-text text-muted">Marketing Director</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>