<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul class="products-style8 owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
    <?php
    if (!empty($model)) {
        foreach ($model as $value) {
            ?>
            <li class="product">
                <div class="product-container">
                    <div class="product-thumb left-block ">
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->product->slug]) ?>">
                            <img class="primary_image img-responsive" src="<?= $value->product->picture ?>" alt="<?= $value->product->title ?>">
                            <img class="secondary_image" src="<?= $value->product->picture ?>" alt="<?= $value->product->title ?>">

                        </a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->product->slug]) ?>"><?= $value->product->title ?></a>
                        </h3>
                        <div class="review text-center">
                            <?php
                            $star = $value->product->getReview()['star'];
                            ?>
                            <p class="star">
                                <?php
                                for ($i = 1; $i < 6; $i++) {
                                    if ($i <= $star) {
                                        echo '<span class="fa fa-star active"></span>';
                                    } else {
                                        echo '<span class="fa fa-star"></span>';
                                    }
                                }
                                ?> (<?= $value->product->getReview()['count'] ?>)
                            </p>
                        </div>
                        <div class="box-price">
                            <?php
                            if ($value->product->price > 0) {
                                ?>
                                <span class="price"><?= number_format($value->product->price, 0, '', '.') ?>₫</span>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-danger" href="tel:+84 905 951 699">Liên hệ</a>
                                <?php
                            }
                            ?>
                        </div>                                

                    </div>
                </div>
            </li>
            <?php
        }
    }
    ?>




</ul>