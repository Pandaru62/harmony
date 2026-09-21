document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('buy-modal');
    const openButton = document.querySelector('.header-buy-button');
    const closeButton = document.querySelector('.buy-modal__close');
    const overlay = document.querySelector('.buy-modal__overlay');

    if (!modal || !openButton || !closeButton || !overlay) {
        return;
    }

    const openModal = () => {
        modal.hidden = false;
        document.body.classList.add('modal-open');

        closeButton.focus();
    };

    const closeModal = () => {
        modal.hidden = true;
        document.body.classList.remove('modal-open');

        openButton.focus();
    };

    openButton.addEventListener('click', openModal);

    closeButton.addEventListener('click', closeModal);

    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (event) => {

        if (event.key === 'Escape' && !modal.hidden) {
            closeModal();
        }

    });

});