<?php

return [
    'setup' => [
        'ask' => [
            'name'     => 'Enter administrator name',
            'email'    => 'Enter administrator email address',
            'password' => 'Enter password',
        ],
        'activity' => [
            'user'  => 'Creating user `:name` <:email>...',
            'roles' => 'Setting up roles...',
            'role'  => 'Creating `:role` role...',
            'admin' => 'Assigning :role role to :name...',
        ],
        'error' => [
            'user'  => 'Error on user creation: :message',
            'role'  => 'Error on role creation: :message',
            'admin' => 'Error on administration assignment: :message',
        ],
        'success' => 'Setup complete!',
    ]
];
