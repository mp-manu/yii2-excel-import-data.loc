<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ImportData;

/**
 * ImportDataSearch represents the model behind the search form of `app\models\ImportData`.
 */
class ImportDataSearch extends ImportData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lighting', 'impression_per_day'], 'integer'],
            [['city', 'lat', 'lng', 'size', 'side_type', 'side', 'price_type', 'nds_accommodation', 'kvant_accommodation', 'history_id'], 'safe'],
            [['price_accommodation'], 'number'],
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
        $query = ImportData::find()->joinWith('history');

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
            'lighting' => $this->lighting,
            'price_accommodation' => $this->price_accommodation,
            'impression_per_day' => $this->impression_per_day,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'side_type', $this->side_type])
            ->andFilterWhere(['like', 'side', $this->side])
            ->andFilterWhere(['like', 'price_type', $this->price_type])
            ->andFilterWhere(['like', 'nds_accommodation', $this->nds_accommodation])
            ->andFilterWhere(['like', 'kvant_accommodation', $this->kvant_accommodation])
            ->andFilterWhere(['like', 'history.import_time', $this->history_id])
        ;

        return $dataProvider;
    }
}
