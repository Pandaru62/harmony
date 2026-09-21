<?php
$image = $args['image'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cta_text_1 = $args['cta_text_1'] ?? '';
$cta_url_1 = $args['cta_url_1'] ?? '';
$cta_text_2 = $args['cta_text_2'] ?? '';
$cta_url_2 = $args['cta_url_2'] ?? '';
?>

<section class="default-section">

    <?php if ($image): ?>
    <img
        src="<?= esc_url($image['url']); ?>"
        alt="<?= esc_attr($image['alt']); ?>"
        class="its-image"
    />
    <?php endif; ?>

    <div class="div-32">

        <?php if ($title): ?>
            <h2>
                <?= $title; ?>
            </h2>
        <?php endif; ?>

        <?php if ($description): ?>
            <p class="flex-center">
                <?= $description; ?>
            </p>
        <?php endif; ?>

        <div>

            <?php if ($cta_text_1 && $cta_url_1): ?>
                <a class="btn btn--primary" href="<?= esc_url($cta_url_1); ?>">
                    <?= esc_html($cta_text_1); ?>
                </a>
            <?php endif; ?>
            <?php if ($cta_text_2 && $cta_url_2): ?>
                <a class="cta-secondary" href="<?= esc_url($cta_url_2); ?>">
                    <?= esc_html($cta_text_2); ?>
                </a>
            <?php endif; ?>

        </div>

    </div>

</section>
