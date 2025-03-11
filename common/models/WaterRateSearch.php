<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WaterRate;

/**
 * WaterRateSearch represents the model behind the search form of `app\common\models\WaterRate`.
 */
class WaterRateSearch extends WaterRate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mincm', 'blk1cm', 'blk2cm', 'blk3cm', 'blk4cm', 'blk5cm'], 'integer'],
            [['code', 'size', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'safe'],
            [['minprice', 'blk1price', 'blk2price', 'blk3price', 'blk4price', 'blk5price'], 'number'],
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
        $query = WaterRate::find();

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
            'mincm' => $this->mincm,
            'minprice' => $this->minprice,
            'blk1cm' => $this->blk1cm,
            'blk1price' => $this->blk1price,
            'blk2cm' => $this->blk2cm,
            'blk2price' => $this->blk2price,
            'blk3cm' => $this->blk3cm,
            'blk3price' => $this->blk3price,
            'blk4cm' => $this->blk4cm,
            'blk4price' => $this->blk4price,
            'blk5cm' => $this->blk5cm,
            'blk5price' => $this->blk5price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
