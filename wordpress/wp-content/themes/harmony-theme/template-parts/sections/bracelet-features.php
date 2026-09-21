<section class="default-section">
    <div class="div-32">
        <h2>Simple et Précis, <br/> Harmony calcule tout.</h2>
        <p class="text-center">
            Les chiffres, c'est bien, mais les comprendre c'est mieux !<br/>
            Grâce à notre application et à nos bilans hebdomadaires,<br/>
            vous apprendrez à être mieux à l'écoute de votre corps et de vos besoins.
        </p>

        <div class="screen-watch-container">
            <div class="screen-watch">
                <img
                    id="watch-screen"
                    src="/wp-content/themes/harmony-theme/assets/images/bracelet-screen/screen1.png"
                    alt="Écran du bracelet connecté affichant le suivi des pas"
                    class="screen-watch-image"
                />
            </div>
            <div class="screen-watch-description">
                <div class="screen-watch-text swt-1" data-image="1">
                    <div class="screen-watch-text-header">
                        <img
                            src="/wp-content/themes/harmony-theme/assets/icons/mdi_heart-pulse.svg"
                            alt="Icône fréquence cardiaque"
                        />
                        <h5>Votre nombre de pas journalier</h5>
                    </div>
                    <p class="screen-watch-text-content">
                        et votre objectif personnel pour rester en forme.
                    </p>
                </div>
                <div class="screen-watch-text swt-2" data-image="2">
                    <div class="screen-watch-text-header swth-2">
                        <img
                            src="/wp-content/themes/harmony-theme/assets/icons/mdi_heart-pulse.svg"
                            alt="Icône fréquence cardiaque"
                        />
                        <h5>Votre nombre de calories brûlées</h5>
                    </div>
                    <p class="screen-watch-text-content">
                        et des conseils pour adapter votre alimentation.
                    </p>
                </div>
                <div class="screen-watch-text swt-3" data-image="3">
                    <div class="screen-watch-text-header swth-2">
                        <img
                            src="/wp-content/themes/harmony-theme/assets/icons/mdi_heart-pulse.svg"
                            alt="Icône fréquence cardiaque"
                        />
                        <h5>Votre fréquence cardiaque</h5>
                    </div>
                    <p class="screen-watch-text-content">
                        avec des alertes douces en cas d'irrégularités.
                    </p>
                </div>
                <div class="screen-watch-text swt-4" data-image="4">
                    <div class="screen-watch-text-header">
                        <img
                            src="/wp-content/themes/harmony-theme/assets/icons/mdi_heart-pulse.svg"
                            alt="Icône fréquence cardiaque"
                        />
                        <h5>Votre taux d'oxygène dans le sang</h5>
                    </div>
                    <p class="screen-watch-text-content">
                        pour vous aider à mieux comprendre votre respiration.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
    get_template_part('template-parts/components/image-triptical', null, ['hasDescription' => true]);
    ?>

    <a class="btn btn--primary" href="/well-being">
        Découvrez notre section Bien-être
    </a>

</section>
