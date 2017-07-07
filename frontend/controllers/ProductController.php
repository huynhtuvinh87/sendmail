<?php

namespace frontend\controllers;

use frontend\controllers\FrontendController;
use common\models\Product;
use common\models\Post;
use common\models\Relationship;
use yii\data\ActiveDataProvider;
use common\models\Category;
use yii\web\NotFoundHttpException;
use common\models\Comment;
use common\models\Order;
use common\models\Blog;
use frontend\models\Search;
use common\models\Review;
use Yii;
use yii\data\ArrayDataProvider;

/**
 * Site controller
 */
class ProductController extends FrontendController {

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
        $category = Category::find()->orderBy(['order' => SORT_DESC])->all();
        $products = Product::find()->andWhere(['status' => Post::PUBLIC_ACTIVE])->orderBy('id DESC')->limit(16)->all();
        $blogs = Blog::find()->andWhere(['status' => Post::PUBLIC_ACTIVE])->orderBy('id DESC')->limit(16)->all();
        $this->view->title = 'Thế giới tài lộc';
        return $this->render('index', ['category' => $category, 'products' => $products, 'blogs' => $blogs]);
    }

    public function actionSearch() {
        $search = new Search();
        $dataProvider = $search->search(Yii::$app->request->getQueryParams());
        $this->view->title = 'Tìm kiếm';
        return $this->render('list', [
                    'dataProvider' => $dataProvider,
                    'search' => $search
        ]);
    }

    public function actionCategory($slug) {
        $category = Category::find()->where(['slug' => $slug])->one();
        if (!$category) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $query = \Yii::$app->db->cache(function ($db) use ($category) {
            return Relationship::find()->where(['term_id' => $category->id])->orderBy(['created_at' => SORT_DESC]);
        });
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 20,
            ],
        ]);
        $this->view->title = $category->title;
        return $this->render('category', [
                    'dataProvider' => $dataProvider,
                    'category' => $category
        ]);
    }

    public function actionList() {

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->andWhere(['status' => Product::PUBLIC_ACTIVE])->orderBy('id DESC'),
            'pagination' => [
                'defaultPageSize' => 20,
            ],
        ]);
        $this->view->title = 'Sản phẩm';
        return $this->render('list', [
                    'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDetail($slug) {
        $model = Product::find()->where(['slug' => $slug, 'status' => Product::PUBLIC_ACTIVE])->one();

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $reviews = new ActiveDataProvider([
            'query' => Review::find()->where(['post_id'=>$model->id])->orderBy('created_at DESC'),
            'pagination' => [
                'defaultPageSize' => 10,
            ],
        ]);

        $formreview = new Review();
        if ($formreview->load(Yii::$app->request->post())) {
            $formreview->post_id = $model->id;
            $formreview->ip = $_SERVER['REMOTE_ADDR'];
            if ($formreview->save()) {
                \Yii::$app->session->setFlash('review_success', \Yii::t('app', 'Bạn đã viết đánh giá thành công'));
                return $this->redirect(['/' . $model->slug . '#review']);
            }
        }

        $this->view->title = $model->title;
        $rel = Relationship::find()->select(['term_id', 'post_id'])->where(['post_id' => $model->id])->distinct()->all();
        $cats = [];
        if (!empty($rel)) {
            foreach ($rel as $value) {
                $cats[] = $value->term_id;
            }
        }
        $category = Category::find()->andWhere(['id' => $cats])->all();
        return $this->render('detail', [
                    'model' => $model,
                    'reviews' => $reviews,
                    'formreview' => $formreview,
                    'order' => new Order(),
                    'category' => $category,
        ]);
    }

    protected function findModel($id) {
        if (($model = App::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function comments($post_id, &$data = [], $parent = NULL) {
        $comments = Comment::find()->where(['post_id' => $post_id, 'parent_id' => $parent])->all();
        foreach ($comments as $key => $value) {
            $data[] = $value;
            unset($comments[$key]);
            $this->comments($value->id, $data, $value->id);
        }
        return $data;
    }

}
