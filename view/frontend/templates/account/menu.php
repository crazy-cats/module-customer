<?php
/*
 * Copyright © 2019 CrazyCat, Inc. All rights reserved.
 * See COPYRIGHT.txt for license details.
 */

/* @var $this \CrazyCat\Core\Block\Template */
?>
<div class="block block-customer-menu">
    <div class="block-content">
        <ul>
            <li><a href="<?php echo getUrl( 'customer/account/index' ); ?>"><span><?php echo __( 'Dashboard' ) ?></span></a></li>
            <li><a href="<?php echo getUrl( 'customer/account/edit' ); ?>"><span><?php echo __( 'Edit Information' ) ?></span></a></li>
        </ul>
    </div>
</div>