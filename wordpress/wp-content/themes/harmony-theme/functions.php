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
