
<?php

function harmony_contact_submit() {

    // Vérification du nonce
    if (
        ! isset($_POST['harmony_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['harmony_nonce'])),
            'harmony_contact'
        )
    ) {
        wp_die('Requête invalide.');
    }

    // Récupération et nettoyage des données
    $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $subject = sanitize_text_field(wp_unslash($_POST['subject'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

    // Vérification des champs
    if (
        empty($name) ||
        empty($email) ||
        ! is_email($email) ||
        empty($message)
    ) {
        harmony_contact_redirect('error');
    }

    // Destinataire
    $to = get_option('harmony_email');

    if (empty($to) || ! is_email($to)) {
        error_log('[Harmony] Adresse destinataire invalide.');
        harmony_contact_redirect('error');
    }

    // Construction du message
    $body = "Nom : {$name}\n";
    $body .= "Email : {$email}\n\n";
    $body .= "Message :\n{$message}";

    // En-têtes
    $headers = [
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    // Envoi
    $sent = wp_mail(
        $to,
        $subject ?: 'Nouveau message depuis Harmony',
        $body,
        $headers
    );

    if (!$sent) {
        error_log('[Harmony] Échec de l\'envoi du formulaire de contact.');
        harmony_contact_redirect('error');
    }

    harmony_contact_redirect('success');
}

// Redirection après traitement
function harmony_contact_redirect($status) {

    $referer = wp_get_referer();

    if (!$referer) {
        $referer = home_url('/');
    }

    wp_safe_redirect(
        add_query_arg('status', $status, $referer)
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
