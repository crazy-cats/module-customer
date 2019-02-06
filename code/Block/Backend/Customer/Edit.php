<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Backend\Customer;

use CrazyCat\Customer\Model\Source\CustomerGroups;
use CrazyCat\Core\Block\Backend\Context;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Edit extends \CrazyCat\Core\Block\Backend\AbstractEdit {

    /**
     * @var \CrazyCat\Customer\Model\Source\CustomerGroups
     */
    protected $customerGroups;

    public function __construct( CustomerGroups $customerGroups, Context $context, array $data = [] )
    {
        parent::__construct( $context, $data );

        $this->customerGroups = $customerGroups;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return [
            'general' => [
                'label' => __( 'General' ),
                'fields' => [
                        [ 'name' => 'id', 'label' => __( 'ID' ), 'type' => 'hidden' ],
                        [ 'name' => 'name', 'label' => __( 'Name' ), 'type' => 'text', 'validation' => [ 'required' => true ] ],
                        [ 'name' => 'username', 'label' => __( 'Username' ), 'type' => 'text', 'validation' => [ 'required' => true ] ],
                        [ 'name' => 'email', 'label' => __( 'E-mail' ), 'type' => 'text' ],
                        [ 'name' => 'mobile', 'label' => __( 'Mobile' ), 'type' => 'text' ],
                        [ 'name' => 'wechat', 'label' => __( 'WeChat' ), 'type' => 'text' ],
                        [ 'name' => 'enabled', 'label' => __( 'Enabled' ), 'type' => 'select', 'options' => [ [ 'value' => '1', 'label' => __( 'Yes' ) ], [ 'value' => '0', 'label' => __( 'No' ) ] ] ],
                        [ 'name' => 'group_id', 'label' => __( 'Customer Groups' ), 'type' => 'multiselect', 'options' => $this->customerGroups->toOptionArray() ],
                        [ 'name' => 'password', 'label' => __( 'Password' ), 'type' => 'password' ]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function getActionUrl()
    {
        return getUrl( 'customer/customer/save' );
    }

}
