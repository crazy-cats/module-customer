<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
return [
    'customer' => [
        'label'      => 'Customer',
        'sort_order' => 110,
        'children'   => [
            'customer/customer/index'       => [
                'label' => 'Customer List',
                'url'   => 'customer/customer'
            ],
            'customer/customer_group/index' => [
                'label' => 'Customer Groups',
                'url'   => 'customer/customer_group'
            ]
        ]
    ]
];
