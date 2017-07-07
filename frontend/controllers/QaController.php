<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\QA;

/**
 * Default controller for the `Sitemap` module
 */
class QaController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate() {
        $model = new QA();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => $model->save()];
        }
    }

}
