<?php
$image = $args['lille_image'] ?? '';
$title = $args['lille_title'] ?? '';
$paragraph_1 = $args['lille_paragraph_1'] ?? '';
$paragraph_2 = $args['lille_paragraph_2'] ?? '';
$paragraph_3 = $args['lille_paragraph_3'] ?? '';
?>

<section class="default-section">
    <div class="lille-container">
        <img
            src="/wp-content/themes/harmony-theme/assets/images/component/triptical/triptical-3.png"
            alt="Vue de Lille, grand place"
            class="lille-img"
        />
        <div class="lille-text-zone">
            <h2>
                <?= esc_html($title); ?>
            </h2>
            <p>
                <?= nl2br(esc_html($paragraph_1)); ?>
            </p>
            <img
                src="/wp-content/themes/harmony-theme/assets/images/logo/Logo_fr_flag.svg"
                alt="Logo harmony sur fond de drapeau français"
            />
            <p>
                <?= nl2br(esc_html($paragraph_2)); ?>
            </p>
            <p>
                <?= nl2br(esc_html($paragraph_3)); ?>
            </p>
        </div>
    </div>

</section>
