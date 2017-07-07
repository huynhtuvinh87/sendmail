<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container ptb-70">
    <div class="container">
        <div class="row row-rl-0">
            <div class="col-sm-4 col-lg-offset-4">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Đăng nhập <small>hoặc <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['user/signup']) ?>" class="color-green">Đăng ký</a></small></h3>
                    <?php
                    $form = ActiveForm::begin();
                    ?>  
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(FALSE) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Mật khẩu'])->label(FALSE) ?>

                    <div class="form-group">
                        <?= Html::submitButton(\Yii::t('app', 'Đăng nhập'), ['class' => 'btn btn-block btn-lg btn-success', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </section>
            </div>
        </div>

    </div>
</div>