<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
return [
    'template' => '2columns_left',
    'blocks' => [
        'left' => [
            'customer-menu' => [
                'class' => 'CrazyCat\Core\Block\Template',
                'data' => [ 'template' => 'CrazyCat\Customer::account/menu' ]
            ]
        ],
        'main' => [
            'dashboard' => [ 'class' => 'CrazyCat\Customer\Block\Frontend\Customer', 'data' => [ 'template' => 'CrazyCat\Customer::account/dashboard' ] ]
        ]
    ]
];
