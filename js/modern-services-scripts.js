// Modern Services Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initializeServicesPage();
});

function initializeServicesPage() {
    // Initialize all components
    initServiceFilter();
    initQuoteCalculator();
    initSmoothScrolling();
    initLoadMoreServices();
    initBookingButtons();
}

// Service Filter Functionality
function initServiceFilter() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const serviceCards = document.querySelectorAll('.service-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter services
            serviceCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
}

// Quote Calculator
let currentStep = 1;
let quoteData = {
    service: '',
    basePrice: 0,
    size: '',
    frequency: '',
    finalPrice: 0
};

function initQuoteCalculator() {
    const serviceOptions = document.querySelectorAll('input[name="service"]');
    
    serviceOptions.forEach(option => {
        option.addEventListener('change', function() {
            quoteData.service = this.value;
            quoteData.basePrice = parseInt(this.dataset.basePrice);
        });
    });
}

function nextStep() {
    if (currentStep === 1 && !quoteData.service) {
        showNotification('Please select a service', 'warning');
        return;
    }
    
    const currentStepEl = document.querySelector(`.form-step[data-step="${currentStep}"]`);
    const nextStepEl = document.querySelector(`.form-step[data-step="${currentStep + 1}"]`);
    
    if (nextStepEl) {
        currentStepEl.classList.remove('active');
        nextStepEl.classList.add('active');
        currentStep++;
    }
}

function prevStep() {
    const currentStepEl = document.querySelector(`.form-step[data-step="${currentStep}"]`);
    const prevStepEl = document.querySelector(`.form-step[data-step="${currentStep - 1}"]`);
    
    if (prevStepEl) {
        currentStepEl.classList.remove('active');
        prevStepEl.classList.add('active');
        currentStep--;
    }
}

function calculateQuote() {
    const sizeSelect = document.querySelector('select[name="size"]');
    const frequencySelect = document.querySelector('select[name="frequency"]');
    
    if (!sizeSelect.value || !frequencySelect.value) {
        showNotification('Please fill in all fields', 'warning');
        return;
    }
    
    quoteData.size = sizeSelect.value;
    quoteData.frequency = frequencySelect.value;
    
    const sizeMultiplier = parseFloat(sizeSelect.selectedOptions[0].dataset.multiplier);
    const frequencyMultiplier = parseFloat(frequencySelect.selectedOptions[0].dataset.multiplier);
    
    quoteData.finalPrice = Math.round(quoteData.basePrice * sizeMultiplier * frequencyMultiplier);
    
    // Display results
    document.getElementById('calculated-price').textContent = `$${quoteData.finalPrice}`;
    
    // Show breakdown
    const breakdown = document.getElementById('price-breakdown');
    breakdown.innerHTML = `
        <div>Base ${quoteData.service.replace('-', ' ')} service: $${quoteData.basePrice}</div>
        <div>Property size adjustment: ${sizeMultiplier}x</div>
        <div>Frequency discount: ${frequencyMultiplier}x</div>
    `;
    
    // Move to results step
    nextStep();
    
    // Track quote calculation
    trackEvent('quote_calculated', {
        service: quoteData.service,
        price: quoteData.finalPrice
    });
}

function resetQuote() {
    currentStep = 1;
    quoteData = {
        service: '',
        basePrice: 0,
        size: '',
        frequency: '',
        finalPrice: 0
    };
    
    // Reset form
    document.getElementById('instant-quote-form').reset();
    
    // Show first step
    document.querySelectorAll('.form-step').forEach(step => step.classList.remove('active'));
    document.querySelector('.form-step[data-step="1"]').classList.add('active');
}

