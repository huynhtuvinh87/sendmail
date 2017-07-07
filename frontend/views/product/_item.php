
<li class="product col-sm-6 col-md-3">
    <div class="product-container" id="item_<?= $model->id ?>">
        <div class="product-thumb left-block ">
            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$model->slug]) ?>">
                <img class="primary_image img-responsive" src="<?= $model->picture ?>" alt="<?= $model->title ?>">
                <img class="secondary_image" src="<?= $model->picture ?>" alt="<?= $model->title ?>">
            </a>
        </div>
        <div class="product-info">
            <h3 class="product-name">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$model->slug]) ?>"><?= $model->title ?></a>
            </h3>
            <div class="review">
                <?php
                $star = $model->getReview()['star'];
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
                    ?> (<?= $model->getReview()['count'] ?>)
                </p>
            </div>
            <div class="box-price">
                <?php
                if ($model->price > 0) {
                    ?>
                    <span class="price"><?= number_format($model->price, 0, '', '.') ?>₫</span>
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