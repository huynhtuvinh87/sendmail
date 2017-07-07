<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = \Yii::t('app', 'Update');
?>
<div class="news-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
