<?php
$harmony_android_url  = get_option('harmony_android_url');
$ios_url = get_option('harmony_ios_url');
?>

<section class="default-section">

    <div class="div-32">
        <h2>Une application claire et intuitive.</h2>
    </div>

    <?php
    get_template_part('template-parts/components/image-triptical', null, [false]);
    ?>

    <div class="advantage-cards-list">
        <?php
        $advantages = [
            [
                'text' => 'Interface Minimaliste',
                'description' => "L'application Harmony a été conçue pour offrir une lecture simple et immédiate de vos données. Son interface épurée met en avant les informations essentielles afin de vous aider à comprendre rapidement votre activité, votre sommeil et votre équilibre quotidien.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/fluent-app-foldet.svg'
            ],
            [
                'text' => 'Données hébergées en Europe',
                'description' => "Les données collectées par Harmony sont hébergées sur des serveurs situés en Europe, dans le respect des normes de protection des données et du RGPD. Cette approche garantit une gestion transparente et sécurisée de vos informations personnelles.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/icon-server.svg'
            ],
            [
                'text' => 'Compatible avec iOS et Android',
                'description' => "Harmony fonctionne avec les principaux systèmes mobiles afin de s'intégrer facilement dans votre quotidien. L'application est disponible sur iOS et Android et permet de synchroniser vos données en quelques instants.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/fluent_phone.svg'
            ],
        ];

        foreach ($advantages as $advantage) {
            get_template_part('template-parts/components/advantage-card', null, $advantage);
        }
        ?>
    </div>

    <div class="flex">
        <button>
            <img class="app-cta" src="/wp-content/themes/harmony-theme/assets/images/partners/google_play.png" alt="Download on Google Play">
        </button>
        <button>
            <img class="app-cta"  src="/wp-content/themes/harmony-theme/assets/images/partners/app_store.png" alt="Download on App Store">
        </button>
    </div>
    <a class="cta-secondary" href="/how">
        Comment ça fonctionne ?
    </a>

</section>
