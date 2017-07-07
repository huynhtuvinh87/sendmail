<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="widget recent-posts panel pt-20 prl-20">
    <h3 class="widget-title h-title">Bài viết xem nhiều</h3>
    <div class="widget-body ptb-30">
        <?php
        if (!empty($model)) {
            foreach ($model as $value) {
                ?>
                <div class="recent-post media">
                    <div class="post-thumb media-left">
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]); ?>">
                            <img class="media-object" src="<?=$value->picture?>" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h5 class="font-15 mb-10">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl([$value->slug]); ?>"><?=$value->title?></a>
                        </h5>
                      
                        <p><?=$value->views ?> lượt xem</p>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</div>