<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Controller\Backend\Customer;

use CrazyCat\Customer\Block\Backend\Customer\Grid as GridBlock;
use CrazyCat\Customer\Model\Customer\Collection;
use CrazyCat\Base\Model\Source\YesNo as SourceYesNo;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Grid extends \CrazyCat\Base\Controller\Backend\AbstractGridAction
{
    protected function construct()
    {
        $this->init(Collection::class, GridBlock::class);
    }

    /**
     * @param array $collectionData
     * @return array
     */
    protected function processData($collectionData)
    {
        $sourceYesNo = $this->objectManager->get(SourceYesNo::class);
        foreach ($collectionData['items'] as &$item) {
            $item['enabled'] = $sourceYesNo->getLabel($item['enabled']);
        }
        return $collectionData;
    }
}
