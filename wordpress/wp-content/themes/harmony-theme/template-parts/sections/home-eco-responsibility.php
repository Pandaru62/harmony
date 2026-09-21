<?php
    $advantages = $args['advantages'] ?? null;
    $title = $args['title'] ?? "Un produit conçu pour durer";
    $description = $args['description'] ?? null;
    $cta_title = $args['cta_title'] ?? "Découvrez Nos produits et Accessoires";
    $cta_url = $args['cta-url'] ?? "/category"
?>

<section class="default-section green-section">

    <div class="div-32">
        <h2><?= esc_attr($title)?></h2>
         <?php if($description) { ?>
            <p><?= esc_attr($description)?></p>
        <?php } ?>
        <img
            src="/wp-content/themes/harmony-theme/assets/images/bracelet/unboxing.png"
            alt="Packaging Harmony écologique"
            class="eco-responsibility-image"
        />
    </div>
    <div class="advantage-cards-list">
        <?php if($advantages) {
            foreach ($advantages as $advantage) {
                get_template_part('template-parts/components/advantage-card', null, $advantage);
            }
        }
        ?>
    </div>

    <a class="btn btn--primary" href="<?= esc_attr($cta_url)?>">
        <?= esc_attr($cta_title)?>
    </a>


</section>
