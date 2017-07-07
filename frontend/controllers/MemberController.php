<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\MemberForm;
use app\models\Login;
use app\models\App;

class MemberController extends Controller {

    public function actionSignup() {

        $model = new MemberForm();
        $model_login = new Login();
        $model_apps = new App();
        if (\Yii::$app->request->post()) {
            $data = (\Yii::$app->request->post('MemberForm'));
            //inser to model app
            $model_apps->userID = 1;
            $model_apps->app_name = $data['app_name'];
            $model_apps->from_name = $data['from_name'];
            $model_apps->from_email = $data['from_email'];
            $model_apps->reply_to = $data['from_email'];
            $model_apps->allowed_attachments = 'jpeg,jpg,gif,png,pdf,zip';
            $model_apps->currency = 'USD';

            $model_apps->smtp_host = $data['smtp_host'];
            $model_apps->smtp_port = $data['smtp_port'];
            $model_apps->smtp_ssl = $data['smtp_ssl'];
            $model_apps->smtp_username = $data['smtp_username'];
            $model_apps->smtp_password = $data['smtp_password'];

            $model_apps->bounce_setup = 0;
            //$model_apps->app_key = ran_string(30, 30, true, false, true);
            $model_apps->app_key = $this->rand_string(30);
            $model_apps->complaint_setup = 0;
            $model_apps->allocated_quota = 20000;
            $model_apps->day_of_reset = date('d');
            if ($model_apps->save()) {
                ////Calculate month of next reset
                $reset_on_day = date('d');
                $today_unix_timestamp = time();
                $day_today = strftime("%e", $today_unix_timestamp);
                $month_today = strftime("%b", $today_unix_timestamp);
                $month_next = strtotime('1 ' . $month_today . ' +1 month');
                $month_next = strftime("%b", $month_next);
                if ($day_today < $reset_on_day)
                    $month_to_reset = $month_today;
                else
                    $month_to_reset = $month_next;
                $model_apps->month_of_next_reset = $month_to_reset;
                $model_apps->reports_only = 0;
                //insert to login
                $model_login->name = $data['from_name'];
                $model_login->company = $data['app_name'];
                $model_login->username = $data['from_email'];
                $pass_encrypted = hash('sha512', $data['password'] . 'PectGtma');
                $model_login->password = $pass_encrypted;
                $model_login->timezone = 'Asia/Ho_Chi_Minh';
                $model_login->tied_to = 1;
                $model_login->app = $model_apps->id;
                $model_login->send_rate = 10;
                $model_login->language = 'vi_VN';
                $model_login->save();
                \Yii::$app->session->setFlash('success', 'Đã thêm thành công');
            }
        }
        return $this->render('signup', [
                    'model' => $model
        ]);
    }

    protected function rand_string($length) {
        $str = null;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        $size = strlen($chars);

        for ($i = 0; $i < $length; $i++) {

            $str .= $chars[rand(0, $size - 1)];
        }

        return $str;
    }

}
