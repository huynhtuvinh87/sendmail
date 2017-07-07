<?php

namespace common\models;

use common\models\Term;

class Zodiac extends Term {

    public $description;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['title'], 'required'],
                [['description'], 'string']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['description'];
    }

    public static function find() {
        return parent::find()->where(['term.type' => 'zodiac']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(
                parent::attributeLabels(), [
                ]
        );
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->slug = \Yii::$app->convert->string($this->title);
            $this->type = 'zodiac';
            return true;
        }
        return false;
    }

}
