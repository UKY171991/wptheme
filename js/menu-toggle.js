document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navigationMenu = document.querySelector('.main-navigation ul');

    menuToggle.addEventListener('click', function() {
        navigationMenu.classList.toggle('active');
        menuToggle.classList.toggle('active');
    });
});
