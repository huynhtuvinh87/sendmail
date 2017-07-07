<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use frontend\components\Featured;

$this->registerMetaTag([
    'name' => 'title',
    'content' => $this->title
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'cửa hàng đá quý, đá phong thủy, đá trang sức, vòng lắc tay, linh vật, vật phẩm, nhẫn, mắt đá dây chuyền, đá trang sức, đá mỹ nghệ'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'THE GIOI TAI LOC - Hotline 0905 951 699 - Hệ Thống Siêu Thị Đá trang sức, Vòng đeo tay, Nhẫn, Linh Vật, Mặt dây chuyền, Vật Phẩm, Đá Quý và Trang Sức Phong Thủy Giá Sỉ toàn Việt Nam.'
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => $this->title
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => Yii::$app->urlManager->createAbsoluteUrl(['shop/images/logo.png'])
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'THE GIOI TAI LOC - Hotline 0905 951 699 - Hệ Thống Siêu Thị Đá trang sức, Vòng đeo tay, Nhẫn, Linh Vật, Mặt dây chuyền, Vật Phẩm, Đá Quý và Trang Sức Phong Thủy Giá Sỉ toàn Việt Nam.'
]);


$this->registerLinkTag([
    'rel' => 'prev',
    'title' => $this->title,
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/'])
]);
$this->registerLinkTag([
    'rel' => 'canonical',
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/'])
]);
$this->registerLinkTag([
    'rel' => 'shortlink',
    'link' => Yii::$app->urlManager->createAbsoluteUrl(['/'])
]);
$this->registerMetaTag([
    'itemprop' => 'image',
    'content' => Yii::$app->urlManager->createAbsoluteUrl(['shop/images/logo.png'])
]);
$this->registerMetaTag([
    'name' => 'twitter:image',
    'content' => Yii::$app->urlManager->createAbsoluteUrl(['shop/images/logo.png'])
]);
?>
<?= \frontend\widgets\SlideWidget::widget() ?>
<div class="search">
    <div class="container">
        <div class="row">
            <?= \frontend\widgets\SearchWidget::widget() ?>
        </div>
    </div>
</div>
<?php
$featured = Featured::product('featured', 10);
if ($featured) {
    ?>
    <section class="section8 block-trending">
        <div class="section-container">
            <h2 class="section-title">Sản phẩm nổi bật</h2>
            <div class="section-content">
                <div class="container">
                    <ul class="products-style8 owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "29" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>
                        <?php
                        foreach ($featured as $key => $value) {
                            ?>

                            <li class="product">
                                <div class="product-container" id="item_<?= $value->id ?>">
                                    <div class="product-thumb left-block ">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]) ?>">
                                            <img class="primary_image img-responsive" src="<?= $value->picture ?>" alt="<?= $value->title ?>">
                                            <img class="secondary_image" src="<?= $value->picture ?>" alt="<?= $value->title ?>">

                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]) ?>"><?= $value->title ?></a>
                                        </h3>
                                        <div class="review">
                                            <?php
                                            $star = $value->getReview()['star'];
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
                                                ?> (<?= $value->getReview()['count'] ?>)
                                            </p>
                                        </div>
                                        <div class="box-price">
                                            <?php
                                            if ($value->price > 0) {
                                                ?>
                                                <span class="price"><?= number_format($value->price, 0, '', '.') ?>₫</span>
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
                        ?> 

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
<div class="block-tab-products">
    <div class="container">
        <ul class="nav-tab">
            <li class="active">
                <a data-toggle="tab" href="#taball"><h2>Tất cả</h2></a>
            </li>        
            <?php
            if ($category) {
                foreach ($category as $key => $value) {
                    ?>
                    <li>
                        <a data-toggle="tab" href="#tab<?= $key ?>"><h2><?= $value->title ?></h2></a>
                    </li>        
                    <?php
                }
            }
            ?> 

        </ul>
        <div class="tab-container">
            <div id="taball" class="tab-panel active">
                <ul class="products-style8 row">

                    <?php
                    if ($products) {
                        foreach ($products as $key => $value) {
                            ?>

                            <?php
                            echo $this->render('_item', ['model' => $value]);
                            ?>

                            <?php
                        }
                    }
                    ?> 

                </ul>
            </div>
            <?php
            if ($category) {
                foreach ($category as $key => $value) {
                    ?>
                    <div id="tab<?= $key ?>" class="tab-panel">
                        <ul class="products-style8 row">
                            <?php
                            if ($value->posts) {
                                foreach ($value->posts as $val) {
                                    echo $this->render('_item', ['model' => $val->product]);
                                }
                            }
                            ?>


                        </ul>
                    </div>
                    <?php
                }
            }
            ?> 


        </div>
    </div>
</div>
<?php
$buy_many = Featured::product('buy_many', 10);
if ($buy_many) {
    ?>
    <section class="section8 block-trending">
        <div class="section-container">
            <h2 class="section-title">Sản phẩm mua nhiều</h2>
            <div class="section-content">
                <div class="container">
                    <ul class="products-style8 owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "29" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>
                        <?php
                        foreach ($buy_many as $key => $value) {
                            ?>

                            <li class="product">
                                <div class="product-container" id="item_<?= $value->id ?>">
                                    <div class="product-thumb left-block ">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]) ?>">
                                            <img class="primary_image img-responsive" src="<?= $value->picture ?>" alt="<?= $value->title ?>">
                                            <img class="secondary_image" src="<?= $value->picture ?>" alt="<?= $value->title ?>">

                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]) ?>"><?= $value->title ?></a>
                                        </h3>
                                        <div class="box-price">
                                            <span class="price"><?= $value->price ? number_format($value->price, 0, '', '.') : 0 ?>₫</span>

                                        </div>                                

                                    </div>
                                </div>
                            </li>

                            <?php
                        }
                        ?> 

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
<!--<section class="section8 block-testimonials parallax">
<div class="section-container">
<h2 class="section-title">Ý kiến khách hàng</h2>
<div class="section-content">
<div class="container">
<div class="testimonial-wapper">
<div class="testimonials">
<ul class="effect-myZoomIn testimonial testimonial-carousel">

