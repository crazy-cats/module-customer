<?php

/*
 * Copyright © 2018 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model\Source;

use CrazyCat\Customer\Model\Customer\Group\Collection;
use CrazyCat\Framework\App\ObjectManager;

/**
 * @category CrazyCat
 * @package CrazyCat\Customer
 * @author Bruce Z <152416319@qq.com>
 * @link http://crazy-cat.co
 */
class CustomerGroups {

    /**
     * @var array
     */
    private $options;

    /**
     * @var \CrazyCat\Admin\Model\Admin\Role\Collection
     */
    private $groupCollecion;

    public function __construct( ObjectManager $objectManager )
    {
        $this->groupCollecion = $objectManager->create( Collection::class )->addOrder( 'name' );
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if ( $this->options === null ) {
            $this->options = [];
            foreach ( $this->groupCollecion as $groupModel ) {
                $this->options[] = [ 'label' => sprintf( '%s ( ID: %d )', $groupModel->getData( 'name' ), $groupModel->getId() ), 'value' => $groupModel->getId() ];
            }
        }
        return $this->options;
    }

}
