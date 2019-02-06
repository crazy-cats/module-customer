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
                [ 'name' => 'first_name', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 255, 'null' => false ],
                [ 'name' => 'last_name', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 255, 'null' => false ],
                [ 'name' => 'username', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32, 'null' => false ],
                [ 'name' => 'mobile', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32, 'null' => false ],
                [ 'name' => 'wechat', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 32, 'null' => false ],
                [ 'name' => 'email', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 64, 'null' => false ],
                [ 'name' => 'avatar', 'type' => MySql::COL_TYPE_VARCHAR, 'length' => 255, 'null' => false ],
                [ 'name' => 'enabled', 'type' => MySql::COL_TYPE_TINYINT, 'length' => 1, 'unsign' => true, 'null' => false, 'default' => 0 ]
        ];
        $indexes = [
                [ 'columns' => [ 'username' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'mobile' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'wechat' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'email' ], 'type' => MySql::INDEX_NORMAL ],
                [ 'columns' => [ 'enabled' ], 'type' => MySql::INDEX_NORMAL ]
        ];
        $this->conn->createTable( 'menu', $columns, $indexes );
    }

    /**
     * @param string|null $currentVersion
     */
    public function execute( $currentVersion )
    {
        if ( $currentVersion === null ) {
            $this->createCustomerTable();
        }
    }

}
