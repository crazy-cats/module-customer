<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model\Customer;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Group extends \CrazyCat\Framework\App\Module\Model\AbstractModel {

    /**
     * @return void
     */
    protected function construct()
    {
        $this->init( 'customer_group', 'customer_group' );
    }

    /**
     * @return void
     */
    protected function beforeSave()
    {
        parent::beforeSave();

        $this->setData( 'permissions', json_encode( $this->getData( 'permissions' ) ) );
    }

    /**
     * @return void
     */
    protected function afterLoad()
    {
        $this->setData( 'permissions', json_decode( $this->getData( 'permissions' ), true ) );

        parent::afterLoad();
    }

}
