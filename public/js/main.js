document.addEventListener('DOMContentLoaded', function () {
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenuBtn = document.getElementById('closeMenuBtn');

    // Open the mobile menu when the hamburger div is clicked
    if (hamburgerMenu && mobileMenu && closeMenuBtn) {
        hamburgerMenu.addEventListener('click', function () {
            mobileMenu.classList.toggle('open'); // Toggle the 'open' class on the menu
        });

        // Close the mobile menu when the close button is clicked
        closeMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.remove('open');
        });
    }
});
