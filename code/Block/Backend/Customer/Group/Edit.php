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
class Edit extends \CrazyCat\Base\Block\Backend\AbstractEdit
{
    public function __construct(
        \CrazyCat\Base\Block\Backend\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getFields()
    {
        return [
            'general' => [
                'label'  => __('General'),
                'fields' => [
                    [
                        'name'  => 'id',
                        'label' => __('ID'),
                        'type'  => 'hidden'
                    ],
                    [
                        'name'       => 'name',
                        'label'      => __('Group Name'),
                        'type'       => 'text',
                        'validation' => ['required' => true]
                    ],
                    [
                        'name'       => 'code',
                        'label'      => __('Group Code'),
                        'type'       => 'text',
                        'validation' => ['required' => true]
                    ]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function getActionUrl()
    {
        return $this->getUrl('customer/customer_group/save');
    }
}
