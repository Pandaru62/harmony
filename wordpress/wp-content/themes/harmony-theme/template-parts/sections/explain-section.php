<?php
    $is_green = $args['is_green'] ?? false;
    $has_2_cols = $args['has_2_cols'] ?? false;
    $image = $args['image'] ?? false;
    $title = $args['title'] ?? "Un produit conçu pour durer";
    $paragraph_1 = $args['paragraph_1'] ?? null;
    $paragraph_2 = $args['paragraph_2'] ?? null;
    $cards = [
        [
            'title' =>  $args['card_1_title'] ?? null,
            'description' =>  $args['card_1_description'] ?? null,
        ],
        [
            'title' =>  $args['card_2_title'] ?? null,
            'description' =>  $args['card_2_description'] ?? null,
        ],
        [
            'title' =>  $args['card_3_title'] ?? null,
            'description' =>  $args['card_3_description'] ?? null,
        ]
    ];
?>
<section class="default-section  <?= $has_2_cols ? 'cols-2' : '' ?> explain-section <?= $is_green ? "green-section" : "" ?>">
    <img
        src="<?= esc_url($image['url']); ?>"
        alt="<?= esc_attr($image['alt']) ?>"
    />
    <div class="div-32">
        <h2><?= esc_html($title)?></h2>
         <?php if($paragraph_1) { ?>
            <p><?= esc_html($paragraph_1)?></p>
        <?php } ?>
         <?php if($paragraph_2) { ?>
            <p><?= esc_html($paragraph_2)?></p>
        <?php } ?>
    </div>
    <div class="explain-cards-list">
        <?php foreach ($cards as $card):
            if($card['description'] && $card['title']): ?>
                <div class="explain-card">
                    <h4>
                        <?= esc_html($card['title'])?>
                    </h4>
                    <p>
                        <?= esc_html($card['description'])?>
                    </p>
                </div>
        <?php
            endif;
        endforeach; 
        ?>
    </div>
</section>
