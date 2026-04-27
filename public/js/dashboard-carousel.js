(() => {
    const root = document.querySelector('[data-carousel]');
    if (!root) return;

    const fullscreenButton = root.querySelector('[data-carousel-fullscreen]');
    const frame = root.querySelector('[data-carousel-track]');

    if (!fullscreenButton || !frame) return;

    const isFullscreenActive = () =>
        document.fullscreenElement === root || root.classList.contains('is-fullscreen');

    const syncUi = () => {
        const active = isFullscreenActive();
        root.classList.toggle('is-fullscreen', active);

        fullscreenButton.textContent = active ? '×' : '⛶';
        fullscreenButton.setAttribute(
            'aria-label',
            active ? 'Exit picture frame fullscreen' : 'Enter picture frame fullscreen'
        );
        fullscreenButton.setAttribute('aria-pressed', active ? 'true' : 'false');
    };

    fullscreenButton.addEventListener('click', async () => {
        if (document.fullscreenEnabled && root.requestFullscreen) {
            if (document.fullscreenElement === root) {
                await document.exitFullscreen?.();
            } else {
                await root.requestFullscreen();
            }
            return;
        }

        root.classList.toggle('is-fullscreen');
        syncUi();
    });

    document.addEventListener('fullscreenchange', syncUi);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && root.classList.contains('is-fullscreen') && !document.fullscreenElement) {
            root.classList.remove('is-fullscreen');
            syncUi();
        }
    });

    syncUi();
})();
