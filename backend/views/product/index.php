<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'Product');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-right">
                <?php
                $form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'GET',
                            'options' => [
                                'class' => 'form-inline'
                            ]
                ]);
                ?>
                <?= $form->field($search, 'keywords')->textInput()->label(FALSE) ?>
                <button type="submit" class="btn btn-default" style="margin-top: -5px;"><?= Yii::t('app', 'Search') ?></button>
                <?php ActiveForm::end(); ?>
            </div>

            <?php
            Pjax::begin([
                'id' => 'pjax_gridview_product',
            ])
            ?>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'productAction',
                        'action' => ['doaction'],
                        'options' => [
                            'class' => 'form-inline'
                        ]
            ]);
            ?>
            <div class="pull-left">
                <div class="form-group" style="margin-bottom: 5px">
                    <select name="action" class="form-control">
                        <option><?= Yii::t('app', 'Builk Actions') ?></option>
                        <option value="price"><?= Yii::t('app', 'Change price') ?></option>
                        <option value="delete"><?= Yii::t('app', 'Delete') ?></option>
                    </select>
                </div>
                <button type="submit" id="doaction" class="btn btn-default"><?= Yii::t('app', 'Apply') ?></button>
                <?= Html::a('Xuất excel', ['excel'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{summary}\n{pager}",
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => 30]],
                        [
                        'class' => 'yii\grid\CheckboxColumn',
                        'multiple' => true,
                        'headerOptions' => ['width' => 10]
                    ],
                        [
                        'attribute' => 'author',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<img width="150" src="' . $data->picture . '" alt="">';
                        },
                        'headerOptions' => ['width' => 200]
                    ],
                        [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($data) {
                            $html = $data->title .'</br><strong>';
                            $html .= $data->status == 1 ? "<span class='text-success'>Đã duyệt</span>" : "<span class='text-danger'>Chưa duyệt</span>";
                            $html .= '<strong>';
                            return $html;
                        },
                        'headerOptions' => ['width' => 200]
                    ],
                        [
                        'attribute' => 'price',
                        'format' => 'raw',
                        'value' => function($data) {
                            $html = '<div class="form-group"  style="margin-bottom:10px"><label style="width:60px">Giá sỉ:</label><input type="number" class="form-control" name=price_fake[' . $data->id . '] value="' . $data->price_fake . '"></div>';
                            $html .= '<div class="form-group"><label style="width:60px">Giá bán:</label><input type="number" class="form-control" name=price[' . $data->id . '] value="' . $data->price . '"></div>';
                            return $html;
                        },
                    ],
                       
                        [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function($data) {
                            return date('d/m/Y', $data->created_at) . '<br><small>' . date('d/m/Y h:i:s', $data->updated_at) . '</small>';
                        }
                    ],
                        [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}',
                        'headerOptions' => ['width' => 50]
                    ],
                ],
            ]);
            ?>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?> 
        </div>
    </div>
</div>
<?= $this->registerJs("
$(document).ready(function() {
    $('form#productAction button[type=submit]').click(function() {
        return confirm('Rollback deletion of candidate table?');
    });
});
") ?>
