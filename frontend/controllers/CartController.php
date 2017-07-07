<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use common\models\Product;
use common\models\Order;
use common\models\ProductOrder;

class CartController extends Controller {

    public function actionAdd() {
        $request = \Yii::$app->getRequest();
        $model = Product::findOne($request->post('product_id'));
        $quantity = $request->post('quantity');
        $price = $model->price * $quantity;
        $item = [
            "name" => $model->title,
            "url" => Yii::$app->urlManager->createAbsoluteUrl([$model->slug]),
            "image" => $model->picture,
            "quantity" => $quantity,
            "price" => $price,
        ];
        $cartArray = Yii::$app->session['cart'];
        $cartArray[$model->id] = $item;
        Yii::$app->session['cart'] = $cartArray;
        return $this->redirect(['basket']);
    }

    public function actionUpdate() {
        $request = \Yii::$app->getRequest();
        foreach ($request->post('quantity') as $key => $value) {
            $model = Product::findOne($key);
            $quantity = $_POST['quantity'][$key];
            $price = $model->price * $quantity;
            $item = [
                "name" => $model->title,
                "url" => Yii::$app->urlManager->createAbsoluteUrl([$model->slug]),
                "image" => $model->picture,
                "quantity" => $quantity,
                "price" => $price,
            ];
            $cartArray = Yii::$app->session['cart'];
            $cartArray[$model->id] = $item;
            Yii::$app->session['cart'] = $cartArray;
        }

        return $this->redirect(['basket']);
    }

    public function actionBasket() {
        $session = Yii::$app->session;
        $cart = $session->get('cart');
        return $this->render('basket', ['cart' => $cart]);
    }

    public function actionRemove($id) {

        $session = Yii::$app->session;
        $session->get('cart');
        if (!empty($_SESSION['cart'][$id])) {
            $total = Yii::$app->session->get('quantity') - $_SESSION['cart'][$id]['quantity'];
            Yii::$app->session['quantity'] = $total;
            unset($_SESSION['cart'][$id]);
        } else {
            throw new NotFoundHttpException('This page does not exist in the system.');
        }
        return $this->redirect(['basket']);
    }

    public function actionClear() {

        $session = Yii::$app->session;
        $session->get('cart');
        unset($_SESSION['cart']);
        return $this->redirect(['basket']);
    }

    public function actionCheckout() {
        $cart = Yii::$app->session->get('cart');
        $model = new Order();
        $model->code = $this->code(rand(100000000, 999999999));
        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                if (!empty($cart)) {
                    foreach ($cart as $key => $value) {
                        $productOrder = new ProductOrder();
                        $productOrder->order_id = $model->id;
                        $productOrder->name = $value['name'];
                        $productOrder->url = $value['url'];
                        $productOrder->image = $value['image'];
                        $productOrder->quantity = $value['quantity'];
                        $productOrder->price = $value['price'];
                        $productOrder->save();
                    }
                }
                return $this->redirect(['order', 'code' => $model->code]);
            }
        }
        return $this->render('checkout', ['model' => $model, 'cart' => $cart]);
    }

    public function actionOrder($code) {
        $model = Order::find()->where(['code' => $code])->one();
        return $this->render('order', ['model' => $model]);
    }

    public function code($code) {
        $model = Order::find()->where(['code' => $code])->one();
        if ($model) {
            $this->code(rand(100000000, 999999999));
        }
        return $code;
    }

}
