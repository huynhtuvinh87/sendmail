<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id

 */
class Order extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const STATUS_ACTIVE = 1;
    const STATUS_NOACTIVE = 0;

    public static function tableName() {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['fullname', 'email', 'address', 'phone', 'total'], 'required'],
                ['note', 'string'],
                [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email' => \Yii::t('app', 'Email'),
            'address' => 'Địa chỉ',
            'fullname' => 'Tên',
            'phone' => 'Điện thoại',
            'note' => 'Ghi chú'
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

    public function afterDelete() {
        parent::afterDelete();
    }

    public function getPublish() {
        return [
            self::STATUS_ACTIVE => 'Đã thanh toán',
            self::STATUS_NOACTIVE => 'Chưa thanh toán',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(ProductOrder::className(), ['order_id' => 'id']);
    }

}
