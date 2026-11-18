<?php
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/settings.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/form-handler.php';
require_once get_template_directory() . '/inc/harmony-api.php';
require_once get_template_directory() . '/inc/dashboard-handler.php';

function harmonyThemeSetup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

register_nav_menus([
    'primary' => 'Primary Navigation',
    'footer-navigation' => 'Footer Navigation',
    'footer-support'    => 'Footer Support',
    'footer-legal'      => 'Footer Legal',
]);
    
}

add_action('after_setup_theme', 'harmonyThemeSetup');

function harmonyThemeAssets() {

    $theme = get_template_directory_uri();
    $path  = get_template_directory();
    
    wp_enqueue_style(
        'harmony-variables',
        $theme . '/assets/css/variables.css'
    );

    wp_enqueue_style(
        'harmony-base',
        $theme . '/assets/css/base.css',
        ['harmony-variables']
    );

    wp_enqueue_style(
        'harmony-layout',
        $theme . '/assets/css/layout.css',
        ['harmony-base']
    );

    wp_enqueue_style(
        'harmony-components',
        $theme . '/assets/css/components.css',
        ['harmony-layout']
    );

    wp_enqueue_style(
        'harmony-header',
        $theme . '/assets/css/header.css',
        ['harmony-layout']
    );

    wp_enqueue_style(
        'harmony-footer',
        $theme . '/assets/css/footer.css',
        ['harmony-layout']
    );

    wp_enqueue_style(
        'harmony-section',
        $theme . '/assets/css/section.css',
        ['harmony-layout']
    );

    wp_enqueue_style(
        'harmony-form',
        $theme . '/assets/css/form.css',
        ['harmony-layout']
    );

    wp_enqueue_style(
        'harmony-fonts',
        $theme . '/assets/css/fonts.css'
    );

    wp_enqueue_style(
        'harmony-dashboard',
        $theme . '/assets/css/dashboard.css'
    );

    wp_enqueue_style(
        'harmony-modal',
        $theme . '/assets/css/modal.css'
    );

    wp_enqueue_script(
        'harmony-navigation',
        $theme . '/assets/js/navigation.js',
        [],
        filemtime($path . '/assets/js/navigation.js'),
        true
    );


    if (is_front_page()) {
        wp_enqueue_script(
            'harmony-ab-testing',
            $theme . '/assets/js/ab-testing.js',
            [],
            filemtime($path . '/assets/js/ab-testing.js'),
            false
        );

        wp_script_add_data(
            'harmony-ab-testing',
            'strategy',
            'defer'
        );
    }


    wp_enqueue_script(
        'harmony-component',
        $theme . '/assets/js/component.js',
        [],
        filemtime($path . '/assets/js/component.js'),
        true
    );

    if (is_page('product')) {
        wp_enqueue_script(
            'harmony-carousel',
            $theme . '/assets/js/carousel.js',
            [],
            filemtime($path . '/assets/js/carousel.js'),
            true
        );
    }

    if (is_page('faq')) {
        wp_enqueue_script(
            'harmony-faq',
            $theme . '/assets/js/faq-search.js',
            [],
            filemtime($path . '/assets/js/faq-search.js'),
            true
        );
    }

    wp_enqueue_script(
        'simple-carousel',
        $theme . '/assets/js/simple-carousel.js',
        [],
        filemtime($path . '/assets/js/simple-carousel.js'),
        true
    );

    wp_enqueue_script(
        'buy-modal',
        $theme . '/assets/js/buy-modal.js',
        [],
        filemtime($path . '/assets/js/buy-modal.js'),
        true
    );

    wp_enqueue_script(
        'harmony-profile-menu',
        $theme . '/assets/js/profile-menu.js',
        [],
        filemtime($path . '/assets/js/profile-menu.js'),
        true
    );

    wp_enqueue_script(
        'dashboard',
        $theme . '/assets/js/dashboard.js',
        [],
        filemtime($path . '/assets/js/dashboard.js'),
        true
    );

    wp_localize_script(
        'dashboard',
        'harmonyDashboard',
        [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('harmony_sync_health'),
        ]
    );

}
    
add_action('wp_enqueue_scripts', 'harmonyThemeAssets');

