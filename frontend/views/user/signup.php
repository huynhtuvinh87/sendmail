<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */
$this->title = 'Đăng ký';
?>
<div class="page-container ptb-30">
    <div class="container">
        <div class="row row-rl-0">
            <div class="col-sm-4 col-lg-offset-4">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Đăng ký <small>hoặc <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/login']) ?>" class="color-green">Đăng nhập</a></small></h3>
                    <?php
                    $form = ActiveForm::begin();
                    ?>  
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(FALSE) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Mật khẩu'])->label(FALSE) ?>

                    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'Họ'])->label(FALSE) ?>

                    <?= $form->field($model, 'firstname')->textInput(['placeholder' => 'Tên'])->label(FALSE) ?>


                    <div class="form-group">
                        <?= Html::submitButton(\Yii::t('app', 'Đăng ký'), ['class' => 'btn btn-block btn-lg btn-success', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </section>
            </div>
        </div>

    </div>
</div>