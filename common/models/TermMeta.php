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
class TermMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_id', 'meta_key'], 'required'],
            [['term_id'], 'integer'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
            [['term_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Term::className(), 'targetAttribute' => ['term_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meta_key' => 'Meta Key',
            'meta_value' => 'Meta Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Term::className(), ['id' => 'term_id']);
    }
}
