<?php

use yii\helpers\Html;
?>
<div class="widget recent-posts panel pt-20 prl-20">
    <h3 class="widget-title h-title">Gợi ý câu hỏi</h3>
    <div class="widget-body ptb-30">
        <?php
        $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'formQA',
                    'action' => ['qa/create']
        ]);
        ?>
        <p class="message-qa"></p>
        <?= $form->field($model, 'title')->textInput(['placeholder' => 'Tiêu đề câu hỏi'])->label(FALSE); ?>
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email của bạn'])->label(FALSE); ?>

        <?= Html::submitButton('Submit', ['class' => ($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']); ?>
        <?php $form->end(); ?>
    </div>
</div>
<?= $this->registerJs("
    $(document).ready(function () {
        $('body').on('beforeSubmit', 'form#formQA', function () {
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
                        $('.message-qa').html('<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>Bạn đã đặt câu hỏi thành công. </div>');
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