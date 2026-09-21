<?php get_header(); ?>

<main>

<?php
$page_id = get_the_ID();

$hero = [
    'image' => get_field('hero_image', $page_id),
    'title' => get_field('hero_title', $page_id),
    'description' => get_field('hero_description', $page_id),
    'cta_primary_text' => get_field('hero_cta_text', $page_id),
    'cta_primary_url' => get_field('hero_cta_url', $page_id),
    'cta_secondary_text' => get_field('hero_cta_secondary_text', $page_id),
    'cta_secondary_url' => get_field('hero_cta_secondary_url', $page_id),
];

$eco_responsibility = [
    'advantages' => [
        [
            'text' => "Autonomie de la batterie",
            'description' => "Le bracelet Harmony est conçu pour accompagner votre quotidien sans contrainte. Sa batterie offre plusieurs jours d'autonomie, vous permettant de suivre votre activité et votre sommeil sans recharge fréquente.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/tabler_battery-4.svg'
        ],
        [
            'text' => "Résistance à l'eau",
            'description' => "Pensé pour un usage quotidien, Harmony résiste aux éclaboussures et à l'humidité. Vous pouvez le porter lors de vos activités quotidiennes sans avoir à vous soucier des conditions extérieures.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/iconoir_clean-water.svg'
        ],
        [
            'text' => "Matériaux",
            'description' => "Harmony privilégie des matériaux durables et confortables, sélectionnés pour leur qualité et leur impact environnemental limité. Cette approche s'inscrit dans une volonté de concevoir un produit plus responsable et plus respectueux de l'environnement.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mdi_ecology.svg'
        ],
    ],
    'title' => "Un produit conçu pour durer",
    'cta_title' =>"Découvrez Nos produits et Accessoires",
    'cta_url' =>"/category"
];

get_template_part('template-parts/sections/hero', null, $hero);
get_template_part('template-parts/sections/product-modes', null);

get_template_part('template-parts/sections/features-triptical', null);
get_template_part('template-parts/sections/product-app', null);

get_template_part('template-parts/sections/home-eco-responsibility', null, $eco_responsibility);
get_template_part('template-parts/sections/product-customize', null);

get_template_part('template-parts/sections/customer-feedbacks', null);
get_template_part('template-parts/sections/harmony-partners', null);



?>

</main>

<?php get_footer(); ?>
