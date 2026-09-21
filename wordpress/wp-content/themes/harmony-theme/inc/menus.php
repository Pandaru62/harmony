<?php
add_action('admin_menu', function () {

    add_menu_page(
        'Harmony Settings',          // page title
        'Harmony Settings',          // menu title
        'manage_options',           // capability
        'harmony-settings',         // slug
        'harmony_settings_page',    // callback function
        'dashicons-admin-generic',  // icon
        60
    );

});

add_action('admin_init', function () {

    register_setting(
    'harmony_settings_group',
    'harmony_banner_enabled'
    );
    register_setting(
        'harmony_settings_group',
        'harmony_banner_text'
    );
    register_setting('harmony_settings_group', 'harmony_facebook_url');
    register_setting('harmony_settings_group', 'harmony_instagram_url');
    register_setting('harmony_settings_group', 'harmony_linkedin_url');
    register_setting('harmony_settings_group', 'harmony_youtube_url');
    register_setting('harmony_settings_group', 'harmony_email');
    register_setting('harmony_settings_group', 'harmony_address');
    register_setting('harmony_settings_group', 'harmony_phone');
    register_setting('harmony_settings_group', 'harmony_email_msg');
    register_setting('harmony_settings_group', 'harmony_phone_msg');
    register_setting('harmony_settings_group', 'harmony_android_url');
    register_setting('harmony_settings_group', 'harmony_ios_url');

});
