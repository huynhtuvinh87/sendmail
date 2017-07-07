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
class PostView extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'post_view';
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        $postview = self::find()->where(['post_id' => $this->post_id])->sum('hit');
        $command = Yii::$app->db->createCommand();
        $command->update('post', array(
            'views' => $postview,
                ), 'id=:id', array(':id' => $this->post_id));
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost() {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

}
