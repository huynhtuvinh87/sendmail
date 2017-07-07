
<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'Slide');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-right">
                <?php
                $form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'GET',
                            'options' => [
                                'class' => 'form-inline'
                            ]
                ]);
                ?>
                <?= $form->field($search, 'keywords')->textInput()->label(FALSE) ?>
                <button type="submit" class="btn btn-default" style="margin-top: -5px;"><?= Yii::t('app', 'Search') ?></button>
                <?php ActiveForm::end(); ?>
            </div>

            <?php
            Pjax::begin([
                'id' => 'pjax_gridview_page',
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
            <div class="pull-left">
                <div class="form-group" style="margin-bottom: 5px">
                    <select name="action" class="form-control">
                        <option><?= Yii::t('app', 'Builk Actions') ?></option>
                        <option value="delete"><?= Yii::t('app', 'Delete') ?></option>
                    </select>
                </div>
                <button type="submit" id="doaction" class="btn btn-default"><?= Yii::t('app', 'Apply') ?></button>
                <?= Html::a(Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{summary}\n{pager}",
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => 30]],
                        [
                        'class' => 'yii\grid\CheckboxColumn',
                        'multiple' => true,
                        'headerOptions' => ['width' => 10]
                    ],
                        [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function($data) {
                            return !empty($data->picture) ? '<img src="' . $data->picture . '" width="60">' : '<img width="60" src="/uploads/film.jpg">';
                        },
                        'headerOptions' => ['width' => 80]
                    ],
                    'title',
                        [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function($data) {
                            return date('d/m/Y', $data->created_at);
                        }
                    ],
                        [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}',
                        'headerOptions' => ['width' => 50]
                    ],
                ],
            ]);
            ?>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?> 
        </div>
    </div>
</div>
<?= $this->registerJs("
$(document).ready(function() {
    $('form#articleAction button[type=submit]').click(function() {
        return confirm('Rollback deletion of candidate table?');
    });
});
") ?>
