<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model;

use CrazyCat\Customer\Model\Customer\Group\Collection as GroupCollection;
use CrazyCat\Framework\App\Db\Manager as DbManager;
use CrazyCat\Framework\App\EventManager;
use CrazyCat\Framework\App\ObjectManager;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Customer extends \CrazyCat\Framework\App\Module\Model\AbstractModel {

    /**
     * @var \CrazyCat\Framework\App\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \CrazyCat\Customer\Model\Customer\Group[]
     */
    protected $groups;

    public function __construct( ObjectManager $objectManager, EventManager $eventManager, DbManager $dbManager, array $data = [] )
    {
        parent::__construct( $eventManager, $dbManager, $data );

        $this->objectManager = $objectManager;
    }

    /**
     * @return void
     */
    protected function construct()
    {
        $this->init( 'customer', 'customer' );
    }

    /**
     * @return void
     */
    protected function beforeSave()
    {
        parent::beforeSave();

        if ( $this->hasData( 'group_ids' ) && is_array( $this->getData( 'group_ids' ) ) ) {
            $this->setData( 'group_ids', implode( ',', $this->getData( 'group_ids' ) ) );
        }

        $now = date( 'Y-m-d H:i:s' );
        $this->setData( 'updated_at', $now );
        if ( !$this->getId() ) {
            $this->setData( 'created_at', $now );
        }
    }

    /**
     * @return void
     */
    protected function afterLoad()
    {
        $this->setData( 'group_ids', explode( ',', $this->getData( 'group_ids' ) ) );

        parent::afterLoad();
    }

    /**
     * @param string $customerPasswordHash
     * @param string $inputPassword
     * @return boolean
     */
    public function verifyPassword( $customerPasswordHash, $inputPassword )
    {
        return password_verify( $inputPassword, $customerPasswordHash );
    }

    /**
     * @param string $password
     * @return string
     */
    public function encryptPassword( $password )
    {
        return password_hash( $password, PASSWORD_DEFAULT );
    }

    /**
     * @param string $username
     * @param string $password
     * @return $this
     */
    public function login( $username, $password )
    {
        if ( !empty( $customer = $this->conn->fetchRow( sprintf( 'SELECT * FROM `%s` WHERE `username` = ? AND `enabled` = 1', $this->mainTable ), [ $username ] ) ) ) {
            if ( $this->verifyPassword( $customer['password'], $password ) ) {
                return $this->setData( $customer );
            }
        }
        throw new \Exception( __( 'User does not exist or password does not match the username.' ) );
    }

    /**
     * @return \CrazyCat\Customer\Model\Customer\Group[]
     */
    public function getGroups()
    {
        if ( $this->groups === null ) {
            if ( !( $groupIds = $this->getData( 'group_ids' ) ) ) {
                throw new \Exception( __( 'Impossible to get customer groups without group ID.' ) );
            }
            $groupCollection = $this->objectManager->create( GroupCollection::class )
                    ->addFieldToFilter( 'id', [ 'in' => $groupIds ] );
            $this->groups = [];
            foreach ( $groupCollection as $group ) {
                $this->groups[$group->getData( 'code' )] = $group;
            }
        }
        return $this->groups;
    }

}
