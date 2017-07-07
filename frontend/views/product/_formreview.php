<?php

use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin(['id' => 'reviewForm', 'options' => ['class' => 'review-form']]);
?>
<?php if (Yii::$app->session->hasFlash('review_success')): ?>
    <div class="col-xs-12">
        <div class="comment-notes alert alert-info">
            <span><?= Yii::$app->session->getFlash('review_success') ?></span> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<div class="col-sm-6">
    <?= $form->field($formreview, 'fullname')->textInput()->label() ?>

    <?= $form->field($formreview, 'email')->textInput()->label() ?>


</div>
<div class="col-xs-6">
    <div>
        <div id="stars-default" data-rating="0"></div>
        <?= $form->field($formreview, 'star')->hiddenInput()->label(FALSE) ?>
    </div>
    <?= $form->field($formreview, 'content')->textarea(['rows' => 3])->label() ?>
</div>
<div class="col-xs-12">
    <div class="pull-right">
        <input name="submit" type="submit" class="btn btn-primary" value="Đánh giá" />
    </div>
</div>

<?php ActiveForm::end(); ?>

<?= $this->registerJs('
       $(document).ready(function () {
        $("#stars-default").rating("create", {onClick: function () {
                $("#review-star").val(this.attr("data-rating"));
            }});
    });
');
?>