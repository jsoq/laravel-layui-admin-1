<?php

return [
    [
        'name' => '欢迎页',
        'url' => 'http://www.baidu.com',
        'icon' => 'layui-icon-chart-screen'
    ],
    [
        'name' => '首页管理',
        'url' => 'http://www.baidu.com',
        'icon' => 'layui-icon-table',
        'children' => [
            [
                'name' => '轮播图',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-carousel',
            ],
            [
                'name' => '导航栏',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-picture',
            ],
            [
                'name' => '公告',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-read',
            ],
        ]
    ],
    [
        'name' => '用户与角色',
        'url' => 'http://www.baidu.com',
        'icon' => 'layui-icon-user',
        'children' => [
            [
                'name' => '用户管理',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-friends',
            ],
            [
                'name' => '角色管理',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-group',
            ]
        ]
    ],
    [
        'name' => '系统设置',
        'url' => 'http://www.baidu.com',
        'icon' => 'layui-icon-set',
        'children' => [
            [
                'name' => '基础设置',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-set',
            ],
            [
                'name' => '菜单设置',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-set',
            ],
            [
                'name' => '相册管理',
                'url' => 'http://www.baidu.com',
                'icon' => 'layui-icon-picture',
            ],
        ]
    ]
];
