<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Session extends \CrazyCat\Framework\App\Session\Frontend
{
    public const NAME = 'customer';

    /**
     * @var \CrazyCat\Customer\Model\Customer|null
     */
    protected $customer;

    /**
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->storage->getData('customer_id') !== null;
    }

    /**
     * @return \CrazyCat\Customer\Model\Customer|null
     */
    public function getCustomer()
    {
        if ($this->customer === null) {
            if (($id = $this->storage->getData('customer_id'))) {
                $this->customer = $this->objectManager->create(Customer::class)->load($id);
            }
        }
        return $this->customer;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setCustomerId($id)
    {
        $this->storage->setData('customer_id', $id);
        if ($id === null) {
            $this->customer = null;
        }
        return $this;
    }
}
