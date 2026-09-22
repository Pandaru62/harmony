<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action(
    'wp_ajax_harmony_sync_health',
    'harmony_handle_sync_health'
);

add_action(
    'wp_ajax_nopriv_harmony_sync_health',
    'harmony_handle_sync_health'
);

function harmony_handle_sync_health() {

    check_ajax_referer(
        'harmony_sync_health',
        'nonce'
    );

    $result = harmony_api_sync_health();

    if (!$result['success']) {
        wp_send_json_error([
            'message' => $result['error']
        ]);
    }

    wp_send_json_success(
        $result['data']
    );
}
