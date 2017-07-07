<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id

 */
class Comment extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const PUBLIC_ACTIVE = 1;
    const PUBLIC_NOACTIVE = 0;

    public static function tableName() {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['content', 'name'], 'required'],
                [['content'], 'string'],
                [['email'], 'email'],
                [['status', 'parent_id', 'post_id'], 'integer'],
                ['status', 'default', 'value' => self::PUBLIC_NOACTIVE]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email' => \Yii::t('app', 'Email'),
            'content' => 'Nội dung',
            'name' => 'Tên',
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

    public static function find() {
        return new query\CommentQuery(get_called_class());
    }

    public function afterDelete() {
        parent::afterDelete();
    }

    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getPublish() {
        return [
            self::PUBLIC_ACTIVE => \Yii::t('app', 'Public'),
            self::PUBLIC_NOACTIVE => \Yii::t('app', 'Private'),
        ];
    }

}
