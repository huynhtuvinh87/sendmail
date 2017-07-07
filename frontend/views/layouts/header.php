<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div id="header" class="header header8">
    <div id="main-header">
        <div class="container main-header">
            <div class="col-xs-12 col-sm-3 col-lg-3">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/']) ?>">              
                    <img class="logo" alt="Thế giới tài lộc" src="<?= \Yii::$app->params['domain'] . '/shop/images/logo.png' ?>"/>              
                </a>
            </div>
            <div class="col-sm-10 col-md-7 col-lg-8 main-menu-wapper">
                <div id="main-menu" class="main-menu">
                    <?= frontend\widgets\MenuWidget::widget() ?>
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-1 group-button-header">
                <div class="btn-cart" id="cart-block">
                    <a title="Giỏ hàng" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['cart/basket']) ?>">Giỏ hàng</a>
                    <?php
                    if (Yii::$app->session->get('cart')) {
                        $quantity = 0;
                        foreach (Yii::$app->session->get('cart') as $key => $value) {
                            $quantity += $value['quantity'];
                        }
                        ?>
                        <span class="notify notify-right"><span class="cartCount"><?= $quantity ?></span></span>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>  
