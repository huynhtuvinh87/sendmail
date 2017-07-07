<?php

use yii\helpers\Html;
?>

<?php
$form = \yii\widgets\ActiveForm::begin([
            'method' => 'get',
            'action' => ['/search']
        ]);
?>
<div class="col-sm-3">
    <?= $form->field($model, 'keywords')->textInput(['placeholder' => 'Nhập từ khóa cần tìm'])->label(FALSE); ?>
</div>
<div class="col-sm-3">
    <?= $form->field($model, 'zodiac')->dropDownList($model->getZodiacs(), ['prompt' => 'Chọn cung hoàng đạo'])->label(FALSE) ?>
</div>
<div class="col-sm-3">
    <?= $form->field($model, 'age')->dropDownList($model->getAges(), ['prompt' => 'Chọn tuổi'])->label(FALSE) ?>
</div>
<div class="col-sm-3">
    <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-success']); ?>
</div>
<?php $form->end(); ?>
