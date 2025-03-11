<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Account;

/**
 * AccountSearch represents the model behind the search form of `common\models\Account`.
 */
class AccountSearch extends Account
{
    public $filter_name; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'senior_citizen'], 'integer'],
            [['sin', 'service_status_code', 'address', 'lastname', 'firstname', 'middlename', 'birthday', 'phone', 'email', 'zone_no', 'seq_no', 'connection_category_code', 'meter_size', 'account_name', 'date_last_discon', 'date_last_recon', 'date_connected', 'meter_no'], 'safe'],
            [['filter_name'], 'safe'],
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
        $query = Account::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'sin' => SORT_ASC,
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
            'birthday' => $this->birthday,
            'senior_citizen' => $this->senior_citizen,
            'date_last_discon' => $this->date_last_discon,
            'date_last_recon' => $this->date_last_recon,
            'date_connected' => $this->date_connected,
        ]);

        $query->andFilterWhere(['like', 'sin', $this->sin])
            ->andFilterWhere(['like', 'service_status_code', $this->service_status_code])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'zone_no', $this->zone_no])
            ->andFilterWhere(['like', 'seq_no', $this->seq_no])
            ->andFilterWhere(['like', 'connection_category_code', $this->connection_category_code])
            ->andFilterWhere(['like', 'meter_size', $this->meter_size])
            ->andFilterWhere(['like', 'account_name', $this->account_name])
            ->andFilterWhere(['like', 'meter_no', $this->meter_no]);

        // Filtering by combined name
        $query->andFilterWhere([
            'or',
            ['like', 'lastname', $this->filter_name],
            ['like', 'firstname', $this->filter_name],
            ['like', 'middlename', $this->filter_name],
        ]);

        return $dataProvider;
    }
}
