<?php

namespace common\models;

use common\models\Post;
use yii\web\UploadedFile;

class Blog extends Post {

    public $description;
    public $thumbnail;
    public $picture;
    public $featured_blog;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['title'], 'required'],
                [['description', 'featured_blog'], 'string'],
                [['thumbnail'], 'file']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['description', 'picture', 'featured_blog'];
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
        return parent::find()->where(['post.type' => 'blog']);
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
            $this->type = 'blog';
            return true;
        }
        return false;
    }

}
