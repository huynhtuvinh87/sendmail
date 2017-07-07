<?php

namespace frontend\controllers;

use frontend\controllers\FrontendController;
use common\models\Page;
use common\models\Post;


/**
 * Page controller
 */
class PageController extends FrontendController {

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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDetail($slug) {
        $model = Page::find()->andWhere(['slug' => $slug, 'status' => Post::PUBLIC_ACTIVE])->one();
        $this->view->title = $model->title;
        return $this->render('detail', [
                    'model' => $model
        ]);
    }

    protected function findModel($id) {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
