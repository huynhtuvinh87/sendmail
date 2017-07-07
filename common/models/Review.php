<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id

 */
class Review extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['content', 'fullname'], 'required'],
                [['content'], 'string'],
                [['email'], 'email'],
                [['star', 'post_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email' => \Yii::t('app', 'Email'),
            'content' => 'Nội dung',
            'fullname' => 'Tên'
        ];
    }

    public function behaviors() {
        return array_merge(parent::behaviors(), [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ]);
    }


}
