<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Backend\Customer\Group;

use CrazyCat\Core\Block\Backend\Context;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Edit extends \CrazyCat\Core\Block\Backend\AbstractEdit {

    public function __construct( Context $context, array $data = [] )
    {
        parent::__construct( $context, $data );
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
                        [ 'name' => 'name', 'label' => __( 'Group Name' ), 'type' => 'text', 'validation' => [ 'required' => true ] ],
                        [ 'name' => 'code', 'label' => __( 'Group Code' ), 'type' => 'text', 'validation' => [ 'required' => true ] ]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    public function getActionUrl()
    {
        return getUrl( 'customer/customer_group/save' );
    }

}
