
(() => {
    const TEST_ID = 'home_hero_cta';
    const STORAGE_KEY = 'harmony_ab_home_hero_cta_v1';

    const cta = document.querySelector(
        `[data-ab-test="${TEST_ID}"]`
    );

    if (!cta) return;

    const params = new URLSearchParams(window.location.search);
    const forcedVariant = params.get('ab_variant');

    // Attribution persistante uniquement si le stockage
    // a été autorisé par la gestion du consentement.
    // À raccorder à la CMP avant activation en production.
    const storageAllowed = false;

    let variant = null;

    if (forcedVariant === 'A' || forcedVariant === 'B') {
        variant = forcedVariant;
    } else {
        if (storageAllowed) {
            try {
                const saved = localStorage.getItem(STORAGE_KEY);

                if (saved === 'A' || saved === 'B') {
                    variant = saved;
                }
            } catch (error) {
                // Le stockage peut être indisponible.
            }
        }

        if (!variant) {
            variant = Math.random() < 0.5 ? 'A' : 'B';

            if (storageAllowed) {
                try {
                    localStorage.setItem(STORAGE_KEY, variant);
                } catch (error) {
                    // Continuer sans stockage.
                }
            }
        }
    }

    const text = variant === 'A'
        ? cta.dataset.abVariantA
        : cta.dataset.abVariantB;

    cta.textContent = text;
    cta.dataset.abVariant = variant;

    // Événements préparés pour Google Tag Manager.
    // Le déclenchement effectif du suivi devra respecter
    // le consentement analytique.
    window.dataLayer = window.dataLayer || [];

    const isDebug = forcedVariant === 'A' || forcedVariant === 'B';

    window.dataLayer.push({
        event: 'ab_test_exposure',
        test_id: TEST_ID,
        variant: variant,
        ab_debug: isDebug
    });

    cta.addEventListener('click', () => {
        window.dataLayer.push({
            event: 'hero_cta_click',
            test_id: TEST_ID,
            variant: variant,
            ab_debug: isDebug
        });
    });

    if (isDebug) {
        console.info('[Harmony A/B Test]', {
            test: TEST_ID,
            variant: variant,
            text: text
        });
    }
})();
