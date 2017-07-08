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

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Enter title here'])->label(FALSE) ?>
        <?= $form->field($model, 'description')->textarea() ?>
        <?= $form->field($model, 'content')->textarea(['class' => 'text-editor']) ?>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">

        <div class="x_title">
            <?= \Yii::t('app', 'Status') ?>
        </div>
        <div class="x_panel">
            <?= $form->field($model, 'status')->dropDownList($model->postStatus)->label(FALSE) ?>
        </div>
        <div class="x_title">
            <?= \Yii::t('app', 'Image') ?>
        </div>
        <div class="x_panel">
            <label for="service-thumbnail">
                <?= $form->field($model, 'thumbnail')->fileInput(['class' => 'upload-file-selector', 'style' => 'display:none'])->label(FALSE) ?>
                <img src="<?= !empty($model->picture) ? $model->picture : '/uploads/film.jpg' ?>" class="img-thumbnail" id="rs-image">
            </label>
            <?= $form->field($model, 'picture')->textInput()->hiddenInput()->label(FALSE) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(($model->isNewRecord) ? \Yii::t('app', 'Create') : \Yii::t('app', 'Update'), ['class' => ($model->isNewRecord) ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?=
$this->registerJs("
$(document).ready(function () {
        $(document).on('change', '.upload-file-selector', function () {
            readURL(this, '#rs-image');
        });
        function readURL(input, id_show) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id_show).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
");
?>
