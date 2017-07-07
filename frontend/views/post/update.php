<?php
$this->title = 'Sửa bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-container ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <section class="panel p-20">
                    <h3 class="widget-title h-title">Sửa bài viết</h3>
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
</div>