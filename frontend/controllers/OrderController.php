<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Order;
use common\models\Product;

/**
 * Default controller for the `Sitemap` module
 */
class OrderController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate() {
        $model = new Order();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $product = Product::findOne($model->post_id);
            $model->total = $model->number * $product->price;
            $model->code = $this->code(rand(100000000, 999999999));
            return ['success' => $model->save()];
        }
    }

    public function code($code) {
        $model = Order::find()->where(['code' => $code])->one();
        if ($model) {
            $this->code(rand(100000000, 999999999));
        }
        return $code;
    }

}
