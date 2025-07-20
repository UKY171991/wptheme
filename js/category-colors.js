/**
 * Apply category colors from data attributes
 */
document.addEventListener('DOMContentLoaded', function() {
    // Find all elements with data-color attribute
    const colorElements = document.querySelectorAll('[data-color]');
    
    // Apply the color from the data attribute to each element
    colorElements.forEach(element => {
        const color = element.getAttribute('data-color');
        if (color) {
            element.style.backgroundColor = color;
        }
    });
});