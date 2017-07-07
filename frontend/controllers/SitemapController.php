<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Category;

/**
 * Default controller for the `Sitemap` module
 */
class SitemapController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $post = \Yii::$app->db->cache(function () {
            return \common\models\Article::find()->all();
        });
        $category = \Yii::$app->db->cache(function () {
            return Category::find()->all();
        });
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = \Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/xml');
        return $this->renderPartial('index', ['post' => $post, 'category' => $category]);
    }

}
