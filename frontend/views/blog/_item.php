<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="post-item">
    <article class="entry">
        <div class="row">
            <div class="col-sm-4">
                <div class="entry-thumb image-hover2">
                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $model->slug]) ?>">
                        <img src="<?= $model->picture ?>" alt="<?= $model->title ?>">
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="entry-ci">
                    <h3 class="entry-title"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $model->slug]) ?>"><?= $model->title ?></a></h3>
                    <div class="entry-meta-data">
                        <span class="author">
                            <i class="fa fa-user"></i> 
                            Đăng bởi: <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $model->slug]) ?>">Admin</a></span> 
                    </div>
                    <div class="entry-excerpt">
                        <?=$model->excerpt?>
                    </div>
                    <div class="entry-more">
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $model->slug]) ?>">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</li>