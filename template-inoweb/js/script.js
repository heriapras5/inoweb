AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 100 });

// ─── Navbar scroll ───
const navbar = document.getElementById('mainNav');
if (navbar) {
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
}

// ─── Smooth scroll ───
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        if (targetId === '#' || !navbar) return;
        const target = document.querySelector(targetId);
        if (target) {
            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.pageYOffset - navbar.offsetHeight;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    });
});

// ─── Counter animation ───
function animateCounters() {
    document.querySelectorAll('.stat-number[data-count]').forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const increment = target / (2000 / 16);
        let current = 0;
        function update() {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current) + '+';
                requestAnimationFrame(update);
            } else {
                counter.textContent = target + '+';
            }
        }
        update();
    });
}
const statsSection = document.querySelector('.stats-section');
let counterTriggered = false;
if (statsSection) {
    new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !counterTriggered) { counterTriggered = true; animateCounters(); }
        });
    }, { threshold: 0.5 }).observe(statsSection);
}

// ─── Portfolio filter ───
const filterTabs = document.querySelectorAll('.filter-tab');
const portfolioCards = document.querySelectorAll('.portfolio-grid .portfolio-card');
filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.getAttribute('data-filter');
        portfolioCards.forEach((card, i) => {
            const match = filter === 'all' || card.getAttribute('data-category') === filter;
            card.parentElement.style.display = match ? 'block' : 'none';
            if (match) card.style.animation = `fadeIn 0.5s ease ${i * 0.05}s forwards`;
        });
    });
});

// ─── Portfolio search ───
const searchInput = document.querySelector('.search-box input');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        portfolioCards.forEach(card => {
            const text = (card.querySelector('.portfolio-name')?.textContent + card.querySelector('.portfolio-desc')?.textContent).toLowerCase();
            card.parentElement.style.display = text.includes(term) ? 'block' : 'none';
        });
    });
}

// ─── Gallery lightbox ───
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', () => {
        const img = item.querySelector('img');
        if (!img) return;
        const overlay = document.createElement('div');
        overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.9);z-index:9999;display:flex;align-items:center;justify-content:center;cursor:pointer;animation:fadeIn 0.3s ease';
        const full = document.createElement('img');
        full.src = img.src;
        full.style.cssText = 'max-width:90%;max-height:90vh;border-radius:12px;box-shadow:0 20px 60px rgba(0,0,0,0.5)';
        overlay.appendChild(full);
        overlay.addEventListener('click', () => overlay.remove());
        document.body.appendChild(overlay);
    });
});

// ─── Testimonial nav ───
const prevBtn = document.getElementById('prevTestimonial');
const nextBtn = document.getElementById('nextTestimonial');
const testimonialCards = document.querySelectorAll('#testimonialCarousel .col-lg-4');
let currentTestimonial = 0;
if (prevBtn && nextBtn && testimonialCards.length) {
    [prevBtn, nextBtn].forEach(btn => {
        btn.addEventListener('click', () => {
            testimonialCards[currentTestimonial].style.opacity = '0.3';
            currentTestimonial = (currentTestimonial + (btn.id === 'nextTestimonial' ? 1 : -1) + testimonialCards.length) % testimonialCards.length;
            testimonialCards[currentTestimonial].style.opacity = '1';
        });
    });
}