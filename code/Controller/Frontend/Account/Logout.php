<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Controller\Frontend\Account;

use CrazyCat\Customer\Model\Session as CustomerSession;
use CrazyCat\Framework\App\Component\Module\Controller\Frontend\Context;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Logout extends \CrazyCat\Framework\App\Component\Module\Controller\Frontend\AbstractAction
{
    /**
     * @var \CrazyCat\Customer\Model\Session
     */
    protected $customerSession;

    public function __construct(CustomerSession $customerSession, Context $context)
    {
        parent::__construct($context);

        $this->customerSession = $customerSession;
    }

    protected function execute()
    {
        if ($this->customerSession->isLoggedIn()) {
            $this->customerSession->clearData();
            $this->messenger->addSuccess(__('Logged out successfully.'));
        }

        $this->redirect('index');
    }
}
