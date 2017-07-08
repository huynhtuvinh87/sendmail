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
        <?= $form->field($model, 'description')->textarea(['style' => 'height:100px']) ?>
        <?= $form->field($model, 'content')->textarea(['class' => 'text-editor']) ?>
     <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => 1]) ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_title">
            <?= \Yii::t('app', 'Status') ?>
        </div>
        <div class="x_panel">
            <?= $form->field($model, 'status')->dropDownList($model->postStatus)->label(FALSE) ?>
            
        </div>
        <?php 
        if($model->getCategories()){
        ?>
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
    <?php 
        }
    ?>
        <div class="x_title">
            <?= \Yii::t('app', 'Image') ?>
        </div>
        <div class="x_panel">
            <label for="product-image">
                <?= $form->field($model, 'image')->fileInput(['class' => 'selector', 'style' => 'display:none', 'data' => '#rs-image'])->label(FALSE) ?>
                <img src="<?= $model->picture ?>" class="img-thumbnail" id="rs-image">
            </label>
        </div>
        <div class="x_title">
            <?= \Yii::t('app', 'Tags') ?>
        </div>
        <div class="x_panel">
            <?= \backend\widgets\TagWidget::widget(['model' => $model, 'form' => $form]) ?>
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
        $(document).on('change', '.selector', function () {
            readURL(this, $(this).attr('data'));
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
     $(document).on('click', '.img-item a', function () { 
    $(this).parent().remove();
});
");
?>
