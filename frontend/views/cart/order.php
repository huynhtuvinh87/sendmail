<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\bootstrap\ActiveForm;

$this->title = 'Thông tin đơn hàng';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="columns-container">
    <div class="container" id="columns">                      
        <h1 class="page-heading">
            <span class="page-heading-title2"><?= $this->title ?></span>
        </h1>  

        <div class="page-content page-order">            
            <div class="box-border table-responsive">
                <div class="row">
                    <div class="col-sm-2">Tên</div><div class="col-sm-10"><?=$model->fullname?></div>
                    <div class="col-sm-2">Email</div><div class="col-sm-10"><?=$model->email?></div>
                    <div class="col-sm-2">Điện thoại</div><div class="col-sm-10"><?=$model->phone?></div>
                    <div class="col-sm-2">Địa chỉ</div><div class="col-sm-10"><?=$model->address?></div>
                    <div class="col-sm-2">Ghi chú</div><div class="col-sm-10"><?=$model->note?></div>
                    <div class="col-sm-12">
                        <?php
                        if (!empty($model->products)) {
                            $stt = 1;
                            $price = 0;
                            ?>
                        <table class="table table-bordered cart_summary" style="margin-top: 30px">
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
                                    foreach ($model->products as $key => $value) {
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
            </div>


        </div>
    </div>
</div>