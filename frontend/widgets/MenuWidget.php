<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Category;
use Yii;

class MenuWidget extends Widget {

    public function init() {
        
    }

    public function run() {
        $model = Category::find()->andWhere(['parent_id' => NULL])->orderBy(['order' => SORT_ASC])->all();
        return $this->render('menu', ['model' => $model]);
    }

    private static function recrusive($parent = NULL) {
        $items = Category::find()->andWhere(['parent_id' => $parent])->limit(8)->orderBy(['order' => SORT_ASC])->asArray()->all();
        $result = [];
        foreach ($items as $key => $item) {
            $result[] = [
                'label' => $item['title'],
                'url' => Yii::$app->urlManager->createAbsoluteUrl(['/category/' . $item['slug']]),
                'items' => static::recrusive($item['id'])
            ];
        }
        return $result;
    }

}

?>
