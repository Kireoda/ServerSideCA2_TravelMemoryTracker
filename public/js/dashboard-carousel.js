(() => {
    const root = document.querySelector('[data-carousel]');
    if (!root) return;

    const track = root.querySelector('[data-carousel-track]');
    const prev = root.querySelector('[data-carousel-prev]');
    const next = root.querySelector('[data-carousel-next]');
    const fullscreenButton = root.querySelector('[data-carousel-fullscreen]');
    const slides = Array.from(track?.querySelectorAll('.trip-card--hero') ?? []);

    if (!track || !prev || !next || !slides.length) return;

    const FULLSCREEN_INTERVAL_MS = 4200;
    let slideshowTimer = null;

    const isFullscreenActive = () => document.fullscreenElement === root || root.classList.contains('is-fullscreen');

    const getCurrentIndex = () => {
        const step = track.clientWidth || 1;
        return Math.round(track.scrollLeft / step);
    };

    const scrollToIndex = (index, behavior = 'smooth') => {
        const nextIndex = (index + slides.length) % slides.length;
        track.scrollTo({ left: track.clientWidth * nextIndex, behavior });
    };

    const update = () => {
        const currentIndex = getCurrentIndex();
        prev.disabled = currentIndex <= 0;
        next.disabled = currentIndex >= slides.length - 1;
    };

    const move = (direction) => {
        const currentIndex = getCurrentIndex();
        scrollToIndex(currentIndex + direction);
    };

    const stopSlideshow = () => {
        if (!slideshowTimer) return;
        window.clearInterval(slideshowTimer);
        slideshowTimer = null;
    };

    const startSlideshow = () => {
        if (slideshowTimer || !isFullscreenActive() || slides.length < 2) return;

        slideshowTimer = window.setInterval(() => {
            scrollToIndex(getCurrentIndex() + 1);
        }, FULLSCREEN_INTERVAL_MS);
    };

    const syncFullscreenUi = () => {
        const active = isFullscreenActive();
        root.classList.toggle('is-fullscreen', active);

        if (fullscreenButton) {
            fullscreenButton.textContent = active ? '×' : '⛶';
            fullscreenButton.setAttribute('aria-label', active ? 'Exit slideshow fullscreen' : 'Enter slideshow fullscreen');
            fullscreenButton.setAttribute('aria-pressed', active ? 'true' : 'false');
        }

        if (active) startSlideshow();
        else stopSlideshow();

        update();
    };

    prev.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));

    track.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', () => {
        scrollToIndex(getCurrentIndex(), 'auto');
        update();
    });

    track.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight') {
            event.preventDefault();
            move(1);
        }

        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            move(-1);
        }
    });

    fullscreenButton?.addEventListener('click', async () => {
        if (document.fullscreenEnabled && root.requestFullscreen) {
            if (document.fullscreenElement === root) {
                await document.exitFullscreen?.();
            } else {
                await root.requestFullscreen();
            }
            return;
        }

        root.classList.toggle('is-fullscreen');
        syncFullscreenUi();
    });

    document.addEventListener('fullscreenchange', syncFullscreenUi);

    document.addEventListener('keydown', (event) => {
        if (!isFullscreenActive()) return;

        if (event.key === 'Escape' && !document.fullscreenElement) {
            root.classList.remove('is-fullscreen');
            syncFullscreenUi();
        }
    });

    root.addEventListener('mouseenter', stopSlideshow);
    root.addEventListener('mouseleave', startSlideshow);
    root.addEventListener('focusin', stopSlideshow);
    root.addEventListener('focusout', startSlideshow);

    syncFullscreenUi();
})();
