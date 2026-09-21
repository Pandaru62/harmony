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

$section1 = [
    'image' => get_field('its_image', $page_id),
    'title' => get_field('its_title', $page_id),
    'description' => get_field('its_description', $page_id),
    'cta_text_1' => get_field('its_primary_cta_text', $page_id),
    'cta_url_1' => get_field('its_primary_cta_url', $page_id),
    'cta_text_2' => get_field('its_secondary_cta_text', $page_id),
    'cta_url_2' => get_field('its_secondary_cta_url', $page_id),
];

$section_why = [
    'title' => get_field('why_title', $page_id),
    'description' => get_field('why_description', $page_id),
    'cards' => [
        'card1' => get_field('why_card1', $page_id),
        'card2' => get_field('why_card2', $page_id),
        'card3' => get_field('why_card3', $page_id),
        'card4' => get_field('why_card4', $page_id),
    ],
    'cta_primary_text' => get_field('why_primary_cta_text', $page_id),
    'cta_primary_url' => get_field('why_primary_cta_url', $page_id),
    'cta_secondary_text' => get_field('why_secondary_cta_text', $page_id),
    'cta_secondary_url' => get_field('why_secondary_cta_url', $page_id),
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

get_template_part('template-parts/sections/image-text-section', null, $section1);
get_template_part('template-parts/sections/category-why-harmony', null, $section_why);

get_template_part('template-parts/sections/features-triptical', null);
get_template_part('template-parts/sections/category-product-for-you', null);

get_template_part('template-parts/sections/customer-feedbacks', null);
get_template_part('template-parts/sections/harmony-partners', null);

?>

</main>

<?php get_footer(); ?>
