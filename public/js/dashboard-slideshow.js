(() => {
    const items = Array.from(document.querySelectorAll('[data-dashboard-slideshow]'));
    if (!items.length) return;

    const reducedMotion =
        window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const INTERVAL_MS = 3200;
    const FADE_MS = 520;

    const createController = (link) => {
        const raw = link.getAttribute('data-dashboard-slideshow');
        if (!raw) return null;

        let images = [];
        try {
            images = JSON.parse(raw);
        } catch {
            return null;
        }

        if (!Array.isArray(images) || images.length < 2) return null;

        const img = link.querySelector('.trip-card-media-photo');
        if (!img) return null;

        let index = 0;
        let timer = null;
        let isTransitioning = false;
        let queuedIndex = null;

        const layerA = img;
        layerA.classList.add('trip-card-media-photo--layer');

        const layerB = document.createElement('img');
        layerB.className = 'trip-card-media-photo trip-card-media-photo--layer';
        layerB.alt = '';
        layerB.loading = 'lazy';
        layerB.decoding = 'async';
        layerB.style.opacity = '0';
        layerA.insertAdjacentElement('beforebegin', layerB);

        let activeLayer = layerA;
        let inactiveLayer = layerB;

        const preload = (src) => {
            if (!src) return;
            const image = new Image();
            image.decoding = 'async';
            image.src = src;
        };

        const decodeImage = async (element) => {
            try {
                if (typeof element.decode === 'function') {
                    await element.decode();
                }
            } catch {
                // ignore decode failures
            }
        };

        const finishTransition = async () => {
            if (queuedIndex === null) return;
            const next = queuedIndex;
            queuedIndex = null;
            await show(next);
        };

        const show = async (nextIndex) => {
            index = (nextIndex + images.length) % images.length;
            const nextSrc = images[index];

            if (!nextSrc) return;

            if (reducedMotion) {
                activeLayer.src = nextSrc;
                preload(images[(index + 1) % images.length]);
                return;
            }

            if (isTransitioning) {
                queuedIndex = nextIndex;
                return;
            }
            isTransitioning = true;

            inactiveLayer.style.opacity = '0';
            inactiveLayer.src = nextSrc;
            await decodeImage(inactiveLayer);

            window.requestAnimationFrame(() => {
                inactiveLayer.style.opacity = '1';
                activeLayer.style.opacity = '0';
            });

            window.setTimeout(async () => {
                const prevActive = activeLayer;
                activeLayer = inactiveLayer;
                inactiveLayer = prevActive;
                inactiveLayer.style.opacity = '0';
                isTransitioning = false;
                preload(images[(index + 1) % images.length]);
                await finishTransition();
            }, FADE_MS + 60);
        };

        const start = () => {
            if (timer || reducedMotion) return;
            timer = window.setInterval(() => show(index + 1), INTERVAL_MS);
        };

        const stop = () => {
            if (!timer) return;
            window.clearInterval(timer);
            timer = null;
        };

        link.addEventListener('mouseenter', start);
        link.addEventListener('mouseleave', stop);
        link.addEventListener('focusin', start);
        link.addEventListener('focusout', stop);

        return { start, stop };
    };

    const controllers = items
        .map((link) => ({ link, controller: createController(link) }))
        .filter((entry) => entry.controller);

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const match = controllers.find((c) => c.link === entry.target);
                    if (!match) return;

                    if (entry.isIntersecting && entry.intersectionRatio >= 0.6) match.controller.start();
                    else match.controller.stop();
                });
            },
            { threshold: [0, 0.6, 1] }
        );

        controllers.forEach(({ link }) => observer.observe(link));
    } else {
        controllers[0]?.controller.start();
    }
})();
