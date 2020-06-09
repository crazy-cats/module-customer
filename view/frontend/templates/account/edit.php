<?php
/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/* @var $this \CrazyCat\Customer\Block\Frontend\Customer */
$customer = $this->getCustomer();
?>
<div class="block block-customer-edit">
    <div class="block-title">
        <h1><?= __('Customer Information'); ?></h1>
    </div>
    <div class="block-content">
        <form method="post" action="<?= getUrl('customer/account/editpost') ?>">
            <div class="row">
                <label for="customer_first_name"><?= __('First Name') ?></label>
                <input type="text" class="input-text"
                       id="customer_first_name" name="customer[first_name]"
                       value="<?= htmlEscape($customer->getData('first_name')); ?>"/>
            </div>
            <div class="row">
                <label for="customer_last_name"><?= __('Last Name') ?></label>
                <input type="text" class="input-text"
                       id="customer_last_name" name="customer[last_name]"
                       value="<?= htmlEscape($customer->getData('last_name')); ?>"/>
            </div>
            <div class="row">
                <label for="customer_username"><?= __('Username') ?></label>
                <input type="text" class="input-text"
                       id="customer_username" name="customer[username]"
                       value="<?= htmlEscape($customer->getData('username')); ?>"/>
            </div>
            <div class="row">
                <label for="customer_email"><?= __('E-mail') ?></label>
                <input type="text" class="input-text"
                       id="customer_email" name="customer[email]"
                       value="<?= htmlEscape($customer->getData('email')); ?>"/>
            </div>
            <div class="row">
                <label for="customer_mobile"><?= __('Mobile') ?></label>
                <input type="text" class="input-text"
                       id="customer_mobile" name="customer[mobile]"
                       value="<?= htmlEscape($customer->getData('mobile')); ?>"/>
            </div>
            <div class="row">
                <label for="customer_wechat"><?= __('WeChat') ?></label>
                <input type="text" class="input-text"
                       id="customer_wechat" name="customer[wechat]"
                       value="<?= htmlEscape($customer->getData('wechat')); ?>"/>
            </div>
            <div class="buttons">
                <button type="submit"><span><?= __('Save') ?></span></button>
            </div>
        </form>
    </div>
</div>