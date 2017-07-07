<?php

namespace app\models;

use yii\base\Model;

class MemberForm extends Model {

    public $app_name;
    public $from_name;
    public $from_email;
    public $login_email;
    public $reply_to;
    public $allowed_attachments;
    public $currency;
    public $delivery_fee;
    public $cost_per_recipient;
    public $password;
    public $smtp_host;
    public $smtp_port;
    public $smtp_ssl;
    public $smtp_username;
    public $smtp_password;
    public $language;
    public $choose_limit;
    public $reCaptcha;

    public function rules() {
        return [
                [['app_name', 'from_name', 'from_email', 'password', 'smtp_host', 'smtp_port', 'smtp_ssl', 'smtp_username', 'smtp_password','reCaptcha'], 'required'],
                [['language', 'choose_limit', 'allowed_attachments', 'currency', 'delivery_fee', 'cost_per_recipient'], 'string'],
                ['from_email', 'unique', 'targetClass' => '\app\models\App'],
                ['from_email', 'email'],
                ['password', 'string', 'min' => 8]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'app_name' => 'Tên công ty',
            'from_name' => 'Tên người gửi',
            'from_email' => 'Email mà bạn định gửi',
            'reply_to' => 'Địa chỉ email nhận thư',
            'currency' => 'Tiền tệ',
            'delivery_fee' => 'Chi phí',
            'cost_per_recipient' => 'Giá trên người nhận',
            'smtp_host' => 'Domain SMTP',
            'smtp_port' => 'Cổng smtp',
            'smtp_ssl' => 'Smtp SSL',
            'smtp_username' => 'Tên đăng nhập smtp',
            'smtp_password' => 'Password SMTP',
            'bounce_setup' => 'Bounce Setup',
            'complaint_setup' => 'Complaint Setup',
            'app_key' => 'App Key',
            'allocated_quota' => 'Allocated Quota',
            'current_quota' => 'Current Quota',
            'day_of_reset' => 'Day Of Reset',
            'month_of_next_reset' => 'Month Of Next Reset',
            'year_of_next_reset' => 'Year Of Next Reset',
            'test_email' => 'Test Email',
            'brand_logo_filename' => 'Brand Logo Filename',
            'allowed_attachments' => 'Allowed Attachments',
            'reports_only' => 'Reports Only',
        ];
    }

}
