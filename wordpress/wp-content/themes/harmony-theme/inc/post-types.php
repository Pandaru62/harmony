<?php
function harmony_register_faq_post_type()
{
    register_post_type('faq', [

        'labels' => [
            'name' => 'FAQs',
            'singular_name' => 'FAQ'
        ],

        'public' => true,

        'show_in_rest' => true,

        'menu_icon' => 'dashicons-editor-help',

        'supports' => [
            'title',
            'editor',
            'page-attributes'
        ],

        'has_archive' => false,

        'rewrite' => [
            'slug' => 'faq'
        ]

    ]);
}

add_action('init', 'harmony_register_faq_post_type');

function harmony_register_faq_taxonomy()
{
    register_taxonomy(

        'faq_category',

        'faq',

        [

            'hierarchical' => true,

            'labels' => [
                'name' => 'FAQ Categories'
            ],

            'show_in_rest' => true

        ]

    );
}

add_action('init', 'harmony_register_faq_taxonomy');

function harmony_add_faq_meta_box() {

    add_meta_box(
        'faq_featured',
        'FAQ Settings',
        'harmony_faq_featured_callback',
        'faq',
        'side'
    );

}

add_action(
    'add_meta_boxes',
    'harmony_add_faq_meta_box'
);

function harmony_faq_featured_callback($post) {

    $value = get_post_meta(
        $post->ID,
        '_faq_featured',
        true
    );

    ?>

    <label>

        <input
            type="checkbox"
            name="faq_featured"
            value="1"
            <?= checked($value, '1', false); ?>
        >

        ⭐ Featured FAQ

    </label>

    <?php
}

function harmony_save_faq_featured($post_id) {


    if(isset($_POST['faq_featured'])) {

        update_post_meta(
            $post_id,
            '_faq_featured',
            '1'
        );

    }
    else {

        delete_post_meta(
            $post_id,
            '_faq_featured'
        );

    }

}

add_action(
    'save_post_faq',
    'harmony_save_faq_featured'
);

/* AVIS CLIENTS */
function harmony_register_testimonials_post_type()
{
    register_post_type('testimonials', [

        'labels' => [
            'name' => 'Avis Clients',
            'singular_name' => 'Avis Client'
        ],

        'public' => true,

        'show_in_rest' => true,

        'menu_icon' => 'dashicons-editor-help',

        'supports' => [
            'title',
            'editor',
            'page-attributes'
        ],

        'has_archive' => false,

        'rewrite' => [
            'slug' => 'testimonials'
        ]

    ]);
}

add_action('init', 'harmony_register_testimonials_post_type');

function harmony_add_testimonials_meta_box() {

    add_meta_box(
        'testimonials_featured',
        'Paramètres Avis Clients',
        'harmony_testimonials_featured_callback',
        'testimonials',
        'side'
    );

    add_meta_box(
        'testimonials_rating',
        'Note',
        'harmony_testimonials_rating_callback',
        'testimonials',
        'side'
    );

}

add_action(
    'add_meta_boxes',
    'harmony_add_testimonials_meta_box'
    );
    
add_action(
    'save_post_testimonials',
    'harmony_save_testimonials_rating'
);

function harmony_testimonials_featured_callback($post) {

    $value = get_post_meta(
        $post->ID,
        '_testimonials_featured',
        true
    );

    ?>

    <label>

        <input
            type="checkbox"
            name="testimonials_featured"
            value="1"
            <?= checked($value, '1', false); ?>
        >

        ⭐ Avis Client mis en avant

    </label>

    <?php
}

function harmony_save_testimonials_featured($post_id) {


    if(isset($_POST['testimonials_featured'])) {

        update_post_meta(
            $post_id,
            '_testimonials_featured',
            '1'
        );

    }
    else {

        delete_post_meta(
            $post_id,
            '_testimonials_featured'
        );

    }

}

add_action(
    'save_post_testimonials',
    'harmony_save_testimonials_featured'
);


function harmony_testimonials_rating_callback($post) {

    $value = get_post_meta(
        $post->ID,
        '_testimonials_rating',
        true
    );

    ?>

    <label>

        Note sur 5

        <input
            type="number"
            name="testimonials_rating"
            value="<?= esc_attr($value ?: 5); ?>"
            max="5"
            min="1"
        />

    </label>

    <?php
}

function harmony_save_testimonials_rating($post_id) {


    if(isset($_POST['testimonials_rating'])) {

        update_post_meta(
            $post_id,
            '_testimonials_rating',
            intval($_POST['testimonials_rating'])
        );

    }
    else {

        delete_post_meta(
            $post_id,
            '_testimonials_rating'
        );

    }

}

