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
    'namespace' => 'CrazyCat\Customer',
    'depends'   => [
        'CrazyCat\Base'
    ],
    'routes'    => [
        'api'      => 'customer',
        'frontend' => 'customer',
        'backend'  => 'customer',
        'cli'      => 'customer'
    ],
    'setup'     => [
        'CrazyCat\Customer\Setup\Install'
    ]
];
