<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\PostMeta;
use common\models\Blog;

class FeaturedBlogWidget extends Widget {

    public function run() {
        $model = PostMeta::find()->where(['meta_key' => 'featured_blog'])->orderBy(['meta_value' => 1])->limit(10)->all();
        $cats = [];
        if (!empty($model)) {
            foreach ($model as $value) {
                $cats[] = $value->post_id;
            }
        }
        $products = Blog::find()->where(['id' => $cats])->all();
        return $this->render("featuredBlog", ['products' => $products]);
    }

}
