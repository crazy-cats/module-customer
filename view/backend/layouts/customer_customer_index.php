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
    'template' => '2columns_left',
    'blocks'   => [
        'header' => [
            'header-buttons' => [
                'class' => 'CrazyCat\Base\Block\Template',
                'data'  => [
                    'template' => 'CrazyCat\Base::header_buttons',
                    'buttons'  => [
                        'new' => [
                            'label'  => __('Create New'),
                            'action' => [
                                'type'   => 'redirect',
                                'params' => ['url' => getUrl('customer/customer/edit')]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'main'   => [
            'grid-form' => [
                'class' => 'CrazyCat\Customer\Block\Backend\Customer\Grid'
            ]
        ]
    ]
];
