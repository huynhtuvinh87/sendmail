<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="row">
    <div class="col-md-12"><?= \common\widgets\Alert::widget() ?></div>
</div>
<?= $form->field($model, 'title')->textInput(['placeholder' => 'Làm thế nào (làm sao đây) để']) ?>

<div class="row">
    <div class="col-md-8">
        <?= $form->field($model, 'content')->textarea(['style' => 'height:150px']) ?>
    </div>
    <div class="col-md-4">
        <label for="article-image" style="padding-top: 8px">
            <?= $form->field($model, 'image')->fileInput(['class' => 'selector', 'style' => 'display:none', 'data' => '#rs-image'])->label(FALSE) ?>
            <img src="<?= $model->picture ?>" class="img-thumbnail" id="rs-image">
        </label>
    </div>
</div>
<div ng-controller="ListController" class="row">     
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr ng-repeat="item in items">

                    <td>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="title[]" class="form-control" ng-model="item.title" value="{{item.title}}" placeholder="Tiêu đề"/>

                                <textarea style="margin-top: 10px; min-height: 150px" name="description[]" value="{{item.description}}" class="form-control" ng-model="item.description"  placeholder="Nội dung"></textarea>
                            </div>
                            <div class="col-md-2">
                                <label for="image_{{item.key}}">
                                    <input type="file" id="image_{{item.key}}" name="image[]" class="form-control selector" style="display: none" data="#img_{{item.key}}" ng-model="item.image"/>
                                    <img src="{{item.image}}" class="img-thumbnail" id="img_{{item.key}}">
                                    <input type="hidden" name="picture[]" value="{{item.filename}}">
                                </label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" ng-model="item.selected"/>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="form-group">
            <a ng-hide="!items.length" class="btn btn-danger pull-right" ng-click="remove()">Xóa</a>
            <a class="btn btn-primary addnew pull-right" ng-click="addNew()" style="margin-right: 5px">Thêm</a>
        </div>
    </div>
</div>


<div class="form-group">
    <?= Html::submitButton(($model->isNewRecord) ? \Yii::t('app', 'Đăng bài') : \Yii::t('app', 'Sửa bài'), ['class' => ($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>

</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript">
<?php
$answers = [];
if (!empty($model->answers)) {
    foreach ($model->answers as $k => $value) {
        $answers[] = ['key' => $k, 'title' => $value->title, 'description' => $value->description, 'image' => $value->picture, 'filename' => $value->image];
    }
}
?>
    var answers = <?= json_encode($answers) ?>;
</script>
<?=
$this->registerJs("
$(document).ready(function () {
        $(document).on('change', '.selector', function () {
            readURL(this, $(this).attr('data'));
        });
        function readURL(input, id_show) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id_show).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
");
?>
