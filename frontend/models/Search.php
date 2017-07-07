<?php

namespace frontend\models;

use common\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Zodiac;
use common\models\Age;
use common\models\Relationship;

class Search extends Model {

    public $keywords;
    public $zodiac;
    public $age;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['keywords', 'zodiac', 'age'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Product::find();
        $query->orderBy('created_at DESC');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 20
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // find by trainer code
        if (!empty($params['Search']['keywords'])) {
            $lowerKeywords = strtolower($params['Search']['keywords']);
            $query->andWhere([
                'or',
                    ['like', 'LOWER([[post]].[[title]])', $lowerKeywords]
            ]);
        }
        $z = [];
        if (!empty($params['Search']['zodiac'])) {
            $zodiac = Zodiac::findOne($params['Search']['zodiac']);
            if ($zodiac) {
                $arr = Relationship::find()->where(['term_id' => $zodiac->id])->all();
                foreach ($arr as $value) {
                    $z[] = $value->post_id;
                }
            }
        }
        $a = [];
        if (!empty($params['Search']['age'])) {
            $age = Age::findOne($params['Search']['age']);
            if ($age) {
                $arr = Relationship::find()->where(['term_id' => $age->id])->all();
                foreach ($arr as $value) {
                    $a[] = $value->post_id;
                }
            }
        }
        $ids = array_unique(array_merge($z, $a));
        if (!empty($params['Search']['zodiac']) && !empty($params['Search']['age'])) {
            $r = [];
            foreach ($ids as $key => $value) {
                if (!empty($z[$key]) && !empty($a[$key])) {
                    if ($z[$key] == $a[$key]) {
                        $r[] = $z[$key];
                    }
                }
            }
            $query->andWhere(['id' => $r]);
        } else {
            $query->andWhere(['id' => $ids]);
        }

        return $dataProvider;
    }

    public function getZodiacs($data = []) {
        $zodiac = Zodiac::find()->all();
        foreach ($zodiac as $key => $value) {
            $data[$value->id] = $value->title;
        }
        return $data;
    }

    public function getAges($data = []) {
        $age = Age::find()->all();
        foreach ($age as $key => $value) {
            $data[$value->id] = $value->title;
        }
        return $data;
    }

}
