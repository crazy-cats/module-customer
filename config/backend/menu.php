<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
return [
    'customer' => [
        'label' => 'Customer',
        'sort_order' => 110,
        'children' => [
            'customer/customer/index' => [
                'label' => 'Customer List',
                'url' => 'customer/customer'
            ],
            'customer/customer_group/index' => [
                'label' => 'Customer Groups',
                'url' => 'customer/customer_group'
            ]
        ]
    ]
];
