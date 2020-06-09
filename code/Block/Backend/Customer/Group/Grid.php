<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Backend\Customer\Group;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Grid extends \CrazyCat\Base\Block\Backend\AbstractGrid
{
    public const BOOKMARK_KEY = 'customer_group';

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getFields()
    {
        return [
            [
                'name'   => 'id',
                'label'  => __('ID'),
                'sort'   => true,
                'width'  => 100,
                'filter' => ['type' => 'text', 'condition' => 'eq']
            ],
            [
                'name'   => 'name',
                'label'  => __('Group Name'),
                'sort'   => true,
                'filter' => ['type' => 'text', 'condition' => 'like']
            ],
            [
                'name'   => 'code',
                'label'  => __('Group Code'),
                'sort'   => true,
                'filter' => ['type' => 'text', 'condition' => 'like']
            ],
            [
                'name'    => 'action',
                'label'   => __('Actions'),
                'actions' => [
                    [
                        'name'  => 'edit',
                        'label' => __('Edit'),
                        'url'   => getUrl('customer/customer_group/edit')
                    ],
                    [
                        'name'    => 'delete',
                        'label'   => __('Delete'),
                        'confirm' => __('Sure you want to remove this item?'),
                        'url'     => $this->getUrl('customer/customer_group/delete')
                    ]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->getUrl('customer/customer_group/grid');
    }
}
