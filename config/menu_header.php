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
        ],
        [
            'title' => 'Car List',
            'root' => true,
            'page' => '/member/car/list',
            'new-tab' => false,
        ],
        [
            'title' => 'Order List',
            'root' => true,
            'page' => '/member/order/list',
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
    ],
    [
        'title' => 'Car List',
        'root' => true,
        'page' => '/admin/car/list',
        'new-tab' => false,
    ],
    [
        'title' => 'Logout',
        'root' => true,
        'page' => '/admin/logout',
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
