<?php

namespace common\models\searchs;

use common\models\Order;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageSearch represents the model behind the search form about `common\modules\Post\models\Post`.
 */
class OrderSearch extends Order {

    public $keywords;
    public $pageSize = 20;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['keywords'], 'safe'],
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
        $query = Order::find();
        $query->orderBy('created_at DESC');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => $this->pageSize
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // find by trainer code
        if (!empty($this->keywords)) {

            $lowerKeywords = strtolower($this->keywords);

            $query->andFilterWhere([
                'or',
                    ['like', 'LOWER([[order]].[[fullname]])', $lowerKeywords]
            ])->andFilterWhere([
                'or',
                    ['like', 'LOWER([[order]].[[email]])', $lowerKeywords]
            ])->andFilterWhere([
                'or',
                    ['like', 'LOWER([[order]].[[address]])', $lowerKeywords]
            ]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->orderBy('id DESC');

        return $dataProvider;
    }

}
