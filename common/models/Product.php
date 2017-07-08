<?php

namespace common\models;

use common\models\Post;
use yii\web\UploadedFile;
use backend\components\Resize;

class Product extends Post {

    public $category;
    public $description;
    public $tag;
    public $price;
    public $price_sale;
    public $images;
    public $featured;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['title',], 'required'],
                [['description', 'image', 'price', 'price_sale', 'featured'], 'string'],
                [['category', 'tag'], 'default']
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['tag', 'images', 'description', 'featured', 'price', 'price_sale'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(
                parent::attributeLabels(), [
            'image' => 'Hình ảnh',
            'title' => 'Tiêu dề',
            'description' => 'Mô tả',
            'price_fake' => 'Giá sỉ',
            'price' => 'Giá',
            'price_sale' => 'Giá khuyến mãi',
            'content' => 'Nội dung'
                ]
        );
    }

    public static function find() {
        return parent::find()->where(['post.type' => Post::TYPE_PRODUCT]);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->slug = \Yii::$app->convert->string($this->title);
            $this->author = \Yii::$app->user->id;
            $this->type = Post::TYPE_PRODUCT;
            $image = UploadedFile::getInstance($this, 'image');
            if ($image) {
                $name = $this->slug . '-' . time();
                $image->saveAs(\Yii::getAlias("@frontend/web/uploads/") . $name . '.' . $image->extension);
                list($width, $height) = getimagesize(\Yii::getAlias("@frontend/web/uploads/") . $name . '.' . $image->extension);
                if ($width > 900 && $height > 650) {
                    Resize::resizeThumbnailImage(\Yii::getAlias('@frontend/web/uploads/') . $name . '.' . $image->extension, \Yii::getAlias('@frontend/web/uploads/') . $name . '.' . $image->extension, 900, 645, 0, 0, 1);
                } else {
                    Resize::resizeThumbnailImage(\Yii::getAlias('@frontend/web/uploads/') . $name . '.' . $image->extension, \Yii::getAlias('@frontend/web/uploads/') . $name . '.' . $image->extension, $width, $height - 28, 0, 0, 1);
                }
                $this->image = $name . '.' . $image->extension;
            } else {
                $this->image = Product::findOne($this->id)->image;
            }
            $tags = [];
            if (!empty($this->tag)) {
                foreach ($this->tag as $value) {
                    $tag = Tag::find()->where(['title' => $value])->one();
                    if (!$tag) {
                        $tag = new Tag;
                        $tag->title = $value;
                        $tag->type = 'tag';
                        $tag->save();
                    }
                    $tags[$tag->id] = $tag->title;
                }
            }
            $this->tag = implode(',', $tags);

            $files = UploadedFile::getInstances($this, 'multiple_image');
            $images = [];
            if (!empty($files)) {
                foreach ($files as $key => $file) {
                    $file->saveAs(\Yii::getAlias("@frontend/web/uploads/") . $this->slug . '-' . $key . '.' . $file->extension);
                    $images[] = $this->slug . '-' . $key . '.' . $file->extension;
                }
            }
            if (!empty($_POST['images'])) {
                $images = array_merge($images, $_POST['images']);
            }
            $this->images = serialize($images);
            return true;
        }
        return false;
    }

    public function getCategories(&$data = [], $parent = NULL) {
        $post = Post::findOne($this->id);
        $category = Category::find()->andWhere(['parent_id' => $parent])->all();
        foreach ($category as $key => $value) {
            $item = Relationship::find()->where(['post_id' => $this->id])->all();
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
            $data[] = ['id' => $value->id, 'title' => $this->getIndent($value->indent) . $value->title, 'checked' => $checked];
            unset($category[$key]);
            $this->getCategories($data, $value->id);
        }
        return $data;
    }


    public function getIPReview() {
        return Review::find()->where(['ip' => $_SERVER['REMOTE_ADDR'], 'post_id' => $this->id])->one();
    }

    public function getReview() {
        $count = Review::find()->where(['post_id' => $this->id])->count();
        return ['star' => ($this->countstar * 5) > 0 ? $this->countstar * 10 : 0, 'count' => $count];
    }

    public function getCountstar() {
        $count_5 = Review::find()->where(['post_id' => $this->id, 'star' => '5'])->count();
        $count_4 = Review::find()->where(['post_id' => $this->id, 'star' => '4'])->count();
        $count_3 = Review::find()->where(['post_id' => $this->id, 'star' => '3'])->count();
        $count_2 = Review::find()->where(['post_id' => $this->id, 'star' => '2'])->count();
        $count_1 = Review::find()->where(['post_id' => $this->id, 'star' => '1'])->count();
        if (($count_1 + $count_2 + $count_4 + $count_3 + $count_5) > 0) {
            $total = ($count_1 + $count_2 + $count_4 + $count_3 + $count_5) / (($count_5 * 5) + ($count_4 * 4) + ($count_3 * 3) + ($count_2 * 2) + ($count_1 * 1));
            return round($total, 1);
        } else {
            return 0;
        }
    }

    public function getPicture() {
        return !empty($this->image) ? \Yii::$app->params['domain'] . '/uploads/' . $this->image : \Yii::$app->params['domain'] . '/images/default.jpg';
    }

}
