<?php

use yii\bootstrap\ActiveForm;

$this->title = 'Giỏ hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columns-container">
    <div class="container" id="columns">                      
        <h1 class="page-heading">
            <span class="page-heading-title2">Giỏ hàng</span>
        </h1>  

        <?php
        $form = ActiveForm::begin(['action' => '/cart/update', 'options' => ['class' => 'form-inline']]);
        ?> 

        <div class="page-content page-order">            
            <div class="box-border table-responsive">
                <?php
                if (!empty($cart)) {
                    $stt = 1;
                    $price = 0;
                    $quantity = 0;
                    ?>
                    <table class="table table-bordered cart_summary">
                        <thead>
                            <tr>
                                <th class="cart_product">Sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cart as $key => $value) {
                                $price += $value['price'] * $value['quantity'];
                                $quantity += $value['quantity'];
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
                                        <input class="form-control input-sm" type="number" name="quantity[<?= $key ?>]" value="<?= $value['quantity'] ?>" min="1" name="quantity">
                                    </td>
                                    <td class="price">
                                        <span><?= number_format($value['price'] * $value['quantity'], 0, '', '.') ?>₫</span>
                                    </td>
                                    <td >
                                        <a href="/cart/remove?id=<?= $key ?>">Xóa</a>
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

                    <div class="cart_navigation">
                        <a class="prev-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['san-pham']) ?>">Tiếp tục mua sắm</a>
                        <a class="next-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['cart/clear']) ?>">Xóa giỏ hàng</a>
                        <button type="submit" class="button pull-right">Cập nhật</button>
                        <a class="next-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['cart/checkout']) ?>">Thanh toán</a>
                    </div>
                    <?php
                } else {
                    echo 'Bạn không có sản phẩm nào trong giỏ hàng';
                }
                ?>
            </div>
        </div>
        <?php
        ActiveForm::end();
        ?>
    </div>
</div>
