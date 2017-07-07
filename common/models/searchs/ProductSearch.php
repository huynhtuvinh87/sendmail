<?php

namespace common\models\searchs;

use common\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostSearch represents the model behind the search form about `common\modules\Post\models\Post`.
 */
class ProductSearch extends Product {

    public $keywords;
    public $user;
    public $pagination;

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
        $query = Product::find();
        $query->orderBy('created_at DESC');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => $this->pagination ? $this->pagination : 20
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
                    ['like', 'LOWER([[post]].[[title]])', $lowerKeywords]
            ]);
        }

        if (!empty($this->user)) {
            $query->andFilterWhere(['author' => $this->user]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author' => $this->author,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'slug', $this->slug]);

        $query->orderBy('id DESC');

        return $dataProvider;
    }

}
