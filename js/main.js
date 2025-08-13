// Mobile menu functionality
const burger = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');

function setMenu(o) {
    if (!burger || !mobileMenu) return;
    burger.setAttribute('aria-expanded', String(o));
    mobileMenu.classList.toggle('open', o);
    mobileMenu.hidden = !o;
    document.body.classList.toggle('no-scroll', o);
}

// Counter animation
function animateCounter(el) {
    const t = +el.getAttribute('data-target') || 0;
    const d = 1200;
    const s = performance.now();
    
    function f(n) {
        const p = Math.min(1, (n - s) / d);
        el.textContent = Math.round(t * (.6 * p + .4 * p * p));
        if (p < 1) requestAnimationFrame(f);
    }
    requestAnimationFrame(f);
}

// Intersection Observer for animations
const io = new IntersectionObserver(es => {
    es.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            if (e.target.classList.contains('counter')) {
                animateCounter(e.target);
            }
        }
    });
}, { threshold: .15 });

// Floating sphere functionality
function createFloatingSphere() {
    const ring = document.getElementById('sphereRing');
    if (!ring) return;
    
    const terms = [...ring.querySelectorAll('.sphere__term')];
    const state = { rot: 0, auto: true, R: 0, margin: 0 };
    
    const items = terms.map(el => ({
        el,
        ang0: (+el.dataset.angle || 0) * Math.PI / 180,
        rFac: .34 + Math.random() * .14,
        w: (Math.random() * .8 + .2) * (Math.random() < .5 ? -1 : 1) * .0012,
        n1: Math.random() * 1.5 + .5,
        n2: Math.random() * 1.2 + .4,
        p1: Math.random() * Math.PI * 2,
        p2: Math.random() * Math.PI * 2
    }));
    
    function measure() {
        const s = Math.min(ring.clientWidth, ring.clientHeight);
        state.R = s / 2 * .82;
        state.margin = Math.max(20, s * .04);
    }
    
    measure();
    new ResizeObserver(measure).observe(ring);
    
    const norm = d => {
        d %= Math.PI * 2;
        return d < 0 ? d + Math.PI * 2 : d;
    };
    
    const diff = (t, f) => {
        let d = t - f;
        return (d + Math.PI * 3) % (Math.PI * 2) - Math.PI;
    };
    
    let last = performance.now();
    
    function tick(now) {
        const dt = now - last;
        last = now;
        
        if (state.auto) {
            state.rot += dt * (innerWidth <= 680 ? .00025 : .00035);
        }
        
        items.forEach(it => {
            it.ang0 += it.w * dt;
            const a = norm(it.ang0 + state.rot + .22 * Math.sin(now * .001 * it.n1 + it.p1));
            const rb = state.R * (it.rFac + .06 * Math.sin(now * .0011 * it.n2 + it.p2));
            const r = Math.min(rb, state.R - state.margin);
            const dx = Math.cos(a) * r;
            const dy = Math.sin(a) * r;
            const top = Math.abs(diff(-Math.PI / 2, a));
            const dep = 1 - top / Math.PI;
            const sc = .85 + dep * .5;
            const op = .55 + dep * .45;
            const z = 100 + Math.round(dep * 100);
            
            Object.assign(it.el.style, {
                zIndex: z,
                opacity: op.toFixed(2),
                transform: `translate(-50%,-50%) translate(${dx}px,${dy}px) scale(${sc.toFixed(3)})`,
                filter: `brightness(${.9 + dep * .3})`
            });
        });
        
        requestAnimationFrame(tick);
    }
    
    requestAnimationFrame(tick);
    
    function spinTo(it) {
        const cur = norm(it.ang0 + state.rot);
        const tr = state.rot + diff(-Math.PI / 2, cur);
        const st = performance.now();
        const from = state.rot;
        const dur = 650;
        
        state.auto = false;
        
        function step(t) {
            const p = Math.min(1, (t - st) / dur);
            state.rot = from + (tr - from) * (.25 + .75 * p);
            if (p < 1) {
                requestAnimationFrame(step);
            } else {
                state.rot = tr;
            }
        }
        
        requestAnimationFrame(step);
    }
    
    items.forEach(it => {
        const enter = () => {
            terms.forEach(b => b.classList.remove('is-front'));
            it.el.classList.add('is-front');
            spinTo(it);
        };
        
        const leave = () => {
            state.auto = true;
            it.el.classList.remove('is-front');
        };
        
        ['mouseenter', 'focus', 'click'].forEach(e => it.el.addEventListener(e, enter));
        ['mouseleave', 'blur'].forEach(e => it.el.addEventListener(e, leave));
    });
}

// Button hover effects
function initButtonEffects() {
    document.querySelectorAll('.btn').forEach(b => {
        b.addEventListener('pointermove', e => {
            const r = b.getBoundingClientRect();
            b.style.setProperty('--x', (e.clientX - r.left) + 'px');
            b.style.setProperty('--y', (e.clientY - r.top) + 'px');
        });
    });
}

// FAB (Floating Action Button) functionality
function initFAB() {
    const fab = document.getElementById('fab');
    const btn = document.getElementById('fabBtn');
    
    if (!fab || !btn) return;
    
    const toggle = o => {
        fab.setAttribute('aria-expanded', String(o));
        fab.classList.toggle('open', o);
    };
    
    btn.addEventListener('click', () => {
        toggle(!(fab.getAttribute('aria-expanded') === 'true'));
    });
    
    document.addEventListener('click', e => {
        if (!fab.contains(e.target)) {
            toggle(false);
        }
    });
    
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            toggle(false);
        }
    });
}

