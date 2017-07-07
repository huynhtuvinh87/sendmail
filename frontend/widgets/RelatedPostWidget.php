<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\Relationship;

class RelatedPostWidget extends Widget {

    public $id;

    public function run() {
        $category = Relationship::find()->where(['post_id' => $this->id])->all();
        $cats = [];
        if (!empty($category)) {
            foreach ($category as $value) {
                $cats[] = $value->term_id;
            }
        }
        $model = Relationship::find()->where(['term_id'=> $cats])->andWhere(['not in', 'post_id', $this->id])->limit(10)->all();
        return $this->render("relatedpost", ['model' => $model]);
    }

}
