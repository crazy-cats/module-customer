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
        <h1><?php echo __( 'Customer Information' ); ?></h1>
    </div>
    <div class="block-content">
        <form method="post" action="<?php echo getUrl( 'customer/account/editpost' ) ?>">
            <div class="row">
                <label for="customer_first_name"><?php echo __( 'First Name' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_first_name" name="customer[first_name]"
                       value="<?php echo htmlEscape( $customer->getData( 'first_name' ) ); ?>" />
            </div>
            <div class="row">
                <label for="customer_last_name"><?php echo __( 'Last Name' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_last_name" name="customer[last_name]"
                       value="<?php echo htmlEscape( $customer->getData( 'last_name' ) ); ?>" />
            </div>
            <div class="row">
                <label for="customer_username"><?php echo __( 'Username' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_username" name="customer[username]"
                       value="<?php echo htmlEscape( $customer->getData( 'username' ) ); ?>" />
            </div>
            <div class="row">
                <label for="customer_email"><?php echo __( 'E-mail' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_email" name="customer[email]"
                       value="<?php echo htmlEscape( $customer->getData( 'email' ) ); ?>" />
            </div>
            <div class="row">
                <label for="customer_mobile"><?php echo __( 'Mobile' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_mobile" name="customer[mobile]"
                       value="<?php echo htmlEscape( $customer->getData( 'mobile' ) ); ?>" />
            </div>
            <div class="row">
                <label for="customer_wechat"><?php echo __( 'WeChat' ) ?></label>
                <input type="text" class="input-text"
                       id="customer_wechat" name="customer[wechat]"
                       value="<?php echo htmlEscape( $customer->getData( 'wechat' ) ); ?>" />
            </div>
            <div class="buttons">
                <button type="submit"><span><?php echo __( 'Save' ) ?></span></button>
            </div>
        </form>
    </div>
</div>