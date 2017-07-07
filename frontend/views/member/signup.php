<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SignUp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                ],
    ]);
    ?>
    <?php
    if (Yii::$app->session->hasFlash('success')) {
        ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php } ?>
    <?= $form->field($model, 'app_name')->textInput() ?>
    <?= $form->field($model, 'from_name')->textInput() ?>
    <?= $form->field($model, 'from_email')->textInput(['placeholder' => 'ví dụ:shang9x@gmail.com']) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'smtp_host')->textInput(['placeholder' => 'ví dụ :smtp.gmail.com']) ?>
    <?= $form->field($model, 'smtp_port')->textInput(['placeholder' => 'ví dụ :587']) ?>
    <?= $form->field($model, 'smtp_ssl')->textInput(['placeholder' => 'ví dụ :TLS']) ?>
    <?= $form->field($model, 'smtp_username')->textInput(['placeholder' => 'tên đăng nhập:']) ?>
    <?= $form->field($model, 'smtp_password')->passwordInput(['placeholder' => 'password đăng nhập']) ?>

    <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-11">
            <?= Html::submitButton('SignUp', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
