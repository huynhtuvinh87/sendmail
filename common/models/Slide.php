<?php

namespace common\models;

use common\models\Post;
use yii\web\UploadedFile;

class Slide extends Post {

    public $description;
    public $meta_keywords;
    public $meta_description;
    public $thumbnail;
    public $picture;
    public $link;
    public $price;
    public $price_sale;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['title'], 'required'],
                [['description', 'meta_keywords', 'meta_description', 'link', 'price', 'price_sale'], 'string'],
                ['link', 'url'],
                [['thumbnail'], 'file']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['description', 'meta_keywords', 'meta_description', 'picture', 'link', 'price', 'price_sale'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(
                parent::attributeLabels(), [
            'thumbnail' => \Yii::t('app', 'Picture')
                ]
        );
    }

    public static function find() {
        return parent::find()->where(['post.type' => Post::TYPE_SLIDE]);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $thumbnail = UploadedFile::getInstance($this, 'thumbnail');
            if (!empty($thumbnail)) {
                $name =  $this->slug .'-'. time(). '.' . $thumbnail->extension;
                $thumbnail->saveAs(\Yii::getAlias("@frontend/web/uploads/") . $name);
                $this->picture = \Yii::$app->params['domain'] . '/uploads/' . $name;
            }

            $this->author = \Yii::$app->user->id;
            $this->type = 'slide';
            return true;
        }
        return false;
    }

}
