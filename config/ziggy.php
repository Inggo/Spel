<?php

return [
    'only' => ['login', 'terms.*', 'policy.*', ],
    'groups' => [
        'admin' => [
            'users.*', 'password.*', 'api-tokens.*',
        ],
        'user' => [
            'dashboard', 'profile.*', 'two-factor.*', 'user-profile-information.update', 'current-user-photo.update',
            'password.*', 'logout', 'terms.*', 'policy.*'
        ]
    ]
];