// Carousel functionality
function initCarousels() {
    const carousels = document.querySelectorAll('.carousel');
    
    carousels.forEach((carousel, index) => {
        const srcs = carousel.dataset.srcs;
        const alt = carousel.dataset.alt || 'Carousel image';
        
        if (!srcs) return;
        
        const images = srcs.split(',').map(src => src.trim());
        
        if (images.length === 0) return;
        
        // Create carousel structure
        carousel.innerHTML = `
            <div class="carousel__viewport">
                <div class="carousel__track">
                    ${images.map((src, index) => `
                        <div class="carousel__slide">
                            <img src="${src.trim()}" alt="${alt} ${index + 1}" loading="lazy">
                        </div>
                    `).join('')}
                </div>
            </div>
            ${images.length > 1 ? `
                <button class="carousel__btn prev" aria-label="Предыдущее изображение">‹</button>
                <button class="carousel__btn next" aria-label="Следующее изображение">›</button>
                <div class="carousel__dots">
                    ${images.map((_, index) => `
                        <button class="carousel__dot ${index === 0 ? 'is-active' : ''}" 
                                data-slide="${index}" 
                                aria-label="Перейти к изображению ${index + 1}"></button>
                    `).join('')}
                </div>
            ` : ''}
        `;
        
        if (images.length <= 1) return;
        
        // Carousel functionality
        const track = carousel.querySelector('.carousel__track');
        const slides = carousel.querySelectorAll('.carousel__slide');
        const dots = carousel.querySelectorAll('.carousel__dot');
        const prevBtn = carousel.querySelector('.carousel__btn.prev');
        const nextBtn = carousel.querySelector('.carousel__btn.next');
        
        let currentSlide = 0;
        let isDragging = false;
        let startPos = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        
        function updateCarousel() {
            const slideWidth = slides[0].offsetWidth;
            track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('is-active', index === currentSlide);
            });
        }
        
        function goToSlide(index) {
            currentSlide = Math.max(0, Math.min(index, slides.length - 1));
            updateCarousel();
        }
        
        function nextSlide() {
            goToSlide(currentSlide + 1);
        }
        
        function prevSlide() {
            goToSlide(currentSlide - 1);
        }
        
        // Event listeners
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => goToSlide(index));
        });
        
        // Touch/swipe support
        function touchStart(e) {
            isDragging = true;
            startPos = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
            carousel.classList.add('drag');
        }
        
        function touchMove(e) {
            if (!isDragging) return;
            e.preventDefault();
            const currentPos = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
            const diff = currentPos - startPos;
            const slideWidth = slides[0].offsetWidth;
            currentTranslate = prevTranslate + diff;
            
            track.style.transform = `translateX(${currentTranslate}px)`;
        }
        
        function touchEnd() {
            if (!isDragging) return;
            isDragging = false;
            carousel.classList.remove('drag');
            
            const slideWidth = slides[0].offsetWidth;
            const movedBy = currentTranslate - prevTranslate;
            
            if (Math.abs(movedBy) > slideWidth / 3) {
                if (movedBy < 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            } else {
                updateCarousel();
            }
            
            prevTranslate = currentTranslate;
        }
        
        // Mouse events
        track.addEventListener('mousedown', touchStart);
        track.addEventListener('mousemove', touchMove);
        track.addEventListener('mouseup', touchEnd);
        track.addEventListener('mouseleave', touchEnd);
        
        // Touch events
        track.addEventListener('touchstart', touchStart);
        track.addEventListener('touchmove', touchMove);
        track.addEventListener('touchend', touchEnd);
        
        // Keyboard navigation
        carousel.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });
        
        // Auto-play (optional)
        let autoPlayInterval;
        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 5000);
        }
        
        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }
        
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
        
        // Start auto-play
        startAutoPlay();
    });
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize mobile menu
    setMenu(false);
    
    if (burger) {
        burger.addEventListener('click', () => {
            setMenu(!(burger.getAttribute('aria-expanded') === 'true'));
        });
    }
    
    // Handle window resize
    addEventListener('resize', () => {
        if (innerWidth >= 681) {
            setMenu(false);
        }
    });
    
    // Close mobile menu when clicking on links
    document.querySelectorAll('#mobileMenu a').forEach(a => {
        a.addEventListener('click', () => setMenu(false));
    });
    
    // Close mobile menu with Escape key
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            setMenu(false);
        }
    });
    
    // Initialize animations
    document.querySelectorAll('.reveal, .counter').forEach(el => {
        io.observe(el);
    });
    
    // Initialize floating sphere
    createFloatingSphere();
    
    // Initialize button effects
    initButtonEffects();
    
    // Initialize FAB
    initFAB();
    
    // Initialize carousels
    initCarousels();
    
    // Mobile sticky header fallback
const header = document.querySelector('header');
if (header && window.innerWidth <= 680) {
    let lastScrollTop = 0;
    let isSticky = false;
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 10 && !isSticky) {
            header.style.position = 'fixed';
            header.style.top = '0';
            header.style.left = '0';
            header.style.right = '0';
            header.style.zIndex = '50';
            header.style.width = '100%';
            header.style.background = 'rgba(11,11,12,0.95)';
            header.style.backdropFilter = 'saturate(140%) blur(8px)';
            header.style.webkitBackdropFilter = 'saturate(140%) blur(8px)';
            header.style.borderBottom = '1px solid var(--border)';
            isSticky = true;
        } else if (scrollTop <= 10 && isSticky) {
            header.style.position = 'sticky';
            header.style.background = '';
            header.style.backdropFilter = '';
            header.style.webkitBackdropFilter = '';
            isSticky = false;
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Also handle resize events
    window.addEventListener('resize', () => {
        if (window.innerWidth > 680) {
            header.style.position = 'sticky';
            header.style.background = '';
            header.style.backdropFilter = '';
            header.style.webkitBackdropFilter = '';
            isSticky = false;
        }
    });
}
    
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();
});
