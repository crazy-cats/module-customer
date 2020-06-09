<?php
/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/* @var $this \CrazyCat\Base\Block\Template */
?>
<div class="block block-customer-menu">
    <div class="block-content">
        <ul>
            <li>
                <a href="<?= getUrl('customer/account/index'); ?>">
                    <span><?= __('Dashboard') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= getUrl('customer/account/edit'); ?>">
                    <span><?= __('Edit Information') ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>