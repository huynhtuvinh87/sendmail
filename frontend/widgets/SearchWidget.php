<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use yii\base\Widget;
use frontend\models\Search;

class SearchWidget extends Widget {

    public function run() {
        $model = new Search();
        if(!empty($_GET['Search']['keywords'])){
            $model->keywords = $_GET['Search']['keywords'];
        }
        if(!empty($_GET['Search']['zodiac'])){
            $model->zodiac = $_GET['Search']['zodiac'];
        }
        if(!empty($_GET['Search']['age'])){
            $model->age = $_GET['Search']['age'];
        }
        return $this->render("search", ['model' => $model]);
    }

}
