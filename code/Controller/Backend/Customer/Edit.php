<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Controller\Backend\Customer;

use CrazyCat\Customer\Model\Customer as Model;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Edit extends \CrazyCat\Framework\App\Component\Module\Controller\Backend\AbstractAction
{
    protected function execute()
    {
        /* @var $model \CrazyCat\Framework\App\Component\Module\Model\AbstractModel */
        $model = $this->objectManager->create(Model::class);

        if (($id = $this->request->getParam('id'))) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messenger->addError(__('Item with specified ID does not exist.'));
                return $this->redirect('customer/customer');
            }
        }

        $this->registry->register('current_model', $model);

        $pageTitle = $model->getId() ?
            __('Edit Customer `%1` [ ID: %2 ]', [$model->getName(), $model->getId()]) :
            __('Create Customer');

        $this->setPageTitle($pageTitle)->render();
    }
}
