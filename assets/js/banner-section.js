/**
 * Professional Banner Section JavaScript
 * Handles smooth scrolling and animations
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Smooth scroll for banner scroll indicator
    const scrollIndicator = document.querySelector('.scroll-down');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector('#main-content');
            if (target) {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Parallax effect for banner background
    const bannerBackground = document.querySelector('.banner-background');
    if (bannerBackground) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;

            if (scrolled < window.innerHeight) {
                bannerBackground.style.transform = `translateY(${rate}px)`;
            }
        }, { passive: true });
    }

    // Animate stats on scroll (if visible)
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length > 0) {
        const animateStats = function() {
            statNumbers.forEach(function(stat) {
                const rect = stat.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

                if (isVisible && !stat.classList.contains('animated')) {
                    stat.classList.add('animated');

                    const finalValue = stat.textContent;
                    const numericValue = parseInt(finalValue.replace(/\D/g, ''));

                    if (!isNaN(numericValue)) {
                        let currentValue = 0;
                        const increment = numericValue / 50;
                        const suffix = finalValue.replace(/\d/g, '');

                        const counter = setInterval(function() {
                            currentValue += increment;

                            if (currentValue >= numericValue) {
                                stat.textContent = finalValue;
                                clearInterval(counter);
                            } else {
                                stat.textContent = Math.floor(currentValue) + suffix;
                            }
                        }, 40);
                    }
                }
            });
        };

        // Initial check
        animateStats();

        // Check on scroll
        window.addEventListener('scroll', animateStats, { passive: true });
    }

    // Add loading animation to banner content
    const bannerContent = document.querySelector('.banner-content');
    if (bannerContent) {
        // Add staggered animation to child elements
        const elements = bannerContent.querySelectorAll('.banner-subtitle, .banner-title, .banner-description, .banner-actions');
        elements.forEach(function(element, index) {
            element.style.animationDelay = (index * 0.2) + 's';
            element.classList.add('fade-in-up');
        });
    }

    // Typing effect for banner title (optional enhancement)
    const bannerTitle = document.querySelector('.banner-title');
    if (bannerTitle && bannerTitle.dataset.typewriter) {
        const text = bannerTitle.textContent;
        bannerTitle.textContent = '';

        let i = 0;
        const typeWriter = function() {
            if (i < text.length) {
                bannerTitle.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };

        setTimeout(typeWriter, 500);
    }

    // Add hover effects to CTA buttons
    const ctaButtons = document.querySelectorAll('.banner-actions .btn');
    ctaButtons.forEach(function(button) {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Responsive banner height adjustment
    function adjustBannerHeight() {
        const banners = document.querySelectorAll('.page-banner, .hero-banner');
        banners.forEach(function(banner) {
            const windowHeight = window.innerHeight;
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const minHeight = windowHeight - headerHeight;

            if (banner.classList.contains('hero-banner')) {
                banner.style.minHeight = Math.max(minHeight * 0.8, 500) + 'px';
            } else {
                banner.style.minHeight = Math.max(minHeight * 0.6, 400) + 'px';
            }
        });
    }

    // Initial adjustment and on resize
    adjustBannerHeight();
    window.addEventListener('resize', adjustBannerHeight);
});

