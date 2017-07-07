<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
$this->title = 'Tin tức';
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
                    <span class="page-heading-title2">Tin tức</span>
                </h1>
                <?php Pjax::begin() ?>
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'ul',
                        'class' => 'blog-posts',
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
</div> 