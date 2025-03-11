<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $coordinates
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Reading[] $readings
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coordinates'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['coordinates'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coordinates' => 'Coordinates',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Readings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadings()
    {
        return $this->hasMany(Reading::class, ['location_id' => 'id']);
    }
}
