<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use common\models\Product;
use common\models\searchs\ProductSearch;
use yii\web\NotFoundHttpException;
use backend\components\BackendController;

class ProductController extends BackendController {

    public function behaviors() {
        return parent::behaviors();
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex() {
        $search = new ProductSearch();
        $dataProvider = $search->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'search' => $search
        ]);
    }

    public function actionExcel() {
        header('Content-Encoding: UTF-8');
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=" . date('d-m-Y') . '-' . time() . '.csv');
        header("Pragma: no-cache");
        header("Expires: 0");

        $header = array('Ten', 'Gia si', 'Gia ban', 'Link', 'Hinh anh');
        $list = array();
        array_push($list, $header);
        $product = Product::find()->all();
        foreach ($product as $data) {
            $title = \Yii::$app->convert->unsigned($data->title);
            if (!empty($data->price_fake)) {
                $row = array(
                    $title,
                    $data->price_fake,
                    $data->price,
                    \Yii::$app->params['domain'] . '/' . $data->slug,
                    $data->picture
                );
                array_push($list, $row);
            }
        }
        $output = fopen("php://output", "w");
        foreach ($list as $row) {
            fputcsv($output, $row); // here you can change delimiter/enclosure
        }
        fclose($output);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->images = unserialize($model->images);
        $tags = [];
        if ($model->tag) {
            foreach (explode(',', $model->tag) as $value) {
                $tag = \common\models\Tag::findOne($value);
                $tags[] = $tag->id;
            }
        }
        $model->tag = $tags;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'page' => $this->page]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDoaction() {
        if (!empty($_POST['selection']) && !empty($_POST['action']) && ($_POST['action'] == "delete")) {
            foreach ($_POST['selection'] as $value) {
                $this->findModel($value)->delete();
            }
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'Delete success'));
        }
        if (!empty($_POST['action']) && ($_POST['action'] == "price")) {
            foreach ($_POST['price'] as $k => $value) {
                $model = $this->findModel($k);
                $model->price_fake = $_POST['price_fake'][$k];
                $model->price = $_POST['price'][$k];
                $model->save();
            }
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'Price success'));
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
