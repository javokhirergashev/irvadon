<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Service;

/**
 * ServiceSearch represents the model behind the search form of `common\models\Service`.
 */
class ServiceSearch extends Service
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'service_category', 'price', 'status'], 'integer'],
            [['service_name', 'service_description', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Service::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'service_category' => $this->service_category,
            'price' => $this->price,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'service_name', $this->service_name])
            ->andFilterWhere(['like', 'service_description', $this->service_description])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
