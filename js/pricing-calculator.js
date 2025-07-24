/**
 * Pricing Calculator Functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get calculator elements
    const serviceType = document.getElementById('service-type');
    const squareFootage = document.getElementById('square-footage');
    const frequency = document.getElementById('frequency');
    const urgency = document.getElementById('urgency');
    const additionalServices = document.querySelectorAll('.checkbox-group input[type="checkbox"]');
    const specialRequests = document.getElementById('special-requests');
    
    // Price display elements
    const basePriceEl = document.getElementById('base-price');
    const sizeCostEl = document.getElementById('size-cost');
    const urgencyCostEl = document.getElementById('urgency-cost');
    const urgencyFeeEl = document.getElementById('urgency-fee');
    const subtotalEl = document.getElementById('subtotal');
    const discountLineEl = document.getElementById('discount-line');
    const discountAmountEl = document.getElementById('discount-amount');
    const totalPriceEl = document.getElementById('total-price');
    const sqftValueEl = document.getElementById('sqft-value');
    const additionalBreakdownEl = document.getElementById('additional-breakdown');
    
    // Pricing toggle functionality
    const pricingToggle = document.getElementById('pricing-toggle');
    const priceAmounts = document.querySelectorAll('.price-amount');
    
    if (pricingToggle) {
        pricingToggle.addEventListener('change', function() {
            priceAmounts.forEach(amount => {
                const oneTime = amount.dataset.onetime;
                const recurring = amount.dataset.recurring;
                
                if (this.checked) {
                    amount.textContent = '$' + recurring;
                    // Show savings badges
                    const savingsEl = amount.parentElement.querySelector('.price-savings');
                    if (savingsEl) {
                        savingsEl.style.display = 'block';
                    }
                } else {
                    amount.textContent = '$' + oneTime;
                    // Hide savings badges
                    const savingsEl = amount.parentElement.querySelector('.price-savings');
                    if (savingsEl) {
                        savingsEl.style.display = 'none';
                    }
                }
            });
        });
    }
    
    // Square footage slider
    if (squareFootage && sqftValueEl) {
        squareFootage.addEventListener('input', function() {
            sqftValueEl.textContent = this.value.toLocaleString() + ' sq ft';
            calculatePrice();
        });
    }
    
    // Calculate price function
    function calculatePrice() {
        if (!serviceType || !squareFootage || !frequency || !urgency) return;
        
        // Get base rate
        const selectedService = serviceType.options[serviceType.selectedIndex];
        const baseRate = parseFloat(selectedService.dataset.baseRate);
        const sqft = parseInt(squareFootage.value);
        
        // Calculate base price
        let basePrice;
        if (serviceType.value === 'maintenance') {
            basePrice = baseRate * 2; // 2 hour minimum
        } else {
            basePrice = Math.max(baseRate * sqft, 120); // Minimum $120
        }
        
        // Size adjustment
        let sizeAdjustment = 0;
        if (sqft > 2000 && serviceType.value !== 'maintenance') {
            sizeAdjustment = (sqft - 2000) * 0.02;
        }
        
        // Urgency multiplier
        const urgencyOption = urgency.options[urgency.selectedIndex];
        const urgencyMultiplier = parseFloat(urgencyOption.dataset.multiplier);
        const urgencyFee = (basePrice + sizeAdjustment) * (urgencyMultiplier - 1);
        
        // Additional services
        let additionalCost = 0;
        let additionalText = '';
        additionalServices.forEach(checkbox => {
            if (checkbox.checked) {
                const cost = parseFloat(checkbox.value);
                additionalCost += cost;
                const serviceName = checkbox.dataset.service;
                additionalText += `<div>${serviceName}: $${cost.toFixed(2)}</div>`;
            }
        });
        
        // Subtotal
        const subtotal = basePrice + sizeAdjustment + urgencyFee + additionalCost;
        
        // Frequency discount
        const frequencyOption = frequency.options[frequency.selectedIndex];
        const discountPercent = parseFloat(frequencyOption.dataset.discount);
        const discountAmount = subtotal * (discountPercent / 100);
        
        // Final total
        const total = subtotal - discountAmount;
        
        // Update display
        if (basePriceEl) basePriceEl.textContent = '$' + basePrice.toFixed(2);
        if (sizeCostEl) sizeCostEl.textContent = '$' + sizeAdjustment.toFixed(2);
        
        if (urgencyFee > 0) {
            if (urgencyFeeEl) urgencyFeeEl.style.display = 'flex';
            if (urgencyCostEl) urgencyCostEl.textContent = '$' + urgencyFee.toFixed(2);
        } else {
            if (urgencyFeeEl) urgencyFeeEl.style.display = 'none';
        }
        
        if (additionalBreakdownEl) additionalBreakdownEl.innerHTML = additionalText;
        if (subtotalEl) subtotalEl.textContent = '$' + subtotal.toFixed(2);
        
        if (discountAmount > 0) {
            if (discountLineEl) discountLineEl.style.display = 'flex';
            if (discountAmountEl) discountAmountEl.textContent = '-$' + discountAmount.toFixed(2);
        } else {
            if (discountLineEl) discountLineEl.style.display = 'none';
        }
        
        if (totalPriceEl) totalPriceEl.textContent = '$' + total.toFixed(2);
    }
    
    // Add event listeners
    if (serviceType) serviceType.addEventListener('change', calculatePrice);
    if (frequency) frequency.addEventListener('change', calculatePrice);
    if (urgency) urgency.addEventListener('change', calculatePrice);
    
    additionalServices.forEach(checkbox => {
        checkbox.addEventListener('change', calculatePrice);
    });
    
    // Initial calculation
    calculatePrice();
    
    // FAQ Toggle functionality
    window.toggleFaq = function(element) {
        const content = element.querySelector('.faq-content');
        const toggle = element.querySelector('.faq-toggle');
        
        if (content.style.display === 'block') {
            content.style.display = 'none';
            toggle.textContent = '+';
            element.classList.remove('active');
        } else {
            // Close all other FAQs
            document.querySelectorAll('.faq-item').forEach(item => {
                item.querySelector('.faq-content').style.display = 'none';
                item.querySelector('.faq-toggle').textContent = '+';
                item.classList.remove('active');
            });
            
            // Open clicked FAQ
            content.style.display = 'block';
            toggle.textContent = '−';
            element.classList.add('active');
        }
    };
    
    // Animated counter for hero stats
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.count);
            const increment = target / 50;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 40);
        });
    }
    
    // Trigger counter animation when hero is in view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const heroStats = document.querySelector('.hero-stats');
    if (heroStats) {
        observer.observe(heroStats);
    }
});
