// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,    // Animation duration in milliseconds
        once: true,        // Whether animation should happen only once
        offset: 100,       // Offset (in px) from the original trigger point
        easing: 'ease-in-out',
        disable: 'mobile'  // Disable animations on mobile devices
    });

    // Fade in elements on scroll
    const fadeElements = document.querySelectorAll('.fade-in');
    const slideElements = document.querySelectorAll('.slide-in');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    // Observer for fade animations
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observer for slide animations
    const slideObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                slideObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements
    fadeElements.forEach(el => fadeObserver.observe(el));
    slideElements.forEach(el => slideObserver.observe(el));

    // Remove loading screen when page is fully loaded
    window.addEventListener('load', function() {
        const loader = document.querySelector('.loading');
        if (loader) {
            loader.style.display = 'none';
        }
    });

    // Initialize Google Map if map container exists
    function initMap() {
        const mapContainer = document.querySelector('.map iframe');
        if (mapContainer) {
            // Map is already initialized through iframe
            console.log('Map initialized through iframe');
        }
    }

    // Call initMap if Google Maps API is loaded
    if (window.google && window.google.maps) {
        initMap();
    }
});
