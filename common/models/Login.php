<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property string $id
 * @property string $name
 * @property string $company
 * @property string $username
 * @property string $password
 * @property string $s3_key
 * @property string $s3_secret
 * @property string $api_key
 * @property string $license
 * @property string $timezone
 * @property integer $tied_to
 * @property integer $app
 * @property string $paypal
 * @property integer $cron
 * @property integer $cron_ares
 * @property integer $send_rate
 * @property string $language
 * @property integer $cron_csv
 * @property string $ses_endpoint
 * @property integer $auth_enabled
 * @property string $auth_key
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company' => 'Company',
            'username' => 'Username',
            'password' => 'Password',
            's3_key' => 'S3 Key',
            's3_secret' => 'S3 Secret',
            'api_key' => 'Api Key',
            'license' => 'License',
            'timezone' => 'Timezone',
            'tied_to' => 'Tied To',
            'app' => 'App',
            'paypal' => 'Paypal',
            'cron' => 'Cron',
            'cron_ares' => 'Cron Ares',
            'send_rate' => 'Send Rate',
            'language' => 'Language',
            'cron_csv' => 'Cron Csv',
            'ses_endpoint' => 'Ses Endpoint',
            'auth_enabled' => 'Auth Enabled',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @inheritdoc
     * @return LoginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoginQuery(get_called_class());
    }
}
