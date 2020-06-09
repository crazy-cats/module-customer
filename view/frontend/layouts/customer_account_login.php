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
    'template' => '1column',
    'blocks'   => [
        'main' => [
            'login' => [
                'class' => 'CrazyCat\Base\Block\Template',
                'data'  => ['template' => 'CrazyCat\Customer::account/login']
            ]
        ]
    ]
];
