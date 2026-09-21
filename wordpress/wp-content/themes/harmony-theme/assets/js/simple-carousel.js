const carousel = document.querySelector('.customer-feedbacks-list');

if (carousel) {

    const cards = carousel.querySelectorAll('.customer-feedback-card');
    const dots = document.querySelectorAll('.carousel-dots button');

    carousel.addEventListener('scroll', () => {

        const index = Math.round(
            carousel.scrollLeft /
            cards[0].offsetWidth
        );

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });

    });

    dots.forEach((dot, index) => {

        dot.addEventListener('click', () => {

            cards[index].scrollIntoView({
                behavior: 'smooth',
                inline: 'center'
            });

        });

    });

}