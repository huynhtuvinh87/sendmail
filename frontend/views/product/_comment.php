
<li class="comment comment-bypostauthor media">
    <article class="comment-wrapper media-body">
        <!-- Comment Metadata -->
        <div class="comment-meta mb-5">
            <a href="#comment" data-id="<?= $model->id ?>" class="comment-reply-link btn btn-xs btn-gray btn-rounded comment-reply">Trả lời <i class="fa fa-reply"></i></a>
            <h5 class="comment-author-name mb-5 "><?= $model->name ?>
                <small>
                    <?php
                    if (!empty($model->parent)) {
                        echo '(' . $model->parent->name . ')';
                    }
                    ?>
                </small>
            </h5>
            <span class="color-muted"><?= date('d/m/Y', $model->created_at) ?></span>
        </div>
        <!-- End Comment Metadata -->

        <!-- Comment Content -->
        <div class="comment-content color-mid">
            <p><?= $model->content ?></p>
        </div>
        <!-- End Comment Content -->
    </article>


</li>