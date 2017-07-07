<div class="media">
    <div class="media-body">
        <h4 class="media-heading"><?= $model->fullname ?></h4>
        <p class="star">
            <?php
            for ($i = 1; $i < 6; $i++) {
                if ($i <= $model->star) {
                    echo '<span class="fa fa-star active"></span>';
                } else {
                    echo '<span class="fa fa-star"></span>';
                }
            }
            ?>
        </p>
        <p><?= $model->content ?></p>
    </div>
</div>