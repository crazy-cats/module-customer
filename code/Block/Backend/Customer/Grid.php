<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Backend\Customer;

use CrazyCat\Base\Model\Source\YesNo as SourceYesNo;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Grid extends \CrazyCat\Base\Block\Backend\AbstractGrid
{
    public const BOOKMARK_KEY = 'customer';

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getFields()
    {
        return [
            ['ids' => true,],
            [
                'name'   => 'id',
                'label'  => __('ID'),
                'sort'   => true,
                'width'  => 100,
                'filter' => ['type' => 'text', 'condition' => 'eq']
            ],
            [
                'name'   => 'first_name',
                'label'  => __('First Name'),
                'sort'   => true,
                'filter' => ['type' => 'text', 'condition' => 'like']
            ],
            [
                'name'   => 'last_name',
                'label'  => __('Last Name'),
                'sort'   => true,
                'filter' => ['type' => 'text', 'condition' => 'like']
            ],
            [
                'name'   => 'username',
                'label'  => __('Username'),
                'sort'   => true,
                'filter' => ['type' => 'text', 'condition' => 'like']
            ],
            [
                'name'   => 'enabled',
                'label'  => __('Enabled'),
                'sort'   => true,
                'width'  => 130,
                'filter' => ['type' => 'select', 'source' => SourceYesNo::class, 'condition' => 'eq']
            ],
            [
                'label'   => __('Actions'),
                'actions' => [
                    [
                        'name'  => 'edit',
                        'label' => __('Edit'),
                        'url'   => $this->getUrl('customer/customer/edit')
                    ],
                    [
                        'name'    => 'delete',
                        'label'   => __('Delete'),
                        'confirm' => __('Sure you want to remove this item?'),
                        'url'     => $this->getUrl('customer/customer/delete')
                    ]
                ]
            ]
        ];
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSourceUrl()
    {
        return $this->getUrl('customer/customer/grid');
    }
}
