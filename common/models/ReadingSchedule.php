<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reading_schedule".
 *
 * @property int $id
 * @property string $monthof
 * @property string $yearof
 * @property string $zone
 * @property string $last_reading_date
 * @property string $reading_date
 * @property string $due_date
 * @property string $discon_date
 * @property string $duedate_800
 * @property string $meter_reader
 * @property string $inspector
 * @property string $updated_by
 * @property string $lastupdate
 * @property int $sent
 * @property string $jono
 * @property int $day
 *
 * @property ReadingData[] $readingDatas
 */
class ReadingSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reading_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monthof', 'yearof', 'zone', 'last_reading_date', 'reading_date', 'due_date', 'discon_date', 'duedate_800', 'meter_reader', 'inspector', 'updated_by', 'lastupdate', 'sent', 'jono', 'day'], 'required'],
            [['last_reading_date', 'reading_date', 'due_date', 'discon_date', 'duedate_800', 'lastupdate'], 'safe'],
            [['sent', 'day'], 'integer'],
            [['monthof', 'yearof', 'jono'], 'string', 'max' => 20],
            [['zone'], 'string', 'max' => 5],
            [['meter_reader', 'inspector', 'updated_by'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monthof' => 'Monthof',
            'yearof' => 'Yearof',
            'zone' => 'Zone',
            'last_reading_date' => 'Last Reading Date',
            'reading_date' => 'Reading Date',
            'due_date' => 'Due Date',
            'discon_date' => 'Discon Date',
            'duedate_800' => 'Duedate 800',
            'meter_reader' => 'Meter Reader',
            'inspector' => 'Inspector',
            'updated_by' => 'Updated By',
            'lastupdate' => 'Lastupdate',
            'sent' => 'Sent',
            'jono' => 'Jono',
            'day' => 'Day',
        ];
    }

    /**
     * Gets query for [[ReadingDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadingDatas()
    {
        return $this->hasMany(ReadingData::class, ['reading_schedule_id' => 'id']);
    }
}
