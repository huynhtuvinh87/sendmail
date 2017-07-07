<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'Zodiac');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genres-index">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <h4><?= \Yii::t('app', 'Add New Zodiac') ?> </h4>
            <?php
            $form = ActiveForm::begin(['action' => ['create']]);
            ?>  
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add New') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12"> <?php
            Pjax::begin([
                'id' => 'pjax_gridview_page',
            ])
            ?>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'zodiacAction',
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
            </div>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n{summary}\n{pager}",
                    'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                            'class' => 'yii\grid\CheckboxColumn',
                            'multiple' => true,
                            'headerOptions' => ['width' => 10]
                        ],
                            [
                            'attribute' => 'name',
                            'value' => function($data) {
                                return $data->getIndent($data->indent) . $data->title;
                            }
                        ],
                        'description',
                        'slug',
                        // 'order',
                        // 'status',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{update}{delete}'
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
    $('form#zodiacAction button[type=submit]').click(function() {
        return confirm('Rollback deletion of candidate table?');
    });
});
") ?>