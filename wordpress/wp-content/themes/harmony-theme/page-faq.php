<?php get_header();

$categories = get_terms([
    'taxonomy'   => 'faq_category',
    'hide_empty' => true,
    'orderby'    => 'term_order',
    'order'      => 'ASC'
]);

?>

<main>

    <section class="default-section faq-hero">

        <div class="faq-hero__content">

            <h1>Questions fréquentes</h1>

            <div class="faq-search-wrapper">
                <div class="faq-search">
                    <label for="faq-search" class="sr-only">Rechercher une question</label>
                    <input
                        id="faq-search"
                        type="search"
                        placeholder="Rechercher une question..."
                    >
    
                    <img
                        src="<?= get_template_directory_uri(); ?>/assets/icons/search.svg"
                        alt=""
                    >
                    
                </div>
                <div
                    class="faq-search-results"
                    id="faq-search-results">
                </div>
            </div>

            <nav class="faq-categories-nav">

                <?php foreach ($categories as $category): ?>

                    <a href="#faq-<?= $category->slug ?>">
                        <?= esc_html($category->name); ?>
                    </a>

                <?php endforeach; ?>

            </nav>

        </div>

    </section>

<?php

$green_id = 0;

foreach ($categories as $category) {
    $green_id++;
?>

    <section 
        class="default-section <?= $green_id % 2 == 0 ? '' : 'green-section' ?> faq-category"
        id="faq-<?= esc_attr($category->slug); ?>"
    >
        <h2><?= esc_html($category->name); ?></h2>

        <div class="faq-cards-container">
            <?php
            $questions = get_posts([
                'post_type'      => 'faq',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'tax_query'      => [
                    [
                        'taxonomy' => 'faq_category',
                        'field'    => 'term_id',
                        'terms'    => $category->term_id,
                    ]
                ]
            ]);

            foreach ($questions as $question) {
                get_template_part(
                    'template-parts/components/faq-card',
                    null,
                    [
                        'id'    => $question->ID,
                        'question'   => $question->post_title,
                        'answer' => $question->post_content,
                    ]
                );
            }
            ?>
        </div>

    </section>

    <?php } ?>

    <section class="default-section">
        <div class="div-32">
            <h2>Vous ne trouvez pas votre réponse ?</h2>
            <p>Notre équipe est là pour vous aider.</p>
            <a class="btn btn--primary" href="/contact">
                Contactez l'équipe support
            </a>
        </div>
            
    </section>

</main>

<?php get_footer(); ?>
