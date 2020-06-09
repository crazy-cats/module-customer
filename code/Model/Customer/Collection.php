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
class Collection extends \CrazyCat\Framework\App\Component\Module\Model\AbstractCollection
{
    protected function construct()
    {
        $this->init(\CrazyCat\Customer\Model\Customer::class);
    }
}
