<?php

/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Controller\Frontend\Account;

use CrazyCat\Customer\Model\Customer;
use CrazyCat\Customer\Model\Session as CustomerSession;
use CrazyCat\Framework\App\Module\Controller\Frontend\Context;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class LoginPost extends \CrazyCat\Framework\App\Module\Controller\Frontend\AbstractAction {

    /**
     * @var \CrazyCat\Customer\Model\Session
     */
    protected $customerSession;

    public function __construct( CustomerSession $customerSession, Context $context )
    {
        parent::__construct( $context );

        $this->customerSession = $customerSession;
    }

    protected function run()
    {
        if ( !$this->customerSession->isLoggedIn() ) {
            try {
                $post = $this->request->getPost();
                $customer = $this->objectManager->create( Customer::class )->login( $post['username'], $post['password'] );
                $this->customerSession->setCustomerId( $customer->getData( 'id' ) );
                $this->messenger->addSuccess( __( 'Logged in successfully.' ) );
            }
            catch ( \Exception $e ) {
                $this->messenger->addError( $e->getMessage() );
                return $this->redirect( 'customer/account/login' );
            }
        }

        $this->redirect( 'customer/account/index' );
    }

}
