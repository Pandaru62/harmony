document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('buy-modal');
    const openButtons = document.querySelectorAll('.buy-modal-trigger');
    const closeButton = document.querySelector('.buy-modal__close');
    const overlay = document.querySelector('.buy-modal__overlay');

    if (!modal || !openButtons.length || !closeButton || !overlay) {
        return;
    }

    const openModal = (button) => {
        modal.hidden = false;
        document.body.classList.add('modal-open');

        closeButton.focus();
    };

    const closeModal = () => {
        modal.hidden = true;
        document.body.classList.remove('modal-open');

        // Replacer le focus sur le bouton qui avait ouvert le modal
        if (currentOpenButton) {
            currentOpenButton.focus();
        }
    };

    let currentOpenButton = null;

    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentOpenButton = button;
            openModal(button);
        });
    });

    closeButton.addEventListener('click', closeModal);

    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (event) => {

        if (event.key === 'Escape' && !modal.hidden) {
            closeModal();
        }

    });

});