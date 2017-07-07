<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title                   = \Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
    <div class="row">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</div>