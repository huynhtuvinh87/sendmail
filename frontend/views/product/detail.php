<?php

use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\widgets\ListView;

$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->title
]);
$title = explode(' ', $model->title);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => implode(',', $title)
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => trim($model->excerpt)
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => $model->title
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => $model->picture
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => trim($model->excerpt)
]);
$this->registerLinkTag([
    'rel' => 'prev',
    'title' => $model->title,
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/' . $model->slug])
]);
$this->registerLinkTag([
    'rel' => 'canonical',
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/' . $model->slug])
]);
$this->registerLinkTag([
    'rel' => 'shortlink',
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/' . $model->slug])
]);
$this->registerMetaTag([
    'itemprop' => 'image',
    'content' => $model->picture
]);
$this->registerMetaTag([
    'name' => 'twitter:image',
    'content' => $model->picture
]);
$this->title = $model->title;
if (!empty($category)) {
    foreach ($category as $value) {
        $this->params['breadcrumbs'][] = ['label' => $value->title, 'url' => Yii::$app->urlManager->createAbsoluteUrl(['category/' . $value->slug])];
    }
}
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \frontend\widgets\CountViewWidget::widget(['post_id' => $model->id]) ?>
<!-- BAR -->
<div class="columns-container">
    <div class="container" id="columns">        

        <div class="row">                        
            <div class="center_column col-xs-12 col-sm-12" id="center_column">                
                <div id="product" itemscope itemtype="http://schema.org/Product">
                    <meta itemprop="url" content="<?= Yii::$app->urlManager->createAbsoluteUrl([$model->slug]) ?>o">
                    <meta itemprop="image" content="<?= $model->picture ?>">
                    <meta itemprop="shop-currency" content="VND">

                    <div class="primary-box row">
                        <div class="pb-left-column col-xs-12 col-sm-5">                                
                            <div class="product-image">
                                <div class="product-full">
                                    <img id="product-zoom" src="<?= $model->picture ?>" data-zoom-image="<?= $model->picture ?>" alt="<?= $model->title ?>"/>
                                </div>
                                <!--                                <div class="product-img-thumb" id="gallery_01">
                                                                    <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="21" data-loop="false">
                                
                                                                        <li>
                                                                            <a href="#" data-image="//bizweb.dktcdn.net/thumb/large/100/039/549/products/yeu-thuong-ngot-ngao.jpg?v=1469433925997" data-zoom-image="//bizweb.dktcdn.net/thumb/grande/100/039/549/products/yeu-thuong-ngot-ngao.jpg?v=1469433925997">
                                                                                <img id="product-zoom"  src="//bizweb.dktcdn.net/thumb/small/100/039/549/products/yeu-thuong-ngot-ngao.jpg?v=1469433925997" 
                                
                                                                                     alt=""
                                                                                     /> 
                                                                            </a>
                                                                        </li>
                                
                                
                                                                    </ul>
                                                                </div>-->
                            </div>                                
                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-7">
                            <h1 itemprop="name" class="product-name"><?= $model->title ?></h1>
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
                            <div class="product-price-group">
                                <?php
                                if ($model->price > 0) {
                                    ?>
                                    <span itemprop="price" class="price"><?= number_format($model->price, 0, '', '.') ?>₫</span>
                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-danger" href="tel:+84 905 951 699">Liên hệ</a>
                                    <?php
                                }
                                ?>
                                <span itemprop="price" class="old-price"></span>

                            </div>
                            <div class="info-orther">
                                <p>Mã sản phẩm: <strong>TGTL-<?= $model->id ?></strong></p>
                                <p>Tình trạng sản phẩm: <span class="in-stock">Còn hàng</span></p>                                 
                            </div>
                            <div class="product-desc">
                                <?= $model->content ?>
                            </div>
                            <?php
                            $form = ActiveForm::begin(['action' => '/cart/add', 'options' => ['class' => 'form-inline']]);
                            ?> 

                            <div class="form-action">
                                <input type="hidden" name="product_id" value="<?= $model->id ?>">
                                <div class="form-group">
                                    <label for="quantity">Số lượng</label>
                                    <input type="number" class="form-control" name="quantity" min="1" value="1">
                                </div>
                                <div class="button-group">

                                    <?php
                                    if ($model->tracking_link) {
                                        ?>
                                        <a target="_bank" href="<?= $model->tracking_link ?>" class="btn btn-danger">Đặt mua tại Lazada</a>
                                        <?php
                                    } else {
                                        ?>
                                        <p>
                                            <a class="btn btn-primary" href="tel:+84 1278 365 253">Miền Bắc: 01278 365 253</a>
                                            <a class="btn btn-success" href="tel:+84 905 951 699">Miền Trung: 0905 951 699</a>
                                        </p>
                                        <p>
                                            <button class="btn btn-danger">Mua ngay</button>
                                        </p>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>
                            <?php
                            ActiveForm::end();
                            ?>
                        </div>
                    </div>
                    <div id="review">
                        <h3>Đánh giá (<?= $model->getReview()['count'] ?>)</h3>
                        <?php
                        if (empty($model->getIPReview())) {
                            ?>
                            <div class="row">
                                <?= $this->render('_formreview', ['formreview' => $formreview]) ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    Pjax::begin([
                        'id' => 'pjax_listview_reviews',
                    ])
                    ?>
                    <?=
                    ListView::widget([
                        'dataProvider' => $reviews,
                        'options' => [
                            'tag' => 'div',
                            'class' => 'col-sm-12',
                            'id' => 'list-star',
                        ],
                        'layout' => "{items}\n<div class='col-sm-12 pagination-page'>{pager}</div>",
                        'itemView' => '_review',
                    ]);
                    ?>
                    <?php Pjax::end() ?>
                    <div class="page-product-box">
                        <h3 class="heading">Sản phẩm liên quan</h3>
                        <?= frontend\widgets\RelatedPostWidget::widget(['id' => $model->id]) ?>

                    </div>                                               

                </div>                
            </div>            
        </div>

    </div>
</div>