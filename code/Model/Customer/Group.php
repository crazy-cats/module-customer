<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model\Customer;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Group extends \CrazyCat\Framework\App\Component\Module\Model\AbstractModel
{
    /**
     * @return void
     * @throws \ReflectionException
     */
    protected function construct()
    {
        $this->init('customer_group', 'customer_group');
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    protected function beforeSave()
    {
        parent::beforeSave();

        $this->setData('permissions', json_encode($this->getData('permissions')));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    protected function afterLoad()
    {
        $this->setData('permissions', json_decode($this->getData('permissions'), true));

        parent::afterLoad();
    }
}
