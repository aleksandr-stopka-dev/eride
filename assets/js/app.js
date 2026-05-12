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

const initCustomSelect = (selector) => {
    const selects = document.querySelectorAll(selector);

    selects.forEach(select => {
        if (select.closest('.custom-select-wrapper')) return;

        const wrapper = document.createElement('div');
        wrapper.classList.add('custom-select-wrapper');
        
        const customSelect = document.createElement('div');
        customSelect.classList.add('custom-select');
        
        const selectedText = select.options[select.selectedIndex]?.text || '';
        
        customSelect.innerHTML = `
            <div class="custom-select__trigger">
                <span>${selectedText}</span>
                <div class="arrow"></div>
            </div>
            <div class="custom-select__options"></div>
        `;
        
        select.parentNode.insertBefore(wrapper, select);
        wrapper.appendChild(select);
        wrapper.appendChild(customSelect);
        
        const trigger = customSelect.querySelector('.custom-select__trigger');
        const optionsContainer = customSelect.querySelector('.custom-select__options');
        
        Array.from(select.options).forEach(option => {
            if (option.hidden) return;

            const div = document.createElement('div');
            div.classList.add('custom-select__option');
            div.textContent = option.text;
            div.dataset.value = option.value;
            
            if (option.selected) div.classList.add('is-selected');
            
            div.addEventListener('click', (e) => {
                e.stopPropagation();
                select.value = option.value;
                trigger.querySelector('span').textContent = option.text;
                
                optionsContainer.querySelectorAll('.custom-select__option').forEach(el => el.classList.remove('is-selected'));
                div.classList.add('is-selected');
                
                customSelect.classList.remove('is-open');
                
                select.dispatchEvent(new Event('change', { bubbles: true }));
            });
            optionsContainer.appendChild(div);
        });

        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.custom-select.is-open').forEach(openSelect => {
                if (openSelect !== customSelect) openSelect.classList.remove('is-open');
            });
            customSelect.classList.toggle('is-open');
        });
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.custom-select.is-open').forEach(select => {
            select.classList.remove('is-open');
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initCustomSelect('#partnership-contact-form select');
});