<?php

namespace common\models;

use common\models\Post;
use yii\web\UploadedFile;

class Page extends Post {

    public $description;
    public $meta_keywords;
    public $meta_description;
    public $thumbnail;
    public $picture;
    public $page_type;
    public $widget;

    const PAGETYPE_ABOUT = 'about';
    const PAGETYPE_CONTACT = 'contact';

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['title'], 'required'],
                [['description', 'meta_keywords', 'meta_description', 'page_type', 'widget'], 'string'],
                [['thumbnail'], 'file']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['description', 'meta_keywords', 'meta_description', 'picture', 'page_type', 'widget'];
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
        return parent::find()->where(['post.type' => Post::TYPE_PAGE]);
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
            $this->slug = \Yii::$app->convert->string($this->title);
            $this->type = 'page';
            return true;
        }
        return false;
    }

    public function getPageType() {
        return [
            self::PAGETYPE_ABOUT => \Yii::t('app', 'About'),
            self::PAGETYPE_CONTACT => \Yii::t('app', 'Contact')
        ];
    }

}
