<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReadingSchedule;

/**
 * ReadingScheduleSearch represents the model behind the search form of `common\models\ReadingSchedule`.
 */
class ReadingScheduleSearch extends ReadingSchedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sent', 'day'], 'integer'],
            [['monthof', 'yearof', 'zone', 'last_reading_date', 'reading_date', 'due_date', 'discon_date', 'duedate_800', 'meter_reader', 'inspector', 'updated_by', 'lastupdate', 'jono'], 'safe'],
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
        $query = ReadingSchedule::find();

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
            'last_reading_date' => $this->last_reading_date,
            'reading_date' => $this->reading_date,
            'due_date' => $this->due_date,
            'discon_date' => $this->discon_date,
            'duedate_800' => $this->duedate_800,
            'lastupdate' => $this->lastupdate,
            'sent' => $this->sent,
            'day' => $this->day,
        ]);

        $query->andFilterWhere(['like', 'monthof', $this->monthof])
            ->andFilterWhere(['like', 'yearof', $this->yearof])
            ->andFilterWhere(['like', 'zone', $this->zone])
            ->andFilterWhere(['like', 'meter_reader', $this->meter_reader])
            ->andFilterWhere(['like', 'inspector', $this->inspector])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'jono', $this->jono]);

        return $dataProvider;
    }
}