<li>
<div class="testimonial-image">
<img src="//bizweb.dktcdn.net/thumb/compact/100/039/549/themes/155109/assets/home-testimonials1.jpg?1477705373470" alt="Vũ Thu Huyền - Giáo viên">
</div>
<div class="info">
<p>Tôi rất thích mua hàng tại KuteShop, giá cả rất tốt và phù hợp. Tôi đã tiết kiệm được rất nhiều khi mua hàng tại đây. Nhất là cách phục vụ tại đây rất ân cần và chu đáo.</p>
<p class="testimonial-nane">Vũ Thu Huyền - Giáo viên</p>
</div>
</li>


<li>
<div class="testimonial-image">
<img src="//bizweb.dktcdn.net/thumb/compact/100/039/549/themes/155109/assets/home-testimonials2.jpg?1477705373470" alt="Vũ Việt Hưng - Kỹ sư">
</div>
<div class="info">
<p>Thật tuyệt khi mua hàng tại KuteShop, tôi cảm thấy mình được phục vụ vô cùng chu đáo và tận tình. Chắc chắn tôi sẽ quay lại mua hàng tại KuteShop nhiều lần nữa. Chúc KuteShop phát triển mạnh mẽ hơn nữa.</p>
<p class="testimonial-nane">Vũ Việt Hưng - Kỹ sư</p>
</div>
</li>


<li>
<div class="testimonial-image">
<img src="//bizweb.dktcdn.net/thumb/compact/100/039/549/themes/155109/assets/home-testimonials3.jpg?1477705373470" alt="Tống Ngọc Ánh - Doanh nhân">
</div>
<div class="info">
<p>Tôi đã mua sản phẩm tại KuteShop, điều tôi nhận thấy là phong cách phục vụ thân thiệt, tư vấn nhiệt tình khi chat của anh chị quản lý. Giá rất tốt vì KuteShop luôn có chương trình giảm giá từ 10% đến 20%.</p>
<p class="testimonial-nane">Tống Ngọc Ánh - Doanh nhân</p>
</div>
</li>

</ul>
</div>
</div>
<div class="testimonial-caption"></div>
</div>
</div>
</div>
</section>-->


<section class="section8 block-blogs">
    <div class="section-container">
        <h2 class="section-title">Tin tức</h2>
        <div class="section-content">
            <div class="container blog-list">
                <div class="blog-list-wapper">
                    <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>

                        <?php
                        if ($blogs) {
                            foreach ($blogs as $blog) {
                                ?>
                                <li>

                                    <div class="post-thumb image-hover2">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $blog->slug]) ?>">
                                            <img src="<?= $blog->picture ?>" alt="<?= $blog->title ?>">
                                        </a>
                                    </div>

                                    <div class="post-desc">
                                        <h3 class="post-title">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $blog->slug]) ?>"><?= $blog->title ?></a>
                                        </h3>
                                        <div class="readmore">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $blog->slug]) ?>">Xem thêm</a>
                                        </div>
                                    </div>
                                </li>

                                <?php
                            }
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
