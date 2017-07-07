<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 */
class Info extends ActiveRecord {

    public $category;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['email'], 'required'],
                [['email'], 'email'],
                [['phone', 'note'], 'string'],
                [['category'], 'default'],
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

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        InfoTerm::deleteAll(['info_id' => $this->id]);
        if (!empty($this->category)) {
            foreach ($this->category as $value) {
                $infoterm = new InfoTerm();
                $infoterm->term_id = $value;
                $infoterm->info_id = $this->id;
                $infoterm->save();
            }
        }
    }

    public function getCategories($data = []) {
        $post = Info::findOne($this->id);
        $category = Category::find()->all();
        foreach ($category as $key => $value) {
            $item = InfoTerm::find()->where(['info_id' => $this->id])->all();
            $cats = [];
            if (!empty($item)) {
                foreach ($item as $val) {
                    $cats[] = $val->term_id;
                }
            }
            if (in_array($value->id, $cats))
                $checked = 1;
            else
                $checked = 0;
            $data[] = ['id' => $value->id, 'title' => $value->title, 'checked' => $checked];
        }
        return $data;
    }

}
