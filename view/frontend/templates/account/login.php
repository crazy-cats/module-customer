<?php
/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/* @var $this \CrazyCat\Base\Block\Template */
?>
<div class="block block-customer-login">
    <div class="block-title">
        <h1><?= __('Login'); ?></h1>
    </div>
    <div class="block-content">
        <form method="post" action="<?= getUrl('customer/account/login_post') ?>">
            <div class="field">
                <input type="text" name="username" class="input-text" autocomplete="off"
                       placeholder="<?= htmlEscape(__('Username')) ?>"/>
            </div>
            <div class="field">
                <input type="password" name="password" class="input-text"
                       placeholder="<?= htmlEscape(__('Password')) ?>"/>
            </div>
            <div class="actions">
                <button class="button" type="submit"><span><?= __('Login') ?></span></button>
            </div>
        </form>
    </div>
</div>