<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reading;

/**
 * ReadingSearch represents the model behind the search form of `app\common\models\Reading`.
 */
class ReadingSearch extends Reading
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'schedule_id', 'reading', 'consumed', 'ff_id', 'location_id', 'inspection_subject_id', 'is_average', 'is_open'], 'integer'],
            [['wb', 'sr_wb', 'sf', 'sr_sf', 'wb_pen', 'sf_pen', 'total_amount'], 'number'],
            [['remarks', 'consumption_status','soa_number', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
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
        $query = Reading::find();

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
            'schedule_id' => $this->schedule_id,
            'reading' => $this->reading,
            'consumed' => $this->consumed,
            'wb' => $this->wb,
            'sr_wb' => $this->sr_wb,
            'sf' => $this->sf,
            'sr_sf' => $this->sr_sf,
            'wb_pen' => $this->wb_pen,
            'sf_pen' => $this->sf_pen,
            'ff_id' => $this->ff_id,
            'location_id' => $this->location_id,
            'inspection_subject_id' => $this->inspection_subject_id,
            'is_average' => $this->is_average,
            'is_open' => $this->is_open,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'consumption_status', $this->consumption_status])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
