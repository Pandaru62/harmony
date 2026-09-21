<?php
$title = $args['title'] ?? null;
?>

<section class="section">
    <div class="container">

        <?php if ($title): ?>
            <h2 class="section__title">
                <?= esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <div class="section__content">
            <?php
            if (!empty($args['content'])) {
                echo $args['content'];
            }
            ?>
        </div>

    </div>
</section>
