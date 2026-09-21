<?php
function harmony_contact_submit() {
    if (
        ! isset($_POST['harmony_nonce']) ||
        ! wp_verify_nonce(
            $_POST['harmony_nonce'],
            'harmony_contact'
        )
    ) {
        wp_die('Requête invalide.');
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    if (
        empty($name) ||
        empty($email) ||
        empty($message)
    ) {

        wp_redirect(
            add_query_arg(
                'status',
                'error',
                wp_get_referer()
            )
        );

        exit;

    }

    $to = get_option('harmony_email');

    $headers = [
        'Reply-To: ' . $email
    ];

    wp_mail(

        $to,

        $subject,

        $message,

        $headers

    );

    wp_redirect(

        add_query_arg(
            'status',
            'success',
            wp_get_referer()
        )

    );

    exit;

}

add_action(
    'admin_post_nopriv_harmony_contact',
    'harmony_contact_submit'
);

add_action(
    'admin_post_harmony_contact',
    'harmony_contact_submit'
);
