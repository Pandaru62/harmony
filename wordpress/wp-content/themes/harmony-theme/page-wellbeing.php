<?php get_header(); ?>

<main>

<?php
$page_id = get_the_ID();

$sec_1 = [...get_field('sec_1', $page_id), 'is_green' => false, 'has_2_cols' => true];
$sec_2 = [...get_field('sec_2', $page_id), 'is_green' => true, 'has_2_cols' => false];
$sec_3 = [...get_field('sec_3', $page_id), 'is_green' => false, 'has_2_cols' => false];

$hero = [
    'image' => get_field('hero_image', $page_id),
    'title' => get_field('hero_title', $page_id),
    'description' => get_field('hero_description', $page_id),
    'cta_primary_text' => get_field('hero_cta_text', $page_id),
    'cta_primary_url' => get_field('hero_cta_url', $page_id),
    'cta_secondary_text' => get_field('hero_cta_secondary_text', $page_id),
    'cta_secondary_url' => get_field('hero_cta_secondary_url', $page_id),
];

$eco = [
    'advantages' => [
        [
            'text' => "Suivi du sommeil",
            'description' => "Analysez vos cycles de sommeil et comprenez la qualité de vos nuits.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/icon-park-solid_sleep.svg'
        ],
        [
            'text' => "Indicateurs de stress",
            'description' => "Observez les variations de votre niveau de stress au fil de la journée.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/mingcute_zazen-fill.svg'
        ],
        [
            'text' => "Activité quotidienne",
            'description' => "Suivez vos pas et votre niveau d'activité pour rester en mouvement.",
            'url' => '/wp-content/themes/harmony-theme/assets/icons/hugeicons_activity-04.svg'
        ],
    ],
    'title' => "Comment Harmony vous accompagne au quotidien",
];

$explain_section_path = 'template-parts/sections/explain-section';

get_template_part('template-parts/sections/hero', null, $hero);
get_template_part($explain_section_path, null, $sec_1);
get_template_part($explain_section_path, null, $sec_2);
get_template_part($explain_section_path, null, $sec_3);
get_template_part('template-parts/sections/home-eco-responsibility', null, $eco);
get_template_part('template-parts/sections/harmony-partners', null);

?>

</main>

<?php get_footer(); ?>
