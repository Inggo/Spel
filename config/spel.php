<?php

return [
    'defaults' => [
        'admin' => [
            'name' => env('SPEL_ADMIN_NAME', 'Admin'),
            'email' => env('SPEL_ADMIN_EMAIL', 'admin@spel.dev'),
            'password' => env('SPEL_ADMIN_PASSWORD', 'password123'),
        ],
    ],
    'roles' => [
        // Format: 'key' => 'name'
        'administrator' => 'Administrator',
        'manager'       => 'Manager',
        'editor'        => 'Editor',
        // 'author'        => 'Author',
        // 'subscriber'    => 'Subscriber',
    ],
];
