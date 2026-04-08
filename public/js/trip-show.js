(() => {
    const memorySlider = document.querySelector('[data-memory-slider]');

    if (memorySlider) {
        const slides = Array.from(memorySlider.querySelectorAll('[data-memory-slide]'));
        const dots = Array.from(memorySlider.querySelectorAll('[data-memory-dot]'));
        const next = memorySlider.querySelector('[data-memory-next]');
        const prev = memorySlider.querySelector('[data-memory-prev]');

        let index = 0;

        const render = (newIndex) => {
            if (!slides.length) return;
            index = (newIndex + slides.length) % slides.length;

            slides.forEach((slide, i) => {
                slide.hidden = i !== index;
            });

            dots.forEach((dot, i) => {
                dot.setAttribute('aria-current', i === index ? 'true' : 'false');
            });
        };

        render(0);

        next?.addEventListener('click', () => render(index + 1));
        prev?.addEventListener('click', () => render(index - 1));

        dots.forEach((dot, dotIndex) => {
            dot.addEventListener('click', () => render(dotIndex));
        });
    }
})();
