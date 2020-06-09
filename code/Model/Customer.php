<?php

/*
 * Copyright © 2020 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

namespace CrazyCat\Customer\Model;

use CrazyCat\Customer\Model\Customer\Group\Collection as GroupCollection;

/**
 * @category CrazyCat
 * @package  CrazyCat\Customer
 * @author   Liwei Zeng <zengliwei@163.com>
 * @link     https://crazy-cat.cn
 */
class Customer extends \CrazyCat\Framework\App\Component\Module\Model\AbstractModel
{
    /**
     * @var \CrazyCat\Framework\App\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \CrazyCat\Customer\Model\Customer\Group[]
     */
    protected $groups;

    public function __construct(
        \CrazyCat\Framework\App\Db\Manager $dbManager,
        \CrazyCat\Framework\App\EventManager $eventManager,
        \CrazyCat\Framework\App\ObjectManager $objectManager,
        array $data = []
    ) {
        parent::__construct($eventManager, $dbManager, $data);

        $this->objectManager = $objectManager;
    }

    /**
     * @return void
     */
    protected function construct()
    {
        $this->init('customer', 'customer');
    }

    /**
     * @param string $field
     * @param string $value
     * @return bool
     */
    protected function checkUnique($field, $value)
    {
        $sql = sprintf('SELECT COUNT(*) FROM `%s` WHERE `%s` = ?', $this->mainTable, $field);
        $binds = [$value];

        if ($this->getData('id')) {
            $sql .= ' AND `id` != ?';
            $binds[] = $this->getData('id');
        }

        return $this->conn->fetchOne($sql, $binds) == 0;
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function beforeSave()
    {
        parent::beforeSave();

        foreach (['username', 'mobile', 'email', 'wechat'] as $field) {
            if ($this->hasData($field) && !$this->checkUnique($field, $this->getData($field))) {
                throw new \Exception(__('Field `%1` must be unique.', $field));
            }
        }

        if ($this->hasData('group_ids') && is_array($this->getData('group_ids'))) {
            $this->setData('group_ids', implode(',', $this->getData('group_ids')));
        }

        $now = date('Y-m-d H:i:s');
        $this->setData('updated_at', $now);
        if (!$this->getId()) {
            $this->setData('created_at', $now);
        }
    }

    /**
     * @return void
     */
    protected function afterLoad()
    {
        $this->setData('group_ids', explode(',', $this->getData('group_ids')));

        parent::afterLoad();
    }

    /**
     * @param string $customerPasswordHash
     * @param string $inputPassword
     * @return bool
     */
    public function verifyPassword($customerPasswordHash, $inputPassword)
    {
        return password_verify($inputPassword, $customerPasswordHash);
    }

    /**
     * @param string $password
     * @return string
     */
    public function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param string $username
     * @param string $password
     * @return $this
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function login($username, $password)
    {
        $customer = $this->conn->fetchRow(
            sprintf('SELECT * FROM `%s` WHERE `username` = ? AND `enabled` = 1', $this->mainTable),
            [$username]
        );
        if (!empty($customer)) {
            if ($this->verifyPassword($customer['password'], $password)) {
                return $this->setData($customer);
            }
        }
        throw new \Exception(__('User does not exist or password does not match the username.'));
    }

    /**
     * @return \CrazyCat\Customer\Model\Customer\Group[]
     * @throws \ReflectionException
     */
    public function getGroups()
    {
        if ($this->groups === null) {
            if (!($groupIds = $this->getData('group_ids'))) {
                throw new \Exception(__('Impossible to get customer groups without group ID.'));
            }
            $groupCollection = $this->objectManager->create(GroupCollection::class)
                ->addFieldToFilter('id', ['in' => $groupIds]);
            $this->groups = [];
            foreach ($groupCollection as $group) {
                $this->groups[$group->getData('code')] = $group;
            }
        }
        return $this->groups;
    }
}
