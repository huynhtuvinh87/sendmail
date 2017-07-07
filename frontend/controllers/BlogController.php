<?php

namespace frontend\controllers;

use frontend\controllers\FrontendController;
use common\models\Blog;
use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\Comment;
use common\models\Order;
use Yii;
use yii\data\ArrayDataProvider;

/**
 * Blog controller
 */
class BlogController extends FrontendController {

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find()->andWhere(['status' => Post::PUBLIC_ACTIVE]),
            'pagination' => [
                'defaultPageSize' => 10,
            ],
        ]);
        $this->view->title = 'Tin tức';
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionSearch() {
        $category = Category::find()->orderBy(['order' => SORT_ASC])->all();

        $search = new ProductSearch();
        $params['ProductSearch']['keywords'] = \Yii::$app->request->queryParams['keywords'];
        $dataProvider = $search->search($params);
        $this->view->title = 'Tìm kiếm: ' . \Yii::$app->request->queryParams['keywords'];
        return $this->render('search', [
                    'dataProvider' => $dataProvider,
                    'category' => $category
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDetail($slug) {
        $model = Blog::find()->where(['slug' => $slug, 'status' => Post::PUBLIC_ACTIVE])->one();
        $this->view->title = $model->title;
        return $this->render('detail', [
                    'model' => $model
        ]);
    }

    protected function findModel($id) {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
