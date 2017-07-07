<div class="block left-module">
    <h2 class="title_block">Tin nổi bật</h2>
    <div class="block_content">                        
        <div class="layered">
            <div class="layered-content">
                <ul class="blog-list-sidebar clearfix">
                    <?php
                    if ($products) {
                        foreach ($products as $value) {
                            
                            ?>
                            <li>
                                <div class="post-thumb">

                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $value->slug]) ?>"><img src="<?= $value->picture ?>" alt="<?= $value->title ?>"></a>

                                </div>
                                <div class="post-info">
                                    <h3 class="entry_title"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/' . $value->slug]) ?>"><?= $value->title ?></a></h3>

                                </div>
                            </li>

                            <?php
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>                        
    </div>
</div>  