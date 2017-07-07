<?php

namespace common\models;

use common\models\Term;

class Tag extends Term {

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
        return parent::find()->where(['term.type' => 'tag']);
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
            $parent = Term::findOne($this->parent_id);
            if (!empty($parent)) {
                $this->indent = $parent->indent + 1;
            } else {
                $this->indent = 0;
            }
            $this->slug = \Yii::$app->convert->string($this->title);
            $this->type = 'tag';
            return true;
        }
        return false;
    }

}
