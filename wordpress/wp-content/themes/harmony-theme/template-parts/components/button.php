<?php
$text = $args['text'] ?? 'Click here';
$url  = $args['url'] ?? '#';
$style = $args['style'] ?? 'primary';
?>

<a class="btn btn--<?= esc_attr($style); ?>" href="<?= esc_url($url); ?>">
    <?= esc_html($text) ?>
</a>
