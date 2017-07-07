<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['error', 'signup'],
                        'allow' => true,
                    ],
                        [
                        'actions' => ['profile', 'changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
  
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->getSession()->setFlash('success', 'Bạn đã đăng ký thành công, xin vui check mail để kích hoạt tài khoản!');
                return $this->redirect(['signup']);
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionProfile() {
        $model = new Profile();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->profile()) {
                Yii::$app->getSession()->setFlash('success', 'Bạn đã cập nhật thành công!');
                return $this->redirect(['profile']);
            }
        }
        $user = $this->findModel(\Yii::$app->user->id);
        return $this->render('profile', [
                    'model' => $model
        ]);
    }

    public function actionChangepassword() {
        $model = new PasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->change()) {
                Yii::$app->getSession()->setFlash('success', 'Bạn đã thay đổi mật khẩu thành công!');
                return $this->redirect(['changepassword']);
            }
        }
        $user = $this->findModel(\Yii::$app->user->id);
        return $this->render('changepassword', [
                    'model' => $model,
                    'user' => $user
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
