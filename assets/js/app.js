const createSwiper = (selector, options) => {
    const sections = document.querySelectorAll(selector);

    const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;

        const section = entry.target;
        const swiperEl = section.querySelector('.swiper');
        const slides = section.querySelectorAll('.swiper-slide');

        if (swiperEl) {
            new Swiper(swiperEl, {
                speed: 600,
                grabCursor: true,
                watchOverflow: true,
                loop: slides.length > (options.slidesPerView || 1),
                pagination: {
                    el: section.querySelector('.swiper-pagination'),
                    clickable: true
                },
                navigation: {
                    nextEl: section.querySelector('.swiper-button-next'),
                    prevEl: section.querySelector('.swiper-button-prev')
                },
                ...options
            });
        }
        obs.unobserve(section);
    });
    }, { rootMargin: '200px' });

    sections.forEach(s => observer.observe(s));
};

document.addEventListener('DOMContentLoaded', () => {
    createSwiper('.principles', {
        slidesPerView: 1,
    });

    createSwiper('.platform', {
        slidesPerView: 1,
    });
});