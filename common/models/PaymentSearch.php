<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payment;

/**
 * PaymentSearch represents the model behind the search form of `common\models\Payment`.
 */
class PaymentSearch extends Payment
{
    public $filter_sin;
    public $filter_agent;
    public $filter_reference;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'billing_id', 'agent_id'], 'integer'],
            [['date_issued', 'remarks', 'reference', 'payment_type'], 'safe'],
            [['amount_paid'], 'number'],

            [['filter_sin', 'filter_agent', 'filter_reference'], 'safe'],
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
        $query = Payment::find();

        $query->joinWith(['billing.account', 'agent']);

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
            'billing_id' => $this->billing_id,
            'agent_id' => $this->agent_id,
            'date_issued' => $this->date_issued,
            'amount_paid' => $this->amount_paid,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type]);

        
        $query->andFilterWhere(['like', 'account.sin', $this->filter_sin])
            ->andFilterWhere(['like', 'agent.company_name', $this->filter_agent])
            ->andFilterWhere(['like', 'payment.reference', $this->filter_reference]);

        return $dataProvider;
    }
}
