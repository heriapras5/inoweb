import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { Fancybox } from '@fancyapps/ui';
import AOS from 'aos';
import Chart from 'chart.js/auto';
import Swal from 'sweetalert2';
import 'aos/dist/aos.css';

Alpine.plugin(collapse);
window.Alpine = Alpine;
window.Chart = Chart;
window.Swal = Swal;

AOS.init({ 
    duration: 500,
    easing: 'ease-out',
    once: true,
    offset: 60,
    disable: window.innerWidth < 768,
});

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

    // Testimonial auto-scroll carousel (seamless, smooth)
    const tTrack = document.getElementById('testimonial-track');
    if (tTrack) {
        const GAP = 16;        // gap-4
        const AUTOPLAY = 4000; // ms per langkah
        let tTimer = null;
        let originalCount = 0;
        let clonedN = 0;

        const cardW = () => {
            const c = tTrack.querySelector('.testimonial-card');
            return c ? c.offsetWidth : 0;
        };
        const stepW = () => cardW() + GAP;
        const overflow = () => tTrack.scrollWidth > tTrack.clientWidth + 1;

        // Bangun loop tanpa henti: duplikasi kartu awal ke ujung list
        const setupLoop = () => {
            if (tTrack.dataset.looped) return;
            const cards = Array.from(tTrack.querySelectorAll('.testimonial-card'));
            originalCount = cards.length;
            if (!originalCount) return;
            const w = cardW();
            const visible = Math.max(1, Math.round(tTrack.clientWidth / w));
            clonedN = Math.min(visible, originalCount);
            cards.slice(0, clonedN).forEach((el) => {
                const clone = el.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                tTrack.appendChild(clone);
            });
            tTrack.dataset.looped = '1';
        };

        const stop = () => {
            if (tTimer) { clearInterval(tTimer); tTimer = null; }
        };

        const start = () => {
            stop();
            if (!overflow() || document.hidden || tTrack.matches(':hover')) return;
            tTimer = setInterval(() => {
                if (document.hidden || tTrack.matches(':hover')) return;
                const step = stepW();
                if (!step) return;
                const maxT = tTrack.scrollWidth - tTrack.clientWidth;
                const wrapAt = maxT - step * clonedN;
                if (tTrack.scrollLeft >= wrapAt - 2) {
                    // kembali instan (tanpa animasi) ke posisi setara agar tidak ada "rewind" panjang
                    tTrack.scrollLeft = Math.max(0, tTrack.scrollLeft - step * originalCount);
                } else {
                    tTrack.scrollTo({ left: tTrack.scrollLeft + step, behavior: 'smooth' });
                }
            }, AUTOPLAY);
        };

        const resume = () => setTimeout(start, 3000);

        tTrack.addEventListener('mouseenter', stop);
        tTrack.addEventListener('mouseleave', resume);
        tTrack.addEventListener('touchstart', stop, { passive: true });
        tTrack.addEventListener('touchend', resume);
        document.addEventListener('visibilitychange', () => (document.hidden ? stop() : start()));

        window.addEventListener('resize', () => {
            stop();
            if (tTrack.scrollLeft > 0) tTrack.scrollTo({ left: 0, behavior: 'auto' });
            start();
        });

        setupLoop();
        start();
    }

    // Parallax (transform-based, lightweight)
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const parallaxEls = Array.from(document.querySelectorAll('[data-parallax]'));
    let parallaxRaf = null;

    if (parallaxEls.length && !prefersReducedMotion && window.innerWidth >= 768) {
        const applyParallax = () => {
            const vh = window.innerHeight;
            parallaxEls.forEach((el) => {
                const speed = parseFloat(el.dataset.parallaxSpeed || '0.1') || 0.1;
                const rect = el.getBoundingClientRect();
                const center = rect.top + rect.height / 2;
                const offset = (center - vh / 2) * -speed;
                el.style.transform = `translate3d(0, ${offset.toFixed(1)}px, 0)`;
            });
            parallaxRaf = null;
        };
        const scheduleParallax = () => {
            if (!parallaxRaf) parallaxRaf = requestAnimationFrame(applyParallax);
        };
        window.addEventListener('scroll', scheduleParallax, { passive: true });
        window.addEventListener('resize', scheduleParallax, { passive: true });
        applyParallax();
    }
});

Alpine.start();
