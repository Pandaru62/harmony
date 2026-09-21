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

$eco_responsibility = [
    'advantages' => [
        [
            'text' => 'Réparable',
            'description' => "L'écran du bracelet peut être remplacé en cas de besoin, prolongeant ainsi la durée de vie du produit sans devoir le remplacer entièrement.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mingcute_tool-fill.svg'
        ],
        [
            'text' => 'Personnalisable',
            'description' => "Les bracelets sont interchangeables pour s'adapter à vos envies et à votre quotidien, sans changer de produit. Chargeur, bracelets ou accessoires : vous pouvez remplacer uniquement les éléments nécessaires, sans surconsommer.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mingcute_plugin-2-fill.svg'
        ],
        [
            'text' => 'Garantie 2 ans',
            'description' => "Harmony est garanti 2 ans et conçu pour accompagner votre quotidien sur le long terme.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mdi_customer-service.svg'
        ],
    ],
    'title' => "Un produit conçu pour durer",
    'cta_title' =>"Découvrez Nos produits et Accessoires",
    'cta_url' =>"/category"
];

$features = [
    'title' => "Un bracelet connecté simple et précis.",
    'description' => "Les chiffres, c'est bien, mais les comprendre c'est mieux !<br/>
            Grâce à notre application et à nos bilans hebdomadaires, vous apprendrez à être mieux à l'écoute de votre corps et de vos besoins."
];

get_template_part('template-parts/sections/hero', null, $hero);
get_template_part('template-parts/sections/image-text-section', null, $section1);
get_template_part('template-parts/sections/home-differentiation', null);
get_template_part('template-parts/sections/bracelet-features', null, $features);
get_template_part('template-parts/sections/home-eco-responsibility', null, $eco_responsibility);
get_template_part('template-parts/sections/customer-feedbacks', null);
get_template_part('template-parts/sections/harmony-partners', null);


?>

</main>

<?php get_footer(); ?>
