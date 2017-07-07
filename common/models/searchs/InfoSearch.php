<?php

namespace common\models\searchs;

use common\models\Info;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageSearch represents the model behind the search form about `common\modules\Post\models\Post`.
 */
class InfoSearch extends Info {

    public $keywords;

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
        $query = Info::find();
        $query->orderBy('created_at DESC');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 10
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // find by trainer code
        if (!empty($this->keywords)) {

            $lowerKeywords = strtolower($this->keywords);

            $query->andFilterWhere([
                'or',
                    ['like', 'LOWER([[info]].[[email]])', $lowerKeywords]
            ]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->keywords])
                ->andFilterWhere(['like', 'phone', $this->keywords]);

        $query->orderBy('id DESC');

        return $dataProvider;
    }

}
