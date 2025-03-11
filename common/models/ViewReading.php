<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_reading".
 *
 * @property int $ID
 * @property string $sin
 * @property string $account
 * @property string $cname
 * @property string $status
 * @property string $meter_no
 * @property int $PREVRDG
 * @property int $PRESRDG
 * @property string $reading_date
 * @property int $USAGE
 * @property string|null $ffcode
 * @property string|null $mcode
 * @property string|null $remarks
 * @property string|null $mreader
 * @property float $amount
 * @property int $is_average
 * @property string $consumption_status
 */
class ViewReading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_reading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PREVRDG', 'PRESRDG', 'USAGE', 'is_average'], 'integer'],
            [['sin', 'account', 'cname', 'status', 'meter_no', 'PREVRDG', 'PRESRDG', 'reading_date', 'USAGE', 'amount', 'is_average', 'consumption_status'], 'required'],
            [['account', 'cname', 'status', 'meter_no'], 'string'],
            [['reading_date'], 'safe'],
            [['amount'], 'number'],
            [['sin'], 'string', 'max' => 10],
            [['ffcode', 'mcode'], 'string', 'max' => 5],
            [['remarks'], 'string', 'max' => 250],
            [['mreader'], 'string', 'max' => 3],
            [['consumption_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'sin' => 'Sin',
            'account' => 'Account',
            'cname' => 'Cname',
            'status' => 'Status',
            'meter_no' => 'Meter No',
            'PREVRDG' => 'Prevrdg',
            'PRESRDG' => 'Presrdg',
            'reading_date' => 'Reading Date',
            'USAGE' => 'Usage',
            'ffcode' => 'Ffcode',
            'mcode' => 'Mcode',
            'remarks' => 'Remarks',
            'mreader' => 'Mreader',
            'amount' => 'Amount',
            'is_average' => 'Is Average',
            'consumption_status' => 'Consumption Status',
            'photo' => 'Photo',
        ];
    }

        public static function primaryKey()
    {
        return ['ID'];
    }

    // public function getPhotos()
    // {
    //     return $this->hasMany(Photo::class, ['schedule_id' => 'id']);
    // }
}
