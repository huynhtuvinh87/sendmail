<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id

 */
class ProductOrder extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'product_order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
   
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

}
