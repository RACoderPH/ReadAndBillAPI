<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reading".
 *
 * @property int $id
 * @property int $schedule_id
 * @property int $reading
 * @property int $consumed
 * @property float $wb
 * @property float $sr_wb
 * @property float $sf
 * @property float $sr_sf
 * @property float $wb_pen
 * @property float $sf_pen
 * @property int $ff_id
 * @property string|null $remarks
 * @property int $location_id
 * @property int $inspection_subject_id
 * @property int $is_average
 * @property int $is_open
 * @property float $total_amount
 * @property string $consumption_status
 * @property string $created_at
 * @property string|null $created_by
 * @property string $updated_at
 * @property string|null $updated_by
 *
 * @property Schedule $schedule
 */
class Reading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'reading', 'consumed', 'wb', 'sr_wb', 'sf', 'sr_sf', 'wb_pen', 'sf_pen', 'ff_id', 'location_id', 'inspection_subject_id', 'is_average', 'is_open', 'total_amount', 'consumption_status'], 'required'],
            [['schedule_id', 'reading', 'consumed', 'ff_id', 'location_id', 'inspection_subject_id', 'is_average', 'is_open'], 'integer'],
            [['wb', 'sr_wb', 'sf', 'sr_sf', 'wb_pen', 'sf_pen', 'total_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['remarks'], 'string', 'max' => 250],
            [['soa_number'], 'string', 'max' => 6],
            [['consumption_status'], 'string', 'max' => 1],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::class, 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Schedule ID',
            'reading' => 'Reading',
            'consumed' => 'Consumed',
            'wb' => 'Wb',
            'sr_wb' => 'Sr Wb',
            'sf' => 'Sf',
            'sr_sf' => 'Sr Sf',
            'wb_pen' => 'Wb Pen',
            'sf_pen' => 'Sf Pen',
            'ff_id' => 'Ff ID',
            'remarks' => 'Remarks',
            'location_id' => 'Location ID',
            'inspection_subject_id' => 'Inspection Subject ID',
            'is_average' => 'Is Average',
            'is_open' => 'Is Open',
            'total_amount' => 'Total Amount',
            'consumption_status' => 'Consumption Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Schedule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::class, ['id' => 'schedule_id']);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['schedule_id' => 'id']);
    }
}
