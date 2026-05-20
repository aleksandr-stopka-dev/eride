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
document.addEventListener('DOMContentLoaded', () => { initCustomSelect('#partnership-contact-form select'); });

const menuMobile = () => {
    const btn = document.querySelector('.header__menu-btn');
    const menu = document.querySelector('.header__menu');

    if (!btn && !menu) return;

    btn.addEventListener('click', () => {
        menu.classList.toggle('is-active');

        document.body.classList.toggle('is-locked');
    })
}
document.addEventListener('DOMContentLoaded', () => { menuMobile(); });

const subMenuMobile = () => {
    const btns = document.querySelectorAll('.header__menu .sub-menu-btn');

    btns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();

            const activeLi = document.querySelector('.header__menu li.is-active');

            const parentLi = btn.closest('li');
            if (!parentLi) return;

            const subMenu = parentLi.querySelector('.sub-menu-wrapper');
            if (!subMenu) return;

            if (activeLi && activeLi !== parentLi) {
                activeLi.classList.remove('is-active');
                
                const activeSubMenu = activeLi.querySelector('.sub-menu-wrapper');
                if (activeSubMenu) {
                    activeSubMenu.style.maxHeight = '0px';
                }
            }

            const isActive = parentLi.classList.toggle('is-active');
            
            subMenu.style.maxHeight = isActive ? `${subMenu.scrollHeight}px` : '0px';
        });
    });

    const firstBtn = btns[0]; 
    if (firstBtn) {
        firstBtn.click();
    }
};
document.addEventListener('DOMContentLoaded', subMenuMobile);

const initPartnershipForm = () => {
    const form = document.getElementById('partnership-contact-form');
    
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formMessage = document.querySelector('#form-result-message');
        const button = form.querySelector('button[type="submit"]');
        if (button) button.disabled = true;
        if (formMessage) formMessage.textContent = '';

        if (typeof wp_data === 'undefined') {
            console.error('WordPress localization data (wp_data) is missing.');
            if (formMessage) formMessage.textContent = 'Configuration error. Please try again later.';
            if (button) button.disabled = false;
            return;
        }

        const formData = new FormData(form);
        formData.append('action', 'send_partnership_form');
        formData.append('nonce', wp_data.nonce);

        fetch(wp_data.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.href = '/thank-you/';
            } else {
                if (formMessage) {
                    formMessage.textContent = data.data.message || 'An error occurred, please try again later.';
                }
                if (button) button.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (formMessage) {
                formMessage.textContent = 'Network error. Please check your connection and try again.';
            }
            if (button) button.disabled = false;
        });
    });
};
document.addEventListener('DOMContentLoaded', initPartnershipForm);

const initContactsForm = () => {
    const form = document.getElementById('contacts-form');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formMessage = document.querySelector('#form-result-message');
        const button = form.querySelector('button[type="submit"]');
        if (button) button.disabled = true;
        if (formMessage) formMessage.textContent = '';

        if (typeof wp_data === 'undefined') {
            console.error('WordPress localization data (wp_data) is missing.');
            if (formMessage) formMessage.textContent = 'Configuration error. Please try again later.';
            if (button) button.disabled = false;
            return;
        }

        const formData = new FormData(form);
        formData.append('action', 'send_contacts_form');
        formData.append('nonce', wp_data.nonce);

        fetch(wp_data.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.href = '/thank-you/';
            } else {
                if (formMessage) {
                    formMessage.textContent = data.data.message || 'An error occurred, please try again later.';
                }
                if (button) button.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (formMessage) {
                formMessage.textContent = 'Network error. Please check your connection and try again.';
            }
            if (button) button.disabled = false;
        });
    });
};
document.addEventListener('DOMContentLoaded', initContactsForm);