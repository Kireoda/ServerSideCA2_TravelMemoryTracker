(() => {
    const root = document.querySelector('[data-carousel]');
    if (!root) return;

    const track = root.querySelector('[data-carousel-track]');
    const prev = root.querySelector('[data-carousel-prev]');
    const next = root.querySelector('[data-carousel-next]');

    if (!track || !prev || !next) return;

    const update = () => {
        const maxScroll = track.scrollWidth - track.clientWidth;
        prev.disabled = track.scrollLeft <= 1;
        next.disabled = track.scrollLeft >= maxScroll - 1;
    };

    const scrollByAmount = (direction) => {
        const step = track.clientWidth;
        track.scrollBy({ left: direction * step, behavior: 'smooth' });
    };

    prev.addEventListener('click', () => scrollByAmount(-1));
    next.addEventListener('click', () => scrollByAmount(1));

    track.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);

    track.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight') {
            event.preventDefault();
            scrollByAmount(1);
        }
        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            scrollByAmount(-1);
        }
    });

    update();
})();
