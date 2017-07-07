
<div class="page-content col-xs-12">

    <!-- Blog Area -->
    <div class="blog-area blog-single-post">
        <div class="row row-tb-10">

            <!-- Blog Post -->
            <div class="blog-post col-xs-12">
                <article class="entry panel">
                    <?php 
                    if($model->image){
                    ?>
                    <figure class="entry-media post-thumbnail">
                        <img src="<?=$model->picture?>">
                    </figure>
                    <?php }?>
                    <div class="entry-wrapper prl-20 prl-md-30 pt-20 pt-md-30 pb-15">
                        <div class="entry-content">
                            <strong><?=$key?>. <?=$model->title?>.</strong> <?=nl2br($model->description)?>
                        </div>

                    </div>
                </article>

            </div>
            <!-- End Blog Post -->


        </div>
    </div>
    <!-- End Blog Area -->

</div>