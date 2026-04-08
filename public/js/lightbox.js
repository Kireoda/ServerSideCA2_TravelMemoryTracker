(() => {
    const lightbox = document.querySelector('[data-global-lightbox]');
    if (!lightbox) return;

    const triggers = () => Array.from(document.querySelectorAll('[data-lightbox-item]'));
    const image = lightbox.querySelector('[data-lightbox-image]');
    const closeButton = lightbox.querySelector('[data-lightbox-close]');
    const nextButton = lightbox.querySelector('[data-lightbox-next]');
    const prevButton = lightbox.querySelector('[data-lightbox-prev]');
    const counter = lightbox.querySelector('[data-lightbox-counter]');

    let currentIndex = 0;

    const setOpen = (isOpen) => {
        lightbox.hidden = !isOpen;
        lightbox.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
        document.body.classList.toggle('is-modal-open', isOpen);
    };

    const setIndex = (index) => {
        const items = triggers();
        if (!items.length) return;

        currentIndex = (index + items.length) % items.length;
        const full = items[currentIndex].getAttribute('data-full') || items[currentIndex].getAttribute('src');
        const alt =
            items[currentIndex].getAttribute('data-alt') ||
            items[currentIndex].getAttribute('alt') ||
            'Photo';

        if (!full) return;
        image.src = full;
        image.alt = alt;
        if (counter) counter.textContent = `${currentIndex + 1} / ${items.length}`;
    };

    const openFrom = (item) => {
        const items = triggers();
        const index = items.indexOf(item);
        if (index < 0) return;
        setIndex(index);
        setOpen(true);
    };

    const close = () => {
        setOpen(false);
        image.removeAttribute('src');
    };

    document.addEventListener('click', (event) => {
        const target = event.target instanceof Element ? event.target : null;
        const trigger = target?.closest?.('[data-lightbox-item]');
        if (!trigger) return;

        event.preventDefault();
        openFrom(trigger);
    });

    closeButton?.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();
        close();
    });

    nextButton?.addEventListener('click', () => setIndex(currentIndex + 1));
    prevButton?.addEventListener('click', () => setIndex(currentIndex - 1));

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) close();
    });

    window.addEventListener('keydown', (event) => {
        if (lightbox.hidden) return;
        if (event.key === 'Escape') close();
        if (event.key === 'ArrowRight') setIndex(currentIndex + 1);
        if (event.key === 'ArrowLeft') setIndex(currentIndex - 1);
    });

    setOpen(false);
})();

