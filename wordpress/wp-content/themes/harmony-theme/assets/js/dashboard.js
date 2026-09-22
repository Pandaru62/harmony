document.addEventListener('DOMContentLoaded', () => {

    /*
     * =========================
     * Synchronisation
     * =========================
     */

    const syncButton = document.querySelector(
        '.dashboard-sync-button'
    );

    if (syncButton) {

        const buttonText = syncButton.querySelector('span');
        const buttonIcon = syncButton.querySelector('img');

        if (buttonText && buttonIcon) {

            const defaultText = 'Synchronisez';

            syncButton.addEventListener('click', async () => {

                syncButton.disabled = true;
                buttonText.textContent = 'Synchronisation…';
                buttonIcon.classList.add('is-syncing');

                try {

                    const response = await fetch(
                        harmonyDashboard.ajaxUrl,
                        {
                            method: 'POST',
                            headers: {
                                'Content-Type':
                                    'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                action: 'harmony_sync_health',
                                nonce: harmonyDashboard.nonce,
                            }),
                        }
                    );

                    const result = await response.json();

                    if (!result.success) {
                        throw new Error(
                            result.data?.message
                            ?? 'La synchronisation a échoué.'
                        );
                    }

                    buttonIcon.classList.remove('is-syncing');
                    buttonText.textContent = '✓ Synchronisé';

                    setTimeout(() => {
                        window.location.reload();
                    }, 800);

                } catch (error) {

                    console.error(
                        'Erreur de synchronisation :',
                        error
                    );

                    buttonIcon.classList.remove('is-syncing');
                    buttonText.textContent = '⚠ Erreur';

                    setTimeout(() => {
                        buttonText.textContent = defaultText;
                        syncButton.disabled = false;
                    }, 2000);
                }
            });
        }
    }


    /*
     * =========================
     * Modales d'information
     * =========================
     */

    const infoModal = document.getElementById(
        'dashboard-info-modal'
    );

    if (!infoModal) {
        return;
    }

    const infoModalBody = infoModal.querySelector(
        '.dashboard-info-modal__body'
    );

    const infoModalClose = infoModal.querySelector(
        '.dashboard-info-modal__close'
    );

    const infoButtons = document.querySelectorAll(
        '.dashboard-info-button'
    );

    const infoContent = {

        activity: {
            title: 'Votre activité aujourd’hui',

            content: `
                <p>
                    Votre objectif quotidien est de
                    <strong>10 000 pas</strong>.
                </p>

                <p>
                    Votre bracelet suit votre activité tout au long
                    de la journée afin de vous aider à rester actif
                    et à suivre votre progression.
                </p>

                <p>
                    Votre fréquence cardiaque et votre taux
                    d’oxygène dans le sang sont également mesurés
                    pour compléter votre suivi.
                </p>
            `,
        },

        wellbeing: {
            title: 'Votre score de bien-être',

            content: `
                <p>
                    Votre score de bien-être est une indication
                    générale calculée à partir des données collectées
                    par votre bracelet.
                </p>

                <p>
                    Il vous permet de suivre l’évolution de votre
                    bien-être au fil du temps.
                </p>

                <p>
                    <strong>
                        Ce score ne constitue pas un diagnostic médical.
                    </strong>
                </p>
            `,
        },
    };

    infoButtons.forEach(button => {

        button.addEventListener('click', () => {

            const infoType = button.dataset.info;
            const info = infoContent[infoType];

            if (!info) {
                return;
            }

            infoModalBody.innerHTML = `
                <h2>${info.title}</h2>
                ${info.content}
            `;

            infoModal.showModal();
            infoModalClose.focus();
        });
    });

    infoModalClose.addEventListener(
        'click',
        () => {
            infoModal.close();
        }
    );
});