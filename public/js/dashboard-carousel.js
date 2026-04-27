(() => {
    const root = document.querySelector('[data-carousel]');
    if (!root) return;
    const section = root.closest('.dashboard-section');

    const track = root.querySelector('[data-carousel-track]');
    const prev = root.querySelector('[data-carousel-prev]');
    const next = root.querySelector('[data-carousel-next]');
    const playButton = section?.querySelector('[data-carousel-fullscreen]');
    const closeButton = root.querySelector('[data-carousel-close]');
    const slides = Array.from(track?.querySelectorAll('.trip-card--hero') ?? []);

    if (!track || !prev || !next || !playButton || !closeButton || !slides.length) return;

    let activeIndex = 0;
    let controlsTimer = null;

    const isFullscreenActive = () =>
        document.fullscreenElement === root || root.classList.contains('is-fullscreen');

    const setControlsVisible = (visible) => {
        if (!isFullscreenActive()) {
            root.classList.remove('controls-visible');
            closeButton.hidden = true;
            return;
        }

        root.classList.toggle('controls-visible', visible);
        closeButton.hidden = !visible;

        if (controlsTimer) {
            window.clearTimeout(controlsTimer);
            controlsTimer = null;
        }

        if (visible) {
            controlsTimer = window.setTimeout(() => {
                root.classList.remove('controls-visible');
                closeButton.hidden = true;
            }, 2200);
        }
    };

    const scrollToIndex = (index, behavior = 'smooth') => {
        activeIndex = (index + slides.length) % slides.length;
        track.scrollTo({ left: track.clientWidth * activeIndex, behavior });
        updateNav();
    };

    const updateNav = () => {
        prev.disabled = slides.length < 2;
        next.disabled = slides.length < 2;
    };

    const syncUi = () => {
        const active = isFullscreenActive();
        root.classList.toggle('is-fullscreen', active);

        playButton.hidden = active;
        closeButton.hidden = !active || !root.classList.contains('controls-visible');

        if (!active) {
            root.classList.remove('controls-visible');
            closeButton.hidden = true;
        }
    };

    const exitSlideshow = async () => {
        if (document.fullscreenElement === root) {
            await document.exitFullscreen?.();
        }

        root.classList.remove('is-fullscreen', 'controls-visible');
        closeButton.hidden = true;
        syncUi();
    };

    prev.addEventListener('click', (event) => {
        event.stopPropagation();
        scrollToIndex(activeIndex - 1);
        setControlsVisible(true);
    });

    next.addEventListener('click', (event) => {
        event.stopPropagation();
        scrollToIndex(activeIndex + 1);
        setControlsVisible(true);
    });

    playButton.addEventListener('click', async (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (document.fullscreenEnabled && root.requestFullscreen) {
            await root.requestFullscreen();
        } else {
            root.classList.add('is-fullscreen');
        }

        syncUi();
        scrollToIndex(activeIndex, 'auto');
    });

    closeButton.addEventListener('click', async (event) => {
        event.preventDefault();
        event.stopPropagation();
        await exitSlideshow();
    });

    track.addEventListener('scroll', () => {
        const step = track.clientWidth || 1;
        activeIndex = Math.round(track.scrollLeft / step);
    }, { passive: true });

    track.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight') {
            event.preventDefault();
            scrollToIndex(activeIndex + 1);
        }

        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            scrollToIndex(activeIndex - 1);
        }
    });

    root.addEventListener('click', (event) => {
        if (!isFullscreenActive()) return;

        const target = event.target instanceof Element ? event.target : null;
        const isControl = target?.closest('[data-carousel-prev], [data-carousel-next], [data-carousel-close]');

        if (isControl) return;

        const mediaLink = target?.closest('.trip-card-media');
        if (mediaLink) {
            event.preventDefault();
        }

        setControlsVisible(true);
    });

    document.addEventListener('fullscreenchange', () => {
        syncUi();
        if (isFullscreenActive()) {
            scrollToIndex(activeIndex, 'auto');
        } else {
            root.classList.remove('controls-visible');
            closeButton.hidden = true;
        }
    });

    document.addEventListener('keydown', async (event) => {
        if (!isFullscreenActive()) return;

        if (event.key === 'Escape') {
            await exitSlideshow();
        }
    });

    window.addEventListener('resize', () => {
        scrollToIndex(activeIndex, 'auto');
    });

    scrollToIndex(0, 'auto');
    syncUi();
})();
