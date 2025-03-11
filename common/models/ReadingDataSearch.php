<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReadingData;

/**
 * ReadingDataSearch represents the model behind the search form of `common\models\ReadingData`.
 */
class ReadingDataSearch extends ReadingData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'reading_schedule_id', 'previous_reading', 'average_usage', 'old_meter_usage', 'oldmeter_presreading', 'oldmeter_prevreading'], 'integer'],
            [['account_no', 'previous_date', 'meter_installation_date', 'announcements', 'ffcode', 'prevremarks'], 'safe'],
            [['advance_payment', 'wb_arrears', 'sf_arrears', 'total_arrears', 'mm_arrears', 'pn_nc', 'pn_nc_count', 'pn_wb', 'pn_wb_count', 'violation'], 'number'],
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
        $query = ReadingData::find();

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
            'account_id' => $this->account_id,
            'reading_schedule_id' => $this->reading_schedule_id,
            'previous_date' => $this->previous_date,
            'previous_reading' => $this->previous_reading,
            'average_usage' => $this->average_usage,
            'old_meter_usage' => $this->old_meter_usage,
            'advance_payment' => $this->advance_payment,
            'wb_arrears' => $this->wb_arrears,
            'sf_arrears' => $this->sf_arrears,
            'total_arrears' => $this->total_arrears,
            'mm_arrears' => $this->mm_arrears,
            'pn_nc' => $this->pn_nc,
            'pn_nc_count' => $this->pn_nc_count,
            'pn_wb' => $this->pn_wb,
            'pn_wb_count' => $this->pn_wb_count,
            'violation' => $this->violation,
            'oldmeter_presreading' => $this->oldmeter_presreading,
            'oldmeter_prevreading' => $this->oldmeter_prevreading,
            'meter_installation_date' => $this->meter_installation_date,
        ]);

        $query->andFilterWhere(['like', 'account_no', $this->account_no])
            ->andFilterWhere(['like', 'announcements', $this->announcements])
            ->andFilterWhere(['like', 'ffcode', $this->ffcode])
            ->andFilterWhere(['like', 'prevremarks', $this->prevremarks]);

        return $dataProvider;
    }
}
