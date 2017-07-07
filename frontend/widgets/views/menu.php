<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">MENU</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['/'])?>">Trang chủ</a>
                <li><a href="<?=Yii::$app->urlManager->createAbsoluteUrl(['page/gioi-thieu'])?>">Giới thiệu</a>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" >Sản phẩm <span class="caret"></span></a>
                    <ul class="dropdown-menu container-fluid">
                        <li class="block-container">
                            <ul class="block">
                                <?php
                                if (!empty($model)) {
                                    foreach ($model as $value) {
                                        ?>
                                        <li class="link_container">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['category/' . $value->slug]) ?>"><?= $value->title ?></a>
                                            <?php
                                            if (!empty($value->parent)) {
                                                ?>
                                                <ul>
                                                    <?php
                                                    foreach ($value->parent as $val) {
                                                        ?>
                                                    <li class="link_container"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['category/' . $val->slug]) ?>"><?= $val->title ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                                <?php
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>  

                            </ul>
                        </li>
                    </ul> 

                </li>



                <li class="link_container"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/blog']) ?>">Tin tức</a>

                <li>
                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['/page/lien-he']) ?>">Liên hệ</a>
                </li>

            </ul>
        </div>
    </div>
</nav>