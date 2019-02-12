<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Block\Frontend;

use CrazyCat\Customer\Model\Session as CustomerSession;
use CrazyCat\Framework\App\Theme\Block\Context;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Customer extends \CrazyCat\Core\Block\Template {

    /**
     * @var \CrazyCat\Customer\Model\Session
     */
    protected $customerSession;

    public function __construct( CustomerSession $customerSession, Context $context, array $data = [] )
    {
        parent::__construct( $context, $data );

        $this->customerSession = $customerSession;
    }

    public function getCustomer()
    {
        return $this->customerSession->getCustomer();
    }

}
