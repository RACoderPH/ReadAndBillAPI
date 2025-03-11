<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Billing;

/**
 * BillingSearch represents the model behind the search form of `common\models\Billing`.
 */
class BillingSearch extends Billing
{
    public $filter_sin;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'last_reading', 'previous_reading', 'water_consumption'], 'integer'],
            [['bill_id', 'bill_status_code', 'bill_period_code', 'date_period_from', 'date_period_to', 'date_payment_due', 'date_discon', 'billed_by', 'billed_on', 'billing_type', 'penalty_date'], 'safe'],
            [['amount_billed', 'amount_penalty', 'sr_citizen_disc', 'franchise_tax', 'adjustments', 'water_maintenance_fee', 'advance_payment'], 'number'],

            [['filter_sin'], 'safe'],
            [['date_period_from', 'date_period_to', 'date_payment_due'], 'date', 'format' => 'php:Y-m-d'],
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
        $query = Billing::find();
        $query->joinWith(['account']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
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
            'date_period_from' => $this->date_period_from,
            'date_period_to' => $this->date_period_to,
            'date_payment_due' => $this->date_payment_due,
            'date_discon' => $this->date_discon,
            'last_reading' => $this->last_reading,
            'previous_reading' => $this->previous_reading,
            'water_consumption' => $this->water_consumption,
            'amount_billed' => $this->amount_billed,
            'amount_penalty' => $this->amount_penalty,
            'sr_citizen_disc' => $this->sr_citizen_disc,
            'franchise_tax' => $this->franchise_tax,
            'adjustments' => $this->adjustments,
            'billed_on' => $this->billed_on,
            'water_maintenance_fee' => $this->water_maintenance_fee,
            'advance_payment' => $this->advance_payment,
            'penalty_date' => $this->penalty_date,
        ]);

        $query->andFilterWhere(['like', 'bill_id', $this->bill_id])
            ->andFilterWhere(['like', 'bill_status_code', $this->bill_status_code])
            ->andFilterWhere(['like', 'bill_period_code', $this->bill_period_code])
            ->andFilterWhere(['like', 'billed_by', $this->billed_by])
            ->andFilterWhere(['like', 'billing_type', $this->billing_type]);


         // Filtering by SIN from Account, skips if $this->filter_sin is empty
        $query->andFilterWhere(['like', 'account.sin', $this->filter_sin]);

        // Apply filters for date fields, skips if $this->date_period_from or $this->date_period_to are empty
        $query->andFilterWhere(['>=', 'date_period_from', $this->date_period_from]);
        $query->andFilterWhere(['<=', 'date_period_to', $this->date_period_to]);

        // Filtering by due date, skips if $this->date_payment_due is empty
        $query->andFilterWhere(['like', 'date_payment_due', $this->date_payment_due]);

        return $dataProvider;
    }
}
