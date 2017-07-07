<div class="homeslide8" style="overflow-x:hidden">
    <ul class="bxslider-background home-slider8">
        <?php
        if (!empty($model)) {
            foreach ($model as $value) {
                ?>
                <li class="item">
                    <a href="<?= $value->link ?>"><img src="<?= $value->picture ?>" alt="<?=$value->title?>"/></a>
                </li>
                <?php
            }
        }
        ?>


    </ul>
</div>