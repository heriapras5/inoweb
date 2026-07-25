import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);
window.Alpine = Alpine;

if (window.AOS) {
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 100 });
}

document.addEventListener('DOMContentLoaded', () => {
    // Gallery lightbox
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const img = this.querySelector('img');
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

    // Portfolio filter
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.portfolio-card').forEach((card, i) => {
                const match = filter === 'all' || card.getAttribute('data-category') === filter;
                card.parentElement.style.display = match ? 'block' : 'none';
                if (match) card.style.animation = `fadeIn 0.5s ease ${i * 0.05}s forwards`;
            });
        });
    });

    // Portfolio search
    const searchInput = document.querySelector('.filter-section input[type="text"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll('.portfolio-card').forEach(card => {
                const text = (card.querySelector('.portfolio-name')?.textContent + card.querySelector('.portfolio-desc')?.textContent || '').toLowerCase();
                card.parentElement.style.display = text.includes(term) ? 'block' : 'none';
            });
        });
    }
});

Alpine.start();
