<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Slide;

class SlideWidget extends Widget {

    public function run() {
        $model = Slide::find()->andWhere(['status' => Slide::PUBLIC_ACTIVE])->all();
        return $this->render("slide", ['model' => $model]);
    }

}
