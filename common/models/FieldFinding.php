<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_finding".
 *
 * @property int $id
 * @property string $ff_code
 * @property string $description
 * @property int $is_average
 * @property int $with_reading
 * @property string|null $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $updated_by
 *
 * @property Reading[] $readings
 */
class FieldFinding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field_finding';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ff_code', 'description', 'is_average', 'with_reading'], 'required'],
            [['is_average', 'with_reading'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ff_code'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 250],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ff_code' => 'Ff Code',
            'description' => 'Description',
            'is_average' => 'Is Average',
            'with_reading' => 'With Reading',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Readings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadings()
    {
        return $this->hasMany(Reading::class, ['ff_id' => 'id']);
    }
}
