<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Viết bài';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <section class="panel p-20">
                    <h3 class="widget-title h-title">Đăng bài</h3>
                    <div class="widget-body ptb-30">
                        <?= $this->render('_form', ['model' => $model]) ?>
                    </div>
                </section>
            </div>
            <div class="col-sm-3">
                <?= $this->render('/user/sidebar') ?>
            </div>
        </div>
    </div>