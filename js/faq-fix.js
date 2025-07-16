// FAQ Functionality Fix
document.addEventListener('DOMContentLoaded', function() {
    // Wait for DOM to be fully loaded
    setTimeout(function() {
        initFAQFunctionality();
    }, 100);
});

function initFAQFunctionality() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    if (faqItems.length === 0) {
        console.log('No FAQ items found');
        return;
    }
    
    console.log('Initializing FAQ functionality for', faqItems.length, 'items');
    
    faqItems.forEach(function(item) {
        const question = item.querySelector('.faq-question');
        const toggle = item.querySelector('.faq-toggle');
        const answer = item.querySelector('.faq-answer');
        
        if (question && toggle && answer) {
            // Remove any existing event listeners
            question.replaceWith(question.cloneNode(true));
            const newQuestion = item.querySelector('.faq-question');
            const newToggle = item.querySelector('.faq-toggle');
            
            newQuestion.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isActive = item.classList.contains('active');
                
                // Close all other FAQ items
                faqItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherToggle = otherItem.querySelector('.faq-toggle');
                        if (otherToggle) {
                            otherToggle.textContent = '+';
                        }
                    }
                });
                
                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    newToggle.textContent = '+';
                } else {
                    item.classList.add('active');
                    newToggle.textContent = '-';
                }
                
                console.log('FAQ item toggled:', isActive ? 'closed' : 'opened');
            });
            
            // Make sure the toggle shows correct initial state
            newToggle.textContent = '+';
            item.classList.remove('active');
        }
    });
}

// Also try to initialize when window loads
window.addEventListener('load', function() {
    setTimeout(function() {
        initFAQFunctionality();
    }, 200);
});
