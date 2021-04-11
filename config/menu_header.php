<?php
// Header menu
return [
    'member' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/',
            'new-tab' => false,
        ]
    ],
    'admin' => [
        [
            'title' => 'Logout',
            'root' => true,
            'page' => '/admin/logout',
            'new-tab' => false,
        ],
    ],

];