add_action('init', function () {

    if (!session_id()) {
        session_start();
    }

    if (
        isset($_GET['harmony_logout']) &&
        $_GET['harmony_logout'] === '1'
    ) {

        if (
            !isset($_GET['_wpnonce']) ||
            !wp_verify_nonce(
                $_GET['_wpnonce'],
                'harmony_logout'
            )
        ) {
            return;
        }

        unset($_SESSION['harmony_access_token']);
        unset($_SESSION['harmony_refresh_token']);

        wp_safe_redirect(
            home_url('/')
        );

        exit;
    }

});


/**
 * Send a welcome email after successful registration.
 */
function harmony_send_welcome_email($email, $firstname = '', $display_name = '') {

    $recipient_name = !empty($firstname)
        ? $firstname
        : $display_name;

    $login_url = home_url('/login/');

    $subject = 'Bienvenue chez Harmony ! Votre compte est prêt';

    $body = '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenue chez Harmony</title>
    </head>

    <body style="margin:0; padding:0; background-color:#F4F6F5; font-family:Arial, Helvetica, sans-serif; color:#304858;">

        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F4F6F5; padding:30px 15px;">
            <tr>
                <td align="center">

                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; background-color:#FFFFFF; border-radius:12px; overflow:hidden;">

                        <!-- HEADER -->

                        <tr>
                            <td align="center" style="background-color:#285F6E; padding:30px 20px;">

                                <img src="' . esc_url(get_template_directory_uri() . '/assets/images/logo/Logo_neutral.svg') . '" alt="Harmony" style="display:block; height:30px; width:auto; margin:0 auto;">

                                <p style="margin:8px 0 0; color:#FFFFFF; font-size:12px; letter-spacing:2px;">
                                    PRENEZ SOIN DE VOUS, SIMPLEMENT.
                                </p>

                            </td>
                        </tr>

                        <!-- CONTENT -->

                        <tr>
                            <td style="padding:40px 35px;">

                                <h2 style="margin:0 0 25px; color:#304858; font-size:25px;">
                                    Bienvenue chez Harmony !
                                </h2>

                                <p style="font-size:15px; line-height:1.7;">
                                    Bonjour ' . esc_html($recipient_name) . ',
                                </p>

                                <p style="font-size:15px; line-height:1.7;">
                                    Nous sommes ravis de vous accueillir au sein de la communauté Harmony.
                                </p>

                                <p style="font-size:15px; line-height:1.7;">
                                    Votre compte vient d\'être créé avec succès.
                                    Vous pouvez dès maintenant accéder à votre espace personnel
                                    et commencer à profiter de nos services.
                                </p>

                                <!-- ACCOUNT INFORMATION -->

                                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:25px 0; background-color:#E8F3E7; border-radius:8px;">
                                    <tr>
                                        <td style="padding:20px;">

                                            <p style="margin:0 0 10px; color:#285F3A; font-size:16px; font-weight:bold;">
                                                Votre compte est prêt !
                                            </p>

                                            <p style="margin:0; color:#285F3A; font-size:14px;">
                                                Adresse email : ' . esc_html($email) . '
                                            </p>

                                        </td>
                                    </tr>
                                </table>

                                <!-- CTA -->

                                <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin:30px auto;">
                                    <tr>
                                        <td align="center" bgcolor="#76B671" style="border-radius:8px;">
                                            <a href="' . esc_url($login_url) . '"
                                               style="display:inline-block; padding:15px 30px; color:#FFFFFF; font-size:15px; font-weight:bold; text-decoration:none;">
                                                Accéder à mon espace
                                            </a>
                                        </td>
                                    </tr>
                                </table>

                                <p style="font-size:15px; line-height:1.7;">
                                    Nous vous remercions de votre confiance et vous souhaitons une excellente expérience avec Harmony.
                                </p>

                                <p style="font-size:15px; line-height:1.7;">
                                    À bientôt,<br>
                                    <strong>Team Harmony</strong>
                                </p>

                            </td>
                        </tr>

                        <tr>
                            <td align="center" style="background-color:#F2F4F3; padding:20px 30px;">

                                <p style="margin:0; color:#65716D; font-size:12px; line-height:1.6;">
                                    Cet email a été envoyé automatiquement à la suite de votre inscription sur le site Harmony.
                                </p>

                            </td>
                        </tr>

                    </table>

                </td>
            </tr>
        </table>

    </body>
    </html>
    ';

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
    ];

    $sent = wp_mail(
        $email,
        $subject,
        $body,
        $headers
    );

    if (!$sent) {
        error_log('[Harmony] Échec de l\'envoi de l\'email de bienvenue.');
    }

    return $sent;
}
