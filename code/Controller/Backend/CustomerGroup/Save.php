<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Controller\Backend\CustomerGroup;

use CrazyCat\Customer\Model\Customer\Group as Model;
use CrazyCat\Framework\App\Url;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Save extends \CrazyCat\Framework\App\Component\Module\Controller\Backend\AbstractAction
{
    protected function execute()
    {
        /* @var $model \CrazyCat\Customer\Model\Customer\Group */
        $model = $this->objectManager->create(Model::class);

        $data = $this->request->getPost('data');
        if (empty($data['id'])) {
            unset($data['id']);
        } else {
            $model->load($data['id']);
            if (!$model->getId()) {
                $this->messenger->addError(__('Item with specified ID does not exist.'));
                return $this->redirect('customer/customer_group');
            }
        }

        try {
            $id = $model->addData($data)->save()->getId();
            $this->messenger->addSuccess(__('Successfully saved.'));
        } catch (\Exception $e) {
            $id = isset($data[Url::ID_NAME]) ? $data[Url::ID_NAME] : null;
            $this->messenger->addError($e->getMessage());
        }

        if (!$this->request->getPost('to_list') && $id !== null) {
            return $this->redirect('customer/customer_group/edit', [Url::ID_NAME => $id]);
        }
        return $this->redirect('customer/customer_group');
    }
}
