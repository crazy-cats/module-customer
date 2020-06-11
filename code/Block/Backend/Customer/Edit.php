<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Backend\Customer;

use CrazyCat\Customer\Model\Source\CustomerGroups;
use CrazyCat\Base\Block\Backend\Context;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Edit extends \CrazyCat\Base\Block\Backend\AbstractEdit
{
    /**
     * @var \CrazyCat\Customer\Model\Source\CustomerGroups
     */
    protected $customerGroups;

    public function __construct(CustomerGroups $customerGroups, Context $context, array $data = [])
    {
        parent::__construct($context, $data);

        $this->customerGroups = $customerGroups;
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
                        'name'       => 'first_name',
                        'label'      => __('First Name'),
                        'type'       => 'text',
                        'validation' => ['required' => true]
                    ],
                    [
                        'name'       => 'last_name',
                        'label'      => __('Last Name'),
                        'type'       => 'text',
                        'validation' => ['required' => true]
                    ],
                    [
                        'name'       => 'username',
                        'label'      => __('Username'),
                        'type'       => 'text',
                        'validation' => ['required' => true]
                    ],
                    [
                        'name'  => 'email',
                        'label' => __('E-mail'),
                        'type'  => 'text'
                    ],
                    [
                        'name'  => 'mobile',
                        'label' => __('Mobile'),
                        'type'  => 'text'
                    ],
                    [
                        'name'  => 'wechat',
                        'label' => __('WeChat'),
                        'type'  => 'text'
                    ],
                    [
                        'name'    => 'enabled',
                        'label'   => __('Enabled'),
                        'type'    => 'select',
                        'options' => [['value' => '1', 'label' => __('Yes')], ['value' => '0', 'label' => __('No')]]
                    ],
                    [
                        'name'    => 'group_ids',
                        'label'   => __('Customer Groups'),
                        'type'    => 'multiselect',
                        'options' => $this->customerGroups->toOptionArray(),
                        'validation' => ['required' => true]
                    ],
                    [
                        'name'  => 'password',
                        'label' => __('Password'),
                        'type'  => 'password'
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
        return $this->getUrl('customer/customer/save');
    }
}
