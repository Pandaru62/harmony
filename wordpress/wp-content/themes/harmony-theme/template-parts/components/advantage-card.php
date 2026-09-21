<?php
    $title = $args['text'] ?? null;
    $description = $args['description'] ?? null;
    $img_url  = $args['url'] ?? null;
?>

<div class="advantage-card-container">
    <div class="advantage-card-icon">
        <img
            src="<?= esc_url($img_url) ?>"
            alt="Icône"
        />
        <h4><?= esc_html($title) ?></h4>
    </div>
    <div class="advantage-card-description">
        <h4><?= esc_html($title) ?></h4>
        <p>
           <?= esc_html($description) ?>
        </p>
    </div>
</div>
