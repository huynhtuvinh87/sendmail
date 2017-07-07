<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'formOrder',
            'action' => ['order/create']
        ]);
?>
<p class="message-qa"></p>
<?= $form->field($order, 'post_id')->hiddenInput(['value' => $model->id])->label(FALSE) ?>
<?= $form->field($order, 'fullname')->textInput()->label() ?>
<?= $form->field($order, 'email')->textInput()->label() ?> 
<?= $form->field($order, 'phone')->textInput()->label() ?>   
<?= $form->field($order, 'address')->textInput()->label() ?>
<?= $form->field($order, 'number')->textInput(['type' => 'number', 'min' => 1])->label() ?>
<div class="form-group text-center">
    <?= Html::submitButton('Đặt hàng', ['class' => ($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>


<?= $this->registerJs("
    $(document).ready(function () {
        $('body').on('beforeSubmit', 'form#formOrder', function () {
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                success: function (response)
                {
                    $('#qa-title').val('');
                    $('#qa-email').val('');
                    if(response.success){
                        $('.message-qa').html('<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ cho bạn sớm nhất. </div>');
                    }
                },
                error: function ()
                {
                    console.log('internal server error');
                }
            });
            return false;
        });
    });
");
?>