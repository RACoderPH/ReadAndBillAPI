<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `app\common\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sr_citizen', 'prev_reading', 'average_usage', 'pn_nc_count', 'pn_wb_count', 'old_meter_usage', 'old_meter_prev_reading', 'old_meter_pres_reading', 'soa_type', 'created_at', 'updated_at'], 'integer'],
            [['sequence', 'sin', 'account_no', 'account_name', 'account_address', 'account_status', 'meter_no', 'connection_date', 'prev_date', 'reading_date', 'due_date', 'discon_due_date', 'discon_due_date_with_arrears', 'installation_date', 'ff_code', 'prev_remarks', 'announcement', 'meter_reader', 'status', 'email', 'created_by', 'updated_by','computation'], 'safe'],
            [['wb_arrears', 'sf_arrears', 'advance', 'pn_nc', 'pn_wb', 'violation'], 'number'],
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
        $query = Schedule::find();

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
            'sr_citizen' => $this->sr_citizen,
            'prev_reading' => $this->prev_reading,
            'average_usage' => $this->average_usage,
            'wb_arrears' => $this->wb_arrears,
            'sf_arrears' => $this->sf_arrears,
            'advance' => $this->advance,
            'pn_nc' => $this->pn_nc,
            'pn_nc_count' => $this->pn_nc_count,
            'pn_wb' => $this->pn_wb,
            'pn_wb_count' => $this->pn_wb_count,
            'violation' => $this->violation,
            'old_meter_usage' => $this->old_meter_usage,
            'old_meter_prev_reading' => $this->old_meter_prev_reading,
            'old_meter_pres_reading' => $this->old_meter_pres_reading,
            'soa_type' => $this->soa_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sequence', $this->sequence])
            ->andFilterWhere(['like', 'sin', $this->sin])
            ->andFilterWhere(['like', 'account_no', $this->account_no])
            ->andFilterWhere(['like', 'account_name', $this->account_name])
            ->andFilterWhere(['like', 'account_address', $this->account_address])
            ->andFilterWhere(['like', 'account_status', $this->account_status])
            ->andFilterWhere(['like', 'meter_no', $this->meter_no])
            ->andFilterWhere(['like', 'connection_date', $this->connection_date])
            ->andFilterWhere(['like', 'prev_date', $this->prev_date])
            ->andFilterWhere(['like', 'reading_date', $this->reading_date])
            ->andFilterWhere(['like', 'due_date', $this->due_date])
            ->andFilterWhere(['like', 'discon_due_date', $this->discon_due_date])
            ->andFilterWhere(['like', 'discon_due_date_with_arrears', $this->discon_due_date_with_arrears])
            ->andFilterWhere(['like', 'installation_date', $this->installation_date])
            ->andFilterWhere(['like', 'ff_code', $this->ff_code])
            ->andFilterWhere(['like', 'prev_remarks', $this->prev_remarks])
            ->andFilterWhere(['like', 'announcement', $this->announcement])
            ->andFilterWhere(['like', 'meter_reader', $this->meter_reader])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
