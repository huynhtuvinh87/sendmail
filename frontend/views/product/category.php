<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columns-container">
    <div class="container">

        <div class="row">            


            <div class="center_column col-xs-12 col-sm-12" id="center_column">  

                <div id="view-product-list" class="view-product-list">
                    <h1 class="page-heading">
                        <span class="page-heading-title"><?= $this->title ?></span>
                    </h1>


                    <?php Pjax::begin() ?>
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'options' => [
                            'tag' => 'ul',
                            'class' => 'row product-list grid',
                            'id' => 'list-wrapper',
                        ],
                        'layout' => "{items}\n<div class='col-sm-12 pagination-page'>{pager}</div>",
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('_list', ['model' => $model->product]);
                        },
                    ]);
                    ?>
                    <?php Pjax::end() ?>
                </div>                
            </div>

        </div>
    </div>
</div>