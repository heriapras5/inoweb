import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { Fancybox } from '@fancyapps/ui';

Alpine.plugin(collapse);
window.Alpine = Alpine;

if (window.AOS) {
    AOS.init({ duration: 500, easing: 'ease-out', once: true, offset: 60, disable: 'mobile' });
}

document.addEventListener('DOMContentLoaded', () => {
    // Fancybox
    Fancybox.bind('[data-fancybox]', {
        infinite: false,
        Thumbs: { type: 'modern' },
    });

    // Portfolio filter
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.portfolio-card').forEach((card, i) => {
                const match = filter === 'all' || card.getAttribute('data-category') === filter;
                card.style.display = match ? '' : 'none';
                if (match) card.style.animation = `fadeIn 0.5s ease ${i * 0.05}s forwards`;
            });
        });
    });
});

Alpine.start();
