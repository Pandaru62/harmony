<?php

if (!defined('ABSPATH')) {
    exit;
}

function harmony_api_url() {
    return 'http://api:8000';
}

function harmony_api_login($email, $password) {

    $response = wp_remote_post(
        harmony_api_url() . '/auth/login',
        [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode([
                'email' => $email,
                'password' => $password,
            ]),
            'timeout' => 10,
        ]
    );

    if (is_wp_error($response)) {
        return [
            'success' => false,
            'error' => 'Impossible de contacter le serveur Harmony.',
        ];
    }

    $status = wp_remote_retrieve_response_code($response);
    $body = json_decode(
        wp_remote_retrieve_body($response),
        true
    );

    if ($status !== 200) {
        return [
            'success' => false,
            'error' => $body['detail'] ?? 'Identifiants invalides.',
        ];
    }

    return [
        'success' => true,
        'data' => $body,
    ];
}

function harmony_api_get($endpoint) {

    $token = $_SESSION['harmony_access_token'] ?? null;

    if (!$token) {
        return [
            'success' => false,
            'error' => 'Utilisateur non authentifié.'
        ];
    }

    $response = wp_remote_get(
        harmony_api_url() . $endpoint,
        [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'timeout' => 10,
        ]
    );

    if (is_wp_error($response)) {
        return [
            'success' => false,
            'error' => 'Impossible de contacter le serveur Harmony.'
        ];
    }

    $status = wp_remote_retrieve_response_code($response);

    $body = json_decode(
        wp_remote_retrieve_body($response),
        true
    );

    if ($status !== 200) {
        return [
            'success' => false,
            'error' => $body['detail'] ?? 'Erreur API.'
        ];
    }

    return [
        'success' => true,
        'data' => $body
    ];
}

function harmony_api_register(
    $email,
    $password,
    $display_name,
    $firstname = '',
    $lastname = ''
) {

    $response = wp_remote_post(
        harmony_api_url() . '/auth/register',
        [
            'headers' => [
                'Content-Type' => 'application/json',
            ],

            'body' => wp_json_encode([
                'email' => $email,
                'password' => $password,
                'display_name' => $display_name,
                'firstname' => $firstname ?: null,
                'lastname' => $lastname ?: null,
            ]),

            'timeout' => 15,
        ]
    );


    if (is_wp_error($response)) {

        return [
            'success' => false,
            'error' => 'Impossible de contacter le serveur.',
        ];
    }


    $status = wp_remote_retrieve_response_code($response);

    $body = json_decode(
        wp_remote_retrieve_body($response),
        true
    );


    if ($status >= 400) {

        return [
            'success' => false,
            'error' => $body['detail']
                ?? 'Une erreur est survenue lors de l’inscription.',
        ];
    }


    return [
        'success' => true,
        'data' => $body,
    ];
}

function harmony_api_post($endpoint, $data = null) {

    $token = $_SESSION['harmony_access_token'] ?? null;

    if (!$token) {
        return [
            'success' => false,
            'error' => 'Utilisateur non authentifié.'
        ];
    }

    $args = [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ],
        'timeout' => 15,
    ];

    if ($data !== null) {
        $args['headers']['Content-Type'] = 'application/json';
        $args['body'] = wp_json_encode($data);
    }

    $response = wp_remote_post(
        harmony_api_url() . $endpoint,
        $args
    );

    if (is_wp_error($response)) {
        return [
            'success' => false,
            'error' => 'Impossible de contacter le serveur Harmony.'
        ];
    }

    $status = wp_remote_retrieve_response_code($response);

    $body = json_decode(
        wp_remote_retrieve_body($response),
        true
    );

    if ($status < 200 || $status >= 300) {
        return [
            'success' => false,
            'error' => $body['detail'] ?? 'Erreur API.'
        ];
    }

    return [
        'success' => true,
        'data' => $body
    ];
}

function harmony_api_sync_health() {
    return harmony_api_post('/user-health/mock');
}

function harmony_api_get_dashboard() {

    return harmony_api_get('/dashboard');
}