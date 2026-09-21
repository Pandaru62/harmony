<?php
$image = $args['image'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cta_primary_text = $args['cta_primary_text'] ?? '';
$cta_primary_url = $args['cta_primary_url'] ?? '';
$cta_secondary_text = $args['cta_secondary_text'] ?? '';
$cta_secondary_url = $args['cta_secondary_url'] ?? '';
?>

<section class="hero">

    <?php if ($image): ?>
        <div class="hero__image">

            <img
                src="<?= esc_url($image['url']); ?>"
                alt="<?= esc_attr($image['alt']); ?>"
            />

        </div>
    <?php endif; ?>

    <div class="hero__content flex-center">

        <?php if ($title): ?>
            <h1>
                <?= esc_html($title); ?>
            </h1>
        <?php endif; ?>

        <?php if ($description): ?>
            <p class="text-center">
                <?= nl2br(esc_html($description)); ?>
            </p>
        <?php endif; ?>

        <div class="hero__actions">

            <?php if ($cta_primary_text && $cta_primary_url): ?>
                <a class="btn btn--primary" href="<?= esc_url($cta_primary_url); ?>">
                    <?= esc_html($cta_primary_text); ?>
                </a>
            <?php endif; ?>

            <?php if ($cta_secondary_text && $cta_secondary_url): ?>
                <a class="btn btn--secondary" href="<?= esc_url($cta_secondary_url); ?>">
                    <?= esc_html($cta_secondary_text); ?>
                </a>
            <?php endif; ?>

        </div>

    </div>

</section>
