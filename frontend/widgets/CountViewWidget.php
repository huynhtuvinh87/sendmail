<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use yii\base\Widget;
use common\models\PostView;

class CountViewWidget extends Widget {

    public $post_id;

    public function run() {
        $time_now = time();
        $time_out = 900000;
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = $time_now - $time_out;
        $model = PostView::find()->where(['ip' => $ip, 'post_id' => $this->post_id])->one();
        if (!empty($model)) {
            if ($model->last_visit <= $time) {
                $model->last_visit = $time_now;
                $model->hit = $model->hit + 1;
                $model->save();
            }
        } else {
            $counter = new PostView();
            $counter->post_id = $this->post_id;
            $counter->ip = $ip;
            $counter->last_visit = $time_now;
            $counter->hit = 1;
            $counter->save();
        }
    }

}

?>
