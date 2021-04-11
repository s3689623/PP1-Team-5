<?php
// Aside menu
return [

    'member' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ]
    ],
    'admin' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/admin',
            'new-tab' => false,
        ],
        [
            'title' => 'Logout',
            'root' => true,
            'page' => '/admin/logout',
            'new-tab' => false,
        ]
    ],

];