// Smooth scrolling for anchor links
function initSmoothScrolling() {
    const scrollLinks = document.querySelectorAll('a[href^="#"]');
    
    scrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Load More Services
function initLoadMoreServices() {
    const loadMoreBtn = document.getElementById('load-more-services');
    const additionalServices = [
        {
            category: 'cleaning',
            title: 'Move-in/Move-out Cleaning',
            description: 'Comprehensive cleaning for moving transitions.',
            price: '$300',
            duration: '4-6 hours',
            rating: '4.9 (567 reviews)'
        },
        {
            category: 'handyman',
            title: 'TV Mounting',
            description: 'Professional TV mounting and cable management.',
            price: '$120',
            duration: '1-2 hours',
            rating: '4.8 (1,023 reviews)'
        },
        {
            category: 'outdoor',
            title: 'Gutter Cleaning',
            description: 'Safe and thorough gutter cleaning service.',
            price: '$180',
            duration: '2-3 hours',
            rating: '4.7 (445 reviews)'
        },
        {
            category: 'specialty',
            title: 'Post-Construction Cleanup',
            description: 'Specialized cleaning after construction work.',
            price: '$400',
            duration: '6-8 hours',
            rating: '4.9 (234 reviews)'
        }
    ];
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const servicesGrid = document.querySelector('.services-grid');
            
            additionalServices.forEach(service => {
                const serviceCard = createServiceCard(service);
                servicesGrid.appendChild(serviceCard);
            });
            
            this.style.display = 'none';
            showNotification('All services loaded!', 'success');
        });
    }
}

function createServiceCard(service) {
    const card = document.createElement('div');
    card.className = 'service-card';
    card.setAttribute('data-category', service.category);
    
    card.innerHTML = `
        <div class="service-icon">
            <i class="fas fa-${getServiceIcon(service.category)}"></i>
        </div>
        <div class="service-content">
            <h3>${service.title}</h3>
            <p>${service.description}</p>
            <div class="service-features">
                <span class="feature">✓ Professional service</span>
                <span class="feature">✓ Satisfaction guaranteed</span>
                <span class="feature">✓ Licensed & insured</span>
            </div>
            <div class="service-meta">
                <span class="price">${service.price}</span>
                <span class="duration">${service.duration}</span>
            </div>
            <div class="service-rating">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <span>${service.rating}</span>
            </div>
            <div class="service-actions">
                <button class="btn-book" data-service="${service.title.toLowerCase().replace(/\s+/g, '-')}">Book Now</button>
                <button class="btn-info" data-service="${service.title.toLowerCase().replace(/\s+/g, '-')}">Learn More</button>
            </div>
        </div>
    `;
    
    // Add animation
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        card.style.transition = 'all 0.5s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
    }, 100);
    
    return card;
}

function getServiceIcon(category) {
    const icons = {
        'cleaning': 'broom',
        'handyman': 'tools',
        'outdoor': 'tree',
        'specialty': 'star'
    };
    return icons[category] || 'cog';
}

// Booking buttons functionality
function initBookingButtons() {
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-book')) {
            const service = e.target.dataset.service;
            handleBookingClick(service);
        }
        
        if (e.target.classList.contains('btn-info')) {
            const service = e.target.dataset.service;
            showServiceInfo(service);
        }
        
        if (e.target.classList.contains('btn-book-quote')) {
            handleQuoteBooking();
        }
    });
}

function handleBookingClick(service) {
    // Show booking modal or redirect to booking page
    showNotification(`Booking ${service.replace('-', ' ')} service...`, 'info');
    
    // Track booking intent
    trackEvent('booking_initiated', {
        service: service,
        source: 'service_card'
    });
    
    // In a real application, this would open a booking modal or redirect
    setTimeout(() => {
        showBookingModal(service);
    }, 500);
}

function showServiceInfo(service) {
    // Show service information modal
    const modal = createInfoModal(service);
    document.body.appendChild(modal);
    
    // Track info view
    trackEvent('service_info_viewed', {
        service: service
    });
}

function handleQuoteBooking() {
    if (!quoteData.service) {
        showNotification('Please complete the quote first', 'warning');
        return;
    }
    
    showNotification(`Booking ${quoteData.service} for $${quoteData.finalPrice}...`, 'success');
    
    // Track quote booking
    trackEvent('quote_booking_initiated', {
        service: quoteData.service,
        price: quoteData.finalPrice
    });
}

