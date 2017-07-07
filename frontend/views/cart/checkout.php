<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\bootstrap\ActiveForm;

$this->title = 'Đặt hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columns-container">
    <div class="container" id="columns">                      
        <h1 class="page-heading">
            <span class="page-heading-title2"><?= $this->title ?></span>
        </h1>  

        <?php
        $form = ActiveForm::begin(['action' => '/cart/checkout']);
        ?> 

        <div class="page-content page-order">            
            <div class="box-border table-responsive">
                <div class="row">
                    <div class="col-sm-6">

                        <?= $form->field($model, 'fullname')->label() ?>
                        <?= $form->field($model, 'phone')->label() ?>
                        <?= $form->field($model, 'email')->label() ?>
                        <?= $form->field($model, 'address')->label() ?>


                    </div>
                    <div class="col-sm-6">

                        <?= $form->field($model, 'note')->textarea(['rows' => 10]) ?>


                    </div>
                    <div class="col-sm-12">
                        <?php
                        if (!empty($cart)) {
                            $stt = 1;
                            $price = 0;
                            ?>
                            <table class="table table-bordered cart_summary">
                                <thead>
                                    <tr>
                                        <th class="cart_product">Sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($cart as $key => $value) {
                                        $price += $value['price'] * $value['quantity'];
                                        ?>
                                        <tr>
                                            <td class="cart_product">
                                                <a href="<?= $value['url'] ?>"><img src="<?= $value['image'] ?>" alt="<?= $value['image'] ?>"></a>
                                            </td>
                                            <td class="cart_description">
                                                <p class="product-name"><a href="<?= $value['url'] ?>"><?= $value['name'] ?> </a></p>

                                            </td>
                                            <td class="price"><span><?= number_format($value['price'], 0, '', '.') ?> ₫</span></td>
                                            <td class="qty">
                                                <?= $value['quantity'] ?>
                                            </td>
                                            <td class="price">
                                                <span><?= number_format($value['price'] * $value['quantity'], 0, '', '.') ?>₫</span>
                                            </td>
                                       
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                               
                                <td colspan="4"><strong>Tổng tiền</strong></td>
                                <td colspan="2"><strong><?= number_format($price, 0, '', '.') ?></strong></td>
                                </tr>
                                </tfoot>
                            </table>

                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-lg-offset-10">
                        <div class="pull-right total-price">
                            <button type="submit" class="btn btn-danger pull-right">Đặt hàng</button>
                        </div>
                    </div>
                </div> 
                <?= $form->field($model, 'total')->hiddenInput(['value'=>$price])->label(FALSE) ?>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>