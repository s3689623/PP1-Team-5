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
        ],
        [
            'title' => 'Logout',
            'root' => true,
            'page' => '/member/logout',
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
            'title' => 'Manager List',
            'root' => true,
            'page' => '/admin/manager/list',
            'new-tab' => false,
        ]
    ],
    'manager' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/manager',
            'new-tab' => false,
        ],
        [
            'title' => 'Member List',
            'root' => true,
            'page' => '/manager/member/list',
            'new-tab' => false,
        ],
        [
            'title' => 'Logout',
            'root' => true,
            'page' => '/manager/logout',
            'new-tab' => false,
        ]
    ],

];
