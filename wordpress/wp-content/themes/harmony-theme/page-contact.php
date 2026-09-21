<?php
$harmony_email   = get_option('harmony_email');
$harmony_address   = get_option('harmony_address');
$harmony_phone   = get_option('harmony_phone');
$harmony_email_msg   = get_option('harmony_email_msg');
$harmony_phone_msg   = get_option('harmony_phone_msg');
$form_id = get_option('harmony_contact_form_id');

$facebook_url  = get_option('harmony_facebook_url');
$instagram_url = get_option('harmony_instagram_url');
$linkedin_url  = get_option('harmony_linkedin_url');
$youtube_url   = get_option('harmony_youtube_url');

get_header(); ?>

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
    
    get_template_part('template-parts/sections/hero', null, $hero);
    
    ?>

    <section
        class="default-section green-section"
    >
        <h2>Questions fréquentes</h2>

        <div class="faq-cards-container">
            <?php
            $questions = get_posts([
                'post_type'      => 'faq',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'meta_query' => [
                    [
                        'key' => '_faq_featured',
                        'value' => '1'
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

    <section class="default-section">
        <div class="div-32">
            <h2>Formulaire de contact</h2>
            <p class="contact-para">
                Vous n'avez pas de réponses à vos questions ? Pas de soucis !<br/>
                Notre équipe se tient à votre disposition.
            </p>
        </div>

        <?php
            get_template_part('template-parts/components/contact-form', null);
        ?>
            
    </section>

    <section class="default-section contact-container">
        <img
            src="/wp-content/themes/harmony-theme/assets/images/logo/Logo_black.svg"
            alt="Logo Harmony"
            height="66"
        />
        <div class="contact-row">
            <h3>Email</h3>
            <p class="contact-para"><?= nl2br(esc_html($harmony_email_msg)); ?></p>
            <a class="cta-secondary" href="<?php echo esc_attr($harmony_email) ?>"><?php echo esc_attr($harmony_email) ?></a>
        </div>
        <div class="contact-row">
            <h3>Adresse</h3>
            <p class="contact-para"><?php echo esc_attr($harmony_address) ?></p>
        </div>
        <div class="contact-row">
            <h3>Téléphone</h3>
            <p class="contact-para"><?= nl2br(esc_html($harmony_phone_msg)); ?></p>
            <p class="contact-para"><?php echo esc_attr($harmony_phone) ?></p>
        </div>
        <div class="contact-row">
            <h3>Réseaux sociaux</h3>
            <p class="contact-para">Suivez notre actualité et nos conseils bien-être</p>
            <div class="social-media">
                <?php if ($facebook_url): ?>
                    <a href="<?= esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                        <img src="/wp-content/themes/harmony-theme/assets/icons/gg_facebook.svg" alt="Facebook">
                    </a>
                <?php endif; ?>
                <?php if ($instagram_url): ?>
                    <a href="<?= esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                        <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_instagram.svg" alt="Instagram">
                    </a>
                <?php endif; ?>
                <?php if ($linkedin_url): ?>
                    <a href="<?= esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                        <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_linkedin.svg" alt="LinkedIn">
                    </a>
                <?php endif; ?>
                <?php if ($youtube_url): ?>
                    <a href="<?= esc_url($youtube_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                        <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_youtube.svg" alt="YouTube">
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <a class="btn btn--primary" href="/category">
            Découvrez nos produits
        </a>
            
    </section>

</main>

<?php get_footer(); ?>
