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
    'property' => 'og:image',
    'content' => $model->picture
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
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Blog'), 'url' => Yii::$app->urlManager->createAbsoluteUrl(['blog'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columns-container">
    <div class="container" id="columns">                   
        <div class="row">            
            <div class="column col-xs-12 col-sm-3" id="left_column">

                <?= \frontend\widgets\FeaturedBlogWidget::widget() ?>  
            </div>                      
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?= $model->title ?></span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        <span class="author">
                            <i class="fa fa-user"></i> 
                            Đăng bởi: Admin</span>                        
                    </div>
                    <div class="content-text clearfix">
                        <?= $model->content ?>    
                    </div>
                </article>
            </div>            
        </div>        
    </div>
</div> 