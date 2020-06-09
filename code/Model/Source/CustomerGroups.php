<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model\Source;

use CrazyCat\Customer\Model\Customer\Group\Collection;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class CustomerGroups
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var \CrazyCat\Admin\Model\Admin\Role\Collection
     */
    private $groupCollecion;

    public function __construct(
        \CrazyCat\Framework\App\ObjectManager $objectManager
    ) {
        $this->groupCollecion = $objectManager->create(Collection::class)->addOrder('name');
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->options === null) {
            $this->options = [];
            foreach ($this->groupCollecion as $groupModel) {
                $this->options[] = [
                    'label' => sprintf(
                        '%s ( ID: %d )',
                        $groupModel->getData('name'),
                        $groupModel->getId()
                    ),
                    'value' => $groupModel->getId()
                ];
            }
        }
        return $this->options;
    }
}
