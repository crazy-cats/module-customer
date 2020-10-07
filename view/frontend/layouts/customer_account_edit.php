<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
return [
    'template' => '2columns_left',
    'blocks'   => [
        'left' => [
            'children' => [
                'customer-menu' => [
                    'class' => 'CrazyCat\Base\Block\Template',
                    'data'  => ['template' => 'CrazyCat\Customer::account/menu']
                ]
            ]
        ],
        'main' => [
            'children' => [
                'dashboard' => [
                    'class' => 'CrazyCat\Customer\Block\Frontend\Customer',
                    'data'  => ['template' => 'CrazyCat\Customer::account/edit']
                ]
            ]
        ]
    ]
];
