<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Session extends \CrazyCat\Framework\App\Session\Frontend {

    const NAME = 'customer';

    /**
     * @var \CrazyCat\Customer\Model\Customer|null
     */
    protected $customer;

    /**
     * @return boolean
     */
    public function isLoggedIn()
    {
        return $this->storage->getData( 'customer_id' ) !== null;
    }

    /**
     * @return \CrazyCat\Customer\Model\Customer|null
     */
    public function getCustomer()
    {
        if ( $this->customer === null ) {
            if ( ( $id = $this->storage->getData( 'customer_id' ) ) ) {
                $this->customer = $this->objectManager->create( Customer::class )->load( $id );
            }
        }
        return $this->customer;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setCustomerId( $id )
    {
        $this->storage->setData( 'customer_id', $id );
        if ( $id === null ) {
            $this->customer = null;
        }
        return $this;
    }

}
