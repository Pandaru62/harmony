document.addEventListener('DOMContentLoaded', () => {

    const profile = document.querySelector('.header-profile');
    const button = document.querySelector('.user-icon');
    const menu = document.querySelector('.profile-menu');

    if (!profile || !button || !menu) {
        return;
    }

    button.addEventListener('click', () => {

        const isOpen = button.getAttribute('aria-expanded') === 'true';

        button.setAttribute(
            'aria-expanded',
            String(!isOpen)
        );

        menu.hidden = isOpen;

    });


    document.addEventListener('click', (event) => {

        if (!profile.contains(event.target)) {

            button.setAttribute(
                'aria-expanded',
                'false'
            );

            menu.hidden = true;

        }

    });

});