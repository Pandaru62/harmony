<?php
$title = $args['title'] ?? 'Pourquoi Harmony est fait pour vous ?';
$description = $args['description'] ?? "Notre bracelet connecté s'adapte à votre quotidien et à votre rythme. Les accessoires vous permettent de personnaliser votre expérience selon vos besoins.";
$cards = $args['cards'] ?? null;
$cta_text_1 = $args['cta_primary_text'] ?? null;
$cta_url_1 = $args['cta_primary_url'] ?? null;
$cta_text_2 = $args['cta_secondary_text'] ?? null;
$cta_url_2 = $args['cta_secondary_text'] ?? null;
?>

<section class="default-section green-section">

    <div class="div-32">
        <h2><?= esc_html($title); ?></h2>
        <p class="text-center"><?= nl2br(esc_html($description)); ?></p>
    </div>

    <div class="products-grid">
        <?php foreach ($cards as $card) { ?>
        <div class="product-card">
            <img
                src="<?= $card['image'] ?>"
                alt="Produit"
            />
            <h3><?= $card['title'] ?></h3>
            <p><?= nl2br(esc_html($card['description'])); ?></p>
            <a class="btn btn--primary" href="<?= esc_url($card['cta_url']); ?>">
                <?= nl2br(esc_html($card['cta_title'])); ?>
            </a>
        </div>
        <?php } ?>
    </div>

     <?php if ($cta_text_1 && $cta_url_1): ?>
        <a class="btn btn--primary" href="<?= esc_url($cta_url_1); ?>">
            <?= esc_html($cta_text_1); ?>
        </a>
    <?php endif; ?>

    <?php if ($cta_text_2 && $cta_url_2): ?>
        <a class="btn btn--secondary" href="<?= esc_url($cta_url_2); ?>">
            <?= esc_html($cta_text_2); ?>
        </a>
    <?php endif; ?>

</section>
