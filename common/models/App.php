<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apps".
 *
 * @property string $id
 * @property integer $userID
 * @property string $app_name
 * @property string $from_name
 * @property string $from_email
 * @property string $reply_to
 * @property string $currency
 * @property string $delivery_fee
 * @property string $cost_per_recipient
 * @property string $smtp_host
 * @property string $smtp_port
 * @property string $smtp_ssl
 * @property string $smtp_username
 * @property string $smtp_password
 * @property integer $bounce_setup
 * @property integer $complaint_setup
 * @property string $app_key
 * @property integer $allocated_quota
 * @property integer $current_quota
 * @property integer $day_of_reset
 * @property string $month_of_next_reset
 * @property string $year_of_next_reset
 * @property string $test_email
 * @property string $brand_logo_filename
 * @property string $allowed_attachments
 * @property integer $reports_only
 */
class App extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apps';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'app_name' => 'App Name',
            'from_name' => 'From Name',
            'from_email' => 'From Email',
            'reply_to' => 'Reply To',
            'currency' => 'Currency',
            'delivery_fee' => 'Delivery Fee',
            'cost_per_recipient' => 'Cost Per Recipient',
            'smtp_host' => 'Smtp Host',
            'smtp_port' => 'Smtp Port',
            'smtp_ssl' => 'Smtp Ssl',
            'smtp_username' => 'Smtp Username',
            'smtp_password' => 'Smtp Password',
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

    /**
     * @inheritdoc
     * @return AppsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AppsQuery(get_called_class());
    }
}
