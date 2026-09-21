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

$lille_section = [
    'lille_image' => get_field('lille_image', $page_id),
    'lille_title' => get_field('lille_title', $page_id),
    'lille_paragraph_1' => get_field('lille_paragraph_1', $page_id),
    'lille_paragraph_2' => get_field('lille_paragraph_2', $page_id),
    'lille_paragraph_3' => get_field('lille_paragraph_3', $page_id)
];

$image_text_section = [
    'image' => get_field('its_image', $page_id),
    'title' => get_field('its_title', $page_id),
    'description' => get_field('its_description', $page_id),
    'cta_text_1' => get_field('its_primary_cta_text', $page_id),
    'cta_url_1' => get_field('its_primary_cta_url', $page_id),
    'cta_text_2' => get_field('its_secondary_cta_text', $page_id),
    'cta_url_2' => get_field('its_secondary_cta_url', $page_id),
];

$features = [
    'title' => "Nos valeurs.",
    'description' => null
];

$its = [
    'title' => "Notre vision d'une technologie plus humaine",
    'description' => "Nous imaginons une technologie plus humaine, plus simple et plus respectueuse. Harmony continuera à évoluer pour accompagner votre bien-être tout en restant fidèle à ces valeurs."
];

$eco = [
    'advantages' => [
        [
            'text' => "Conception locale",
            'description' => "Harmony est imaginé et conçu à Lille par une équipe engagée dans le développement de technologies utiles et accessibles. Cette proximité permet de mieux maîtriser les choix de conception et de privilégier des partenaires locaux lorsque cela est possible.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/tabler_battery-4.svg'
        ],
        [
            'text' => "Production responsable",
            'description' => "Harmony privilégie des processus de fabrication pensés pour limiter l'empreinte environnementale du produit. Les partenaires de production sont sélectionnés avec attention afin de garantir des conditions de fabrication respectueuses et une qualité durable.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/iconoir_clean-water.svg'
        ],
        [
            'text' => "Matériaux durables",
            'description' => "Le bracelet Harmony est conçu avec des matériaux sélectionnés pour leur résistance et leur durabilité. Cette approche vise à prolonger la durée de vie du produit et à limiter le renouvellement fréquent des équipements électroniques.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mdi_ecology.svg'
        ],
    ],
    'title' => "Un produit conçu avec responsabilité",
    'description' =>"De la conception à l'assemblage, Harmony privilégie des choix durables afin de limiter son impact environnemental.",
];

get_template_part('template-parts/sections/hero', null, $hero);
get_template_part('template-parts/sections/lille-section', null, $lille_section);
get_template_part('template-parts/sections/mission-section', null, $image_text_section);
get_template_part('template-parts/sections/features-triptical', null, $features);
get_template_part('template-parts/sections/category-product-for-you', null);
get_template_part('template-parts/sections/image-text-section', null, $its);
get_template_part('template-parts/sections/home-eco-responsibility', null, $eco);
get_template_part('template-parts/sections/harmony-partners', null);

?>

</main>

<?php get_footer(); ?>
