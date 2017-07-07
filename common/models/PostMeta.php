<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content_meta".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $meta_key
 * @property string $meta_value
 *
 * @property Content $content
 */
class PostMeta extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'meta_key'], 'required'],
            [['post_id'], 'integer'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'meta_key'   => 'Meta Key',
            'meta_value' => 'Meta Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return Product::findOne($this->post_id);
    }

}
