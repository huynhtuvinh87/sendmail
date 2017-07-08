<?php

namespace common\models;

use common\models\Post;
use yii\web\UploadedFile;

class Service extends Post {

    public $description;
    public $thumbnail;
    public $picture;
    

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
            [['title'], 'required'],
            [['description'], 'string'],
            [['thumbnail'], 'file']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['description', 'picture'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(
                parent::attributeLabels(), [
            'thumbnail' => \Yii::t('app', 'Picture'),
            'featured_blog' => 'Nổi bật'
                ]
        );
    }

    public static function find() {
        return parent::find()->where(['post.type' => 'service']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $thumbnail = UploadedFile::getInstance($this, 'thumbnail');
            if (!empty($thumbnail)) {
                $name = $this->slug . '-' . time() . '.' . $thumbnail->extension;
                $thumbnail->saveAs(\Yii::getAlias("@frontend/web/uploads/") . $name);
                $this->picture = \Yii::$app->params['domain'] . '/uploads/' . $name;
            }

            $this->author = \Yii::$app->user->id;
            $this->type = 'service';
            return true;
        }
        return false;
    }

}
