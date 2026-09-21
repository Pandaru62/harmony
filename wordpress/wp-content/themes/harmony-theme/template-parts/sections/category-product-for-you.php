<?php
$harmony_android_url  = get_option('harmony_android_url');
$ios_url = get_option('harmony_ios_url');
?>

<section class="default-section">

    <div class="div-32">
        <h2>Quel produit Harmony <br/> est fait pour vous.</h2>
        <p>Notre bracelet connecté s'adapte à votre quotidien et à votre rythme.<br/> Les accessoires vous permettent de personnaliser votre expérience selon vos besoins.</p>
    </div>

    <div class="advantage-cards-list">
        <?php
        $advantages = [
            [
                'text' => 'Fabrication Française',
                'description' => "L'application Harmony a été conçue pour offrir une lecture simple et immédiate de vos données. Son interface épurée met en avant les informations essentielles afin de vous aider à comprendre rapidement votre activité, votre sommeil et votre équilibre quotidien.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/mdi_ecology.svg'
            ],
            [
                'text' => 'Données Sécurisées',
                'description' => "Les données collectées par Harmony sont hébergées sur des serveurs situés en Europe, dans le respect des normes de protection des données et RGPD. Nous garantissons une gestion transparente et sécurisée de vos informations personnelles.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/icon-server.svg'
            ],
            [
                'text' => 'Garantie 2 Ans',
                'description' => "Harmony fonctionne avec les principaux systèmes mobiles afin de s'intégrer facilement dans votre quotidien. L'application est disponible sur iOS et Android et permet de synchroniser vos données en quelques instants.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/mdi_super-chat-for-good.svg'
            ],
            [
                'text' => 'Livraison chez nos partenaires',
                'description' => "Harmony fait confiance à des revendeurs de confiance comme Decathlon, Cultura et la Fnac. Vous pouvez aussi tester le produit dans des salles de gym partenaires grâce à nos événements collaboratifs.",
                'url' => '/wp-content/themes/harmony-theme/assets/icons/carbon_delivery-parcel.svg'
            ]
        ];

        foreach ($advantages as $advantage) {
            get_template_part('template-parts/components/advantage-card', null, $advantage);
        }
        ?>
    </div>

    <a class="btn btn--primary" href="/product">
        Découvrez le bracelet Harmony
    </a>

</section>
