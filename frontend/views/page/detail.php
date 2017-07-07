<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

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
    'content' => $model->excerpt
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => $model->title
]);

$this->registerMetaTag([
    'property' => 'og:description',
    'content' => $model->excerpt
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
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columns-container">
    <div class="container" id="columns">		

        <h1 class="page-heading">
            <span class="page-heading-title2"><?= $this->title ?></span>
        </h1>	
        <div class="page-content">
            <div class="rte">
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div> 