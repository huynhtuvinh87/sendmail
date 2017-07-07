<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\components;

use yii\base\Component;
use common\models\PostMeta;
use common\models\Product;

class Featured extends Component {

    public static function product($key, $limit) {
        $model = PostMeta::find()->where(['meta_key' => $key, 'meta_value' => 1])->limit($limit)->all();
        $cats = [];
        if (!empty($model)) {
            foreach ($model as $value) {
                $cats[] = $value->post_id;
            }
        }
        $products = Product::find()->where(['id' => $cats,'status'=> Product::PUBLIC_ACTIVE])->orderBy(['created_at'=>SORT_DESC])->all();
        return $products;
    }

}
