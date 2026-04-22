<?php

$USERS = [
    [
        'id'       => 1,
        'email'    => 'student@campus.edu',
        'password' => 'student123',
        'role'     => 'student'
    ],
    [
        'id'       => 2,
        'email'    => 'admin@campus.edu',
        'password' => 'admin123',
        'role'     => 'admin'
    ]
];


$ITEMS = [
    [
        'id'          => 1,
        'title'       => 'Keys',
        'description' => 'Campus dorm keys, black keychain',
        'location'    => 'Cafeteria',
        'status'      => 'lost',
        'reported_by' => 1
    ],
    [
        'id'          => 2,
        'title'       => 'Blue backpack',
        'description' => 'Blue North Face backpack with stickers',
        'location'    => 'Library',
        'status'      => 'found',
        'reported_by' => 2
    ]
];
?>