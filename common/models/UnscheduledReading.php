<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unscheduled_reading".
 *
 * @property int $id
 * @property string $meter_no
 * @property int $reading
 * @property string|null $remarks
 * @property string $zone
 * @property string $reading_date
 * @property string $status
 * @property string $created_at
 * @property string|null $created_by
 * @property string $updated_at
 * @property string|null $updated_by
 */
class UnscheduledReading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unscheduled_reading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meter_no', 'reading', 'zone', 'reading_date', 'status'], 'required'],
            [['meter_no', 'remarks', 'zone'], 'string'],
            [['reading'], 'integer'],
            [['reading_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 30],
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
            'meter_no' => 'Meter No',
            'reading' => 'Reading',
            'remarks' => 'Remarks',
            'zone' => 'Zone',
            'reading_date' => 'Reading Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
