<?php

return [
    'default' => 'main',

    'connections' => [
        'main' => [
            'salt' => env('HASHIDS_SALT'),
            'length' => 12,
            'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_',
        ],
    ],
];
