document.addEventListener('DOMContentLoaded', function() {
    const submenu = document.querySelector('.submenu');
    const submenuItems = submenu.querySelectorAll('li');

    submenuItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.classList.add('active');
        });

        item.addEventListener('mouseleave', () => {
            item.classList.remove('active');
        });
    });
});
