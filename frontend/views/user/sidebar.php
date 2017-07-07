<div class="widget categories-widget panel pt-20 prl-20">
    <div class="widget-header">
        <h3 class="widget-title h-title">Tài khoản</h3>
    </div>
    <div class="widget-body ptb-20">
        <ul>

            <li>
                <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl(['post/create']) ?>">Viết bài</a>
            </li>
            <li>
                <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl(['post/index']) ?>">Danh sách bài viết</a>
            </li>
            <li>
                <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl(['#']) ?>">Thông tin thanh toán</a>
            </li>
            <li>
                <a href="<?= \Yii::$app->urlManager->createAbsoluteUrl(['site/logout']) ?>">Thoát</a>
            </li>

        </ul>
    </div>
</div>