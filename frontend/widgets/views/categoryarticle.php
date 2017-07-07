<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="widget categories-widget panel pt-20 prl-20">
    <div class="widget-header">
        <h3 class="widget-title h-title">Danh mục</h3>
    </div>
    <div class="widget-body ptb-20">
        <ul>
            <?php
            if (!empty($model)) {
                foreach ($model as $value) {
                    if ($value->count > 0) {
                        ?>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/category/' . $value->slug]) ?>"><?= $value->title ?> <span><?= $value->count ?></span></a>
                        </li>
                        <?php
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>
