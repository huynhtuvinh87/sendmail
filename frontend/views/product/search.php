<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerMetaTag([
    'name' => 'title',
    'content' => $this->title
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'làm thế nào, làm sao đây, làm gì đây, lam the nao, nhu the nao, lam sao day, lam gi day, lam sao'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Làm sao đây, website hướng dẫn cách làm mọi thứ, trang trí nhà cửa, cách nấu ăn, cách đi du lịch, cách tán gái, cách làm việc.'
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => $this->title
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => Yii::$app->urlManager->createAbsoluteUrl(['images/logo.png'])
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Làm sao đây, website hướng dẫn cách làm mọi thứ, trang trí nhà cửa, cách nấu ăn, cách đi du lịch, cách tán gái, cách làm việc.'
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
?>
<!-- BAR -->
<div class="bar-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-bar">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BAR -->
<div class="container">

    <div class="row">
        <div class="page-content col-xs-12 p-sm-10">

            <?php Pjax::begin() ?>
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => [
                    'tag' => 'div',
                    'class' => 'list-wrapper row row-tb-20',
                    'id' => 'list-wrapper',
                ],
                'layout' => "{items}\n<div class='col-sm-12 pagination-page'>{pager}</div>",
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_item', ['model' => $model]);
                },
            ]);
            ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
<?= $this->registerJs('
$("#sort_category").on("change",function(){    
var val = $("#sort_category option:selected").val();
window.location.href = "/?sort="+val;
});
');
?>