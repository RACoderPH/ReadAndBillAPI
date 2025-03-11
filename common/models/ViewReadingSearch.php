<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ViewReading;

/**
 * ViewReadingSearch represents the model behind the search form of `common\models\ViewReading`.
 */
class ViewReadingSearch extends ViewReading
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PREVRDG', 'PRESRDG', 'USAGE', 'is_average'], 'integer'],
            [['sin', 'account', 'cname', 'status', 'meter_no', 'reading_date', 'ffcode', 'mcode', 'remarks', 'mreader', 'consumption_status'], 'safe'],
            [['amount'], 'number'],
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
        $query = ViewReading::find();

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
            'ID' => $this->ID,
            'PREVRDG' => $this->PREVRDG,
            'PRESRDG' => $this->PRESRDG,
            'reading_date' => $this->reading_date,
            'USAGE' => $this->USAGE,
            'amount' => $this->amount,
            'is_average' => $this->is_average,
        ]);

        $query->andFilterWhere(['like', 'sin', $this->sin])
            ->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'cname', $this->cname])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'meter_no', $this->meter_no])
            ->andFilterWhere(['like', 'ffcode', $this->ffcode])
            ->andFilterWhere(['like', 'mcode', $this->mcode])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'mreader', $this->mreader])
            ->andFilterWhere(['like', 'consumption_status', $this->consumption_status]);

        return $dataProvider;
    }
}
