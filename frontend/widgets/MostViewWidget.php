<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\Article;

class MostViewWidget extends Widget {

    public function run() {
        $model = Article::find()->where([ '>','views', 100])->orderBy(['views' => SORT_DESC])->limit(10)->all();
        return $this->render("mostview", ['model' => $model]);
    }

}
