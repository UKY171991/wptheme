/**
 * Outdoor Services Enhanced Functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get all "Get Estimate" buttons in the outdoor services section
    const estimateButtons = document.querySelectorAll('#outdoor-services .btn-estimate');
    
    // Add click event listeners to each button
    estimateButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the service name from the closest service item
            const serviceItem = this.closest('.service-item');
            const serviceName = serviceItem.querySelector('h4').textContent;
            
            // Show estimate dialog (simple alert for demo purposes)
            showEstimateDialog(serviceName);
        });
    });
    
    // Function to show estimate dialog
    function showEstimateDialog(serviceName) {
        alert(`Thank you for your interest in our ${serviceName} service!\n\nTo provide an accurate estimate, one of our specialists will contact you within 1 business day.`);
        
        // In a real implementation, this would open a modal dialog with a form
        // or scroll to a contact form section with the service pre-selected
    }
    
    // Add hover effects to package items
    const packageItems = document.querySelectorAll('.package-item');
    packageItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'all 0.3s ease';
            this.style.cursor = 'pointer';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
        
        item.addEventListener('click', function() {
            alert(`You've selected the ${this.querySelector('.package-name').textContent} package. Contact us for details about the included services and special pricing!`);
        });
    });
});
