<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

$url = Yii::$app->urlManager->createAbsoluteUrl(['/']);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- Bootstrap -->
        <link rel="icon" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['images/favicon.ico']) ?>">
        <meta http-equiv="cleartype" content="on" />
        <meta http-equiv="expires" content="0" />
        <meta name="resource-type" content="document" />
        <meta name="distribution" content="global" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="1 days" />
        <meta name="rating" content="general" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Thế giới tài lộc - Chuyên kinh doanh các mặt hàng đá trang sức"/>
        <meta itemprop="description" content="Thế giới tài lộc, website chuyên kinh doanh Đá trang sức, Vòng đeo tay, Nhẫn, Linh Vật, Mặt dây chuyền, Vật Phẩm, Đá Quý và Trang Sức Phong Thủy Giá Sỉ toàn Việt Nam. Hotline: 0905 951 699"/>

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product"/>
        <meta name="twitter:site" content="Thế giới tài lộc - Chuyên kinh doanh các mặt hàng đá trang sức"/>
        <meta name="twitter:title" content="Thế giới tài lộc - Chuyên kinh doanh các mặt hàng đá trang sức"/>
        <meta name="twitter:description" content="Thế giới tài lộc, website chuyên kinh doanh Đá trang sức, Vòng đeo tay, Nhẫn, Linh Vật, Mặt dây chuyền, Vật Phẩm, Đá Quý và Trang Sức Phong Thủy Giá Sỉ toàn Việt Nam. Hotline: 0905 951 699"/>
        <meta name="twitter:creator" content="@thegioiphongthuy"/>
        <?php $this->head() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home option8"> 
        <?= $this->beginBody() ?>
        <?= $this->render('header') ?>
        <div class="container">
            <?=
            \yii\widgets\Breadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Trang chủ'),
                    'url' => Yii::$app->urlManager->createAbsoluteUrl(['/']),
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
        </div>
        <?= $content ?>
        <?= $this->render('footer') ?>
        <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>