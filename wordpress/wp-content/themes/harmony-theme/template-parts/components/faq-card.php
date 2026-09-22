<?php
    $question = $args['question'] ?? '';
    $answer = $args['answer'] ?? '';
    $id = $args['id'] ?? '';
?>

<div class="faq-card" id="faq-<?= $id ?>">

    <button
        class="faq-toggle"
        data-analytics="faq-toggle"
        data-faq-id="<?= $id ?>"
        type="button"
        aria-expanded="false">

        <span class="faq-question">
            <?= esc_html($question) ?>
        </span>

        <img
            class="faq-arrow"
            src="/wp-content/themes/harmony-theme/assets/icons/mdi_arrow-drop-down.svg"
            alt=""
        >

    </button>

    <div class="faq-content">

        <hr class="faq-divider">

        <div class="faq-body-card">
            <?= apply_filters('the_content', $answer) ?>
        </div>

    </div>

</div>