function createInfoModal(service) {
    const modal = document.createElement('div');
    modal.className = 'service-modal';
    modal.innerHTML = `
        <div class="modal-overlay" onclick="closeModal(this.parentElement)">
            <div class="modal-content" onclick="event.stopPropagation()">
                <div class="modal-header">
                    <h3>${service.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase())}</h3>
                    <button class="modal-close" onclick="closeModal(this.closest('.service-modal'))">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Detailed information about ${service.replace('-', ' ')} service would be displayed here.</p>
                    <div class="modal-actions">
                        <button class="btn-primary" onclick="handleBookingClick('${service}')">Book This Service</button>
                        <button class="btn-secondary" onclick="closeModal(this.closest('.service-modal'))">Close</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Add modal styles if not already added
    if (!document.querySelector('#modal-styles')) {
        const styles = document.createElement('style');
        styles.id = 'modal-styles';
        styles.textContent = `
            .service-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 10000;
            }
            .modal-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .modal-content {
                background: white;
                border-radius: 15px;
                max-width: 500px;
                width: 100%;
                max-height: 90vh;
                overflow-y: auto;
            }
            .modal-header {
                padding: 20px 30px;
                border-bottom: 1px solid #eee;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .modal-close {
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: #999;
            }
            .modal-body {
                padding: 30px;
            }
            .modal-actions {
                margin-top: 30px;
                display: flex;
                gap: 15px;
            }
        `;
        document.head.appendChild(styles);
    }
    
    return modal;
}

function showBookingModal(service) {
    const modal = document.createElement('div');
    modal.className = 'service-modal';
    modal.innerHTML = `
        <div class="modal-overlay" onclick="closeModal(this.parentElement)">
            <div class="modal-content" onclick="event.stopPropagation()">
                <div class="modal-header">
                    <h3>Book ${service.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase())}</h3>
                    <button class="modal-close" onclick="closeModal(this.closest('.service-modal'))">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="booking-form">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" required placeholder="Enter your full name">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" required placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" required placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label>Preferred Date</label>
                            <input type="date" required>
                        </div>
                        <div class="form-group">
                            <label>Preferred Time</label>
                            <select required>
                                <option value="">Select time...</option>
                                <option value="morning">Morning (8AM-12PM)</option>
                                <option value="afternoon">Afternoon (12PM-5PM)</option>
                                <option value="evening">Evening (5PM-8PM)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Special Instructions (Optional)</label>
                            <textarea placeholder="Any special requirements or notes..."></textarea>
                        </div>
                        <div class="modal-actions">
                            <button type="submit" class="btn-primary">Confirm Booking</button>
                            <button type="button" class="btn-secondary" onclick="closeModal(this.closest('.service-modal'))">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Handle form submission
    const form = modal.querySelector('#booking-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        showNotification('Booking confirmed! We\'ll contact you soon.', 'success');
        closeModal(modal);
        
        // Track successful booking
        trackEvent('booking_completed', {
            service: service
        });
    });
}

function closeModal(modal) {
    modal.style.opacity = '0';
    setTimeout(() => {
        modal.remove();
    }, 300);
}

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-icon">${getNotificationIcon(type)}</span>
            <span class="notification-message">${message}</span>
            <button class="notification-close" onclick="this.parentElement.parentElement.remove()">&times;</button>
        </div>
    `;
    
    // Add notification styles if not already added
    if (!document.querySelector('#notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 10001;
                max-width: 400px;
                animation: slideInRight 0.3s ease;
            }
            .notification-content {
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                display: flex;
                align-items: center;
                gap: 10px;
                color: white;
            }
            .notification-info .notification-content { background: #17a2b8; }
            .notification-success .notification-content { background: #28a745; }
            .notification-warning .notification-content { background: #ffc107; color: #333; }
            .notification-error .notification-content { background: #dc3545; }
            .notification-close {
                background: none;
                border: none;
                color: inherit;
                font-size: 18px;
                cursor: pointer;
                margin-left: auto;
            }
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        'info': 'ℹ️',
        'success': '✅',
        'warning': '⚠️',
        'error': '❌'
    };
    return icons[type] || 'ℹ️';
}

// Analytics tracking (placeholder)
function trackEvent(eventName, eventData = {}) {
    // In a real application, this would send data to analytics service
    console.log('Event tracked:', eventName, eventData);
    
    // Example: Google Analytics
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventData);
    }
}

// Add form styles
const formStyles = document.createElement('style');
formStyles.textContent = `
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 16px;
        background: white;
        transition: border-color 0.3s ease;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
    }
    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }
`;
document.head.appendChild(formStyles);
