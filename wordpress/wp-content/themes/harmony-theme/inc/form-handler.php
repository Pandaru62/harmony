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

    // Objet de l'email
    $email_subject = ! empty($subject)
        ? $subject
        : 'Nouvelle demande de contact';

    $email_subject = 'Contact Harmony — ' . $email_subject;

    // Date de réception
    $date = wp_date('d/m/Y à H:i');

    // Corps de l'email
    $body = "NOUVEAU MESSAGE DEPUIS LE SITE HARMONY\n";
    $body .= "========================================\n\n";

    $body .= "Vous recevez ce message car un visiteur a utilisé ";
    $body .= "le formulaire de contact du site Harmony.\n\n";

    $body .= "INFORMATIONS DE L'EXPEDITEUR\n";
    $body .= "----------------------------\n";
    $body .= "Nom : {$name}\n";
    $body .= "Email : {$email}\n";
    $body .= "Objet : " . ($subject ?: 'Non renseigné') . "\n";
    $body .= "Date de réception : {$date}\n\n";

    $body .= "MESSAGE\n";
    $body .= "-------\n";
    $body .= "{$message}\n\n";

    $body .= "----------------------------------------\n";
    $body .= "Notification automatique — Site Harmony\n";

    // En-têtes
    $headers = [
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    // Envoi
    $sent = wp_mail(
        $to,
        $email_subject,
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


// Actions WordPress
add_action(
    'admin_post_nopriv_harmony_contact',
    'harmony_contact_submit'
);

add_action(
    'admin_post_harmony_contact',
    'harmony_contact_submit'
);
