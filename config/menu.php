<?php

return [
    [
        'name' => '欢迎页',
        'url' => '/admin/home',
        'icon' => 'layui-icon-chart-screen'
    ],
    [
        'name' => '首页管理',
        'url' => '/admin/index',
        'icon' => 'layui-icon-table',
        'children' => [
            [
                'name' => '轮播图',
                'url' => '/admin/index/carousel',
                'icon' => 'layui-icon-carousel',
            ],
            [
                'name' => '导航栏',
                'url' => '/admin/index/nav',
                'icon' => 'layui-icon-picture',
            ],
            [
                'name' => '公告',
                'url' => '/admin/index/news',
                'icon' => 'layui-icon-read',
            ],
        ]
    ],
    [
        'name' => '用户与角色',
        'url' => '/admin/user_management',
        'icon' => 'layui-icon-user',
        'children' => [
            [
                'name' => '用户管理',
                'url' => '/admin/user_management/user',
                'icon' => 'layui-icon-friends',
            ],
            [
                'name' => '角色管理',
                'url' => '/admin/user_management/role',
                'icon' => 'layui-icon-group',
            ]
        ]
    ],
    [
        'name' => '系统设置',
        'url' => '/admin/config',
        'icon' => 'layui-icon-set',
        'children' => [
            [
                'name' => '基础设置',
                'url' => '/admin/config/base',
                'icon' => 'layui-icon-set',
            ],
            [
                'name' => '菜单设置',
                'url' => '/admin/config/menu',
                'icon' => 'layui-icon-set',
            ],
            [
                'name' => '相册管理',
                'url' => '/admin/config/album',
                'icon' => 'layui-icon-picture',
            ],
        ]
    ]
];
