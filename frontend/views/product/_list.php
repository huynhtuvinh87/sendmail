<li class="col-sx-12 col-sm-3"  data-key="<?= $model->id; ?>">
    <div class="product-container" id="<?= $model->id ?>">
        <div class="left-block">
            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$model->slug]) ?>">
                <img class="img-responsive" alt="<?= $model->title ?>" src="<?= $model->picture ?>">
            </a>
        </div>
        <div class="right-block">
            <h3 class="product-name"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$model->slug]) ?>"><?= $model->title ?></a></h3>
            <div class="review text-center">
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
            <div class="content_price">
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
            <div class="info-orther">
                <p>Mã sản phẩm: TGTL-<?= $model->id ?></p>
                <p class="availability">Tình trạng: <span>Còn hàng</span></p>
            </div>
        </div>
    </div>
</li>