<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="col-md-9 col-sm-9 col-xs-12">

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Enter email here'])->label(FALSE) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Enter phone here'])->label(FALSE) ?>
        <?= $form->field($model, 'note')->textarea([ 'placeholder' => 'Enter note here'])->label(FALSE) ?>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_title">
            <?= \Yii::t('app', 'Categories') ?>
        </div>
        <div class="x_panel">
            <?=
                    $form->field($model, 'category')
                    ->checkboxList($model->getCategories(), [
                        'item' => function($index, $label, $name, $checked, $value) {
                            $check = $label['checked'] == 1 ? ' checked="checked"' : '';
                            $return = '<div class="checkbox"><label><input type="checkbox" name="' . $name . '" ' . $check . ' value="' . $label['id'] . '" >' . $label['title'] . '</label></div>';
                            return $return;
                        }
                    ])->label(FALSE);
            ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton(($model->isNewRecord) ? \Yii::t('app', 'Create') : \Yii::t('app', 'Update'), ['class' => ($model->isNewRecord) ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
