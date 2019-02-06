<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Setup;

use CrazyCat\Framework\App\Db\MySql;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class Upgrade extends \CrazyCat\Framework\App\Module\Setup\AbstractUpgrade {

    private function createCustomerTable()
    {
        $columns = [
                [ 'name' => 'id', 'type' => MySql::COL_TYPE_INT, 'unsign' => true, 'null' => false, 'auto_increment' => true ],
                [ 'name' => 'first_name', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 64, 'null' => false ],
                [ 'name' => 'last_name', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32, 'null' => false ],
                [ 'name' => 'username', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32, 'null' => false ],
                [ 'name' => 'mobile', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32 ],
                [ 'name' => 'wechat', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32 ],
                [ 'name' => 'email', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 64 ],
                [ 'name' => 'password', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 64 ],
                [ 'name' => 'avatar', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 255 ],
                [ 'name' => 'group_ids', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 255, 'null' => false ],
                [ 'name' => 'enabled', 'type' => MySql::COL_TYPE_TINYINT, 'length' => 1, 'unsign' => true, 'null' => false, 'default' => 0 ],
                [ 'name' => 'created_at', 'type' => MySql::COL_TYPE_DATETIME, 'null' => false ],
                [ 'name' => 'updated_at', 'type' => MySql::COL_TYPE_DATETIME, 'null' => false ]
        ];
        $indexes = [
                [ 'columns' => [ 'username' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'mobile' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'wechat' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'email' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'group_ids' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'enabled' ], 'type' => MySql::INDEX_NORMAL ]
        ];
        $this->conn->createTable( 'customer', $columns, $indexes );
    }

    private function createCustomerGroupTable()
    {
        $columns = [
                [ 'name' => 'id', 'type' => MySql::COL_TYPE_INT, 'unsign' => true, 'null' => false, 'auto_increment' => true ],
                [ 'name' => 'name', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 64, 'null' => false ],
                [ 'name' => 'code', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 16, 'null' => false ],
                [ 'name' => 'enabled', 'type' => MySql::COL_TYPE_TINYINT, 'length' => 1, 'unsign' => true, 'null' => false, 'default' => 0 ],
                [ 'name' => 'permissions', 'type' => MySql::COL_TYPE_TEXT ]
        ];
        $indexes = [
                [ 'columns' => [ 'code' ], 'type' => MySql::INDEX_UNIQUE ],
                [ 'columns' => [ 'enabled' ], 'type' => MySql::INDEX_NORMAL ]
        ];
        $this->conn->createTable( 'customer_group', $columns, $indexes );
    }

    private function createGeneralGroup()
    {
        $this->conn->insert( 'customer_group', [
            'name' => 'General',
            'code' => 'general',
            'enabled' => 1 ] );
    }

    /**
     * @param string|null $currentVersion
     */
    public function execute( $currentVersion )
    {
        if ( $currentVersion === null ) {
            $this->createCustomerTable();
            $this->createCustomerGroupTable();
            $this->createGeneralGroup();
        }
    }

}
