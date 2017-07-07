<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$this->title = 'Danh sách bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <section class="panel p-20">
                    <h3 class="widget-title h-title">Danh sách bài viết</h3>
                    <div class="widget-body ptb-30">
                        <div class="row">
                            <div class="col-md-12"><?= \common\widgets\Alert::widget() ?></div>
                        </div>
                        <?php
                        Pjax::begin([
                            'id' => 'pjax_gridview_article',
                        ])
                        ?>
                        <?php
                        $form = ActiveForm::begin([
                                    'id' => 'articleAction',
                                    'action' => ['doaction'],
                                    'options' => [
                                        'class' => 'form-inline'
                                    ]
                        ]);
                        ?>
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => "{items}\n{summary}\n{pager}",
                            'columns' => [
                                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => 30]],
                                'title',
                                    [
                                    'attribute' => 'status',
                                    'format' => 'raw',
                                    'value' => function($data) {
                                        return $data->status == 0 ? "Chưa duyệt" : "Đã duyệt";
                                    },
                                    'headerOptions' => ['width' => 200]
                                ],
                                    [
                                    'attribute' => 'created_at',
                                    'format' => 'raw',
                                    'value' => function($data) {
                                        return date('d/m/Y', $data->created_at) . '<br><small>' . date('d/m/Y h:i:s', $data->updated_at) . '</small>';
                                    }
                                ],
                                    [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}{delete}',
                                    'buttons' => [
                                        'update' => function ($url, $model) {
                                            if ($model->status == 0) {
                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                            'title' => Yii::t('app', 'Cập nhật')
                                                ]);
                                            }
                                        },
                                        'delete' => function ($url, $model) {
                                            if ($model->status == 0) {
                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                            'title' => Yii::t('yii', 'Delete'),
                                                            'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                                            'data-method' => 'post',
                                                ]);
                                            }
                                        }
                                    ],
                                    'headerOptions' => ['width' => 50]
                                ],
                            ],
                        ]);
                        ?>
                        <?php ActiveForm::end(); ?>
                        <?php Pjax::end() ?>
                    </div>
                </section>
            </div>
            <div class="col-sm-3">
                <?= $this->render('/user/sidebar') ?>
            </div>
        </div>
    </div>
</div>